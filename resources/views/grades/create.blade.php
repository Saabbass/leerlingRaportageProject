<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Cijfer toevoegen') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <form action="{{ route('grades.store') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="user_id"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Gebruiker') }}</label>
              <select name="user_id" id="user_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
              </select>
              @if ($errors->has('user_id'))
                <span class="text-red-500 text-sm">{{ $errors->first('user_id') }}</span>
              @endif

              <label for="subject_id"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Vak') }}</label>
              <select name="subject_id" id="subject_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
              </select>
            </div>
            {{-- 
                        <div class="mb-4">
                            <label for="grade_name" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Grade Name') }}</label>
                            <input type="text" name="grade_name" id="grade_name" value="{{ old('grade_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div> --}}

            <div class="mb-4">
              <label for="assignment_name"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Opdracht Naam') }}</label>
              <input type="text" name="assignment_name" id="assignment_name" value="{{ old('assignment_name') }}"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
            </div>

            <div class="mb-4">
                <label for="description"
                  class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Beschrijving') }}</label>
                <textarea id="description" name="description" rows="3"
                  class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></textarea>
              </div>

            <div class="mb-4">
              <label for="grade"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Cijfer') }}</label>
              <input type="number" name="grade" id="grade" value="{{ old('grade') }}"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required min="0" max="10">
            </div>

            <div class="mb-4">
              <label for="date"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Datum') }}</label>
              <input type="date" name="date" id="date" value="{{ old('date') }}"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
            </div>

            <div class="flex justify-end">
              <a href="{{ route('grades.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-[#333333] dark:text-[#E0E0E0] font-bold py-2 px-4 rounded mr-2">
                {{ __('Annuleren') }}
              </a>
              <x-primary-button type="submit" class="font-bold py-2 px-4 rounded">
                {{ __('Cijfer creëren') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
