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
          <x-hero-nav-link :href="route('goals.index')" :active="request()->routeIs('goals.index')">{{ __('Doelen') }}</x-hero-nav-link>
          {{-- @if (auth()->user()->role === 'teacher')
            <x-hero-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">{{ __('Docent') }}</x-hero-nav-link>
          @endif --}}
        </div>
        <div class="flex items-center justify-between p-6 mb-6">
          <x-hero-title>{{ __('Jouw berichten') }}</x-hero-title>
          <div class="flex flex-wrap justify-end gap-2">
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
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide mt-4">
            <thead class="hidden md:table-header-group">
              <tr>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Titel') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Inhoud') }}
                </th>
                @if (auth()->user()->role !== 'student')
                  <th scope="col"
                    class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                    {{ __('Verzonden naar') }}
                  </th>
                @endif
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Verzonden door') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Datum') }}
                </th>
                <th scope="col"
                  class="px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText">
                  {{ __('Acties') }}
                </th>
              </tr>
            </thead>
            <tbody
              class="bg-secondaryLightHero dark:bg-secondaryDarkHero divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide text-sm">
              @forelse($messages as $message)
                <tr class="flex flex-wrap md:table-row">
                  <x-table-td class="w-full md:w-auto">
                    <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Titel') }}:</span>
                    <p class="md:px-0 px-4 md:py-0 py-2">{{ Str::limit($message->title, 10, '...') }}</p>
                  </x-table-td>
                  <x-table-td class="w-full md:w-auto">
                    <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Inhoud') }}:</span>
                    <p class="md:px-0 px-4 md:py-0 py-2">{{ Str::limit($message->content, 20, '...') }}</p>
                  </x-table-td>
                  @if (auth()->user()->role !== 'student')
                    <x-table-td class="w-full md:w-auto">
                      <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Verzonden naar') }}:</span>
                      <p class="md:px-0 px-4 md:py-0 py-2">
                        @php
                          $max = 3;
                        @endphp
                        @foreach ($message->users->take($max) as $recipient)
                          {{ $recipient->first_name }} {{ $recipient->last_name }}<br>
                        @endforeach
                        @if ($message->users->count() > $max)
                          <span>and {{ $message->users->count() - $max}} more...</span>
                        @endif
                      </p>
                    </x-table-td>
                  @endif
                  <x-table-td class="w-full md:w-auto">
                    <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Verzonden door') }}:</span>
                    <p class="md:px-0 px-4 md:py-0 py-2">{{ $message->sentBy->first_name }} {{ $message->sentBy->last_name }}</p>
                  </x-table-td>
                  <x-table-td class="w-full md:w-auto">
                    <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Datum') }}:</span>
                    <p class="md:px-0 px-4 md:py-0 py-2">{{ $message->created_at->format('d-m-Y H:i') }}</p>
                  </x-table-td>
                  <x-table-td-action class="w-full md:w-auto">
                    <span class="block md:hidden font-bold px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm text-primaryLightText dark:text-primaryDarkText rounded-lg">{{ __('Acties') }}:</span>
                    @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'parent')
                      @if (auth()->user()->id == $message->sent_by)
                        <x-link-change class="md:px-0 px-4 md:py-0 py-2" href="{{ route('messages.edit', $message) }}">
                          {{ __('Bewerken') }}
                        </x-link-change>
                        <form action="{{ route('messages.destroy', $message) }}" method="POST" class="inline md:px-0 px-4 md:py-0 py-2">
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
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          {{ $messages->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
