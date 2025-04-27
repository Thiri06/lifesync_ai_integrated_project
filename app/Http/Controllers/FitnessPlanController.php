<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FitnessProfile;
use App\Models\FitnessPlanResult;
use App\Models\User;

class FitnessPlanController extends Controller
{
    /**
     * Handle the Fitness Plan Form submission.
     */
    public function generate(Request $request)
    {
        // Validate fitness form input
        $request->validate([
            'fitness_goals' => 'required|string',
            'fitness_level' => 'required|string',
            'workout_types' => 'required|array',
            'workout_environment' => 'required|string',
            'workout_time' => 'required|string',
            'workout_frequency' => 'required|string',
        ]);

        $user = Auth::user();

        // Save fitness profile data
        $fitnessProfile = FitnessProfile::create([
            'user_id' => $user->id,
            'fitness_goals' => $request->fitness_goals,
            'fitness_level' => $request->fitness_level,
            'workout_types' => json_encode($request->workout_types),
            'workout_environment' => $request->workout_environment,
            'workout_time' => $request->workout_time,
            'workout_frequency' => $request->workout_frequency,
        ]);

        // Build the AI prompt by combining user basic profile and fitness profile
        $prompt = $this->buildPrompt($user, $fitnessProfile);

        // Call the OpenRouter API (Mistral Small 3.1 24B)
        $aiResponse = $this->callMistralAPI($prompt);

        if (!$aiResponse) {
            return back()->with('error', 'Failed to generate fitness plan. Please try again.');
        }

        // Save the AI response - make sure this is working
        $fitnessPlanResult = FitnessPlanResult::create([
            'user_id' => $user->id,
            'fitness_profile_id' => $fitnessProfile->id,
            'ai_response' => $aiResponse,
        ]);

        Log::info('Created fitness plan result: ' . $fitnessPlanResult->id . ' for profile: ' . $fitnessProfile->id);

        // Redirect to result page
        return redirect()->route('fitness.result', ['id' => $fitnessProfile->id])
            ->with('success', '🎉 Your personalized fitness plan has been successfully generated!');
    }

    /**
     * Build prompt combining user's basic info and fitness profile.
     */
    protected function buildPrompt(User $user, FitnessProfile $fitnessProfile)
    {
        return "Create a personalized 30-day fitness and diet plan tailored for the following user:\n\n"
            . "Age: {$user->age}\n"
            . "Gender: {$user->gender}\n"
            . "Height: {$user->height} cm\n"
            . "Weight: {$user->weight} kg\n"
            . "Dietary Preferences: {$user->dietary_preferences}\n"
            . "Health Concerns: {$user->health_concerns}\n\n"
            . "Fitness Goal: {$fitnessProfile->fitness_goals}\n"
            . "Current Fitness Level: {$fitnessProfile->fitness_level}\n"
            . "Preferred Workout Types: " . implode(', ', json_decode($fitnessProfile->workout_types)) . "\n"
            . "Workout Environment: {$fitnessProfile->workout_environment}\n"
            . "Workout Time Available: {$fitnessProfile->workout_time}\n"
            . "Workout Frequency: {$fitnessProfile->workout_frequency}\n\n"
            . "Please generate a 30-day fitness and diet plan with workout schedules, intensity, and healthy meal ideas.";
    }

    /**
     * Call the OpenRouter Mistral API and return the AI-generated response.
     */
    protected function callMistralAPI($prompt)
    {
        try {
            // Increase timeout and add retry logic
            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification - ONLY FOR LOCAL DEVELOPMENT
                'timeout' => 30, // Increase timeout to 30 seconds
                'connect_timeout' => 15, // Connection timeout of 15 seconds
            ])->withHeaders([
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'mistralai/mistral-small-3.1-24b-instruct:free',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $responseData = $response->json();

            if (isset($responseData['choices'][0]['message']['content'])) {
                return $responseData['choices'][0]['message']['content'];
            } else {
                Log::error('Mistral API Error: ' . json_encode($responseData));
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Error calling Mistral API: ' . $e->getMessage());

            // For timeout errors, provide a more specific message
            if (strpos($e->getMessage(), 'cURL error 28') !== false) {
                Log::error('API timeout - The request to OpenRouter API timed out. This could be due to network issues or high server load.');
            }

            return null;
        }
    }

    /**
     * Display the AI generated fitness plan result.
     */
    public function showResult($id)
    {
        $fitnessProfile = FitnessProfile::findOrFail($id);
        $fitnessPlanResult = FitnessPlanResult::where('fitness_profile_id', $id)->firstOrFail();

        // If no result exists yet, we can show a message or redirect
        if (!$fitnessPlanResult) {
            return redirect()->route('dashboard')
                ->with('error', 'Your fitness plan is still being generated. Please try again later.');
        }

        return view('fitness-plan-result', [
            'fitnessProfile' => $fitnessProfile,
            'fitnessPlanResult' => $fitnessPlanResult,
        ]);
    }

    public function downloadPDF($id)
    {
        $fitnessProfile = FitnessProfile::findOrFail($id);
        $fitnessPlanResult = FitnessPlanResult::where('fitness_profile_id', $id)->firstOrFail();

        $pdf = Pdf::loadView('fitness-plan-pdf', [
            'fitnessProfile' => $fitnessProfile,
            'fitnessPlanResult' => $fitnessPlanResult,
        ]);

        return $pdf->download('fitness-plan-pdf.pdf');
    }
}
