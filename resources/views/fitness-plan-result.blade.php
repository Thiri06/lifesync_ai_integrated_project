<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Personalized Fitness Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Header Section --}}
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bold text-primary">🏋️ Your Personalized 30-Day Fitness Plan</h1>
                        <p class="lead text-muted">Designed based on your goals and preferences.</p>
                    </div>

                    @if(isset($fitnessProfile) && isset($fitnessPlanResult))
                        {{-- Fitness Profile Summary --}}
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-body">
                                <h4 class="card-title text-secondary">Your Fitness Profile</h4>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <p><strong>Fitness Goal:</strong> {{ ucfirst(str_replace('_', ' ', $fitnessProfile->fitness_goals)) }}</p>
                                        <p><strong>Fitness Level:</strong> {{ ucfirst($fitnessProfile->fitness_level) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Workout Types:</strong> {{ implode(', ', json_decode($fitnessProfile->workout_types)) }}</p>
                                        <p><strong>Workout Environment:</strong> {{ ucfirst($fitnessProfile->workout_environment) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Workout Time:</strong> {{ str_replace('_', ' ', ucfirst($fitnessProfile->workout_time)) }}</p>
                                        <p><strong>Workout Frequency:</strong> {{ str_replace('_', ' ', ucfirst($fitnessProfile->workout_frequency)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- AI Generated Plan --}}
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h4 class="card-title text-success mb-4">📝 Your AI-Generated Plan</h4>

                                {{-- Display the AI Response --}}
                                <div class="plan-content" style="white-space: pre-line; font-size: 1rem;">
                                    {!! nl2br(e($fitnessPlanResult->ai_response)) !!}
                                </div>

                                <div class="mt-5 text-center">
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('fitness.download', ['id' => $fitnessProfile->id]) }}" class="btn btn-success">
                                <i class="fas fa-download"></i> Download Plan as PDF
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <p>No fitness plan data available. Please generate a plan from the dashboard.</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-arrow-left"></i> Back to Dashboard
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
