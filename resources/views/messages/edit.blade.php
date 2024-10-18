<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h2 class="text-xl font-semibold">{{ __('Edit Message') }}</h2>
                    <form method="POST" action="{{ route('messages.update', $message) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="title" value="{{ __('Title') }}" />
                            <x-text-input id="title" name="title" type="text" value="{{ old('title', $message->title) }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus />
                            <x-input-error :messages="$errors->updateMessage->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Content') }}</label>
                            <textarea id="content" name="content" required class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('content', $message->content) }}</textarea>
                            <x-input-error :messages="$errors->updateMessage->get('content')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Student') }}</label>
                            <select id="user_id" name="user_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $message->user_id == $student->id ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
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