<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Doel toevoegen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <form method="POST" action="{{ route('goals.store') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ auth()->id() ?? '' }}" />
            <input type="hidden" name="status" value="actief" />

            <div class="mb-4">
              <x-input-label for="goal_name">{{ __('Doel Naam') }}</x-input-label>
              <x-text-input type="text" name="goal_name" id="goal_name" value="{{ old('goal_name') }}" required />
              @error('goal_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <x-input-label for="goal_description">{{ __('Beschrijving') }}</x-input-label>
              <x-textarea-input id="goal_description" name="goal_description" rows="3" required>{{ old('goal_description') }}</x-textarea-input>
              @error('goal_description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <x-input-label for="target_date">{{ __('Doel Datum') }}</x-input-label>
              <x-date-input type="date" name="target_date" id="target_date" value="{{ old('target_date') }}" required />
              @error('target_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="flex justify-end gap-2">
              <x-cancel-button href="{{ route('goals.index') }}">
                {{ __('Annuleren') }}
              </x-cancel-button>
              <x-accept-button>
                {{ __('Doel creëren') }}
              </x-accept-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
