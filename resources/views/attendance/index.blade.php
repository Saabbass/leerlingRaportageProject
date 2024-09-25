<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{ __('Check je afwezigheid:') }}
                    </h3>
                    <a href="{{ route('attendance.create') }}" class="text-indigo-600 hover:text-indigo-900">
                        {{ __('Create Attendance') }}
                    </a>
                </div>
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                    {{ __('Naam') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                    {{ __('Datum') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                    {{ __('Reden') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                    {{ __('Status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ optional($attendance->user)->first_name }} {{ optional($attendance->user)->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $attendance->date }} 
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $attendance->reason }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $attendance->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
</x-app-layout>