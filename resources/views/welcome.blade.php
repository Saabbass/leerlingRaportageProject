<head>
  <title>EduTrack</title>
</head>



<x-app-layout>
  <div class="flex flex-col h-full min-h-screen relative">
    <div
      class="relative flex justify-center items-center bg-dots-darker bg-center dark:bg-dots-lighter selection:bg-red-500 selection:text-white h-full">
      <section
        class="container_img relative overflow-hidden max-h-full h-full min-h-screen w-full flex justify-center items-center">
        <img src="{{ asset('assets/images/nova.png') }}" alt=""
          class="absolute max-h-full h-full w-full object-cover">
        <div
          class="px-4 mx-auto max-w-screen-lg h-fit text-center #py-24 py-4 #lg:py-56 rounded-xl relative backdrop-blur-md bg-secondaryLightHero dark:bg-primaryDarkHero">
          <h1
            class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-secondaryLightText dark:text-primaryDarkText">
            Wij investeren
            in het potentieel van de wereld</h1>
          <p
            class="mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48 text-secondaryLightText dark:text-primaryDarkText">
            Hier bij
            NovaCollege richten we ons op studenten waar technologie, innovatie en kapitaal langdurige waarde kunnen
            ontsluiten en economische groei kunnen stimuleren.</p>
          <div class="flex flex-row justify-center space-y-0">
            <x-secondary-link-btn href="{{ route('dashboard') }}">
              Ga door
              <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </x-secondary-link-btn>
          </div>
        </div>
      </section>
    </div>

  </div>
</x-app-layout>
