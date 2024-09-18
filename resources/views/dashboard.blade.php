<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            {{-- <div class="mt-6">
                <a href="{{ route('cijfers') }}" class="text-blue-500 hover:underline">Cijfers</a>
                <a href="{{ route('klassen') }}" class="ml-4 text-blue-500 hover:underline">Klassen</a>
            </div> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{ __('Agenda') }}
                    </h3>
                    <ul class="mt-4">
                        <li>{{ __('Event 1: Meeting with team at 10 AM') }}</li>
                        <li>{{ __('Event 2: Project deadline at 3 PM') }}</li>
                        <li>{{ __('Event 3: Call with client at 5 PM') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
