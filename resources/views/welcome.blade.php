<head>
  <title>EduTrack</title>
</head>

<x-app-layout>
  <div class="flex flex-col h-full min-h-screen relative">
    <div
      class="relative flex justify-center items-center bg-dots-darker bg-center dark:bg-dots-lighter selection:bg-red-500 selection:text-white h-full">
      <section
        class="container_img relative overflow-hidden max-h-full h-full min-h-screen w-full flex justify-center items-center">
        {{-- <img src="{{ asset('assets/img/nova.png') }}" alt=""
          class="absolute max-h-full h-full w-full object-cover"> --}}
        <div
          class="px-4 mx-auto max-w-screen-lg h-fit text-center #py-24 py-4 #lg:py-56 rounded-xl relative backdrop-blur-md bg-[#F5A623] dark:bg-[#2E3B4E]">
          <h1
            class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-[#333333] dark:text-[#E0E0E0]">
            We invest
            in the world’s potential</h1>
          <p class="mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48 text-[#333333] dark:text-[#E0E0E0]">Here at
            NovaCollege we
            focus on
            students where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
          <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="#"
              class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-[#FFFFFF] hover:text-[#F7F8FA] dark:text-[#E0E0E0] hover:dark:text-[#FF6F61] bg-[#3B5998] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
              Get started
              <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </a>
          </div>
        </div>
      </section>
    </div>

  </div>
</x-app-layout>
