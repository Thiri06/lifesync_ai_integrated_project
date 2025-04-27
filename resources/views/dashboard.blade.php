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

            <!-- Dashboard Tabs -->
            <div class="mb-6" x-data="{ activeTab: 'fitness' }">
                <div class="rounded-lg shadow-sm overflow-hidden form-section">
                    <div class="flex border-b">
                        <button @click="activeTab = 'fitness'" :class="{ 'border-primary text-primary': activeTab === 'fitness', 'border-transparent text-gray-500': activeTab !== 'fitness' }" class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-200 focus:outline-none">
                            <i class="fas fa-dumbbell mr-2"></i> Fitness Plan
                        </button>
                        <button @click="activeTab = 'nutrition'" :class="{ 'border-secondary text-secondary': activeTab === 'nutrition', 'border-transparent text-gray-500': activeTab !== 'nutrition' }" class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-200 focus:outline-none">
                            <i class="fas fa-apple-alt mr-2"></i> Nutrition Plan
                        </button>
                        <button @click="activeTab = 'mental'" :class="{ 'border-accent text-accent': activeTab === 'mental', 'border-transparent text-gray-500': activeTab !== 'mental' }" class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-200 focus:outline-none">
                            <i class="fas fa-brain mr-2"></i> Mental Wellness
                        </button>
                    </div>

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
                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-primary to-secondary hover:from-primary hover:to-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200">
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
    </style>

    <!-- Include Alpine.js for interactivity -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>
