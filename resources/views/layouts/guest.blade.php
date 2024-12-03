<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['public/assets/css/styles.css', 'public/assets/js/themeSwitch.js'])
  </head>

  <body class="font-sans text-gray-900 antialiased light">
    <div
      class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primaryLightMain dark:bg-primaryDarkMain">
      <div
        class="flex justify-center gap-4 w-full sm:max-w-md mt-6 px-6 py-4 bg-primaryLightHero dark:bg-primaryDarkHero text-secondaryLightText dark:text-primaryDarkText shadow-md overflow-hidden sm:rounded-lg items-center">
        <a href="/">
          {{-- <x-application-logo class="w-20 h-20 fill-current text-secondaryLightText dark:text-primaryDarkText" /> --}}
          <x-hero-title-alt
            class="w-auto fill-current text-primaryLightText hover:text-primaryLightTextHover dark:text-primaryDarkText hover:dark:text-primaryDarkTextHover [text-shadow:4px_4px_7px_rgba(0,0,0,0.25)]">
            EduTrack
          </x-hero-title-alt>
        </a>
        <label class="switch">
          <span class="moon hidden" id="theme-toggle-dark-icon"></span>
          <span class="sun hidden" id="theme-toggle-light-icon"> </span>
          <input type="checkbox" class="input">
          <span class="slider"></span>
        </label>
      </div>

      <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-secondaryLightHero dark:bg-secondaryDarkHero text-secondaryLightText dark:text-primaryDarkText shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
      </div>
    </div>
  </body>

</html>
