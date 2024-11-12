<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Leraar') }}
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
          @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Leraar') }}</x-hero-nav-link>
          @endif
        </div>
        <div class="flex justify-between items-center mb-6 p-6">
          <x-hero-title>
            {{ __('Relaties tussen Gebruikers, Ouders en Studenten:') }}
          </x-hero-title>
          @if (auth()->user()->role === 'teacher')
            <x-link-create href="{{ route('teacher.create') }}">
              {{ __('Nieuwe koppeling maken') }}
            </x-link-create>
          @endif
        </div>
        <x-table>
          <x-table-head>
            <tr>
              <x-table-th>
                {{ __('Naam van de Ouder') }}
              </x-table-th>
              <x-table-th>
                {{ __('Naam van de Student') }}
              </x-table-th>
              <x-table-th>
                {{ __('Acties') }}
              </x-table-th>
            </tr>
          </x-table-head>
          <x-table-body>
            @foreach ($data as $item)
              <tr>
                <x-table-td>
                  {{ $item->parent->first_name }} {{ $item->parent->last_name }} ({{ $item->parent->email }})
                </x-table-td>
                <x-table-td>
                  {{ $item->student->first_name }} {{ $item->student->last_name }} ({{ $item->student->email }})
                </x-table-td>
                <x-table-td-action>
                  <x-link-change
                    href="{{ route('teacher.edit', ['parent_id' => $item->parent_id, 'student_id' => $item->student_id]) }}">{{ __('Bewerken') }}</x-link-change>
                  <form
                    action="{{ route('teacher.destroy', ['parent_id' => $item->parent_id, 'student_id' => $item->student_id]) }}"
                    method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-link-delete
                      onclick="return confirm('Are you sure you want to delete this record?');">{{ __('Verwijderen') }}</x-link-delete>
                  </form>
                </x-table-td-action>
              </tr>
            @endforeach
          </x-table-body>
        </x-table>
      </div>
    </div>
  </div>
</x-app-layout>
