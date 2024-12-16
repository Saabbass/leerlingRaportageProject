<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Vak bewerken') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('subject.update', $subject->id) }}" method="POST">
          @csrf
          @method('PATCH')

          <div class="mb-4">
            <x-input-label for="name">{{ __('Vaknaam') }}</x-input-label>
            <x-text-input type="text" name="name" id="name" value="{{ old('name', $subject->subject_name) }}"
              required />
          </div>

          <div class="mb-4">
            <x-input-label for="description">{{ __('Beschrijving') }}</x-input-label>
            <x-textarea-input name="description"
              id="description" value="{{$subject->description}}"></x-textarea-input>
          </div>

          <div class="flex justify-end gap-2">
            <x-cancel-button href="{{ route('subject.index') }}">
              {{ __('Annuleren') }}
            </x-cancel-button>
            <x-accept-button>
              {{ __('Wijzigingen opslaan') }}
            </x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
