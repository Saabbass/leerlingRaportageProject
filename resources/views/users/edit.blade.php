<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Gebruiker aanpassen') }}
    </x-page-title>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST" action="{{ route('users.update', $user) }}">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <x-input-label for="first_name">{{ __('Voornaam') }}</x-input-label>
            <x-text-input id="first_name" name="first_name" type="text"
              value="{{ old('first_name', $user->first_name) }}"
              class="bg-primaryLightHero dark:bg-primaryDarkHero mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required autofocus />
            <x-input-error :messages="$errors->updateUser->get('first_name')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="last_name">{{ __('Achternaam') }}</x-input-label>
            <x-text-input id="last_name" name="last_name" type="text"
              value="{{ old('last_name', $user->last_name) }}"
              class="bg-primaryLightHero dark:bg-primaryDarkHero mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required />
            <x-input-error :messages="$errors->updateUser->get('last_name')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="email">{{ __('Email') }}</x-input-label>
            <x-text-input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
              class="bg-primaryLightHero dark:bg-primaryDarkHero mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required />
            <x-input-error :messages="$errors->updateUser->get('email')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="role">{{ __('Rol') }}</x-input-label>
            <x-select id="role" name="role" required>
              <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>{{ __('Leraar') }}</option>
              <option value="parent" {{ $user->role == 'parent' ? 'selected' : '' }}>{{ __('Ouder') }}</option>
              <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>{{ __('Student') }}</option>
            </x-select>
            <x-input-error :messages="$errors->updateUser->get('role')" class="mt-2" />
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
