<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  @if (auth()->user()->role === 'teacher')
    <a href="{{ route('users.index') }}" class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Users</a>
  @endif
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          {{ __("Je bent ingelogd!") }}
        </div>
      </div>
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 text-[#333333] dark:text-[#FFC107] bg-[#C8E6C9] dark:bg-[#2E3B4E]">
          <a href="{{ route('subject.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Vakken</a>
          <a href="{{ route('grades.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Cijfers</a>
          <a href="{{ route('attendance.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Aanwezigheid</a>
          @if (auth()->user()->role === 'teacher')
            <a href="{{ route('teacher.index') }}"
              class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Leraar</a>
          @endif
        </div>


        {{-- <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <h3 class="font-semibold text-lg text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Agenda') }}
          </h3>
          <ul class="mt-4">
            <li>{{ __('Evenement 1: Vergadering met team om 10 uur') }}</li>
            <li>{{ __('Evenement 2: Projectdeadline om 3 uur') }}</li>
            <li>{{ __('Evenement 3: Gesprek met klant om 5 uur') }}</li>
          </ul>
        </div> --}}

        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <div id='calendar'></div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script> --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/main.min.js"></script> --}}
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.15/index.global.min.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridWeek',
          slotMinTime: '1:00:00',
          slotMaxTime: '23:00:00',
          events: @json($events),
        });
        calendar.render();
      });
    </script>
  @endpush
</x-app-layout>
