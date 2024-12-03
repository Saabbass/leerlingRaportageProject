<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Les aanpassen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('event.update', $event->id) }}" method="POST">
          @csrf
          @method('PATCH')

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
                <option value="{{ $subject->id }}" data-subject-name="{{ $subject->subject_name }}"
                  {{ $subject->id == $event->subject_id ? 'selected' : '' }}>
                  {{ $subject->subject_name }}
                </option>
              @endforeach
            </x-select>
            {{-- <input type="hidden" name="subject_name" id="subject_name" value="{{ $event->subject_name }}"> --}}
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
              value="{{ $event->start }}" required />
          </div>

          <div class="mb-4">
            <x-input-label for="subject_date_end">{{ __('Eindigd') }}</x-input-label>
            <x-date-input type="datetime-local" name="subject_date_end" id="subject_date_end"
              value="{{ $event->end }}" required />
          </div>

          <div class="mb-4">
            <x-input-label for="subject_status">{{ __('Status') }}</x-input-label>
            <x-select id="subject_status" name="subject_status" required>
              <option value="active" {{ $event->status == 'active' ? 'selected' : '' }}>{{ __('Actief') }}</option>
              <option value="inactive" {{ $event->status == 'inactive' ? 'selected' : '' }}>
                {{ __('Gaat niet door') }}</option>
            </x-select>
            <x-input-error :messages="$errors->get('subject_status')" class="mt-2" />
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
