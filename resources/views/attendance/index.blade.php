<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Attendances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 flex flex-wrap justify-evenly gap-1 text-[#1E90FF] dark:text-[#FFC107] bg-[#C8E6C9] dark:bg-[#2E3B4E]">
                  <a href="{{ route('subject.index') }}" class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Subjects</a>
                  <a href="{{ route('grades.index') }}" class="hover:underline rounded-xl hover:text-[#104E8B]">Grades</a>
                  <a href="{{ route('attendance.index') }}" class="hover:underline rounded-xl hover:text-[#104E8B]">attendance</a>
                </div>
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h3 class="font-semibold text-lg text-[#333333] dark:text-[#E0E0E0] leading-tight">
                        {{ __('Check je afwezigheid:') }}
                    </h3>
                    <a href="{{ route('attendance.create') }}" class="text-[#FFD700] dark:text-[#FFC107] hover:text-[#F5A623] dark:hover:text-[#FF6F61]">
                        {{ __('Create Attendance') }}
                    </a>
                </div>
                    <table class="min-w-full divide-y divide-[#F5A623] dark:divide-[#FF6F61] mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Naam') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Datum') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Reden') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                                    {{ __('Acties') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#79b5ff] dark:bg-[#263238] divide-y divide-[#F5A623] dark:divide-[#FF6F61]">
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                                        {{ optional($attendance->user)->first_name }} {{ optional($attendance->user)->last_name }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                                        {{ $attendance->date }} 
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0] truncate">
                                        {{substr($attendance->reason, 0, 15)}}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                                        {{ $attendance->status }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                                        <a href="{{ route('attendance.edit', $attendance->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[#D0021B] dark:text-[#FF6F61] hover:text-red-900 ml-2">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
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