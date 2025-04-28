<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                            <path d="M16 2C8.268 2 2 8.268 2 16C2 23.732 8.268 30 16 30C23.732 30 30 23.732 30 16C30 8.268 23.732 2 16 2Z" fill="#592fde" fill-opacity="0.1"/>
                            <path d="M16 6C10.477 6 6 10.477 6 16C6 21.523 10.477 26 16 26C21.523 26 26 21.523 26 16C26 10.477 21.523 6 16 6Z" fill="#592fde" fill-opacity="0.2"/>
                            <path d="M16 10C12.686 10 10 12.686 10 16C10 19.314 12.686 22 16 22C19.314 22 22 19.314 22 16C22 12.686 19.314 10 16 10Z" fill="#592fde"/>
                            <path d="M16 14C14.895 14 14 14.895 14 16C14 17.105 14.895 18 16 18C17.105 18 18 17.105 18 16C18 14.895 17.105 14 16 14Z" fill="white"/>
                            <path d="M24 9C24 10.1046 23.1046 11 22 11C20.8954 11 20 10.1046 20 9C20 7.89543 20.8954 7 22 7C23.1046 7 24 7.89543 24 9Z" fill="#d959e5"/>
                            <path d="M12 23C12 24.1046 11.1046 25 10 25C8.89543 25 8 24.1046 8 23C8 21.8954 8.89543 21 10 21C11.1046 21 12 21.8954 12 23Z" fill="#d38ded"/>
                        </svg>
                        <span style="font-weight: 800; font-size: 1.5rem; background: linear-gradient(135deg, #592fde 0%, #d959e5 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">LifeSync</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="lifesync-nav-link">
                        <i class="fas fa-tachometer-alt mr-1"></i> {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('fitness.index')" :active="request()->routeIs('fitness.*')" class="lifesync-nav-link">
                        <i class="fas fa-dumbbell mr-1"></i> {{ __('Your Personalized Plan') }}
                    </x-nav-link>
            
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 lifesync-dropdown-trigger">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-white font-semibold mr-2">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="lifesync-dropdown-link">
                            <i class="fas fa-user mr-2"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="#" class="lifesync-dropdown-link">
                            <i class="fas fa-cog mr-2"></i> {{ __('Settings') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200 my-1"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="lifesync-dropdown-link text-red-500 hover:text-red-700">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-purple-500 hover:text-purple-700 hover:bg-purple-100 focus:outline-none focus:bg-purple-100 focus:text-purple-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="lifesync-responsive-nav-link">
                <i class="fas fa-tachometer-alt mr-2"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" :active="request()->routeIs('fitness')" class="lifesync-responsive-nav-link">
                <i class="fas fa-dumbbell mr-2"></i> {{ __('Fitness Plan') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" :active="request()->routeIs('nutrition')" class="lifesync-responsive-nav-link">
                <i class="fas fa-apple-alt mr-2"></i> {{ __('Nutrition Plan') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" :active="request()->routeIs('diet')" class="lifesync-responsive-nav-link">
                <i class="fas fa-utensils mr-2"></i> {{ __('Diet Plan') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" :active="request()->routeIs('mental')" class="lifesync-responsive-nav-link">
                <i class="fas fa-brain mr-2"></i> {{ __('Mental Wellness') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 flex items-center">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-white font-semibold mr-3">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="lifesync-responsive-nav-link">
                    <i class="fas fa-user mr-2"></i> {{ __('Profile') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="#" class="lifesync-responsive-nav-link">
                    <i class="fas fa-cog mr-2"></i> {{ __('Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="lifesync-responsive-nav-link text-red-500">
                        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Add custom styles for the LifeSync navigation -->
<style>
    /* Font */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    
    /* Variables */
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
    
    /* Navigation styles */
    nav {
        background-color: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05) !important;
    }
    
    .lifesync-nav-link {
        color: var(--text) !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        margin: 0 5px !important;
        position: relative !important;
        padding: 0.5rem 0.75rem !important;
        border-radius: 8px !important;
    }
    
    .lifesync-nav-link:hover {
        color: var(--primary) !important;
        background-color: rgba(89, 47, 222, 0.05) !important;
    }
    
    .lifesync-nav-link.active {
        color: var(--primary) !important;
        font-weight: 600 !important;
        background-color: rgba(89, 47, 222, 0.1) !important;
    }
    
    .lifesync-nav-link.active::after {
        content: '';
        position: absolute;
        width: 30%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        bottom: -1px;
        left: 35%;
        border-radius: 3px;
    }
    
    .lifesync-dropdown-trigger {
        transition: all 0.3s ease !important;
        border-radius: 12px !important;
        padding: 0.5rem 1rem !important;
    }
    
    .lifesync-dropdown-trigger:hover {
        background-color: rgba(89, 47, 222, 0.05) !important;
    }
    
    .lifesync-dropdown-link {
        transition: all 0.3s ease !important;
        color: var(--text) !important;
        font-weight: 500 !important;
        padding: 0.75rem 1rem !important;
        border-radius: 8px !important;
        margin: 0.25rem !important;
    }
    
    .lifesync-dropdown-link:hover {
        background-color: rgba(89, 47, 222, 0.05) !important;
        color: var(--primary) !important;
        transform: translateX(3px);
    }
    
    .lifesync-responsive-nav-link {
        color: var(--text) !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        padding: 0.75rem 1rem !important;
        border-radius: 8px !important;
        margin: 0.25rem 0.5rem !important;
        display: flex !important;
        align-items: center !important;
    }
    
    .lifesync-responsive-nav-link:hover {
        background-color: rgba(89, 47, 222, 0.05) !important;
        color: var(--primary) !important;
    }
    
    .lifesync-responsive-nav-link.active {
        color: var(--primary) !important;
        font-weight: 600 !important;
        background-color: rgba(89, 47, 222, 0.1) !important;
    }
    
    /* Gradient text effect for logo */
    .gradient-text {
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }
    
    /* Custom dropdown styling */
    .dropdown-content {
        border-radius: 12px !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        border: 1px solid rgba(89, 47, 222, 0.1) !important;
        padding: 0.5rem !important;
        background-color: white !important;
    }
    
    /* User avatar in dropdown */
    .user-avatar {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        margin-right: 0.5rem;
    }
    
    /* Mobile menu button */
    .hamburger-button {
        color: var(--primary) !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
    }
    
    .hamburger-button:hover {
        background-color: rgba(89, 47, 222, 0.1) !important;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        body {
            padding-top: 4rem;
        }
        
        .responsive-menu {
            background-color: white !important;
            border-bottom-left-radius: 16px !important;
            border-bottom-right-radius: 16px !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }
    }
    
    /* Font Awesome icons alignment */
    .fa, .fas, .far, .fab {
        vertical-align: middle;
    }
</style>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
