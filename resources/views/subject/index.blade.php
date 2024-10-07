<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Vakken') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 text-[#1E90FF] dark:text-[#FFC107]  bg-[#C8E6C9] dark:bg-[#2E3B4E]">
          <a href="{{ route('subject.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Vakken</a>
          <a href="{{ route('grades.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Cijfers</a>
          <a href="{{ route('attendance.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Aanwezigheid</a>
          @if (auth()->user()->role === 'teacher')
            <a href="{{ route('teacher.index') }}"
              class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Docenten</a>
          @endif
        </div>
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">{{ __('Vakkenlijst') }}
            </h3>
            @if (auth()->user()->role === 'teacher')
              <a href="{{ route('subject.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Nieuw vak maken') }}
              </a>
            @endif
          </div>
          <div class="mt-4">
            @foreach ($subject as $subj)
              <div class="flex justify-between items-center border-b py-2">
                <div>
                  <span>{{ $subj->subject_name }}</span>
                  <p>{{ $subj->description }}</p>
                </div>
                <div class="flex space-x-4">
                  @if (auth()->user()->role === 'teacher')
                    <a href="{{ route('subject.edit', $subj->id) }}" class="text-blue-500 hover:underline">
                      {{ __('Bewerken') }}
                    </a>
                    <form action="{{ route('subject.destroy', $subj->id) }}" method="POST"
                      onsubmit="return confirm('{{ __('Weet u zeker dat u dit vak wilt verwijderen?') }}');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-[#D0021B] dark:text-[#FF6F61] hover:underline">
                        {{ __('Verwijderen') }}
                      </button>
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
