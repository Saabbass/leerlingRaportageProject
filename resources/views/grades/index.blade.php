<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Cijfers') }}
    </x-page-title>

    {{-- @if (session('error'))
      <x-error-failed>
        {{ session('error') }}
      </x-error-failed>
    @endif

    @if (session('success'))
      <x-error-succes>
        {{ session('success') }}
      </x-error-succes>
    @endif --}}
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div
        class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 text-primaryLightText dark:text-secondaryDarkText drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
          <x-hero-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">{{ __('Vakken') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">{{ __('Cijfers') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">{{ __('Aanwezigheid') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('goals.index')" :active="request()->routeIs('goals.index')">{{ __('Doelen') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Docent') }}</x-hero-nav-link>
          @endif --}}
        </div>
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <div class="flex flex-col md:flex-row md:justify-between items-center mb-6 gap-4 md:gap-0">
            <x-hero-title>
              {{ __('Cijferlijst') }}
            </x-hero-title>
            @if (auth()->user()->role === 'teacher')
              <x-link-create href="{{ route('grades.create') }}">
                {{ __('Nieuw cijfer maken') }}
              </x-link-create>
            @endif
          </div>
          <div class="mt-4">
            @foreach (auth()->user()->role === 'teacher' ? $grades : (auth()->user()->role === 'parent' ? $grades->whereIn('user_id', auth()->user()->children->pluck('id')) : $grades->where('user_id', auth()->user()->id)) as $grade)
              @if (auth()->user()->role === 'teacher')
                <x-subject-title>{{ __('Student: ') }}{{ $users->firstWhere('id', $grade->user_id)->first_name }}</x-subject-title>
              @endif
              <div
                class="flex justify-between items-center border-b border-secondaryLightBorder dark:border-primaryDarkBorder py-2">
                <div>
                  <x-subject-title>
                    {{ $grade->assignment_name }}
                  </x-subject-title>
                  <x-subject-description>
                    {{ $subjects->firstWhere('id', $grade->subject_id)->subject_name }}</x-subject-description>
                  <x-subject-description>
                    {{ __('Cijfer: ') }}{{ $grade->grade }}
                  </x-subject-description>
                  <x-subject-description>
                    {{ __('Datum: ') }}{{ $grade->date }}
                  </x-subject-description>
                </div>
                <div class="flex flex-col justify-center items-center sm:flex-row sm:space-x-4">
                  @if (auth()->user()->role === 'teacher')
                    <x-link-change href="{{ route('grades.edit', $grade->id) }}">
                      {{ __('Bewerken') }}
                    </x-link-change>
                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST"
                      onsubmit="return confirm('{{ __('Weet u zeker dat u dit cijfer wilt verwijderen?') }}');">
                      @csrf
                      @method('DELETE')
                      <x-link-delete type="submit">
                        {{ __('Verwijderen') }}
                      </x-link-delete>
                    </form>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
