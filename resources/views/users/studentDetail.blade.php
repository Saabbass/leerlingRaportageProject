<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Gebruikers') }}
    </x-page-title>
    <!-- ... existing code ... -->
  </x-slot>

  <div class="py-12">
    @if (auth()->user()->role !== 'teacher')
      <!-- ... existing code ... -->
    @else
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- ... existing code ... -->

        <!-- Student Detail Section -->
        <div class="my-4">
          <div
            class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
            <div
              class="p-6 flex flex-col flex-wrap justify-evenly gap-1 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
              <x-hero-title-alt>
                {{ __('Student Details:') }}
              </x-hero-title-alt>
            </div>
            <ul class="space-y-2 mx-6 my-3">
              <li class="flex gap-2 place-items-end">
                <x-subject-title>{{ __('Voornaam:') }}</x-subject-title>
                <x-subject-description>{{ $student->first_name }}</x-subject-description>
              </li>
              <li class="flex gap-2 place-items-end">
                <x-subject-title>{{ __('Achternaam:') }}</x-subject-title>
                <x-subject-description>{{ $student->last_name }}</x-subject-description>
              </li>
              {{-- <p><x-subject-title>{{ __('id:') }}</x-subject-title> 
                  {{ $student->id }}</p> --}}
              <li class="flex gap-2 place-items-end">
                <x-subject-title>{{ __('Email:') }}</x-subject-title>
                <x-subject-description>{{ $student->email }}</x-subject-description>
              </li>
              <li class="flex gap-2 place-items-end">
                <x-subject-title>{{ __('Rol:') }}</x-subject-title>
                <x-subject-description>{{ $student->role }}</x-subject-description>
              </li>
              <li class="flex gap-2 place-items-end">
                <x-subject-title>{{ __('Geregistreerd op:') }}</x-subject-title>
                <x-subject-description>{{ $student->created_at->format('d-m-Y') }}</x-subject-description>
              </li>
            </ul>

          </div>
        </div>
        <!-- End of Student Detail Section -->

        <!-- Parent Detail Section -->
        <div class="my-4">
          <div
            class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
            <div
              class="p-6 flex flex-col flex-wrap justify-evenly gap-1 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
              <x-hero-title-alt>
                {{ __('Ouder Details:') }}
              </x-hero-title-alt>
            </div>
            @if ($student->parents->isEmpty())
              <x-subject-title class="mx-6 my-3">{{ __('Geen ouders gevonden.') }}</x-subject-title>
            @else
              @foreach ($student->parents as $parentRelationship)
                @php
                  $parent = \App\Models\User::find($parentRelationship->parent_id); // Fetch the parent details
                @endphp
                <ul
                  class="space-y-2 pb-1 border-b border-b-secondaryLightFocusBorder dark:border-b-primaryDarkFocusBorder mx-6 my-3 ">
                  <li class="flex gap-2 place-items-end">
                    <x-subject-title>{{ __('Ouder Voornaam:') }}</x-subject-title>
                    <x-subject-description>{{ $parent->first_name }}</x-subject-description>
                  </li>
                  <li class="flex gap-2 place-items-end">
                    <x-subject-title>{{ __('Ouder Achternaam:') }}</x-subject-title>
                    <x-subject-description>{{ $parent->last_name }}</x-subject-description>
                  </li>
                  <li class="flex gap-2 place-items-end">
                    <x-subject-title>{{ __('Ouder Email:') }}</x-subject-title>
                    <x-subject-description>{{ $parent->email }}</x-subject-description>
                  </li>
                </ul>
              @endforeach
            @endif
          </div>

        </div>
        <!-- End of Parent Detail Section -->

        <!-- ... existing code ... -->
      </div>
    @endif
  </div>
</x-app-layout>
