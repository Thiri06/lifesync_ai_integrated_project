<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FitnessPlanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Testing Routes
    Route::post('/fitness-plan-result/generate', [FitnessPlanController::class, 'generate'])->name('fitness.generate');
    Route::get('/fitness-plan-result/result/{id}', [FitnessPlanController::class, 'showResult'])->name('fitness.result');
    Route::get('/fitness-plan-result/download/{id}', [FitnessPlanController::class, 'downloadPDF'])->name('fitness.download');


    // Fitness Plan Routes
    Route::get('/fitness', function () {
        $user = Auth::user();

        // Get the user's latest fitness profile and result
        $fitnessProfile = App\Models\FitnessProfile::where('user_id', $user->id)
            ->latest()
            ->first();

        if (!$fitnessProfile) {
            return redirect()->route('dashboard')
                ->with('info', 'You haven\'t created a fitness plan yet. Please generate one first.');
        }

        $fitnessPlanResult = App\Models\FitnessPlanResult::where('fitness_profile_id', $fitnessProfile->id)
            ->first();

        if (!$fitnessPlanResult) {
            return redirect()->route('dashboard')
                ->with('error', 'Your fitness plan result was not found. Please generate a new plan.');
        }

        return view('fitness-plan-result', [
            'fitnessProfile' => $fitnessProfile,
            'fitnessPlanResult' => $fitnessPlanResult,
        ]);
    })->name('fitness.index');

    // Placeholder routes for nutrition and mental wellness
    Route::post('/nutrition/generate', function () {
        return redirect()->route('dashboard')->with('info', 'Nutrition plan generation is coming soon!');
    })->name('nutrition.generate');

    Route::post('/mental/generate', function () {
        return redirect()->route('dashboard')->with('info', 'Mental wellness plan generation is coming soon!');
    })->name('mental.generate');

    // Nutrition Plan Routes
    Route::get('/nutrition-plan', function () {
        return view('nutrition-plan');
    })->name('nutrition.index');

    // Mental Wellness Routes
    Route::get('/mental-wellness', function () {
        return view('mental-wellness');
    })->name('mental.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
