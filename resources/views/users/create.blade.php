<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                <h2 class="font-semibold text-xl">{{ __('Create User') }}</h2>
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                     <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('First Name') }}</label>
                        <input type="text" id="first_name" name="first_name" required
                            class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" name="last_name" required
                            class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Email') }}</label>
                        <input type="email" id="email" name="email" required
                            class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="age" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Age') }}</label>
                        <input type="number" id="age" name="age" required
                            class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" required
                            class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Role') }}</label>
                        <select id="role" name="role" required
                            class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="teacher">{{ __('Leraar') }}</option>
                            <option value="parent">{{ __('Ouder') }}</option>
                            <option value="student">{{ __('Student') }}</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                            {{ __('Create User') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
