<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Edit Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('User') }}</label>
                            <select id="user_id" name="user_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $grade->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Subject') }}</label>
                            <select id="subject_id" name="subject_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == $grade->subject_id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="assignment_name" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Assignment Name') }}</label>
                            <input type="text" name="assignment_name" id="assignment_name" value="{{ $grade->assignment_name }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="grade" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Grade') }}</label>
                            <input type="number" name="grade" id="grade" value="{{ $grade->grade }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Date') }}</label>
                            <input type="date" name="date" id="date" value="{{ $grade->date }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $grade->description }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('grades.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="text-[#333333] dark:text-[#E0E0E0] bg-[#4A90E2] dark:bg-[#3B5998] hover:bg-[#357ABD] dark:hover:bg-[#2C3E50] font-bold py-2 px-4 rounded">
                                {{ __('Update Grade') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
