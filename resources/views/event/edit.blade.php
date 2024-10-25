<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Les aanpassen') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <form action="{{ route('event.update', $event->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
              <label for="subject_id"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Vak') }}</label>
              <select name="subject_id" id="subject_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}" {{ $subject->id == $event->subject_id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label for="subject_date_start"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Start') }}</label>
              <input type="date" name="subject_date_start" id="subject_date_start" value="{{ $event->start }}"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
            </div>

            <div class="mb-4">
              <label for="subject_date_end"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Eindigd') }}</label>
              <input type="date" name="subject_date_end" id="subject_date_end" value="{{ $event->end }}"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                required>
            </div>

            <div class="flex justify-end">
              <a href="{{ route('grades.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                {{ __('Annuleren') }}
              </a>
              <x-primary-button type="submit" class="font-bold py-2 px-4 rounded">
                {{ __('Cijfer bijwerken') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
