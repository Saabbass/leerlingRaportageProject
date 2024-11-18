<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Gebruikers') }}
    </x-page-title>

    @if (session('error'))
      <x-error-failed>
        {{ session('error') }}
      </x-error-failed>
    @endif

    @if (session('success'))
      <x-error-succes>
        {{ session('success') }}
      </x-error-succes>
    @endif
  </x-slot>

  <div class="py-12">
    @if (auth()->user()->role !== 'teacher')
      <div class="text-center">
        <h3 class="text-lg font-semibold text-red-600">
          {{ __('Access Denied: je bent geen leraar dus kan deze pagina niet in.') }}</h3>
      </div>
    @else
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
          <div class="my-4 px-6">
            <div class="flex justify-between items-center my-4">
              <x-hero-title>
                {{ __('Gebruikers:') }}
              </x-hero-title>
              @if (auth()->user()->role === 'teacher')
                <x-link-create href="{{ route('users.create') }}">
                  {{ __('Maak gebruiker aan') }}
                </x-link-create>
              @endif
            </div>
            <form method="GET" action="{{ route('users.index') }}" class="flex items-center space-x-4">
              <x-search-input type="text" name="search" placeholder="{{ __('Gebruiker zoeken') }}"
                value="{{ request()->query('search') }}" />
              <x-primary-button type="submit">
                {{ __('Zoeken') }}
              </x-primary-button>
            </form>
          </div>
          <table class="min-w-full divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide mt-4">
            <thead>
              <tr>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('voornaam') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Achternaam') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Email') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Rol') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Acties') }}
                </th>
              </tr>
              <tr>
              </tr>
            </thead>
            <tbody
              class="bg-secondaryLightHero dark:bg-secondaryDarkHero divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide text-sm">
              @foreach ($users as $user)
                <tr>
                  <x-table-td>
                    {{ $user->first_name }}</x-table-td>
                  <x-table-td>
                    {{ $user->last_name }}</x-table-td>
                  <x-table-td>
                    {{ $user->email }}</x-table-td>
                  <x-table-td>
                    @if ($user->role === 'teacher')
                      {{ __('Leraar') }}
                    @elseif($user->role === 'parent')
                      {{ __('Ouder') }}
                    @elseif($user->role === 'student')
                      {{ __('Student') }}
                    @endif
                  </x-table-td>
                  <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                    <x-link-change href="{{ route('users.edit', $user) }}">{{ __('Bewerken') }}</x-link-change>
                    <a href="{{ route('users.studentDetail', $user) }}">{{ __('Bekijk Student Details') }}</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <x-link-delete type="submit"
                        onclick="return confirm('Are you sure you want to delete this record?');">{{ __('Verwijderen') }}</x-link-delete>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
  @endif
  </div>
</x-app-layout>
