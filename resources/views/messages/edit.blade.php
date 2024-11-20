<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Bericht aanpassen') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-secondaryLightHero dark:bg-secondaryDarkHero overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST" action="{{ route('messages.update', $message) }}">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <x-input-label for="title">{{ __('Titel') }}</x-input-label>
            <x-text-input id="title" name="title" type="text" value="{{ old('title', $message->title) }}"
              required autofocus />
            <x-input-error :messages="$errors->updateMessage->get('title')" class="mt-2" />
          </div>

          <div class="mb-4">
            <x-input-label for="content">{{ __('Inhoud') }}</x-input-label>
            <x-textarea-input id="content" name="content"
              required>{{ old('content', $message->content) }}</x-textarea-input>
            <x-input-error :messages="$errors->updateMessage->get('content')" class="mt-2" />
          </div>

          @if (auth()->user()->role == 'teacher')
            <div class="mb-4">
              <x-input-label for="recipient_type">{{ __('Type gebruiker') }}</x-input-label>
              <x-select id="recipient_type" name="recipient_type" required>
                <option value="student" {{ $message->user->role == 'student' ? 'selected' : '' }}>{{ __('Student') }}
                </option>
                <option value="parent" {{ $message->user->role == 'parent' ? 'selected' : '' }}>{{ __('Parent') }}
                </option>
              </x-select>
            </div>
          @endif
          @if (auth()->user()->role == 'parent')
            <input type="hidden" name="recipient_type" value="teacher">
          @endif

          <div class="mb-4">
            <x-input-label for="user_id">{{ __('Aan') }}</x-input-label>
            <x-select id="user_id" name="user_id" required>
              @if (auth()->user()->role == 'teacher')
                @foreach ($students as $student)
                  <option value="{{ $student->id }}" {{ $message->user_id == $student->id ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}</option>
                @endforeach
                @foreach ($parents as $parent)
                  <option value="{{ $parent->id }}" {{ $message->user_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->first_name }} {{ $parent->last_name }}</option>
                @endforeach
              @elseif(auth()->user()->role == 'parent')
                @foreach ($teachers as $teacher)
                  <option value="{{ $teacher->id }}" {{ $message->user_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                @endforeach
              @endif
            </x-select>
            <x-input-error :messages="$errors->updateMessage->get('user_id')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end gap-2 mt-4">
            <x-cancel-button href="{{ route('messages.index') }}">
              {{ __('Annuleer') }}
            </x-cancel-button>
            <x-accept-button>
              {{ __('Accepteer') }}
            </x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

<script>
  document.getElementById('recipient_type').addEventListener('change', function() {
    var recipientType = this.value;
    var userSelect = document.getElementById('user_id');
    userSelect.innerHTML = '';

    if (recipientType === 'student') {
      @foreach ($students as $student)
        var option = document.createElement('option');
        option.value = '{{ $student->id }}';
        option.text = '{{ $student->first_name }} {{ $student->last_name }}';
        userSelect.appendChild(option);
      @endforeach
    } else if (recipientType === 'parent') {
      @foreach ($parents as $parent)
        var option = document.createElement('option');
        option.value = '{{ $parent->id }}';
        option.text = '{{ $parent->first_name }} {{ $parent->last_name }}';
        userSelect.appendChild(option);
      @endforeach
    }
  });

  // Trigger change event on page load to populate the recipient list based on the current recipient type
  document.getElementById('recipient_type').dispatchEvent(new Event('change'));
</script>
