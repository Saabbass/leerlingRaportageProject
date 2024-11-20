<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Aanwezigheid veranderen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <form method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <div class="mb-4">
              <x-input-label for="user_id">{{ __('Gebruiker') }}</x-input-label>
              <x-select id="user_id" name="user_id" required>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
              </x-select>
            </div>

            <div class="mb-4">
              <x-input-label for="subject_id">{{ __('Vak') }}</x-input-label>
              <x-select id="subject_id" name="subject_id" required>
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
              </x-select>
            </div>

            <div class="mb-4">
              <x-input-label for="date">{{ __('Datum') }}</x-input-label>
              <x-date-input type="date" id="date" name="date" required/>
            </div>

            <div class="mb-4">
              <x-input-label for="reason">{{ __('Reden') }}</x-input-label>
              <x-textarea-input id="reason" name="reason" rows="3"></x-textarea-input>
            </div>

            <div class="mb-4">
              <x-input-label for="status">{{ __('Status') }}</x-input-label>
              <x-select id="status" name="status" required>
                <option value="present">{{ __('Aanwezig') }}</option>
                <option value="absent">{{ __('Afwezig') }}</option>
                <option value="late">{{ __('Laat') }}</option>
              </x-select>
            </div>

            <div class="flex items-center justify-end gap-2 mt-4">
              <x-cancel-button href="{{ route('attendance.index') }}">
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
  </div>
</x-app-layout>
