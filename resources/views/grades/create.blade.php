<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Cijfer toevoegen') }}
    </x-page-title>

    @if (session('error'))
      <x-error-failed>
        {{ session('error') }}
      </x-error-failed>
    @endif

    @if (session('success'))
      <x-error-succes>
        {{ session('success') }}
      </x-error-succes>
    @endif
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <form action="{{ route('grades.store') }}" method="POST">
            @csrf
            <div class="mb-4">
              <x-input-label for="user_id">{{ __('Gebruiker') }}</x-input-label>
              <x-select name="user_id" id="user_id" required>
                @foreach ($users as $user)
                  @if ($user->role === 'student')
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                  @endif
                @endforeach
              </x-select>
              @if ($errors->has('user_id'))
                <span class="text-red-500 text-sm">{{ $errors->first('user_id') }}</span>
              @endif

              <x-input-label for="subject_id">{{ __('Vak') }}</x-input-label>
              <x-select name="subject_id" id="subject_id" required>
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
              </x-select>
            </div>

            <div class="mb-4">
              <x-input-label for="assignment_name">{{ __('Opdracht Naam') }}</x-input-label>
              <x-text-input type="text" name="assignment_name" id="assignment_name"
                value="{{ old('assignment_name') }}" required />
            </div>

            <div class="mb-4">
              <x-input-label for="description">{{ __('Beschrijving') }}</x-input-label>
              <x-textarea-input id="description" name="description" rows="3"></x-textarea-input>
            </div>

            <div class="mb-4">
              <x-input-label for="grade">{{ __('Cijfer') }}</x-input-label>
              <x-number-input type="number" name="grade" id="grade" value="{{ old('grade') }}" required
                min="0" max="10" />
            </div>

            <div class="mb-4">
              <x-input-label for="date">{{ __('Datum') }}</x-input-label>
              <x-date-input type="date" name="date" id="date" value="{{ old('date') }}" required />
            </div>

            <div class="flex justify-end gap-2">
              <x-cancel-button href="{{ route('grades.index') }}">
                {{ __('Annuleren') }}
              </x-cancel-button>
              <x-accept-button>
                {{ __('Cijfer creëren') }}
              </x-accept-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
