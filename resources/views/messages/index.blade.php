<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Berichten') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div
        class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)] bg-primaryLightHero dark:bg-primaryDarkHero">
          <x-hero-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">{{ __('Vakken') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">{{ __('Cijfers') }}</x-hero-nav-link>
          <x-hero-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">{{ __('Aanwezigheid') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Docent') }}</x-hero-nav-link>
          @endif --}}
        </div>
        <div class="flex items-center justify-between p-6 mb-6">
          <x-hero-title>{{ __('Jouw berichten') }}</x-hero-title>
          <div class="flex flex-wrap gap-2">
            @if (auth()->user()->role !== 'student')
              <x-link-create href="{{ route('messages.create') }}">
                {{ __('Nieuw Bericht') }}
              </x-link-create>
            @endif
            @if (auth()->user()->role == 'teacher')
              <x-link-create href="{{ route('messages.index', ['filter' => 'others']) }}">
                {{ __('Andere Berichten') }}
              </x-link-create>
              <x-link-create href="{{ route('messages.index') }}">
                {{ __('Mijn Berichten') }}
              </x-link-create>
            @endif
          </div>
        </div>
        <x-table>
          <x-table-head>
            <tr>
              <x-table-th>
                {{ __('Titel') }}
              </x-table-th>
              <x-table-th>
                {{ __('Inhoud') }}
              </x-table-th>
              @if (auth()->user()->role !== 'student')
                <x-table-th>
                  {{ __('Verzonden naar') }}
                </x-table-th>
              @endif
              <x-table-th>
                {{ __('Verzonden door') }}
              </x-table-th>
              <x-table-th>
                {{ __('Datum') }}
              </x-table-th>
              <x-table-th>
                {{ __('Acties') }}
              </x-table-th>
            </tr>
          </x-table-head>
          <x-table-body>
            @forelse($messages as $message)
  <tr>
    <x-table-td>
      {{ Str::limit($message->title, 10, '...') }}
    </x-table-td>
    <x-table-td>
      {{ Str::words($message->content, 8, '...') }}
    </x-table-td>
    @if (auth()->user()->role !== 'student')
      <x-table-td>
        @php
          $max = 3;
        @endphp
        @foreach ($message->users->take($max) as $recipient)
        {{ $recipient->first_name }} {{ $recipient->last_name }}<br>
      @endforeach
      @if ($message->users->count() > $max)
      <span>and {{ $message->users->count() - $max}} more...</span>
    @endif
      </x-table-td>
    @endif
    <x-table-td>
      {{ $message->sentBy->first_name }} {{ $message->sentBy->last_name }}
    </x-table-td>
    <x-table-td>
      {{ $message->created_at->format('d-m-Y H:i') }}
    </x-table-td>
    <x-table-td-action>
      @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'parent')
        @if (auth()->user()->id == $message->sent_by)
          <x-link-change href="{{ route('messages.edit', $message) }}">
            {{ __('Bewerken') }}
          </x-link-change>
          <form action="{{ route('messages.destroy', $message) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <x-link-delete>
              {{ __('Verwijderen') }}
            </x-link-delete>
                      </form>
                    @endif
                  @endif
                </x-table-td-action>
              </tr>
            @empty
              <tr>
                <x-table-td-empty>
                  {{ __('You have no messages.') }}
                </x-table-td-empty>
              </tr>
            @endforelse
          </x-table-body>
        </x-table>
        <div class="mt-4">
          {{ $messages->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
