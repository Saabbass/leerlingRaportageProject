<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Vakken') }}
    </x-page-title>

    @if (session('error'))
      <x-error-failed>
        {{ session('error') }}
      </x-error-failed>
    @endif

    @if (session('success'))
      <x-error-succes>
        {{ session('success') }}
      </x-error-succes>
    @endif
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div
        class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
          <x-hero-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">{{ __('Vakken') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">{{ __('Cijfers') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">{{ __('Aanwezigheid') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Leraar') }}</x-hero-nav-link>
          @endif --}}
        </div>
        <div class="p-6 text-secondaryLightText dark:text-primaryDarkText">
          <div class="flex justify-between items-center mb-6">
            <x-hero-title>
              {{ __('Vakkenlijst') }}
            </x-hero-title>
            @if (auth()->user()->role === 'teacher')
              <x-link-create href="{{ route('subject.create') }}">
                {{ __('Vak toevoegen') }}
              </x-link-create>
            @endif
          </div>
          <div class="mt-4">
            @foreach ($subject as $subj)
              <div class="flex justify-between items-center border-b border-secondaryLightBorder dark:border-primaryDarkBorder py-2">
                <div>
                  <x-subject-title>
                    {{ $subj->subject_name }}
                  </x-subject-title>
                  <x-subject-description>
                    {{ $subj->description }}
                  </x-subject-description>
                </div>
                <div class="flex space-x-4">
                  @if (auth()->user()->role === 'teacher')
                    <x-link-change href="{{ route('subject.edit', $subj->id) }}">
                      {{ __('Bewerken') }}
                    </x-link-change>
                    <form action="{{ route('subject.destroy', $subj->id) }}" method="POST"
                      onsubmit="return confirm('{{ __('Weet u zeker dat u dit vak wilt verwijderen?') }}');">
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
