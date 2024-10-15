<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Ouder aan kind koppelen') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <form method="POST" action="{{ route('teacher.update', ['parent_id' => $userParentStudent->parent_id, 'student_id' => $userParentStudent->student_id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
              <x-input-label for="parent_id" :value="__('Ouder')" />
              <select id="parent_id" name="parent_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                required>
                @foreach ($parents as $parent)
                  <option value="{{ $parent->id }}" {{ $userParentStudent->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->first_name }} {{ $parent->last_name }}</option>
                @endforeach
              </select>
              <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
            </div>

            <div class="mb-4">
              <x-input-label for="student_id" :value="__('Student')" />
              <select id="student_id" name="student_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                required>
                @foreach ($students as $student)
                  <option value="{{ $student->id }}" {{ $userParentStudent->student_id == $student->id ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                @endforeach
              </select>
              <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-4">
                {{ __('Link toevoegen') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
