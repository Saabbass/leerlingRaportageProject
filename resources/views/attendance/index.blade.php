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
          <x-hero-nav-link :href="route('goals.index')" :active="request()->routeIs('goals.index')">{{ __('Doelen') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Docent') }}</x-hero-nav-link>
          @endif --}}
        </div>
        <div class="flex justify-between items-center mb-6 p-6">
          <x-hero-title>
            {{ __('Controleer afwezigheid:') }}
          </x-hero-title>
          {{-- @if (auth()->user()->role === 'teacher') --}}
          <x-link-create href="{{ route('attendance.create') }}">
            {{ __('Verander aanwezigheid') }}
          </x-link-create>
          {{-- @endif --}}
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide mt-4">
            <thead class="hidden md:table-header-group">
              <tr>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Naam') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Datum') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Reden') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Status') }}
                </th>
                {{-- @if (auth()->user()->role === 'teacher') --}}
                  <th scope="col"
                    class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                    {{ __('Acties') }}
                  </th>
                {{-- @endif --}}
              </tr>
            </thead>
            <tbody
              class="bg-secondaryLightHero dark:bg-secondaryDarkHero divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide text-sm">
              @foreach ($attendances as $attendance)
                @if (auth()->user()->role === 'teacher' ||
                        (auth()->user()->role === 'student' && auth()->id() === $attendance->user_id) ||
                        (auth()->user()->role === 'parent' &&
                            auth()->user()->isParentOf($attendance->user_id)))
                  <tr class="flex flex-wrap md:table-row">
                    <x-table-td class="w-full md:w-auto">
                      <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Naam') }}:</span>
                      <p class="md:px-0 px-4 md:py-0 py-2">{{ optional($attendance->user)->first_name }} {{ optional($attendance->user)->last_name }}</p>
                    </x-table-td>
                    <x-table-td class="w-full md:w-auto">
                      <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Datum') }}:</span>
                      <p class="md:px-0 px-4 md:py-0 py-2">{{ $attendance->date }}</p>
                    </x-table-td>
                    <x-table-td class="w-full md:w-auto">
                      <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Reden') }}:</span>
                      <p class="md:px-0 px-4 md:py-0 py-2">{{ substr($attendance->reason, 0, 15) }}</p>
                    </x-table-td>
                    <x-table-td class="w-full md:w-auto">
                      <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Status') }}:</span>
                      <p class="md:px-0 px-4 md:py-0 py-2">
                        @if ($attendance->status === 'present')
                          {{ __('Aanwezig') }}
                        @elseif($attendance->status === 'absent')
                          {{ __('Afwezig') }}
                        @elseif($attendance->status === 'late')
                          {{ __('Laat') }}
                        @endif
                      </p>
                    </x-table-td>
                    <x-table-td-action class="w-full md:w-auto">
                      <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Acties') }}:</span>
                      <x-link-change class="md:px-0 px-4 md:py-0 py-2" href="{{ route('attendance.edit', $attendance->id) }}">{{ __('Bewerken') }}</x-link-change>
                      @if (auth()->user()->role === 'teacher')
                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="inline md:px-0 px-4 md:py-0 py-2">
                          @csrf
                          @method('DELETE')
                          <x-link-delete type="submit"
                            onclick="return confirm('Are you sure you want to delete this record?');">{{ __('Verwijderen') }}</x-link-delete>
                        </form>
                      @endif
                    </x-table-td-action>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
