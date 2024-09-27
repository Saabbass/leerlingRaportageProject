<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Edit Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h3 class="font-semibold text-lg text-[#333333] dark:text-[#E0E0E0] leading-tight">
                        {{ __('Edit Attendance Details:') }}
                    </h3>
                    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('User') }}</label>
                            <select id="user_id" name="user_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $attendance->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Subject') }}</label>
                            <select id="subject_id" name="subject_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $attendance->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Date') }}</label>
                            <input type="date" id="date" name="date" value="{{ $attendance->date }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Reason') }}</label>
                            <textarea id="reason" name="reason" rows="3" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">{{ $attendance->reason }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Status') }}</label>
                            <select id="status" name="status" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>{{ __('Present') }}</option>
                                <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>{{ __('Absent') }}</option>
                                <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>{{ __('Late') }}</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-[#333333] dark:text-[#E0E0E0] bg-[#4A90E2] dark:bg-[#3B5998] hover:bg-[#357ABD] dark:hover:bg-[#2C3E50] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Update Attendance') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>