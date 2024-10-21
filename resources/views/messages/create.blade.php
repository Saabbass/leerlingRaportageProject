<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h2 class="text-xl font-semibold">{{ __('Create Message') }}</h2>
                    <form method="POST" action="{{ route('messages.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Title') }}</label>
                            <input type="text" id="title" name="title" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Content') }}</label>
                            <textarea id="content" name="content" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Student') }}</label>
                            <select id="user_id" name="user_id" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold transition border border-transparent rounded-md focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25">
                                {{ __('Create Message') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>