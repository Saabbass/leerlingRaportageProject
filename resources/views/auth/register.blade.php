<x-guest-layout>
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- FirstName -->
    <div>
      <x-input-label for="first_name" :value="__('Voornaam')" />
      <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required
        autofocus autocomplete="first_name" />
      <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <!-- Last Name -->
    <div>
      <x-input-label for="last_name" :value="__('Achternaam')" />
      <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required
        autofocus autocomplete="last_name" />
      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Age -->
    <div>
      <x-input-label for="age" :value="__('Leeftijd')" />
      <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required
        autofocus autocomplete="age" />
      <x-input-error :messages="$errors->get('age')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Role -->
    <div class="mt-4">
      <x-input-label for="role" :value="__('Rol')" />
      <x-select id="role" name="role" class="block mt-1 w-full" required>
        <option value="student">{{ __('Student') }}</option>
        <option value="parent">{{ __('Parent') }}</option>
      </x-select>
      <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Wachtwoord')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Controleer wachtwoord')" />

      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
        required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <x-link-primary
        href="{{ route('login') }}">
        {{ __('Al een account?') }}
      </x-link-primary>

      <x-primary-button class="ms-4">
        {{ __('Registreer') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
