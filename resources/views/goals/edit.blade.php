<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Doelen aanpassen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('goal.update', $goal->id) }}" method="POST">
          @csrf
          @method('PATCH')

          <div class="mb-4">
            <x-input-label for="goal_name">{{ __('Doelnaam') }}</x-input-label>
            <input type="text" name="goal_name" id="goal_name" value="{{ $goal->goal_name }}" required class="form-input" />
          </div>

          <div class="mb-4">
            <x-input-label for="goal_description">{{ __('Beschrijving') }}</x-input-label>
            <textarea name="goal_description" id="goal_description" required class="form-textarea">{{ $goal->goal_description }}</textarea>
          </div>

          <div class="mb-4">
            <x-input-label for="target_date">{{ __('Target Date') }}</x-input-label>
            <input type="date" name="target_date" id="target_date" value="{{ $goal->target_date }}" required class="form-input" />
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
</x-app-layout>
