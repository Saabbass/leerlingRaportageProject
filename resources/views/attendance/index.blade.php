<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Aanwezigheden') }}
    </x-page-title>

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
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
          <x-hero-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">{{ __('Vakken') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">{{ __('Cijfers') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">{{ __('Aanwezigheid') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Leraar') }}</x-hero-nav-link>
          @endif --}}
        </div>
        <div class="flex justify-between items-center mb-6 p-6">
          <x-hero-title>
            {{ __('Controleer afwezigheid:') }}
          </x-hero-title>
          @if (auth()->user()->role === 'teacher')
            <x-link-create href="{{ route('attendance.create') }}">
              {{ __('Verander aanwezigheid') }}
            </x-link-create>
          @endif
        </div>
        <x-table>
          <x-table-head>
            <tr>
              <x-table-th>
                {{ __('Naam') }}
              </x-table-th>
              <x-table-th>
                {{ __('Datum') }}
              </x-table-th>
              <x-table-th>
                {{ __('Reden') }}
              </x-table-th>
              <x-table-th>
                {{ __('Status') }}
              </x-table-th>
              @if (auth()->user()->role === 'teacher')
                <x-table-th>
                  {{ __('Acties') }}
                </x-table-th>
              @endif
            </tr>
          </x-table-head>
          <x-table-body>
            @foreach ($attendances as $attendance)
              @if (auth()->user()->role === 'teacher' ||
                      (auth()->user()->role === 'student' && auth()->id() === $attendance->user_id) ||
                      (auth()->user()->role === 'parent' &&
                          auth()->user()->isParentOf($attendance->user_id)))
                <tr>
                  <x-table-td>
                    {{ optional($attendance->user)->first_name }} {{ optional($attendance->user)->last_name }}
                  </x-table-td>
                  <x-table-td>
                    {{ $attendance->date }}
                  </x-table-td>
                  <x-table-td class="truncate">
                    {{ substr($attendance->reason, 0, 15) }}
                  </x-table-td>
                  <x-table-td>
                    @if ($attendance->status === 'present')
                      {{ __('Aanwezig') }}
                    @elseif($attendance->status === 'absent')
                      {{ __('Afwezig') }}
                    @elseif($attendance->status === 'late')
                      {{ __('Laat') }}
                    @endif
                  </x-table-td>
                  @if (auth()->user()->role === 'teacher')
                    <x-table-td-action>
                      <x-link-change href="{{ route('attendance.edit', $attendance->id) }}">
                        {{ __('Bewerken') }}
                      </x-link-change>
                      <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <x-link-delete>
                          {{ __('Verwijderen') }}
                        </x-link-delete>
                      </form>
                    </x-table-td-action>
                  @endif
                </tr>
              @endif
            @endforeach
          </x-table-body>
        </x-table>
      </div>
    </div>

</x-app-layout>
