<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Aanwezigheid bewerken') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
          @csrf
          @method('patch')

          <div class="mb-4">
            <x-input-label for="user_id">{{ __('Gebruiker') }}</x-input-label>
            <x-select id="user_id" name="user_id" required>
              @if (auth()->user()->role === 'student')
                <option value="{{ auth()->user()->id }}">{{ auth()->user()->first_name }}
                  {{ auth()->user()->last_name }}</option>
              @elseif (auth()->user()->role === 'parent')
                @foreach (auth()->user()->children as $child)
                  <option value="{{ $child->id }}">{{ $child->first_name }} {{ $child->last_name }}</option>
                @endforeach
              @else
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
              @endif
            </x-select>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="subject_id">{{ __('Vak') }}</x-input-label>
            <x-select id="subject_id" name="subject_id" required>
              @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $attendance->subject_id == $subject->id ? 'selected' : '' }}>
                  {{ $subject->subject_name }}
                </option>
              @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="date">{{ __('Datum') }}</x-input-label>
            <x-date-input type="date" id="date" name="date" value="{{ $attendance->date }}" required />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="reason">{{ __('Reden') }}</x-input-label>
            <x-textarea-input id="reason" name="reason" rows="3">{{ $attendance->reason }}</x-textarea-input>
          </div>

          <div class="mb-4">
            <x-input-label for="status">{{ __('Status') }}</x-input-label>
            <x-select id="status" name="status" required>
              <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>{{ __('Aanwezig') }}
              </option>
              <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>{{ __('Afwezig') }}
              </option>
              <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>{{ __('Laat') }}
              </option>
            </x-select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
</x-app-layout>
