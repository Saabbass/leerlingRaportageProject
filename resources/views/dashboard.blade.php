<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Dashboard') }}
    </x-page-title>

    {{-- Uncomment the following section if you want to display error/success messages --}}
    {{-- @if (session('error'))
      <x-error-failed>
        {{ session('error') }}
      </x-error-failed>
    @endif

    @if (session('success'))
      <x-error-succes>
        {{ session('success') }}
      </x-error-succes>
    @endif --}}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div
        class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
        <x-hero-title class="p-6">
          {{ __('Je bent ingelogd!') }}
        </x-hero-title>
      </div>
      <div
        class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
          <x-hero-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">{{ __('Vakken') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">{{ __('Cijfers') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">{{ __('Aanwezigheid') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('goals.index')" :active="request()->routeIs('goals.index')">{{ __('doelen') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Docent') }}</x-hero-nav-link>
          @endif  --}}
        </div>

        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          @if (auth()->user()->role === 'teacher')
            <x-primary-link-btn :href="route('event.create')" :active="request()->routeIs('event.create')">
              {{ __('Aan agenda toevoegen') }}
            </x-primary-link-btn>
          @endif
          <div class="py-4 text-secondaryLightText dark:text-primaryDarkText" id='calendar'></div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script> --}}
    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/main.min.js"></script> --}}
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/nl.global.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = @json($events);
        // Modify events to set color based on status
        events = events.map(event => {
          if (event.status === 'inactive') {
            event.color = '#d70101';
            event.title = 'gaat niet door';
          }
          return event;
        });

        var calendar = new FullCalendar.Calendar(calendarEl, {
          locale: 'nl',
          initialView: 'timeGridFiveDay',
          views: {
            timeGridFiveDay: {
              type: 'timeGrid',
              duration: {
                days: 5
              }
            }
          },
          editable: true,
          displayEventTime: true,
          nowIndicator: true,
          events: events,
          eventClick: function(info) {
            info.el.style.borderColor = 'red';
          }
        });

        calendar.render();
      });
    </script>
  @endpush
</x-app-layout>
