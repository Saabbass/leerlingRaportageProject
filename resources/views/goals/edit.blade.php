<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Doelen aanpassen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <form action="{{ route('goal.update', $goal->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
              <x-input-label for="goal_name">{{ __('Doelnaam') }}</x-input-label>
              <x-text-input type="text" name="goal_name" id="goal_name" value="{{ $goal->goal_name }}" required />
              @error('goal_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <x-input-label for="goal_description">{{ __('Beschrijving') }}</x-input-label>
              <x-textarea-input id="goal_description" name="goal_description" rows="3" required>{{ $goal->goal_description }}</x-textarea-input>
              @error('goal_description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <x-input-label for="target_date">{{ __('Datum') }}</x-input-label>
              <x-text-input type="date" name="target_date" id="target_date" value="{{ $goal->target_date }}" required />
              @error('target_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <p><strong>{{ __('Beschrijving:') }}</strong> {{ $goal->goal_description }}</p>
            </div>

            <div class="mb-4">
              <p><strong>{{ __('Datum:') }}</strong> {{ $goal->target_date }}</p>
            </div>

            <div class="mb-4">
              <x-input-label for="goal_status">{{ __('Status') }}</x-input-label>
              <x-select id="goal_status" name="goal_status" required>
                <option value="active" {{ $goal->status == 'active' ? 'selected' : '' }}>{{ __('Actief') }}</option>
                <option value="inactive" {{ $goal->status == 'inactive' ? 'selected' : '' }}>
                  {{ __('Inactief') }}</option>
              </x-select>
              <x-input-error :messages="$errors->get('goal_status')" class="mt-2" />
            </div>

            <div class="flex justify-end gap-2">
              <x-cancel-button href="{{ route('dashboard') }}">
                {{ __('Annuleren') }}
              </x-cancel-button>
              <x-accept-button>
                {{ __('Accepteren') }}
              </x-accept-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
