<nav x-data="{ open: false }"
  class="bg-[#4A90E2] dark:bg-[#3B5998] border-b border-gray-100 dark:border-gray-800 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]">
  <!-- Primary Navigation Menu -->
  <div class="px-4 mx-auto max-w-7xl md:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">

        <div class="flex items-center shrink-0">
          <a href="/">
            <h4
              class="w-auto fill-current text-[#ffffff] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] [text-shadow:4px_4px_7px_rgba(0,0,0,0.25)]">
              EduTrack</h4>
          </a>
        </div>


        <!-- Navigation Links -->
        <div class="hidden space-x-3 md:-my-px md:ms-10 md:flex md:flex-wrap ">
          @auth
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">
              {{ __('Vakken') }}
            </x-nav-link>
            <x-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">
              {{ __('Cijfers') }}
            </x-nav-link>
            <x-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">
              {{ __('Aanwezigheid') }}
            </x-nav-link>
            <x-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.index')">
              {{ __('Berichten') }}
            </x-nav-link>
            @if (auth()->user()->role == 'teacher')
              <x-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">
                {{ __('Leraar') }}
              </x-nav-link>
              <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('Gebruikers') }}
              </x-nav-link>
            @endif
          @endauth
        </div>

      </div>

      @guest
        @if (Route::has('login'))
          <div class="z-10 hidden gap-2 p-6 text-right align-middle md:flex md:right-0">
            @auth
              <a href="{{ url('/') }}"
                class="font-semibold text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61]">Dashboard</a>
            @else
              <a href="{{ route('login') }}"
                class="font-semibold text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] ">Log
                in</a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}"
                  class="ml-4 font-semibold text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61]">Registreer</a>
              @endif
            @endauth

            {{-- <button class="text-secondaryLightText dark:text-primaryDarkText" id="theme-toggle">@</button> --}}
            <button id="theme-toggle" type="button"
              class="text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] text-sm">
              <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 my-auto" fill="currentColor" viewBox="0 -1 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 -3 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                  fill-rule="evenodd" clip-rule="evenodd"></path>
              </svg>
            </button>

          </div>
        @endif
      @endguest

      <!-- Settings Dropdown -->
      @auth
        <div class="hidden gap-2 align-middle md:flex md:items-center md:ms-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#ffffff] hover:text-primaryLightText dark:text-primaryDarkText hover:dark:text-[#FF6F61] bg-blue-500 dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]">
                <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>

                <div class="ms-1">
                  <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Account') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                  {{ __('Log uit') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
          {{-- <button class="text-secondaryLightText dark:text-primaryDarkText" id="theme-toggle">@</button> --}}
          <button id="theme-toggle" type="button"
            class="text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] text-sm">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 my-auto" fill="currentColor" viewBox="0 -1 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 -3 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
      @endauth

      <!-- Hamburger -->
      <div class="flex items-center -me-2 md:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-[#E0E0E0] hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
          <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }"
    class="block md:hidden border-t text-secondaryLightText dark:text-primaryDarkText hover:text-[#50E3C2] hover:dark:text-[#FF6F61] border-gray-200 dark:border-gray-600">
    <div class="pt-2 pb-3 space-y-1">
      @auth
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">
          {{ __('Aanwezigheid') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">
          {{ __('Lessen') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">
          {{ __('Cijfers') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.index')">
          {{ __('Berichten') }}
        </x-responsive-nav-link>
        @if (auth()->user()->role == 'teacher')
          <x-responsive-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">
            {{ __('Leraar') }}
          </x-responsive-nav-link>
          <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
            {{ __('Gebruikers') }}
          </x-responsive-nav-link>
        @endif
      @else
        <x-responsive-nav-link href="/" :active="request()->routeIs('/')">
          {{ __('Homepage') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="/login" :active="request()->routeIs('login')">
          {{ __('login') }}
        </x-responsive-nav-link>

        @if (Route::has('register'))
          <x-responsive-nav-link href="/register" :active="request()->routeIs('/register')">
            {{ __('register') }}
          </x-responsive-nav-link>
        @endif
      @endauth
    </div>

    <!-- Responsive Settings Options -->
    @auth
      <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
          <div class="font-medium text-base text-secondaryLightText dark:text-primaryDarkText">
            {{ Auth::user()->firstname }}
            {{ Auth::user()->lastname }}</div>
          <div class="font-medium text-sm text-secondaryLightText dark:text-primaryDarkText">{{ Auth::user()->email }}
          </div>
        </div>

        <div
          class="mt-3 space-y-1 text-secondaryLightText dark:text-primaryDarkText hover:text-[#50E3C2] hover:dark:text-[#FF6F61]">
          @auth
            <x-responsive-nav-link :href="route('profile.edit')">
              {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                                              this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-responsive-nav-link>
            </form>
          @endauth
        </div>

      </div>
    @endauth

  </div>
</nav>
