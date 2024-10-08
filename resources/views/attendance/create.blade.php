<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Aanwezigheid veranderen') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <form method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <div class="mb-4">
              <label for="user_id"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Gebruiker') }}</label>
              <select id="user_id" name="user_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                required>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label for="subject_id"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Vak') }}</label>
              <select id="subject_id" name="subject_id"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                required>
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label for="date"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Datum') }}</label>
              <input type="date" id="date" name="date"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                required>
            </div>

            <div class="mb-4">
              <label for="reason"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Reden') }}</label>
              <textarea id="reason" name="reason" rows="3"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></textarea>
            </div>

            <div class="mb-4">
              <label for="status"
                class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Status') }}</label>
              <select id="status" name="status"
                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                required>
                <option value="present">{{ __('Aanwezig') }}</option>
                <option value="absent">{{ __('Afwezig') }}</option>
                <option value="late">{{ __('Laat') }}</option>
              </select>
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-primary-button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                {{ __('Opslaan') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
