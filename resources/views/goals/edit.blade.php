<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Doelen aanpassen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <form action="{{ route('goal.update', $goal->id) }}" method="POST">
            @csrf
            @method('PATCH')

           

            <div class="mb-4">
              <x-input-label for="goal_name">{{ __('Doelnaam') }}</x-input-label>
              <x-text-input type="text" name="goal_name" id="goal_name" value="{{ $goal->goal_name }}" 
                class="bg-primaryLightHero dark:bg-primaryDarkHero mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                required />
              @error('goal_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

           
          <div class="mb-4">
            <x-input-label for="goal_description">{{ __('Beschrijving') }}</x-input-label>
            <textarea name="goal_description" id="goal_description" rows="10" cols="50" required 
              class="form-textarea w-full p-2 border rounded-md bg-primaryLightHero dark:bg-primaryDarkHero mt-1 block border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ $goal->goal_description }}</textarea>
          </div>

          <div class="mb-4">
            <x-input-label for="target_date">{{ __('Target Date') }}</x-input-label>
            <input type="date" name="target_date" id="target_date" value="{{ $goal->target_date->format('Y-m-d') }}" 
              required class="form-input bg-primaryLightHero dark:bg-primaryDarkHero mt-1 block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
          </div>

            <div class="mb-4">
              <p><strong>{{ __('Beschrijving:') }}</strong> {{ $goal->goal_description }}</p>
            </div>

            <div class="mb-4">
              <p><strong>{{ __('Datum:') }}</strong> {{ $goal->target_date }}</p>
            </div>

            <div class="mb-4">
              <x-input-label for="goal_status">{{ __('Status') }}</x-input-label>
              <x-select id="goal_status" name="status" required>
                <option value="active" {{ $goal->status == 'active' ? 'selected' : '' }}>{{ __('Actief') }}</option>
                <option value="inactive" {{ $goal->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactief') }}</option>
              </x-select>
              <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
