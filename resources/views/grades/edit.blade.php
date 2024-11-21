<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Cijfer bewerken') }}
    </x-page-title>

    {{-- @if (session('error'))
      <x-error-failed>
        {{ session('error') }}
      </x-error-failed>
    @endif

    @if (session('success'))
      <x-error-succes>
        {{ session('success') }}
      </x-error-succes>
    @endif --}}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('grades.update', $grade->id) }}" method="POST">
          @csrf
          @method('PATCH')

          <div class="mb-4">
            <x-input-label for="user_id">{{ __('Gebruiker') }}</x-input-label>
            <x-select id="user_id" name="user_id">
              @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $grade->user_id ? 'selected' : '' }}>
                  {{ $user->first_name }} {{ $user->last_name }}</option>
              @endforeach
            </x-select>
          </div>

          <div class="mb-4">
            <x-input-label for="subject_id">{{ __('Vak') }}</x-input-label>
            <x-select id="subject_id" name="subject_id">
              @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $subject->id == $grade->subject_id ? 'selected' : '' }}>
                  {{ $subject->subject_name }}</option>
              @endforeach
            </x-select>
          </div>

          <div class="mb-4">
            <x-input-label for="assignment_name">{{ __('Opdracht Naam') }}</x-input-label>
            <x-text-input type="text" name="assignment_name" id="assignment_name"
              value="{{ $grade->assignment_name }}" />
          </div>

          <div class="mb-4">
            <x-input-label for="grade">{{ __('Cijfer') }}</x-input-label>
            <x-number-input type="number" step=".1" name="grade" id="grade" value="{{ $grade->grade }}" />
          </div>

          <div class="mb-4">
            <x-input-label for="date">{{ __('Datum') }}</x-input-label>
            <x-date-input type="date" name="date" id="date" value="{{ $grade->date }}" />
          </div>

          <div class="mb-4">
            <x-input-label for="description">{{ __('Beschrijving') }}</x-input-label>
            <x-textarea-input name="description" id="description">{{ $grade->description }}</x-textarea-input>
          </div>

          <div class="flex justify-end gap-2">
            <x-cancel-button href="{{ route('grades.index') }}">
              {{ __('Annuleren') }}
            </x-cancel-button>
            <x-accept-button type="submit">
              {{ __('Cijfer bijwerken') }}
            </x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
