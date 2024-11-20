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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#F7F8FA] dark:bg-[#1C1C2E]">
      <div>
        <a href="/">
          <x-application-logo class="w-20 h-20 fill-current text-secondaryLightText dark:text-primaryDarkText" />
        </a>
      </div>

      <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-secondaryLightHero dark:bg-secondaryDarkHero text-secondaryLightText dark:text-primaryDarkText shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
      </div>
    </div>
  </body>

</html>
