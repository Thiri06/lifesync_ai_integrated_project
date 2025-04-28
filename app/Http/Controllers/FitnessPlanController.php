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
            // New validations
            'nutrition_goal' => 'required|string',
            'foods_to_avoid' => 'required|string',
            'mental_goal' => 'required|string',
            'stress_level' => 'required|string',
            'sleep_quality' => 'required|string',
            'wellness_methods' => 'required|array',
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
            // New fields
            'nutrition_goal' => $request->nutrition_goal,
            'foods_to_avoid' => $request->foods_to_avoid,
            'mental_goal' => $request->mental_goal,
            'stress_level' => $request->stress_level,
            'sleep_quality' => $request->sleep_quality,
            'wellness_methods' => json_encode($request->wellness_methods),
        ]);

        // Build the AI prompt by combining user basic profile and fitness profile
        $prompt = $this->buildPrompt($user, $fitnessProfile);

        // Call the OpenRouter API (Mistral Small 3.1 24B)
        $aiResponse = $this->callMistralAPI($prompt);

        if (!$aiResponse) {
            return back()->with('error', 'Failed to generate fitness plan. Please try again.');
        }
        // Format the AI response to HTML
        $processedResponse = $this->formatAIResponseToHTML($aiResponse);

        // Save the AI response - make sure this is working
        $fitnessPlanResult = FitnessPlanResult::create([
            'user_id' => $user->id,
            'fitness_profile_id' => $fitnessProfile->id,
            'ai_response' => $aiResponse,
            'processed_response' => $processedResponse,
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
            . "NUTRITION PROFILE:\n"
            . "Nutrition Goal: {$fitnessProfile->nutrition_goal}\n"
            . "Foods to Avoid: {$fitnessProfile->foods_to_avoid}\n\n"
            . "MENTAL WELLNESS PROFILE:\n"
            . "Mental Wellness Goal: {$fitnessProfile->mental_goal}\n"
            . "Current Stress Level: {$fitnessProfile->stress_level}\n"
            . "Sleep Quality: {$fitnessProfile->sleep_quality}\n"
            . "Preferred Wellness Methods: " .  implode(', ', json_decode($fitnessProfile->wellness_methods)) . "\n\n"
            . "Please create a comprehensive 30-day wellness plan that includes:\n"
            . "1. A personalized fitness routine with workout schedules, exercises, and intensity levels\n"
            . "2. A nutrition plan with healthy meal ideas and dietary recommendations\n"
            . "3. Mental wellness practices for stress management and better sleep\n"
            . "4. Add suggestions, tips, and resources for each section\n\n"
            . "The plan should be organized by day or week, with clear sections for fitness, nutrition, and mental wellness. Format the plan with headings and bullet points for readability. Must not include any markdown or HTML tags such as #,*,etc. Use bullet points instead of using hyphens for hierarchical. The plan must be accurate, safe, and effective.";
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
     * Format the AI response text to HTML with proper formatting
     */
    protected function formatAIResponseToHTML($text)
    {
        // First, let's handle the main title (usually the first line)
        $text = preg_replace('/^(.*?(?:Wellness|Fitness|Health).*?Plan.*)$/m', '<h2 class="fitness-heading-main text-center mb-4">$1</h2>', $text, 1);

        // Process section headings (Fitness Plan, Diet Plan, Mental Wellness Plan)
        $text = preg_replace(
            '/^((?:Fitness|Diet|Nutrition|Mental Wellness|Exercise)\s+Plan)$/im',
            '<h3 class="fitness-heading section-heading mt-5 mb-3"><i class="fas fa-' .
                '$1 == "Fitness Plan" || $1 == "Exercise Plan" ? "dumbbell" : ($1 == "Diet Plan" || $1 == "Nutrition Plan" ? "apple-alt" : "brain")' .
                ' me-2"></i>$1</h3>',
            $text
        );

        // Process week headings
        $text = preg_replace(
            '/^(Week\s+\d+(?:\s*-\s*\d+\s*Days)?)$/im',
            '<h3 class="fitness-heading week-heading mt-4 mb-3"><i class="fas fa-calendar-week me-2"></i>$1</h3>',
            $text
        );

        // Process day headings (Monday, Tuesday, etc.)
        $text = preg_replace(
            '/^(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)(?:,|\s*-\s*|\:)*/m',
            '<h4 class="fitness-subheading day-heading mt-3 mb-2"><i class="fas fa-calendar-day me-2"></i>$1</h4>',
            $text
        );

        // Process meal time headings (Breakfast, Lunch, Dinner, etc.)
        $text = preg_replace(
            '/^(Breakfast|Lunch|Dinner|Mid-Morning Snack|Afternoon Snack|Evening Snack)(?:\:|\s*-\s*)/m',
            '<h5 class="fitness-meal-heading mt-3 mb-2"><i class="fas fa-utensils me-2"></i>$1</h5>',
            $text
        );

        // Process time-of-day headings (Morning, Throughout the Day, Evening)
        $text = preg_replace(
            '/^(Morning|Throughout the Day|Evening|Weekly)(?:\:|\s*-\s*)/m',
            '<h5 class="fitness-time-heading mt-3 mb-2"><i class="fas fa-clock me-2"></i>$1</h5>',
            $text
        );

        // Process subheadings that end with a colon
        $text = preg_replace('/^(.*?):$/m', '<h5 class="fitness-subheading-2 mt-3 mb-2">$1</h5>', $text);

        // Convert bullet points (lines starting with •, *, -, or .)
        $text = preg_replace('/^[•\*\-\.]\s*(.*?)$/m', '<li>$1</li>', $text);

        // Wrap consecutive list items in ul tags
        $text = preg_replace('/((?:<li>.*?<\/li>\n?)+)/', '<ul class="fitness-list mb-3">$1</ul>', $text);

        // Convert paragraphs (consecutive lines of text that aren't already wrapped in HTML tags)
        $text = preg_replace('/^([^<].*?)$/m', '<p>$1</p>', $text);

        // Clean up any empty paragraphs
        $text = str_replace('<p></p>', '', $text);

        // Add special formatting for numbers and measurements
        $text = preg_replace(
            '/(\d+(?:\.\d+)?)\s*(minutes|minute|mins|min|hours|hour|days|day|weeks|week)/',
            '<span class="fitness-time-value">$1</span> <span class="fitness-time-unit">$2</span>',
            $text
        );

        // Highlight important terms
        $keywords = [
            'protein',
            'carbohydrates',
            'fats',
            'calories',
            'intensity',
            'warm-up',
            'cool-down',
            'stretching',
            'meditation',
            'breathing',
            'journaling',
            'relaxation'
        ];

        foreach ($keywords as $keyword) {
            $text = preg_replace('/\b(' . $keyword . ')\b/i', '<span class="fitness-keyword">$1</span>', $text);
        }

        return $text;
    }

    /**
     * Display the AI generated fitness plan result.
     */
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

        // Use the stored processed_response if available, otherwise format it on-the-fly
        $formattedResponse = $fitnessPlanResult->processed_response;

        // If processed_response is empty or null, format it now and update the record
        if (empty($formattedResponse)) {
            $formattedResponse = $this->formatAIResponseToHTML($fitnessPlanResult->ai_response);

            // Update the record with the formatted response
            $fitnessPlanResult->update([
                'processed_response' => $formattedResponse
            ]);

            // Log that we had to reformat the response
            Log::info('Reformatted response for fitness plan result: ' . $fitnessPlanResult->id);
        }

        return view('fitness-plan-result', [
            'fitnessProfile' => $fitnessProfile,
            'fitnessPlanResult' => $fitnessPlanResult,
            'formattedResponse' => $formattedResponse,
        ]);
    }



    public function downloadPDF($id)
    {
        $fitnessProfile = FitnessProfile::findOrFail($id);
        $fitnessPlanResult = FitnessPlanResult::where('fitness_profile_id', $id)->firstOrFail();

        // Use the stored processed_response if available, otherwise format it on-the-fly
        $formattedResponse = $fitnessPlanResult->processed_response;

        // If processed_response is empty or null, format it now
        if (empty($formattedResponse)) {
            $formattedResponse = $this->formatAIResponseToHTML($fitnessPlanResult->ai_response);
        }

        $pdf = Pdf::loadView('fitness-plan-pdf', [
            'fitnessProfile' => $fitnessProfile,
            'fitnessPlanResult' => $fitnessPlanResult,
            'formattedResponse' => $formattedResponse,
        ]);

        return $pdf->download('fitness-plan-pdf.pdf');
    }
}
