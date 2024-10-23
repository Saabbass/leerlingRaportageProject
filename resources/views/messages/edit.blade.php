<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h2 class="text-xl font-semibold">{{ __('Bericht aanpassen') }}</h2>
                    <form method="POST" action="{{ route('messages.update', $message) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="title" value="{{ __('Titel') }}" />
                            <x-text-input id="title" name="title" type="text" value="{{ old('title', $message->title) }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus />
                            <x-input-error :messages="$errors->updateMessage->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Inhoud') }}</label>
                            <textarea id="content" name="content" required class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('content', $message->content) }}</textarea>
                            <x-input-error :messages="$errors->updateMessage->get('content')" class="mt-2" />
                        </div>

                        @if(auth()->user()->role == 'teacher')
                        <div class="mb-4">
                            <label for="recipient_type" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Type gebruiker') }}</label>
                            <select id="recipient_type" name="recipient_type" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="student" {{ $message->user->role == 'student' ? 'selected' : '' }}>{{ __('Student') }}</option>
                                <option value="parent" {{ $message->user->role == 'parent' ? 'selected' : '' }}>{{ __('Parent') }}</option>
                            </select>
                        </div>
                        @endif
                        @if (auth()->user()->role == 'parent')
                        <input type="hidden" name="recipient_type" value="teacher">
                        @endif

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Aan') }}</label>
                            <select id="user_id" name="user_id" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                @if(auth()->user()->role == 'teacher')
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ $message->user_id == $student->id ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ $message->user_id == $parent->id ? 'selected' : '' }}>{{ $parent->first_name }} {{ $parent->last_name }}</option>
                                    @endforeach
                                @elseif(auth()->user()->role == 'parent')
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $message->user_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->updateMessage->get('user_id')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-primary-button>{{ __('Update Message') }}</x-primary-button>
                        </div>
                    </form>
                </div>
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
            @foreach($students as $student)
                var option = document.createElement('option');
                option.value = '{{ $student->id }}';
                option.text = '{{ $student->first_name }} {{ $student->last_name }}';
                userSelect.appendChild(option);
            @endforeach
        } else if (recipientType === 'parent') {
            @foreach($parents as $parent)
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