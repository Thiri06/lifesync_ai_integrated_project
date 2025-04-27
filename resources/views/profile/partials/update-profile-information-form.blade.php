<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

         <!-- Age -->
        <div>
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $user->gender) === 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <!-- Height -->
        <div>
            <x-input-label for="height" :value="__('Height (cm)')" />
            <x-text-input id="height" name="height" type="number" step="0.01" class="mt-1 block w-full" :value="old('height', $user->height)" />
            <x-input-error class="mt-2" :messages="$errors->get('height')" />
        </div>

        <!-- Weight -->
        <div>
            <x-input-label for="weight" :value="__('Weight (kg)')" />
            <x-text-input id="weight" name="weight" type="number" step="0.01" class="mt-1 block w-full" :value="old('weight', $user->weight)" />
            <x-input-error class="mt-2" :messages="$errors->get('weight')" />
        </div>

        <!-- Dietary Preferences -->
        <div>
            <x-input-label for="dietary_preferences" :value="__('Dietary Preferences')" />
            <textarea id="dietary_preferences" name="dietary_preferences" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('dietary_preferences', $user->dietary_preferences) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('dietary_preferences')" />
        </div>

        <!-- Health Concerns -->
        <div>
            <x-input-label for="health_concerns" :value="__('Health Concerns')" />
            <textarea id="health_concerns" name="health_concerns" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('health_concerns', $user->health_concerns) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('health_concerns')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
