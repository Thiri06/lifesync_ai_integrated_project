<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fitness_goals',
        'fitness_level',
        'workout_types',
        'workout_environment',
        'workout_time',
        'workout_frequency',
        // New fields
        'nutrition_goal',
        'foods_to_avoid',
        'mental_goal',
        'stress_level',
        'sleep_quality',
        'wellness_methods',
    ];

    /**
     * Relationship: FitnessProfile belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: FitnessProfile has one FitnessPlanResult.
     */
    public function fitnessPlanResult()
    {
        return $this->hasOne(FitnessPlanResult::class);
    }
}
