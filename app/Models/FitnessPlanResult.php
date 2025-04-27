<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessPlanResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fitness_profile_id',
        'ai_response',
    ];

    /**
     * Relationship: FitnessPlanResult belongs to a FitnessProfile.
     */
    public function fitnessProfile()
    {
        return $this->belongsTo(FitnessProfile::class);
    }

    /**
     * Relationship: FitnessPlanResult belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
