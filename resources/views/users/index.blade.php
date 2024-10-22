<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Users') }}
        </h2>
        <p class="text-sm text-red-600">{{ session('status') }}</p>
        <td colspan="5" class="text-left">
            <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">{{ __('Create User') }}</a>
        </td>
    </x-slot>
    <div class="py-12">
        @if (auth()->user()->role !== 'teacher')
            <div class="text-center">
                <h3 class="text-lg font-semibold text-red-600">{{ __('Access Denied: je bent geen leraar dus kan deze pagina niet in.') }}</h3>
            </div>
        @else
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-[#fefeff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 flex flex-wrap justify-evenly gap-1 text-[#955b24] dark:text-[#FFC107] bg-[#C8E6C9] dark:bg-[#2E3B4E]">
                        <a href="{{ route('subject.index') }}"
                        class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Vakken</a>
                      <a href="{{ route('grades.index') }}"
                        class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Cijfers</a>
                      <a href="{{ route('attendance.index') }}"
                        class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">aanwezigheid</a>
                      @if (auth()->user()->role === 'teacher')
                        <a href="{{ route('teacher.index') }}"
                          class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Leraar</a>
                      @endif
                    </div>
                    <div class="mt-4">
                        <form method="GET" action="{{ route('users.index') }}" class="flex items-center">
                            <input type="text" name="search" placeholder="{{ __('Search Users') }}" class="px-4 py-2 border border-gray-300 rounded-md" value="{{ request()->query('search') }}">
                            <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">{{ __('Search') }}</button>
                        </form>
                    </div>
                    </div>
                    <table class="min-w-full divide-y divide-[#F5A623] dark:divide-[#FF6F61] mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('voornaam') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Achternaam') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Email') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Rol') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Acties') }}
                                </th>
                            </tr>
                            <tr>
                            </tr>
                        </thead>
                        <tbody class="bg-[#79b5ff] dark:bg-[#263238] divide-y divide-[#F5A623] dark:divide-[#FF6F61]">
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $user->first_name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $user->last_name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $user->email }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $user->role }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>

