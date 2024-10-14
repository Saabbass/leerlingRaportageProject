<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Aanwezigheden') }}
    </h2>
  </x-slot>

  <<<<<<< HEAD <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 text-[#1E90FF] dark:text-[#FFC107] bg-[#C8E6C9] dark:bg-[#2E3B4E]">
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
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <h3 class="font-semibold text-lg text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Controleer uw afwezigheid:') }}
          </h3>
          @if (auth()->user()->role === 'teacher')
            <a href="{{ route('attendance.create') }}"
              class="text-[#FFD700] dark:text-[#FFC107] hover:text-[#F5A623] dark:hover:text-[#FF6F61]">
              {{ __('Verander aanweigheid') }}
            </a>
          @endif
        </div>
        <table class="min-w-full divide-y divide-[#F5A623] dark:divide-[#FF6F61] mt-4">
          <thead>
            <tr>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                {{ __('Naam') }}
              </th>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                {{ __('Datum') }}
              </th>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                {{ __('Reden') }}
              </th>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                {{ __('Status') }}
              </th>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
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
                  {{ substr($attendance->reason, 0, 15) }}
                </td>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                  @if ($attendance->status === 'present')
                    {{ __('Aanwezig') }}
                  @elseif($attendance->status === 'absent')
                    {{ __('Afwezig') }}
                  @elseif($attendance->status === 'late')
                    {{ __('Laat') }}
                  @endif
                </td>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                  @if (auth()->user()->role === 'teacher')
                    <a href="{{ route('attendance.edit', $attendance->id) }}"
                      class="text-indigo-600 hover:text-indigo-900">
                      {{ __('Bewerken') }}
                    </a>
                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-[#D0021B] dark:text-[#FF6F61] hover:text-red-900 ml-2">
                        {{ __('Verwijderen') }}
                      </button>
                    </form>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

</x-app-layout>
