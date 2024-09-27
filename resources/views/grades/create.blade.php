<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="user_id"
                                class="block text-sm font-medium text-gray-700">{{ __('User') }}</label>
                            <select name="user_id" id="user_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                                @if ($errors->has('user_id'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('user_id') }}</span>
                                @endif

                            <label for="subject_id"
                                class="block text-sm font-medium text-gray-700">{{ __('Subject') }}</label>
                            <select name="subject_id" id="subject_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- 
                        <div class="mb-4">
                            <label for="grade_name" class="block text-sm font-medium text-gray-700">{{ __('Grade Name') }}</label>
                            <input type="text" name="grade_name" id="grade_name" value="{{ old('grade_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div> --}}

                        <div class="mb-4">
                            <label for="assignment_name"
                                class="block text-sm font-medium text-gray-700">{{ __('Assignment Name') }}</label>
                            <input type="text" name="assignment_name" id="assignment_name"
                                value="{{ old('assignment_name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea name="description" id="description"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="grade"
                                class="block text-sm font-medium text-gray-700">{{ __('Grade') }}</label>
                            <input type="number" name="grade" id="grade" value="{{ old('grade') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required min="0" max="100">
                        </div>

                        <div class="mb-4">
                            <label for="date"
                                class="block text-sm font-medium text-gray-700">{{ __('Date') }}</label>
                            <input type="date" name="date" id="date" value="{{ old('date') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('grades.index') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Create Grade') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
