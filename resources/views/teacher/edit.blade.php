<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Ouder kind koppeling aanpassen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST"
          action="{{ route('teacher.update', ['parent_id' => $userParentStudent->parent_id, 'student_id' => $userParentStudent->student_id]) }}">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <x-input-label for="parent_id" :value="__('Ouder')" />
            <x-select id="parent_id" name="parent_id" required>
              @foreach ($parents as $parent)
                <option value="{{ $parent->id }}"
                  {{ $userParentStudent->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->first_name }}
                  {{ $parent->last_name }}</option>
              @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="student_id" :value="__('Student')" />
            <x-select id="student_id" name="student_id" required>
              @foreach ($students as $student)
                <option value="{{ $student->id }}"
                  {{ $userParentStudent->student_id == $student->id ? 'selected' : '' }}>{{ $student->first_name }}
                  {{ $student->last_name }}</option>
              @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end gap-2 mt-4">
            <x-cancel-button href="{{ route('teacher.index') }}">
              {{ __('Annuleer') }}
            </x-cancel-button>
            <x-accept-button>{{ __('Accepteer') }}</x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
