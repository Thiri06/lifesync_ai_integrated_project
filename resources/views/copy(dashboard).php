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
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
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
                        <form action="#" class="space-y-6">
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
                                <!-- Basic Information Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">1</span>
                                        Basic Information
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                                            <input type="number" name="age" id="age" class="form-input rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" placeholder="Enter your age" required>
                                        </div>
                                        
                                        <div>
                                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                            <select name="gender" id="gender" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="non-binary">Non-binary</option>
                                                <option value="prefer-not-to-say">Prefer not to say</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="height" class="block text-sm font-medium text-gray-700 mb-1">Height (cm)</label>
                                            <input type="number" name="height" id="height" class="form-input rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" placeholder="Enter your height in cm" required>
                                        </div>
                                        
                                        <div>
                                            <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Weight (kg)</label>
                                            <input type="number" name="weight" id="weight" class="form-input rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" placeholder="Enter your weight in kg" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fitness Goals Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">2</span>
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
                                        <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">3</span>
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
                                        
                                        <div>
                                            <label for="health_concerns" class="block text-sm font-medium text-gray-700 mb-1">Existing Health Concerns</label>
                                            <textarea name="health_concerns" id="health_concerns" rows="3" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" placeholder="List any injuries, conditions, or health concerns (e.g., back pain, knee injury, GERD, etc.)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Diet Preferences Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-2 text-sm">4</span>
                                        Diet Preferences
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="diet_type" class="block text-sm font-medium text-gray-700 mb-1">Preferred Diet Type</label>
                                            <select name="diet_type" id="diet_type" class="form-select rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full">
                                                <option value="">Select diet type</option>
                                                <option value="balanced">Balanced</option>
                                                <option value="vegetarian">Vegetarian</option>
                                                <option value="vegan">Vegan</option>
                                                <option value="keto">Keto</option>
                                                <option value="paleo">Paleo</option>
                                                <option value="mediterranean">Mediterranean</option>
                                                <option value="low_carb">Low Carb</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="food_preferences" class="block text-sm font-medium text-gray-700 mb-1">Food Preferences</label>
                                            <textarea name="food_preferences" id="food_preferences" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" placeholder="List foods you prefer (e.g., eggs, chicken, fish, nuts, etc.)"></textarea>
                                        </div>
                                        
                                        <div>
                                            <label for="allergies" class="block text-sm font-medium text-gray-700 mb-1">Allergies/Intolerances</label>
                                            <textarea name="allergies" id="allergies" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 w-full" placeholder="List any food allergies or intolerances (e.g., lactose, gluten, nuts, etc.)"></textarea>
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

                    <!-- Nutrition Plan Form -->
                    <div x-show="activeTab === 'nutrition'" class="p-6" style="display: none;">
                        <form action="#" class="space-y-6">
                            @csrf
                            <div class="bg-purple-50 rounded-lg p-4 mb-6 border border-purple-100">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 text-secondary">
                                        <i class="fas fa-info-circle text-xl"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-secondary">Complete Your Nutrition Profile</h3>
                                        <div class="mt-1 text-sm text-gray-600">
                                            <p>Fill in your details below to generate a personalized nutrition plan tailored to your dietary needs and preferences.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Basic Information Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center mr-2 text-sm">1</span>
                                        Basic Information
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="n_age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                                            <input type="number" name="age" id="n_age" class="form-input rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="Enter your age" required>
                                        </div>
                                        
                                        <div>
                                            <label for="n_gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                            <select name="gender" id="n_gender" class="form-select rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="non-binary">Non-binary</option>
                                                <option value="prefer-not-to-say">Prefer not to say</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="n_height" class="block text-sm font-medium text-gray-700 mb-1">Height (cm)</label>
                                            <input type="number" name="height" id="n_height" class="form-input rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="Enter your height in cm" required>
                                        </div>
                                        
                                        <div>
                                            <label for="n_weight" class="block text-sm font-medium text-gray-700 mb-1">Weight (kg)</label>
                                            <input type="number" name="weight" id="n_weight" class="form-input rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="Enter your weight in kg" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dietary Goals Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center mr-2 text-sm">2</span>
                                        Dietary Goals
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="dietary_goal" class="block text-sm font-medium text-gray-700 mb-1">Primary Dietary Goal</label>
                                            <select name="dietary_goal" id="dietary_goal" class="form-select rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select your primary goal</option>
                                                <option value="weight_loss">Weight Loss</option>
                                                <option value="weight_gain">Weight Gain</option>
                                                <option value="maintenance">Weight Maintenance</option>
                                                <option value="muscle_building">Muscle Building</option>
                                                <option value="better_health">Better Overall Health</option>
                                                <option value="energy_boost">Energy Boost</option>
                                                <option value="digestive_health">Improve Digestive Health</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="activity_level" class="block text-sm font-medium text-gray-700 mb-1">Activity Level</label>
                                            <select name="activity_level" id="activity_level" class="form-select rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select your activity level</option>
                                                <option value="sedentary">Sedentary (little or no exercise)</option>
                                                <option value="light">Lightly active (light exercise 1-3 days/week)</option>
                                                <option value="moderate">Moderately active (moderate exercise 3-5 days/week)</option>
                                                <option value="very">Very active (hard exercise 6-7 days/week)</option>
                                                <option value="extra">Extra active (very hard exercise & physical job)</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="target_calories" class="block text-sm font-medium text-gray-700 mb-1">Target Daily Calories (optional)</label>
                                            <input type="number" name="target_calories" id="target_calories" class="form-input rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="Leave blank for AI recommendation">
                                        </div>
                                        
                                        <div>
                                            <label for="meals_per_day" class="block text-sm font-medium text-gray-700 mb-1">Preferred Meals Per Day</label>
                                            <select name="meals_per_day" id="meals_per_day" class="form-select rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select meals per day</option>
                                                <option value="3">3 meals</option>
                                                <option value="4">4 meals</option>
                                                <option value="5">5 meals</option>
                                                <option value="6">6 meals</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dietary Preferences Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center mr-2 text-sm">3</span>
                                        Dietary Preferences
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="n_diet_type" class="block text-sm font-medium text-gray-700 mb-1">Diet Type</label>
                                            <select name="diet_type" id="n_diet_type" class="form-select rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" required>
                                                <option value="">Select diet type</option>
                                                <option value="omnivore">Omnivore (Everything)</option>
                                                <option value="vegetarian">Vegetarian</option>
                                                <option value="vegan">Vegan</option>
                                                <option value="pescatarian">Pescatarian</option>
                                                <option value="keto">Keto</option>
                                                <option value="paleo">Paleo</option>
                                                <option value="mediterranean">Mediterranean</option>
                                                <option value="low_carb">Low Carb</option>
                                                <option value="gluten_free">Gluten Free</option>
                                                <option value="dairy_free">Dairy Free</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Protein Sources</label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="chicken" value="chicken" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="chicken" class="ml-2 text-sm text-gray-700">Chicken</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="beef" value="beef" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="beef" class="ml-2 text-sm text-gray-700">Beef</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="fish" value="fish" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="fish" class="ml-2 text-sm text-gray-700">Fish</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="eggs" value="eggs" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="eggs" class="ml-2 text-sm text-gray-700">Eggs</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="tofu" value="tofu" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="tofu" class="ml-2 text-sm text-gray-700">Tofu</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="legumes" value="legumes" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="legumes" class="ml-2 text-sm text-gray-700">Legumes</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="dairy" value="dairy" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="dairy" class="ml-2 text-sm text-gray-700">Dairy</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="protein_sources[]" id="nuts" value="nuts" class="rounded text-secondary focus:ring-secondary">
                                                    <label for="nuts" class="ml-2 text-sm text-gray-700">Nuts & Seeds</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="n_food_preferences" class="block text-sm font-medium text-gray-700 mb-1">Favorite Foods</label>
                                            <textarea name="food_preferences" id="n_food_preferences" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="List foods you enjoy eating regularly"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Restrictions & Health Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center mr-2 text-sm">4</span>
                                        Restrictions & Health
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="n_allergies" class="block text-sm font-medium text-gray-700 mb-1">Allergies/Intolerances</label>
                                            <textarea name="allergies" id="n_allergies" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="List any food allergies or intolerances (e.g., lactose, gluten, nuts, etc.)"></textarea>
                                        </div>
                                        
                                        <div>
                                            <label for="disliked_foods" class="block text-sm font-medium text-gray-700 mb-1">Disliked Foods</label>
                                            <textarea name="disliked_foods" id="disliked_foods" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="List foods you want to avoid in your plan"></textarea>
                                        </div>
                                        
                                        <div>
                                            <label for="health_conditions" class="block text-sm font-medium text-gray-700 mb-1">Health Conditions</label>
                                            <textarea name="health_conditions" id="health_conditions" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-20 w-full" placeholder="List any health conditions that affect your diet (e.g., diabetes, GERD, IBS, etc.)"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-secondary to-accent hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition-all duration-200">
                                    <i class="fas fa-apple-alt mr-2"></i> Generate Nutrition Plan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Mental Wellness Form -->
                    <div x-show="activeTab === 'mental'" class="p-6" style="display: none;">
                        <form action="#" class="space-y-6">
                            @csrf
                            <div class="bg-purple-50 rounded-lg p-4 mb-6 border border-purple-100">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 text-accent">
                                        <i class="fas fa-info-circle text-xl"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-accent">Complete Your Mental Wellness Profile</h3>
                                        <div class="mt-1 text-sm text-gray-600">
                                            <p>Fill in your details below to generate a personalized mental wellness plan to help improve your emotional well-being.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Basic Information Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center mr-2 text-sm">1</span>
                                        Current Mental State
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="stress_level" class="block text-sm font-medium text-gray-700 mb-1">Current Stress Level</label>
                                            <select name="stress_level" id="stress_level" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select stress level</option>
                                                <option value="low">Low (Rarely feel stressed)</option>
                                                <option value="moderate">Moderate (Occasionally stressed)</option>
                                                <option value="high">High (Frequently stressed)</option>
                                                <option value="severe">Severe (Constantly stressed)</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="sleep_quality" class="block text-sm font-medium text-gray-700 mb-1">Sleep Quality</label>
                                            <select name="sleep_quality" id="sleep_quality" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select sleep quality</option>
                                                <option value="excellent">Excellent (7-9 hours, uninterrupted)</option>
                                                <option value="good">Good (6-7 hours, minor interruptions)</option>
                                                <option value="fair">Fair (5-6 hours, frequent interruptions)</option>
                                                <option value="poor">Poor (Less than 5 hours or very disrupted)</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="energy_levels" class="block text-sm font-medium text-gray-700 mb-1">Energy Levels</label>
                                            <select name="energy_levels" id="energy_levels" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select energy level</option>
                                                <option value="high">High (Energetic throughout the day)</option>
                                                <option value="moderate">Moderate (Generally good energy)</option>
                                                <option value="low">Low (Tired for much of the day)</option>
                                                <option value="variable">Variable (Energy fluctuates significantly)</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="mood_patterns" class="block text-sm font-medium text-gray-700 mb-1">Mood Patterns</label>
                                            <select name="mood_patterns" id="mood_patterns" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select mood pattern</option>
                                                <option value="stable">Stable (Consistent mood)</option>
                                                <option value="mild_fluctuations">Mild Fluctuations</option>
                                                <option value="moderate_fluctuations">Moderate Fluctuations</option>
                                                <option value="severe_fluctuations">Severe Fluctuations</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mental Wellness Goals Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center mr-2 text-sm">2</span>
                                        Mental Wellness Goals
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="primary_goal" class="block text-sm font-medium text-gray-700 mb-1">Primary Mental Wellness Goal</label>
                                            <select name="primary_goal" id="primary_goal" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select your primary goal</option>
                                                <option value="stress_reduction">Stress Reduction</option>
                                                <option value="anxiety_management">Anxiety Management</option>
                                                <option value="mood_improvement">Mood Improvement</option>
                                                <option value="sleep_improvement">Sleep Improvement</option>
                                                <option value="focus_enhancement">Focus Enhancement</option>
                                                <option value="emotional_balance">Emotional Balance</option>
                                                <option value="mindfulness">Increased Mindfulness</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Areas to Improve (Select up to 3)</label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="improvement_areas[]" id="work_life_balance" value="work_life_balance" class="rounded text-accent focus:ring-accent">
                                                    <label for="work_life_balance" class="ml-2 text-sm text-gray-700">Work-Life Balance</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="improvement_areas[]" id="relationships" value="relationships" class="rounded text-accent focus:ring-accent">
                                                    <label for="relationships" class="ml-2 text-sm text-gray-700">Relationships</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="improvement_areas[]" id="self_esteem" value="self_esteem" class="rounded text-accent focus:ring-accent">
                                                    <label for="self_esteem" class="ml-2 text-sm text-gray-700">Self-Esteem</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="improvement_areas[]" id="productivity" value="productivity" class="rounded text-accent focus:ring-accent">
                                                    <label for="productivity" class="ml-2 text-sm text-gray-700">Productivity</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="improvement_areas[]" id="resilience" value="resilience" class="rounded text-accent focus:ring-accent">
                                                    <label for="resilience" class="ml-2 text-sm text-gray-700">Resilience</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="improvement_areas[]" id="emotional_awareness" value="emotional_awareness" class="rounded text-accent focus:ring-accent">
                                                    <label for="emotional_awareness" class="ml-2 text-sm text-gray-700">Emotional Awareness</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="time_commitment" class="block text-sm font-medium text-gray-700 mb-1">Time Available for Mental Wellness Activities</label>
                                            <select name="time_commitment" id="time_commitment" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select available time</option>
                                                <option value="minimal">Minimal (5-10 minutes/day)</option>
                                                <option value="moderate">Moderate (15-30 minutes/day)</option>
                                                <option value="significant">Significant (30-60 minutes/day)</option>
                                                <option value="extensive">Extensive (60+ minutes/day)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Preferences Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center mr-2 text-sm">3</span>
                                        Preferences & Practices
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Wellness Activities</label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="meditation" value="meditation" class="rounded text-accent focus:ring-accent">
                                                    <label for="meditation" class="ml-2 text-sm text-gray-700">Meditation</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="yoga" value="yoga" class="rounded text-accent focus:ring-accent">
                                                    <label for="yoga" class="ml-2 text-sm text-gray-700">Yoga</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="journaling" value="journaling" class="rounded text-accent focus:ring-accent">
                                                    <label for="journaling" class="ml-2 text-sm text-gray-700">Journaling</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="breathing" value="breathing_exercises" class="rounded text-accent focus:ring-accent">
                                                    <label for="breathing" class="ml-2 text-sm text-gray-700">Breathing Exercises</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="nature" value="nature_time" class="rounded text-accent focus:ring-accent">
                                                    <label for="nature" class="ml-2 text-sm text-gray-700">Nature Time</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="reading" value="reading" class="rounded text-accent focus:ring-accent">
                                                    <label for="reading" class="ml-2 text-sm text-gray-700">Reading</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="art" value="art_therapy" class="rounded text-accent focus:ring-accent">
                                                    <label for="art" class="ml-2 text-sm text-gray-700">Art Therapy</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="wellness_activities[]" id="music" value="music_therapy" class="rounded text-accent focus:ring-accent">
                                                    <label for="music" class="ml-2 text-sm text-gray-700">Music Therapy</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="experience_level" class="block text-sm font-medium text-gray-700 mb-1">Experience with Mental Wellness Practices</label>
                                            <select name="experience_level" id="experience_level" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select experience level</option>
                                                <option value="beginner">Beginner (New to mental wellness practices)</option>
                                                <option value="intermediate">Intermediate (Some experience)</option>
                                                <option value="advanced">Advanced (Regular practitioner)</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label for="morning_person" class="block text-sm font-medium text-gray-700 mb-1">Are you a morning person?</label>
                                            <select name="morning_person" id="morning_person" class="form-select rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" required>
                                                <option value="">Select option</option>
                                                <option value="yes">Yes (I function best in the morning)</option>
                                                <option value="somewhat">Somewhat (I'm okay in the morning)</option>
                                                <option value="no">No (I function better later in the day)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information Section -->
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-5">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <span class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center mr-2 text-sm">4</span>
                                        Additional Information
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="stressors" class="block text-sm font-medium text-gray-700 mb-1">Major Stressors</label>
                                            <textarea name="stressors" id="stressors" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" placeholder="List your major sources of stress (e.g., work, relationships, finances, etc.)"></textarea>
                                        </div>
                                        
                                        <div>
                                            <label for="coping_mechanisms" class="block text-sm font-medium text-gray-700 mb-1">Current Coping Mechanisms</label>
                                            <textarea name="coping_mechanisms" id="coping_mechanisms" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" placeholder="How do you currently manage stress or difficult emotions?"></textarea>
                                        </div>
                                        
                                        <div>
                                            <label for="mental_health_history" class="block text-sm font-medium text-gray-700 mb-1">Mental Health History (Optional)</label>
                                            <textarea name="mental_health_history" id="mental_health_history" rows="2" class="form-textarea rounded-md shadow-sm border-gray-300 focus:border-accent focus:ring focus:ring-accent focus:ring-opacity-20 w-full" placeholder="Any relevant mental health history you'd like to share"></textarea>
                                            <p class="mt-1 text-xs text-gray-500">This information is kept confidential and helps tailor your plan more effectively.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-accent to-primary hover:from-accent hover:to-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent transition-all duration-200">
                                    <i class="fas fa-brain mr-2"></i> Generate Mental Wellness Plan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-primary mr-4">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Plans Generated</div>
                                <div class="text-2xl font-semibold text-gray-800">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-secondary mr-4">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Days Active</div>
                                <div class="text-2xl font-semibold text-gray-800">1</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-accent mr-4">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Profile Completion</div>
                                <div class="text-2xl font-semibold text-gray-800">33%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Getting Started Guide -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
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
