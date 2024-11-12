<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Vak toevoegen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST" action="{{ route('subject.store') }}">
          @csrf

          <div class="mb-4">
            <x-input-label for="name" :value="__('Vaknaam')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
              required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="description" :value="__('Beschrijving')" />
            <x-textarea-input id="description" class="block mt-1 w-full" name="description" :value="old('description')" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
          </div>

          <div class="flex justify-end gap-2">
            <x-cancel-button href="{{ route('subject.index') }}">
              {{ __('Annuleren') }}
            </x-cancel-button>
            <x-accept-button>
              {{ __('Vak toevoegen') }}
            </x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
