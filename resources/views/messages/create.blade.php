<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h2 class="text-xl font-semibold">{{ __('Create Message') }}</h2>
                    <form method="POST" action="{{ route('messages.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Title') }}</label>
                            <input type="text" id="title" name="title" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Content') }}</label>
                            <textarea id="content" name="content" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="recipient_type" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Recipient Type') }}</label>
                            <select id="recipient_type" name="recipient_type" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="student">{{ __('Student') }}</option>
                                <option value="parent">{{ __('Parent') }}</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Recipient') }}</label>
                            <select id="user_id" name="user_id" required
                                class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                {{ __('Send Message') }}
                            </button>
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
</script>