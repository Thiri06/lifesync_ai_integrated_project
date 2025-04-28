<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-gradient-to-r from-primary to-accent p-4 rounded-lg">
                            <svg class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div class="ml-6">
                            <h2 class="text-2xl font-bold text-gray-800">Welcome to LifeSync, {{ Auth::user()->name }}!</h2>
                            <p class="text-gray-600 mt-1">Complete the forms below to generate your personalized wellness plans.</p>
                        </div>
                    </div>
                </div>
            </div>

             @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @php
                $hasExistingPlan = Auth::user()->fitnessProfiles()->exists();
            @endphp

            @if($hasExistingPlan)
                <div class="mt-4">
                    <a href="{{ route('fitness.index') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition">
                        <i class="fas fa-eye mr-2"></i> View Your Latest Fitness Plan
                    </a>
                </div>
            @endif

            <!-- Dashboard Tabs -->
            <div class="mt-5 mb-6" x-data="{ activeTab: 'fitness' }">
                <div class="rounded-lg shadow-sm overflow-hidden form-section">
                
                    <!-- Fitness Plan Form -->
                    <div x-show="activeTab === 'fitness'" class="p-6">
                        <form action="{{ route('fitness.generate') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="bg-purple-50 rounded-lg p-4 mb-6 border border-purple-100">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 text-primary">
                                        <i class="fas fa-info-circle text-xl"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-primary">Complete Your Fitness Profile</h3>
                                        <div class="mt-1 text-sm text-gray-600">
                                            <p>Fill in your details below to generate a personalized 30-day fitness plan tailored to your goals and preferences.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Fitness Goals Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">1</span>
                                        Fitness Goals & Level
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="fitness_goals" class="block text-sm font-medium text-gray-700 mb-1">Fitness Goals</label>
                                            <select name="fitness_goals" id="fitness_goals" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select your primary goal</option>
                                                <option value="weight_loss">Weight Loss</option>
                                                <option value="muscle_gain">Muscle Gain</option>
                                                <option value="increased_endurance">Increased Endurance</option>
                                                <option value="flexibility_improvement">Flexibility Improvement</option>
                                                <option value="overall_fitness">Overall Fitness</option>
                                                <option value="stress_reduction">Stress Reduction</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="fitness_level" class="block text-sm font-medium text-gray-700 mb-1">Current Fitness Level</label>
                                            <select name="fitness_level" id="fitness_level" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select your fitness level</option>
                                                <option value="beginner">Beginner (New to exercise)</option>
                                                <option value="intermediate">Intermediate (Exercise 1-3 times/week)</option>
                                                <option value="advanced">Advanced (Exercise 4+ times/week)</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Workout Types</label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="workout_types[]" id="yoga" value="yoga" class="rounded text-primary focus:ring-primary">
                                                    <label for="yoga" class="ml-2 text-sm text-gray-700">Yoga</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="workout_types[]" id="hiit" value="hiit" class="rounded text-primary focus:ring-primary">
                                                    <label for="hiit" class="ml-2 text-sm text-gray-700">HIIT</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="workout_types[]" id="strength" value="strength_training" class="rounded text-primary focus:ring-primary">
                                                    <label for="strength" class="ml-2 text-sm text-gray-700">Strength Training</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="workout_types[]" id="cardio" value="cardio" class="rounded text-primary focus:ring-primary">
                                                    <label for="cardio" class="ml-2 text-sm text-gray-700">Cardio</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="workout_types[]" id="pilates" value="pilates" class="rounded text-primary focus:ring-primary">
                                                    <label for="pilates" class="ml-2 text-sm text-gray-700">Pilates</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="workout_types[]" id="calisthenics" value="calisthenics" class="rounded text-primary focus:ring-primary">
                                                    <label for="calisthenics" class="ml-2 text-sm text-gray-700">Calisthenics</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Workout Preferences Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">2</span>
                                        Workout Preferences
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="workout_environment" class="block text-sm font-medium text-gray-700 mb-1">Workout Environment</label>
                                            <select name="workout_environment" id="workout_environment" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select environment</option>
                                                <option value="home">Home</option>
                                                <option value="gym">Gym</option>
                                                <option value="outdoors">Outdoors</option>
                                                <option value="mixed">Mixed</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="workout_time" class="block text-sm font-medium text-gray-700 mb-1">Time Available for Workouts</label>
                                            <select name="workout_time" id="workout_time" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select available time</option>
                                                <option value="15_minutes">15 minutes/day</option>
                                                <option value="30_minutes">30 minutes/day</option>
                                                <option value="45_minutes">45 minutes/day</option>
                                                <option value="60_minutes">1 hour/day</option>
                                                <option value="90_minutes">1.5 hours/day</option>
                                                <option value="120_minutes">2+ hours/day</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="workout_frequency" class="block text-sm font-medium text-gray-700 mb-1">Workout Frequency</label>
                                            <select name="workout_frequency" id="workout_frequency" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select frequency</option>
                                                <option value="2_3_days">2-3 days/week</option>
                                                <option value="4_5_days">4-5 days/week</option>
                                                <option value="6_7_days">6-7 days/week</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- Nutrition Goals Section -->
                                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                            <span class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center mr-2 text-sm">3</span>
                                            Nutrition & Wellness
                                        </h3>
                                        
                                        <div class="space-y-4">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="nutrition_goal" class="block text-sm font-medium text-gray-700 mb-1">Nutrition Goal</label>
                                                    <select name="nutrition_goal" id="nutrition_goal" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                        <option value="">Select your goal</option>
                                                        <option value="weight_loss">Weight Loss</option>
                                                        <option value="muscle_building">Muscle Building</option>
                                                        <option value="maintenance">Maintenance</option>
                                                        <option value="health_improvement">Health Improvement</option>
                                                        <option value="energy_boost">Energy Boost</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="foods_to_avoid" class="block text-sm font-medium text-gray-700 mb-1">Foods to Avoid</label>
                                                    <input type="text" name="foods_to_avoid" id="foods_to_avoid" placeholder="E.g., dairy, gluten, nuts" class="form-input rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full">
                                                </div>
                                            </div>
                                            
                                            <!-- Two input fields arranged horizontally -->
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="mental_goal" class="block text-sm font-medium text-gray-700 mb-1">Mental Wellness Goal</label>
                                                    <select name="mental_goal" id="mental_goal" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                        <option value="">Select your goal</option>
                                                        <option value="stress_reduction">Stress Reduction</option>
                                                        <option value="better_sleep">Better Sleep</option>
                                                        <option value="mindfulness">Mindfulness</option>
                                                        <option value="focus_improvement">Focus Improvement</option>
                                                        <option value="mood_enhancement">Mood Enhancement</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="stress_level" class="block text-sm font-medium text-gray-700 mb-1">Current Stress Level</label>
                                                    <select name="stress_level" id="stress_level" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                        <option value="">Select stress level</option>
                                                        <option value="low">Low</option>
                                                        <option value="moderate">Moderate</option>
                                                        <option value="high">High</option>
                                                        <option value="very_high">Very High</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                <label for="sleep_quality" class="block text-sm font-medium text-gray-700 mb-1">Sleep Quality</label>
                                                <select name="sleep_quality" id="sleep_quality" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                    <option value="">Select sleep quality</option>
                                                    <option value="poor">Poor (< 5 hours)</option>
                                                    <option value="fair">Fair (5-6 hours)</option>
                                                    <option value="good">Good (7-8 hours)</option>
                                                    <option value="excellent">Excellent (8+ hours)</option>
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Wellness Methods</label>
                                                <div class="grid grid-cols-2 gap-2">
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="wellness_methods[]" id="meditation" value="meditation" class="rounded text-primary focus:ring-primary">
                                                        <label for="meditation" class="ml-2 text-sm text-gray-700">Meditation</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="wellness_methods[]" id="journaling" value="journaling" class="rounded text-primary focus:ring-primary">
                                                        <label for="journaling" class="ml-2 text-sm text-gray-700">Journaling</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="wellness_methods[]" id="breathing" value="breathing_exercises" class="rounded text-primary focus:ring-primary">
                                                        <label for="breathing" class="ml-2 text-sm text-gray-700">Breathing Exercises</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="wellness_methods[]" id="nature" value="nature_time" class="rounded text-primary focus:ring-primary">
                                                        <label for="nature" class="ml-2 text-sm text-gray-700">Nature Time</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="wellness_methods[]" id="reading" value="reading" class="rounded text-primary focus:ring-primary">
                                                        <label for="reading" class="ml-2 text-sm text-gray-700">Reading</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" name="wellness_methods[]" id="yoga_mental" value="yoga_mental" class="rounded text-primary focus:ring-primary">
                                                        <label for="yoga_mental" class="ml-2 text-sm text-gray-700">Yoga</label>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="mt-5 mb-5 ms-2 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-primary to-secondary hover:from-primary hover:to-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200">
                                    <i class="fas fa-dumbbell mr-2"></i> Generate Fitness Plan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            <!-- Getting Started Guide -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5 mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Getting Started with LifeSync</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">1</div>
                                <h4 class="font-medium text-primary">Complete Your Profile</h4>
                            </div>
                            <p class="text-sm text-gray-600">Fill out the forms above to provide information about your fitness goals, dietary preferences, and mental wellness needs.</p>
                        </div>
                        
                        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">2</div>
                                <h4 class="font-medium text-primary">Generate Your Plans</h4>
                            </div>
                            <p class="text-sm text-gray-600">Our AI will analyze your information and create personalized fitness, nutrition, and mental wellness plans tailored to your needs.</p>
                        </div>
                        
                        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">3</div>
                                <h4 class="font-medium text-primary">Track Your Progress</h4>
                            </div>
                            <p class="text-sm text-gray-600">Follow your personalized plans and track your progress over time. Update your information as needed to refine your plans.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Automated AI assistant bot --}}
    <div class="ai-assistant-widget" id="aiAssistantWidget">
        <div class="ai-assistant-button" id="aiAssistantButton">
            <div class="ai-assistant-icon">
                <i class="fas fa-robot"></i>
            </div>
            <div class="ai-assistant-pulse"></div>
        </div>
        <div class="ai-assistant-panel" id="aiAssistantPanel">
            <div class="ai-assistant-header">
                <div class="ai-assistant-title">
                    <i class="fas fa-robot me-2"></i>
                    LifeSync Assistant
                </div>
                <button class="ai-assistant-close" id="aiAssistantClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="ai-assistant-body" id="aiAssistantBody">
                <div class="ai-message">
                    <div class="ai-avatar">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="ai-bubble">
                        Hi there! I'm your LifeSync AI assistant. How can I help you with your wellness journey today?
                    </div>
                </div>
                
                <!-- Predefined Questions Section -->
                <div class="predefined-questions">
                    <div class="predefined-question" data-question="What is LifeSync?">
                        What is LifeSync?
                    </div>
                    <div class="predefined-question" data-question="What can I do in LifeSync?">
                        What can I do in LifeSync?
                    </div>
                    <div class="predefined-question" data-question="How does AI help my wellness?">
                        How does AI help my wellness?
                    </div>
                    <div class="predefined-question" data-question="Is my data secure?">
                        Is my data secure?
                    </div>
                </div>
                
                <div id="aiChatMessages"></div>
            </div>
            <div class="ai-assistant-footer">
                <input type="text" class="ai-assistant-input" id="aiAssistantInput" placeholder="Type your question here...">
                <button class="ai-assistant-send" id="aiAssistantSend">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <title>{{ config('app.name', 'LifeSync') }} - Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTYgMkM4LjI2OCAyIDIgOC4yNjggMiAxNkMyIDIzLjczMiA4LjI2OCAzMCAxNiAzMEMyMy43MzIgMzAgMzAgMjMuNzMyIDMwIDE2QzMwIDguMjY4IDIzLjczMiAyIDE2IDJaIiBmaWxsPSIjZDM4ZGVkIiBmaWxsLW9wYWNpdHk9IjAuMSIvPjxwYXRoIGQ9Ik0xNiA2QzEwLjQ3NyA2IDYgMTAuNDc3IDYgMTZDNiAyMS41MjMgMTAuNDc3IDI2IDE2IDI2QzIxLjUyMyAyNiAyNiAyMS41MjMgMjYgMTZDMjYgMTAuNDc3IDIxLjUyMyA2IDE2IDZaIiBmaWxsPSIjZDM4ZGVkIiBmaWxsLW9wYWNpdHk9IjAuMiIvPjxwYXRoIGQ9Ik0xNiAxMEMxMi42ODYgMTAgMTAgMTIuNjg2IDEwIDE2QzEwIDE5LjMxNCAxMi42ODYgMjIgMTYgMjJDMTkuMzE0IDIyIDIyIDE5LjMxNCAyMiAxNkMyMiAxMi42ODYgMTkuMzE0IDEwIDE2IDEwWiIgZmlsbD0iI2QzOGRlZCIvPjxwYXRoIGQ9Ik0xNiAxNEMxNC44OTUgMTQgMTQgMTQuODk1IDE0IDE2QzE0IDE3LjEwNSAxNC44OTUgMTggMTYgMThDMTcuMTA1IDE4IDE4IDE3LjEwNSAxOCAxNkMxOCAxNC44OTUgMTcuMTA1IDE0IDE2IDE0WiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjQgOUMyNyAxMC4xMDQ2IDIzLjEwNDYgMTEgMjIgMTFDMjAuODk1NCAxMSAyMCAxMC4xMDQ2IDIwIDlDMjAgNy44OTU0MyAyMC44OTU0IDcgMjIgN0MyMy4xMDQ2IDcgMjQgNy44OTU0MyAyNCA5WiIgZmlsbD0iIzU5MmZkZSIvPjxwYXRoIGQ9Ik0xMiAyM0MxMiAyNC4xMDQ2IDExLjEwNDYgMjUgMTAgMjVDOC44OTU0MyAyNSA4IDI0LjEwNDYgOCAyM0M4IDIxLjg5NTQgOC44OTU0MyAyMSAxMCAyMUMxMS4xMDQ2IDIxIDEyIDIxLjg5NTQgMTIgMjNaIiBmaWxsPSIjNTkyZmRlIi8+PC9zdmc+" />

    <!-- Add custom styles for the dashboard -->
    <style>
        :root {
            --background: #f1eefc;
            --primary: #592fde;
            --secondary: #d38ded;
            --accent: #d959e5;
            --text: #070419;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
        }
        
        .from-primary {
           --tw-gradient-from: #592fde;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(89, 47, 222, 0));
        }

        .to-secondary {
            --tw-gradient-to: #d38ded;
        }
        
        .to-accent {
            --tw-gradient-to: #d959e5;
        }
        
        .from-secondary {
            --tw-gradient-from: #d38ded;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(211, 141, 237, 0));
        }
        
        .from-accent {
            --tw-gradient-from: #d959e5;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(217, 89, 229, 0));
        }
        
        .text-primary {
            color: #592fde;
        }
        
        .text-secondary {
            color: #d38ded;
        }
        
        .text-accent {
            color: #d959e5;
        }
        
        .border-primary {
            border-color: #592fde;
        }
        
        .border-secondary {
            border-color: #d38ded;
        }
        
        .border-accent {
            border-color: #d959e5;
        }
        
        .bg-primary {
            background-color: #592fde;
        }
        
        .bg-secondary {
            background-color: #d38ded;
        }
        
        .bg-accent {
            background-color: #d959e5;
        }
        
        .focus\:border-primary:focus {
            border-color: #592fde;
        }
        
        .focus\:border-secondary:focus {
            border-color: #d38ded;
        }
        
        .focus\:border-accent:focus {
            border-color: #d959e5;
        }
        
        .focus\:ring-primary:focus {
            --tw-ring-color: #592fde;
        }
        
        .focus\:ring-secondary:focus {
            --tw-ring-color: #d38ded;
        }
        
        .focus\:ring-accent:focus {
            --tw-ring-color: #d959e5;
        }
        
        .hover\:from-primary:hover {
            --tw-gradient-from: #592fde;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(89, 47, 222, 0));
        }
        
        .hover\:from-secondary:hover {
            --tw-gradient-from: #d38ded;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(211, 141, 237, 0));
        }
        
        .hover\:from-accent:hover {
            --tw-gradient-from: #d959e5;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(217, 89, 229, 0));
        }
        
        .hover\:to-primary:hover {
            --tw-gradient-to: #592fde;
        }
        
        .hover\:to-secondary:hover {
            --tw-gradient-to: #d38ded;
        }
        
        .hover\:to-accent:hover {
            --tw-gradient-to: #d959e5;
        }
        
        /* Custom form styling */
        .form-input, .form-select, .form-textarea {
            transition: all 0.3s ease;
        }
        
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            transform: translateY(-1px);
        }

        .form-section {
            background-color: #e9e4fa;
        }
        
        /* Custom checkbox styling */
        input[type="checkbox"] {
            cursor: pointer;
        }
        
        /* Tab transitions */
        [x-cloak] {
            display: none !important;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
        }
        
        /* Animation for tab switching */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        [x-show="activeTab === 'fitness'"],
        [x-show="activeTab === 'nutrition'"],
        [x-show="activeTab === 'mental'"] {
            animation: fadeIn 0.3s ease-out forwards;
        }
            .ai-assistant-widget {
                position: fixed;
                bottom: 30px;
                right: 30px;
                z-index: 9999;
                font-family: 'Inter', sans-serif;
            }
            
            .ai-assistant-button {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: linear-gradient(135deg, #592fde 0%, #d959e5 100%);
                box-shadow: 0 5px 20px rgba(89, 47, 222, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                position: relative;
                transition: all 0.3s ease;
            }
            
            .ai-assistant-button:hover {
                transform: scale(1.05);
                box-shadow: 0 8px 25px rgba(89, 47, 222, 0.4);
            }
            
            .ai-assistant-icon {
                color: white;
                font-size: 24px;
            }
            
            .ai-assistant-pulse {
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background: rgba(89, 47, 222, 0.4);
                opacity: 0;
                animation: pulse 2s infinite;
            }
            
            @keyframes pulse {
                0% {
                    transform: scale(1);
                    opacity: 0.7;
                }
                70% {
                    transform: scale(1.3);
                    opacity: 0;
                }
                100% {
                    transform: scale(1.3);
                    opacity: 0;
                }
            }
            
            .ai-assistant-panel {
                position: absolute;
                bottom: 80px;
                right: 0;
                width: 350px;
                height: 500px;
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
                display: none;
                flex-direction: column;
                overflow: hidden;
                transition: all 0.3s ease;
                transform-origin: bottom right;
            }
            
            .ai-assistant-panel.active {
                display: flex;
                animation: scaleIn 0.3s ease forwards;
            }
            
            @keyframes scaleIn {
                from {
                    opacity: 0;
                    transform: scale(0.8);
                }
                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }
            
            .ai-assistant-header {
                padding: 15px 20px;
                background: linear-gradient(135deg, #592fde 0%, #d959e5 100%);
                color: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .ai-assistant-title {
                font-weight: 600;
                font-size: 16px;
            }
            
            .ai-assistant-close {
                background: none;
                border: none;
                color: white;
                cursor: pointer;
                font-size: 16px;
                padding: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s ease;
            }
            
            .ai-assistant-close:hover {
                transform: scale(1.1);
            }
            
            .ai-assistant-body {
                flex: 1;
                padding: 20px;
                overflow-y: auto;
                background-color: #f8f9fa;
            }
            
            .ai-message {
                display: flex;
                margin-bottom: 15px;
            }
            
            .ai-avatar {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                background: linear-gradient(135deg, #592fde 0%, #d959e5 100%);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 10px;
                flex-shrink: 0;
            }
            
            .ai-bubble {
                background: white;
                padding: 12px 15px;
                border-radius: 18px;
                border-top-left-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                max-width: 80%;
                font-size: 14px;
            }
            
            .user-message {
                display: flex;
                flex-direction: row-reverse;
                margin-bottom: 15px;
            }
            
            .user-bubble {
                background: #592fde;
                color: white;
                padding: 12px 15px;
                border-radius: 18px;
                border-top-right-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                max-width: 80%;
                font-size: 14px;
            }
            
            /* Predefined Questions Styling */
            .predefined-questions {
                display: flex;
                flex-direction: column;
                gap: 10px;
                margin: 15px 0;
            }
            
            .predefined-question {
                background: rgba(89, 47, 222, 0.08);
                border: 1px solid rgba(89, 47, 222, 0.2);
                border-radius: 12px;
                padding: 10px 15px;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.2s ease;
                color: #592fde;
                font-weight: 500;
            }
            
            .predefined-question:hover {
                background: rgba(89, 47, 222, 0.12);
                transform: translateY(-2px);
            }
            
            .predefined-question:active {
                transform: translateY(0);
            }
            
            .ai-assistant-footer {
                padding: 15px;
                display: flex;
                align-items: center;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }
            
            .ai-assistant-input {
                flex: 1;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: 20px;
                padding: 10px 15px;
                font-size: 14px;
                outline: none;
                transition: all 0.3s ease;
            }
            
            .ai-assistant-input:focus {
                border-color: #592fde;
                box-shadow: 0 0 0 3px rgba(89, 47, 222, 0.1);
            }
            
            .ai-assistant-send {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                background: #592fde;
                color: white;
                border: none;
                margin-left: 10px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }
            
            .ai-assistant-send:hover {
                background: #d959e5;
                transform: scale(1.05);
            }
            
            @media (max-width: 576px) {
                .ai-assistant-panel {
                    width: 300px;
                    height: 450px;
                    bottom: 70px;
                    right: 0;
                }
                
                .ai-assistant-button {
                    width: 50px;
                    height: 50px;
                }
                
                .ai-assistant-icon {
                    font-size: 20px;
                }
            }
            /* Typing indicator */
            .typing-bubble {
                display: flex;
                align-items: center;
                min-width: 40px;
                height: 30px;
            }

            .typing-dot {
                display: inline-block;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background-color: #aaa;
                margin: 0 2px;
                animation: typingAnimation 1.4s infinite ease-in-out;
            }

            .typing-dot:nth-child(1) {
                animation-delay: 0s;
            }

            .typing-dot:nth-child(2) {
                animation-delay: 0.2s;
            }

            .typing-dot:nth-child(3) {
                animation-delay: 0.4s;
            }

            @keyframes typingAnimation {
                0%, 60%, 100% {
                    transform: translateY(0);
                }
                30% {
                    transform: translateY(-5px);
                }
            }

            /* Follow-up questions styling */
            .follow-up-questions {
                display: flex;
                flex-direction: column;
                gap: 8px;
                margin: 10px 0 15px;
            }

            .follow-up-question {
                background: rgba(89, 47, 222, 0.08);
                border: 1px solid rgba(89, 47, 222, 0.2);
                border-radius: 12px;
                padding: 10px 15px;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.2s ease;
                color: #592fde;
                font-weight: 500;
            }

            .follow-up-question:hover {
                background: rgba(89, 47, 222, 0.12);
                transform: translateY(-2px);
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }

            .follow-up-question:active {
                transform: translateY(0);
            }

            /* Predefined questions styling */
            .predefined-questions {
                display: flex;
                flex-direction: column;
                gap: 10px;
                margin: 15px 0;
            }

            .predefined-question {
                background: rgba(89, 47, 222, 0.08);
                border: 1px solid rgba(89, 47, 222, 0.2);
                border-radius: 12px;
                padding: 10px 15px;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.2s ease;
                color: #592fde;
                font-weight: 500;
            }

            .predefined-question:hover {
                background: rgba(89, 47, 222, 0.12);
                transform: translateY(-2px);
            }

            .predefined-question:active {
                transform: translateY(0);
            }
    </style>

    <!-- Include Alpine.js for interactivity -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const aiButton = document.getElementById('aiAssistantButton');
            const aiPanel = document.getElementById('aiAssistantPanel');
            const aiClose = document.getElementById('aiAssistantClose');
            const aiInput = document.getElementById('aiAssistantInput');
            const aiSend = document.getElementById('aiAssistantSend');
            const aiMessages = document.getElementById('aiChatMessages');
            const predefinedQuestions = document.querySelectorAll('.predefined-question');
            
            // Predefined Q&A database
            const qaDatabase = {
                "What is LifeSync?": {
                    answer: "LifeSync is an AI-powered wellness companion that provides personalized fitness, nutrition, and mental wellness recommendations tailored just for you. Our platform uses advanced artificial intelligence to understand your unique needs and help you achieve your health goals.",
                    followUp: ['What can I do in LifeSync?', 'How does AI help my wellness?', 'Is there a free trial?']
                },
                
                "What can I do in LifeSync?": {
                    answer: "In LifeSync, you can:<br>• Get personalized AI fitness plans based on your goals<br>• Receive customized nutrition guidance and meal plans<br>• Track your mood and get mental wellness recommendations<br>• Chat with our AI wellness assistant for instant advice<br>• Monitor your progress with detailed analytics<br>• Connect with a community of like-minded individuals",
                    followUp: ['Tell me about fitness plans', 'How does nutrition guidance work?', 'What mental wellness features are available?']
                },
                
                "How does AI help my wellness?": {
                    answer: "Our AI technology analyzes your preferences, goals, and progress to create truly personalized wellness plans. It adapts as you progress, learns from your feedback, and provides recommendations that are specifically tailored to your unique needs. This level of personalization is difficult to achieve with generic wellness programs.",
                    followUp: ['How accurate is the AI?', 'Can the AI adapt to my changing needs?', 'What data does the AI use?']
                },
                
                "Is my data secure?": {
                    answer: "Absolutely! At LifeSync, we take data privacy and security very seriously. All your personal information is encrypted and stored securely. We never share your data with third parties without your explicit consent. You can read more about our privacy practices in our Privacy Policy.",
                    followUp: ['What data do you collect?', 'Can I delete my data?', 'How do you use my information?']
                },
                
                "Tell me about fitness plans": {
                    answer: "LifeSync's AI fitness plans are customized based on your fitness level, goals, available equipment, and time constraints. Each plan includes a mix of cardio, strength, flexibility, and balance exercises. The AI adjusts your workouts based on your feedback and progress, ensuring you're always challenged but not overwhelmed.",
                    followUp: ['How do I create a workout plan?', 'What types of exercises are recommended?', 'Can I work out at home?']
                },
                
                "How does nutrition guidance work?": {
                    answer: "Our nutrition guidance provides personalized meal recommendations based on your dietary preferences, restrictions, and wellness goals. The system considers your caloric needs, macronutrient balance, and even suggests recipes and shopping lists. As you log your meals, the AI learns your preferences and refines its recommendations.",
                    followUp: ['How do meal plans work?', 'Can I track my calories?', 'Do you accommodate dietary restrictions?']
                },
                
                "What mental wellness features are available?": {
                    answer: "LifeSync offers comprehensive mental wellness tools including:<br>• Daily mood tracking with pattern analysis<br>• Guided meditation sessions of various lengths<br>• Breathing exercises for stress reduction<br>• Sleep quality monitoring and improvement tips<br>• Journaling prompts for self-reflection<br>• Cognitive behavioral therapy-inspired exercises",
                    followUp: ['How does mood tracking work?', 'Tell me about meditation features', 'How do you help with sleep?']
                },
                
                "How accurate is the AI?": {
                    answer: "Our AI system has been trained on extensive wellness data and is continuously improving. While no AI is perfect, our system achieves over 90% accuracy in its recommendations when compared to those of human wellness experts. We also have safeguards in place to ensure all recommendations are safe and evidence-based.",
                    followUp: ['How often is the AI updated?', 'What if the recommendations don\'t work for me?', 'Is there human oversight?']
                },
                
                "Can the AI adapt to my changing needs?": {
                    answer: "Yes! That's one of the key strengths of our AI system. As your fitness improves, your dietary preferences change, or your wellness goals shift, the AI automatically adjusts its recommendations. You can also manually update your profile anytime to reflect major changes in your circumstances or objectives.",
                    followUp: ['How quickly does it adapt?', 'Can I have multiple goals?', 'What if I get injured?']
                },
                
                "What data does the AI use?": {
                    answer: "The AI uses several types of data to personalize your experience:<br>• Your profile information (age, height, weight, etc.)<br>• Your stated preferences and goals<br>• Your activity and meal logs<br>• Your feedback on recommendations<br>• Your progress metrics over time<br>All of this data is used solely to improve your personal experience.",
                    followUp: ['Is my data shared with others?', 'How long do you keep my data?', 'Can I export my data?']
                },
                
                "Is there a free trial?": {
                    answer: "Yes! LifeSync offers a 14-day free trial with full access to all features. No credit card is required to start your trial. This gives you the opportunity to experience the full benefits of our AI-powered wellness platform before deciding on a subscription.",
                    followUp: ['What are the subscription options?', 'Can I cancel anytime?', 'Are there any discounts?']
                },
                
                "What are the subscription options?": {
                    answer: "LifeSync offers several subscription plans:<br>• Basic: $9.99/month - Includes core AI features and personalized plans<br>• Premium: $19.99/month - Adds advanced analytics, priority support, and exclusive content<br>• Family Plan: $29.99/month - Covers up to 5 family members with Premium features<br>We also offer annual plans at a 20% discount.",
                    followUp: ['What\'s included in Premium?', 'How does the Family Plan work?', 'Do you offer corporate plans?']
                },
                
                "How do I create a workout plan?": {
                    answer: "Creating a workout plan in LifeSync is easy! Just go to the Fitness tab, click 'Create New Plan', and follow the guided setup. You'll answer questions about your goals (weight loss, muscle gain, etc.), fitness level, available equipment, and time commitment. Our AI will then generate a personalized plan that you can modify as needed.",
                    followUp: ['Can I customize the plan?', 'How often should I update my plan?', 'What if I miss a workout?']
                },
                
                "What types of exercises are recommended?": {
                    answer: "LifeSync recommends a balanced approach to fitness that includes:<br>• Cardiovascular exercises for heart health<br>• Strength training for muscle development<br>• Flexibility work for mobility and injury prevention<br>• Balance exercises for stability<br><br>The specific exercises recommended will be tailored to your fitness level, goals, and any limitations you might have.",
                    followUp: ['Are the exercises suitable for beginners?', 'Do I need special equipment?', 'How long are typical workouts?']
                },
                
                "How do meal plans work?": {
                    answer: "Our meal plans are generated based on your nutritional needs, dietary preferences, and health goals. After completing your nutrition profile, you'll receive weekly meal suggestions with recipes and shopping lists. You can swap meals, adjust portions, and even filter for specific ingredients or cooking times. The plan automatically adjusts based on your activity level and progress.",
                    followUp: ['Can I customize meals?', 'Are recipes included?', 'How diverse are the meal options?']
                },
                
                "Can I track my calories?": {
                    answer: "Yes! LifeSync includes comprehensive calorie and nutrient tracking. You can log meals manually, scan barcodes, or choose from our database of thousands of foods. The system will track not just calories, but also macronutrients (protein, carbs, fats) and essential micronutrients to ensure you're getting balanced nutrition.",
                    followUp: ['How accurate is the calorie tracking?', 'Can I set calorie goals?', 'Does it track water intake too?']
                },
                
                "How does mood tracking work?": {
                    answer: "Our mood tracking feature allows you to log your emotional state throughout the day with just a few taps. You can rate your mood, add notes about what might be affecting it, and track factors like sleep, stress, and activity. Over time, our AI identifies patterns and correlations, helping you understand what influences your mental wellbeing and providing personalized suggestions for improvement.",
                    followUp: ['How often should I log my mood?', 'What patterns can the AI detect?', 'Can I see my mood history?']
                },
                
                "Tell me about meditation features": {
                    answer: "LifeSync offers a variety of guided meditation sessions ranging from 2 to 30 minutes. Categories include stress reduction, focus enhancement, sleep preparation, emotional balance, and mindfulness. Each meditation is professionally narrated with optional background sounds. The AI recommends specific meditations based on your mood patterns, stress levels, and previous preferences.",
                    followUp: ['Are there beginner meditations?', 'Can I meditate offline?', 'How often should I meditate?']
                },
                
                "How do you help with sleep?": {
                    answer: "LifeSync's sleep features include:<br>• Sleep quality tracking<br>• Bedtime routine recommendations<br>• Sleep-focused meditations and soundscapes<br>• Analysis of factors affecting your sleep<br>• Personalized tips to improve sleep hygiene<br>The AI correlates your sleep data with other wellness metrics to provide holistic recommendations for better rest.",
                    followUp: ['Do you integrate with sleep trackers?', 'What affects sleep quality?', 'How can I improve my sleep?']
                }
            };
            
            // Toggle chat panel
            aiButton.addEventListener('click', function() {
                aiPanel.classList.toggle('active');
            });
            
            // Close chat panel
            aiClose.addEventListener('click', function() {
                aiPanel.classList.remove('active');
            });
            
            // Handle predefined question clicks
            predefinedQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const questionText = this.getAttribute('data-question');
                    
                    // Add user question to chat
                    addUserMessage(questionText);
                    
                    // Get predefined answer and follow-up questions
                    processQAResponse(questionText);
                    
                    // Hide the predefined questions after selection
                    document.querySelector('.predefined-questions').style.display = 'none';
                });
            });
            
            // Send message from input
            function sendMessage() {
                const message = aiInput.value.trim();
                if (message === '') return;
                
                // Add user message to chat
                addUserMessage(message);
                
                // Clear input
                aiInput.value = '';
                
                // Process the message and get a response
                processUserMessage(message);
            }
            
            aiSend.addEventListener('click', sendMessage);
            
            aiInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
            
            // Add user message to chat
            function addUserMessage(message) {
                const userMessageHTML = `
                    <div class="user-message">
                        <div class="user-bubble">${message}</div>
                    </div>
                `;
                aiMessages.innerHTML += userMessageHTML;
                
                // Scroll to bottom
                scrollToBottom();
            }
            
            // Add AI message to chat
            function addAIMessage(message) {
                const aiMessageHTML = `
                    <div class="ai-message">
                        <div class="ai-avatar">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="ai-bubble">${message}</div>
                    </div>
                `;
                aiMessages.innerHTML += aiMessageHTML;
                
                // Scroll to bottom
                scrollToBottom();
            }
            // Scroll chat to bottom
            function scrollToBottom() {
                const aiBody = document.getElementById('aiAssistantBody');
                aiBody.scrollTop = aiBody.scrollHeight;
            }

            // Process a question from the QA database and show follow-up questions
            function processQAResponse(question) {
                // Show typing indicator
                showTypingIndicator();
                
                setTimeout(() => {
                    removeTypingIndicator();
                    
                    if (qaDatabase[question]) {
                        // Add the answer
                        addAIMessage(qaDatabase[question].answer);
                        
                        // Show follow-up questions if available
                        if (qaDatabase[question].followUp && qaDatabase[question].followUp.length > 0) {
                            showFollowUpQuestions(qaDatabase[question].followUp);
                        }
                    } else {
                        // Fallback for questions not in database
                        addAIMessage("I don't have specific information about that question yet. Here are some topics I can help with:");
                        showFollowUpQuestions(["What is LifeSync?", "What can I do in LifeSync?", "How does AI help my wellness?"]);
                    }
                }, 1000);
            }
            
            // Process user message and generate response
            function processUserMessage(message) {
                // Convert message to lowercase for easier matching
                const lowerMessage = message.toLowerCase();
                
                // Show typing indicator
                showTypingIndicator();
                
                // Check for exact matches in our database first
                for (const [question, data] of Object.entries(qaDatabase)) {
                    if (question.toLowerCase() === lowerMessage) {
                        // Remove typing indicator and add response after delay
                        setTimeout(() => {
                            removeTypingIndicator();
                            addAIMessage(data.answer);
                            
                            // Always show follow-up questions
                            if (data.followUp && data.followUp.length > 0) {
                                showFollowUpQuestions(data.followUp);
                            }
                        }, 1000);
                        return;
                    }
                }
                
                // If no exact match, check for keywords
                setTimeout(() => {
                    removeTypingIndicator();
                    
                     if (lowerMessage.includes('hello') || lowerMessage.includes('hi') || lowerMessage.includes('hey')) {
                        addAIMessage("Hello! How can I help you with your wellness journey today?");
                        showFollowUpQuestions(["What is LifeSync?", "What can I do in LifeSync?", "Is there a free trial?"]);
                    }
                    else if (lowerMessage.includes('thank')) {
                        addAIMessage("You're welcome! I'm here to help with any other questions you might have.");
                        showFollowUpQuestions(["What is LifeSync?", "What can I do in LifeSync?", "How does AI help my wellness?"]);
                    }
                    else if (lowerMessage.includes('bye') || lowerMessage.includes('goodbye')) {
                        addAIMessage("Goodbye! Have a great day and don't forget to check back for your wellness updates!");
                        showFollowUpQuestions(["What is LifeSync?", "What can I do in LifeSync?", "Is there a free trial?"]);
                    }
                    else if (lowerMessage.includes('fitness') || lowerMessage.includes('workout') || lowerMessage.includes('exercise')) {
                        addAIMessage("LifeSync offers personalized AI fitness plans based on your goals, fitness level, and available equipment. Our AI adapts as you progress to ensure you're always challenged but not overwhelmed.");
                        showFollowUpQuestions(['Tell me about fitness plans', 'How do I create a workout plan?', 'What types of exercises are recommended?']);
                    }
                    else if (lowerMessage.includes('nutrition') || lowerMessage.includes('diet') || lowerMessage.includes('food') || lowerMessage.includes('meal')) {
                        addAIMessage("Our nutrition guidance provides personalized meal plans and nutritional advice tailored to your dietary preferences and health goals. We can accommodate various dietary restrictions and preferences.");
                        showFollowUpQuestions(['How does nutrition guidance work?', 'How do meal plans work?', 'Can I track my calories?']);
                    }
                    else if (lowerMessage.includes('mental') || lowerMessage.includes('stress') || lowerMessage.includes('anxiety') || lowerMessage.includes('mood')) {
                        addAIMessage("LifeSync's mental wellness features help you track your mood patterns and provide AI-powered recommendations to improve your mental well-being and reduce stress. We offer guided meditation, breathing exercises, and personalized tips.");
                        showFollowUpQuestions(['What mental wellness features are available?', 'How does mood tracking work?', 'Tell me about meditation features']);
                    }
                    else if (lowerMessage.includes('price') || lowerMessage.includes('cost') || lowerMessage.includes('subscription') || lowerMessage.includes('free')) {
                        addAIMessage("LifeSync offers a 14-day free trial with full access to all features. After that, we have several subscription options:<br><br>• Basic: $9.99/month<br>• Premium: $19.99/month<br>• Family Plan: $29.99/month for up to 5 members<br><br>All plans include our core AI features, with Premium offering additional personalization and analytics.");
                        showFollowUpQuestions(['What are the subscription options?', 'What\'s included in Premium?', 'Can I cancel anytime?']);
                    }
                    else if (lowerMessage.includes('account') || lowerMessage.includes('sign up') || lowerMessage.includes('register') || lowerMessage.includes('login')) {
                        addAIMessage("You can create a LifeSync account by clicking the 'Get Started' button on our homepage. Registration takes just a minute, and you'll be able to start your wellness journey right away. If you already have an account, you can log in using your email and password.");
                        showFollowUpQuestions(['Is there a free trial?', 'Is my data secure?', 'What can I do in LifeSync?']);
                    }
                    else if (lowerMessage.includes('data') || lowerMessage.includes('privacy') || lowerMessage.includes('secure')) {
                        addAIMessage("At LifeSync, we take data privacy and security very seriously. All your personal information is encrypted and stored securely. We never share your data with third parties without your explicit consent.");
                        showFollowUpQuestions(['Is my data secure?', 'What data does the AI use?', 'Can I delete my data?']);
                    }
                    else if (lowerMessage.includes('sleep') || lowerMessage.includes('rest') || lowerMessage.includes('insomnia')) {
                        addAIMessage("LifeSync offers comprehensive sleep tracking and improvement features. We analyze your sleep patterns, provide personalized recommendations, and offer guided meditations specifically designed to help you fall asleep faster and improve sleep quality.");
                        showFollowUpQuestions(['How do you help with sleep?', 'Do you integrate with sleep trackers?', 'What affects sleep quality?']);
                    }
                    else if (lowerMessage.includes('community') || lowerMessage.includes('social') || lowerMessage.includes('connect')) {
                        addAIMessage("LifeSync has a vibrant community feature where you can connect with like-minded individuals on similar wellness journeys. You can join groups based on interests, participate in challenges, share achievements, and give and receive support.");
                        showFollowUpQuestions(['How do I join community groups?', 'Are there wellness challenges?', 'Can I share my progress?']);
                    }
                    else {
                        // If no keyword matches, provide a generic response
                        addAIMessage("I'm not sure I understand your question. Could you try rephrasing it, or select one of these common topics?");
                        
                        // Show predefined questions again
                        showFollowUpQuestions(["What is LifeSync?", "What can I do in LifeSync?", "How does AI help my wellness?", "Is there a free trial?"]);
                    }
                }, 1000);
            }
            
            // Show typing indicator
            function showTypingIndicator() {
                const typingHTML = `
                    <div class="ai-message" id="typingIndicator">
                        <div class="ai-avatar">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="ai-bubble typing-bubble">
                            <span class="typing-dot"></span>
                            <span class="typing-dot"></span>
                            <span class="typing-dot"></span>
                        </div>
                    </div>
                `;
                aiMessages.innerHTML += typingHTML;
                scrollToBottom();
            }
            
            // Remove typing indicator
            function removeTypingIndicator() {
                const typingIndicator = document.getElementById('typingIndicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                }
            }
            
            // Show follow-up questions
            function showFollowUpQuestions(questions) {
                let followUpHTML = `<div class="follow-up-questions">`;
                
                questions.forEach(question => {
                    followUpHTML += `
                        <div class="follow-up-question" data-question="${question}">
                            ${question}
                        </div>
                    `;
                });
                
                followUpHTML += `</div>`;
                aiMessages.innerHTML += followUpHTML;
                
                // Add event listeners to the newly added follow-up questions only
                const newFollowUpQuestions = aiMessages.querySelector('.follow-up-questions:last-child').querySelectorAll('.follow-up-question');
                
                newFollowUpQuestions.forEach(question => {
                    question.addEventListener('click', function() {
                        const questionText = this.getAttribute('data-question');
                        
                        // Add user question to chat
                        addUserMessage(questionText);
                        
                        // Process the question
                        processQAResponse(questionText);
                        
                        // Remove all follow-up questions
                        document.querySelectorAll('.follow-up-questions').forEach(el => {
                            el.remove();
                        });
                    });
                });
                
                scrollToBottom();
            }
        });
    </script>
</x-app-layout>
