<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Doelen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div
        class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 text-primaryLightText dark:text-secondaryDarkText drop-shadow-[4px_4px_7px rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
          <x-hero-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">{{ __('Vakken') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">{{ __('Cijfers') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">{{ __('Aanwezigheid') }}</x-hero-nav-link>
        </div>
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <div class="flex flex-col md:flex-row md:justify-between items-center mb-6 gap-4 md:gap-0">
            <x-hero-title>
              {{ __('Doelenlijst') }}
            </x-hero-title>
            @if (auth()->user()->role === 'teacher')
              <x-link-create href="{{ route('goals.create') }}">
                {{ __('Nieuw doel maken') }}
              </x-link-create>
            @endif
          </div>

          <!-- Display User Grades -->
          {{-- <div class="mt-4">
            <h2 class="font-bold">{{ __('Jouw Cijfers') }}</h2>
            @foreach (auth()->user()->role === 'teacher' ? $grades : $grades->where('user_id', auth()->user()->id) as $grade)
              <div class="flex justify-between items-center border-b border-secondaryLightBorder dark:border-primaryDarkBorder py-2">
                <div>
                  <x-subject-title>
                    {{ $grade->assignment_name }} <span class="text-green-500">↑</span>
                  </x-subject-title>
                  <x-subject-description>
                    {{ __('Cijfer: ') }}{{ $grade->grade }}
                  </x-subject-description>
                  <x-subject-description>
                    {{ __('Datum: ') }}{{ $grade->date }}
                  </x-subject-description>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Display All Attendances -->
          <div class="mt-6">
            <h2 class="font-bold">{{ __('Aanwezigheid') }}</h2>
            @foreach ($attendances as $attendance)
              <div class="flex justify-between items-center border-b border-secondaryLightBorder dark:border-primaryDarkBorder py-2">
                <div>
                  <x-subject-title>
                    {{ $attendance->subject_name }} 
                  </x-subject-title>
                  <x-subject-description>
                    {{ __('Status: ') }}{{ $attendance->status }}
                  </x-subject-description>
                  <x-subject-description>
                    {{ __('Datum: ') }}{{ $attendance->date }}
                  </x-subject-description>
                </div>
              </div>
            @endforeach
          </div> --}}

          <!-- Display User Goals -->
          @if (auth()->user()->role === 'student')
            <div class="mt-6">
              <h2 class="font-bold">{{ auth()->user()->first_name }}'s {{ __('Doelen') }}</h2>
            @elseif (auth()->user()->role === 'parent')
              <div class="mt-6">
                <h2 class="font-bold">{{ __('Doelen van de student') }}</h2>
          @endif

            @foreach (auth()->user()->role === 'parent' ? $studentGoals : $goals as $goal)
              <div class="flex justify-between items-center border-b border-secondaryLightBorder dark:border-primaryDarkBorder py-2">
                <div>
                  <x-subject-description>
                    {{ __('User: ') }}{{ $goal->user->first_name }}
                  </x-subject-description>
                  <x-subject-title>
                    {{ $goal->goal_name }} 
                  </x-subject-title>
                  <x-subject-description>
                    {{ __('Goal: ') }}{{ $goal->goal_description }}
                  </x-subject-description>
                  <x-subject-description>
                    {{ __('Datum goal: ') }}{{ $goal->target_date->format('Y-m-d') }}
                  </x-subject-description>
                  <x-subject-description>
                    {{ __('status: ') }}{{ $goal->status === 'active' ? 'Actief' : 'Inactief' }}
                  </x-subject-description>
                  
              

              </div>
              <!-- Edit Link -->

              <div class="flex flex-col justify-center items-center sm:flex-row sm:space-x-4">
                <x-link-change href="{{ route('goals.edit', $goal->id) }}">{{ __('Bewerken') }}</x-link-change>
                <form action="{{ route('goals.destroy', $goal->id) }}" method="POST"
                  onsubmit="return confirm('Weet je zeker dat je dit doel wilt verwijderen?');">
                  @csrf
                  @method('DELETE')
                  <x-link-delete type="submit">{{ __('Verwijder') }}</x-link-delete>
                </form>
              </div>
            </div>
          @endforeach
          @if (auth()->user()->role === 'student' || auth()->user()->role === 'parent')
        </div>
        @endif

      </div>
    </div>
  </div>
  </div>
</x-app-layout>
