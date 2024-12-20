<nav x-data="{ open: false }"
  class="bg-primaryLightNav dark:bg-primaryDarkNav border-b border-primaryLightBorder dark:border-primaryDarkBorder drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] z-50 block absolute w-full">
  <!-- Primary Navigation Menu -->
  <div class="px-4 mx-auto max-w-7xl md:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">

        <div class="flex items-center shrink-0">
          <a href="/">
            <h4
              class="w-auto fill-current text-primaryLightText hover:text-primaryLightTextHover dark:text-primaryDarkText hover:dark:text-primaryDarkTextHover [text-shadow:4px_4px_7px_rgba(0,0,0,0.25)]">
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
            <x-nav-link :href="route('goals.index')" :active="request()->routeIs('goals.index')">
              {{ __('Doelen') }}
            </x-nav-link>
            @if (auth()->user()->role == 'teacher')
              <x-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">
                {{ __('Ouder&Kind') }}
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
          <div class="flex gap-2 items-center">
            <div class="hidden md:flex md:items-center md:ms-6">
              {{-- <div class="z-10 hidden gap-2 p-6 text-right align-middle md:flex md:right-0"> --}}
              @auth
                <a href="{{ url('/') }}"
                  class="font-semibold text-secondaryLightText dark:text-primaryDarkText hover:text-secondaryLightTextHover dark:hover:text-primaryDarkTextHover">Dashboard</a>
              @else
                <a href="{{ route('login') }}"
                  class="font-semibold text-secondaryLightText dark:text-primaryDarkText hover:text-secondaryLightTextHover dark:hover:text-primaryDarkTextHover ">Log
                  in</a>

                @if (Route::has('register'))
                  <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-secondaryLightText dark:text-primaryDarkText hover:text-secondaryLightTextHover dark:hover:text-primaryDarkTextHover">Registreer</a>
                @endif
              @endauth
            </div>
            {{-- <button class="text-secondaryLightText dark:text-primaryDarkText" id="theme-toggle">@</button> --}}
            <label class="switch">
              <span class="moon hidden" id="theme-toggle-dark-icon"></span>
              <span class="sun hidden" id="theme-toggle-light-icon"> </span>
              <input type="checkbox" class="input">
              <span class="slider"></span>
            </label>
          </div>
        @endif
      @endguest

      <!-- Settings Dropdown -->
      @auth
        <div class="flex gap-2 items-center">
          <label class="switch md:ms-6">
            <span class="moon hidden" id="theme-toggle-dark-icon"></span>
            <span class="sun hidden" id="theme-toggle-light-icon"> </span>
            <input type="checkbox" class="input">
            <span class="slider"></span>
          </label>
          <div class="hidden md:flex md:items-center">
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-primaryLightText hover:text-primaryLightTextHover dark:text-primaryDarkText hover:dark:text-primaryDarkTextHover
                  bg-primaryLightDropdown dark:bg-primaryDarkDropdown focus:outline-none transition ease-in-out duration-150 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]">
                  <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                  <div class="ms-1 text-primaryLightText">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" fill="white"
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
          </div>
        </div>
      @endauth


      <!-- Hamburger -->
      <div class="flex items-center -me-2 md:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center p-2 rounded-md text-secondaryLightText dark:text-primaryDarkText 
          bg-primaryLightNav dark:bg-primaryDarkNav
          drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] 
          focus:drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] focus:outline-none focus:bg-secondaryLightNav dark:focus:bg-secondaryDarkNav 
          focus:text-primaryLightText 
          dark:focus:text-secondaryDarkText 
          transition duration-150 ease-in-out">
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
    class="block md:hidden border-t text-secondaryLightText dark:text-primaryDarkText hover:text-primaryLightTextHover dark:hover:text-primaryDarkTextHover border-gray-200 dark:border-gray-600">
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
        <x-responsive-nav-link :href="route('goals.index')" :active="request()->routeIs('goals.index')">
          {{ __('Doelen') }}
        </x-responsive-nav-link>
        @if (auth()->user()->role == 'teacher')
          <x-responsive-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">
            {{ __('Ouder&Kind') }}
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
          class="mt-3 space-y-1 text-secondaryLightText dark:text-primaryDarkText hover:text-primaryLightTextHover dark:hover:text-primaryDarkTextHover">
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
