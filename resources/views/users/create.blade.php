<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Gebruiker aanmaken') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST" action="{{ route('users.store') }}">
          @csrf
          <div class="mb-4">
            <x-input-label for="first_name">{{ __('First Name') }}</x-input-label>
            <x-text-input type="text" id="first_name" name="first_name" required />
          </div>

          <div class="mb-4">
            <x-input-label for="last_name">{{ __('Last Name') }}</x-input-label>
            <x-text-input type="text" id="last_name" name="last_name" required />
          </div>

          <div class="mb-4">
            <x-input-label for="email">{{ __('Email') }}</x-input-label>
            <x-text-input type="email" id="email" name="email" required />
          </div>

          <div class="mb-4">
            <x-input-label for="age">{{ __('Age') }}</x-input-label>
            <x-number-input type="number" id="age" name="age" required />
          </div>
          <div class="mb-4">
            <x-input-label for="password">{{ __('Password') }}</x-input-label>
            <x-text-input type="password" id="password" name="password" required />
          </div>
          <div class="mb-4">
            <x-input-label for="role">{{ __('Role') }}</x-input-label>
            <x-select id="role" name="role" required>
              <option value="teacher">{{ __('Docent') }}</option>
              <option value="parent">{{ __('Ouder') }}</option>
              <option value="student">{{ __('Student') }}</option>
            </x-select>
          </div>

          <div class="flex items-center justify-end gap-2 mt-4">
            <x-cancel-button href="{{ route('users.index') }}">
              {{ __('Annuleer') }}
            </x-cancel-button>
            <x-accept-button>
              {{ __('Accepteer') }}
            </x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
