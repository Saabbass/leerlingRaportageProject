<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Les inplannen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <form action="{{ route('event.store') }}" method="POST">
            @csrf
            <div class="mb-4">
              <x-input-label for="teacher_id">{{ __('Docent') }}</x-input-label>
              <x-select name="teacher_id" id="teacher_id" required>
                @foreach ($teachers as $teacher)
                  <option value="{{ $teacher->id }}">
                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                  </option>
                @endforeach
              </x-select>
            </div>

            <div class="mb-4">
              <x-input-label for="subject_id">{{ __('Vak') }}</x-input-label>
              <x-select name="subject_id" id="subject_id" required>
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}" data-subject-name="{{ $subject->subject_name }}">
                    {{ $subject->subject_name }}
                  </option>
                @endforeach
              </x-select>
              {{-- <input type="hidden" name="subject_name" id="subject_name" value="{{ $subject->subject_name }}"> --}}
            </div>

            {{-- <script>
              document.getElementById('subject_id').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                document.getElementById('subject_name').value = selectedOption.getAttribute('data-subject-name');
              });
            </script> --}}

            <div class="mb-4">
              <x-input-label for="subject_date_start">{{ __('Start') }}</x-input-label>
              <x-date-input type="datetime-local" name="subject_date_start" id="subject_date_start"
                value="{{ old('start_date') }}" required />
            </div>

            <div class="mb-4">
              <x-input-label for="subject_date_end">{{ __('Eindigd') }}</x-input-label>
              <x-date-input type="datetime-local" name="subject_date_end" id="subject_date_end"
                value="{{ old('end_date') }}" required />
            </div>

            <div class="mb-4">
              <input type="hidden" name="subject_status" id="subject_status" value="active">
            </div>

            <div class="flex items-center justify-end gap-2 mt-4">
              <x-cancel-button href="{{ route('dashboard') }}">
                {{ __('Annuleren') }}
              </x-cancel-button>
              <x-accept-button type="submit">
                {{ __('les inplannen') }}
              </x-accept-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
