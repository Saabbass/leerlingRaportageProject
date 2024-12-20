<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduTrack') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['public/assets/css/styles.css', 'public/assets/js/themeSwitch.js'])
    @if(session('success'))
        <meta name="session-success" content="{{ session('success') }}">
    @endif
    @if(session('error'))
        <meta name="session-error" content="{{ session('error') }}">
    @endif
    @if(session('warning'))
        <meta name="session-warning" content="{{ session('warning') }}">
    @endif
    @if(session('info'))
        <meta name="session-info" content="{{ session('info') }}">
    @endif
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="{{ asset('assets/js/notification.js') }}" defer></script>
    
  </head>
  
  <body class="font-sans scrollbar-custom antialiased light">
      <div class="">
      @include('layouts.navigation')

      <!-- Page Heading -->
      @if (isset($header))
        <header class="bg-primaryLightMain dark:bg-primaryDarkMain ">
          <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $header }}
          </div>
        </header>
      @endif

      <!-- Page Content -->
      <main class="bg-primaryLightMain dark:bg-primaryDarkMain h-fit min-h-screen relative">
        {{ $slot }}
      </main>

      @include('components.notification')
      
      @include('layouts.footer')
    </div>
    @stack('scripts')
    <div id="loading-screen" class="fixed inset-0 flex items-center justify-center bg-white z-50" style="display: none;">
      <div class="loader"></div>
  </div>
  </body>

</html>


{{-- 
Color pallete light
Primary Color: #4A90E2 (Blue) - Represents trust, reliability, and professionalism.
Secondary Color: #50E3C2 (Teal) - Adds a fresh and modern touch.
Accent Color: #F5A623 (Orange) - Highlights important elements and calls to action.
Background Color: #F7F8FA (Light Gray) - Keeps the interface clean and uncluttered.
Text Color: #333333 (Dark Gray) - Ensures readability and contrast.
Text Hover Color: #50E3C2 (Teal) - Matches the secondary color for a cohesive look.
Button Background Color: #4A90E2 (Blue) - Matches the primary color for consistency.
Button Hover Background Color: #357ABD (Darker Blue) - Slightly darker shade for hover effect.
Button Text Color: #FFFFFF (White) - Ensures readability on the blue background.
Button Hover Text Color: #F7F8FA (Light Gray) - Subtle change for hover state.
Hero Background Color 1: #E3F2FD (Light Blue) - A soft, calming blue that complements the primary color.
Hero Background Color 2: #FFF3E0 (Light Orange) - A warm, inviting color that pairs well with the accent color.
Hero Background Color 3: #E8F5E9 (Light Green) - A fresh, clean color that adds a natural touch.

Color pallete light alt
Primary Color: #3B5998 (Warm Blue) - A softer, warmer blue that still provides a strong base.
Secondary Color: #2C3E50 (Warm Dark Blue) - Complements the primary color with a warmer touch.
Accent Color: #FF6F61 (Coral) - Keeps the vibrant, warm highlight.
Background Color: #F5F5F5 (Light Gray) - A light, neutral background that maintains a clean and airy feel.
Text Color: #333333 (Dark Gray) - Ensures readability and contrast against the light background.
Text Hover Color: #FF6F61 (Coral) - Matches the accent color for a cohesive look.
Highlight Color: #FFC107 (Warm Gold) - For highlighting key information with a friendly, welcoming feel.
Success Color: #FFB74D (Warm Orange) - Indicates success and positive actions with a warm, encouraging tone.
Button Background Color: #3B5998 (Warm Blue) - Matches the primary color for consistency.
Button Hover Background Color: #2C3E50 (Warm Dark Blue) - Slightly darker shade for hover effect.
Button Text Color: #FFFFFF (White) - Ensures readability on the button background.
Button Hover Text Color: #FFC107 (Warm Gold) - Adds a warm highlight on hover.
Hero Background Color 1: #E0E0E0 (Light Gray) - A neutral, light background.
Hero Background Color 2: #FFD700 (Gold) - A vibrant, warm color that stands out.
Hero Background Color 3: #8A2BE2 (Blue Violet) - A rich, cool color that adds depth and contrast.


Color pallete dark
Primary Color: #3B5998 (Warm Blue) - A softer, warmer blue that still provides a strong base.
Secondary Color: #2C3E50 (Warm Dark Blue) - Complements the primary color with a warmer touch.
Accent Color: #FF6F61 (Coral) - Keeps the vibrant, warm highlight.
Background Color: #1C1C2E (Warm Dark Navy) - Warmer than the previous dark navy, creating a cozy atmosphere.
Text Color: #E0E0E0 (Light Gray) - Ensures readability and contrast against the warm dark background.
Text Hover Color: #FF6F61 (Coral) - Matches the accent color for a cohesive look.
Highlight Color: #FFC107 (Warm Gold) - For highlighting key information with a friendly, welcoming feel.
Success Color: #FFB74D (Warm Orange) - Indicates success and positive actions with a warm, encouraging tone.
Button Background Color: #3B5998 (Warm Blue) - Matches the primary color for consistency.
Button Hover Background Color: #2C3E50 (Warm Dark Blue) - Slightly darker shade for hover effect.
Button Text Color: #E0E0E0 (Light Gray) - Ensures readability on the dark background.
Button Hover Text Color: #FFC107 (Warm Gold) - Adds a warm highlight on hover.
Hero Background Color 1: #2E3B4E (Dark Blue Gray) - A sophisticated, muted color that complements the primary color.
Hero Background Color 2: #3E2723 (Dark Brown) - A rich, warm color that pairs well with the accent color.
Hero Background Color 3: #263238 (Dark Slate) - A deep, cool color that adds depth and contrast.

Color pallete dark alt
Primary Color: #0D47A1 (Deep Blue) - Provides a strong, calming base.
Secondary Color: #1B1B2F (Very Dark Blue) - Adds depth and complements the primary color.
Accent Color: #FF6F61 (Coral) - Highlights important elements with a warm, vibrant touch.
Background Color: #121212 (Black) - Ensures a true dark mode experience.
Text Color: #E0E0E0 (Light Gray) - Ensures readability and contrast against the dark background.
 --}}