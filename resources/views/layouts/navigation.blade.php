<nav x-data="{ open: false }" class="bg-[#4A90E2] dark:bg-[#3B5998] border-b border-gray-100 dark:border-gray-800">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">

        <div class="shrink-0 flex items-center">
          <a href="/">
            <h4
              class="w-auto fill-current text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61]">
              EduTrack</h4>
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
          @auth
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">
              {{ __('attendance') }}
            </x-nav-link>
            <x-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">
              {{ __('subject') }}
            </x-nav-link>
          @endauth
        </div>

      </div>

      @guest
        @if (Route::has('login'))
          <div class="hidden sm:inline-block md:right-0 p-6 text-right z-10">
            @auth
              <a href="{{ url('/') }}"
                class="font-semibold text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] focus:outline focus:outline-2 focus:rounded-sm focus:outline-amber-500">Dashboard</a>
            @else
              <a href="{{ route('login') }}"
                class="font-semibold text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] focus:outline focus:outline-2 focus:rounded-sm focus:outline-amber-500">Log
                in</a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}"
                  class="ml-4 font-semibold text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] focus:outline focus:outline-2 focus:rounded-sm focus:outline-amber-500">Registreer</a>
              @endif
            @endauth
            <button class="text-[#333333] dark:text-[#E0E0E0]" id="theme-toggle">@</button>
          </div>
        @endif
      @endguest

      <!-- Settings Dropdown -->
      @auth
        <div class="hidden sm:flex sm:items-center sm:ms-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#333333] hover:text-[#50E3C2] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>

                <div class="ms-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
          <button class="text-[#333333] dark:text-[#E0E0E0]" id="theme-toggle">@</button>
        </div>
      @endauth

      <!-- Hamburger -->
      <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-[#E0E0E0] hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
    class="block sm:hidden border-t border-gray-200 dark:border-gray-600">
    <div class="pt-2 pb-3 space-y-1">
      @auth
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
      @endauth
      <x-responsive-nav-link></x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    @auth
      <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
          <div class="font-medium text-base text-gray-800 dark:text-[#E0E0E0]">{{ Auth::user()->firstname }}
            {{ Auth::user()->lastname }}</div>
          <div class="font-medium text-sm text-gray-500 dark:text-[#E0E0E0]">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
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
