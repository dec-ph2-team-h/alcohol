<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <!-- user's favorite alcohol (プルダウン) -->
            <div class="mt-4">
                <div class="form-group">
                    <!-- <label for="alcohol-id">{{ __('your favorite alcohol') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label> -->
                    <x-input-label for="alcohol_id" :value="__('Your Favorite Alcohol')" />
                    <select class="block mt-1 w-full"  id="alcohol_id" name="alcohol_id">
                        @foreach ($alcohols as $alcohol)
                            <option value="{{ $alcohol->id }}">{{ $alcohol->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- cups -->
            <div class="mt-4">
                <x-input-label for="cups" :value="__('the number of cups you can drink')" />

                <x-text-input id="cups" class="block mt-1 w-full"
                                type="number" min="1"
                                name="cups" value="old('cups')"
                                required />

                <x-input-error :messages="$errors->get('cups')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
