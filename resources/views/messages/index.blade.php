<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
          {{ __('Messages') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold">{{ __('Your Messages') }}</h3>
                @if (auth()->user()->role !== 'student')
                  <div>
                    <a href="{{ route('messages.create') }}"
                      class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                      {{ __('New Message') }}
                    </a>
                    <a href="{{ route('messages.index', ['filter' => 'others']) }}"
                      class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                      {{ __('Messages from Others') }}
                    </a>
                    <a href="{{ route('messages.index') }}"
                      class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                      {{ __('My Messages') }}
                    </a>
                  </div>
                @endif
              </div>
              <table class="min-w-full divide-y divide-[#F5A623] dark:divide-[#FF6F61] mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                            {{ __('Title') }}
                        </th>
                        <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                            {{ __('Content') }}
                        </th>
                        @if (auth()->user()->role !== 'student')
                        <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                          {{ __('Sent by') }}
                      </th>
                        @endif
                        <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                            {{ __('Sent to') }}
                        </th>
                        <th scope="col" class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[#79b5ff] dark:bg-[#263238] divide-y divide-[#F5A623] dark:divide-[#FF6F61]">
                  @forelse($messages as $message)
                  <tr>
                      <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $message->title }}</td>
                      <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $message->content }}</td>
                      <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">Teacher  {{$message->sentBy->last_name}}</td>
                      @if (auth()->user()->role !== 'student')
                      <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">{{ $message->user->first_name }} {{ $message->user->last_name }}</td>
                      @endif
                      <td class="px-4 py-2 text-sm font-medium whitespace-nowrap">
                          @if (auth()->user()->role !== 'student')
                          @if (auth()->user()->id == $message->sent_by)
                            <a href="{{ route('messages.edit', $message) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                            @endif
                            @endif
                            <form action="{{ route('messages.destroy', $message) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                            </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="5" class="px-4 py-2 text-center text-sm text-[#333333] dark:text-[#E0E0E0]">
                          {{ __('You have no messages.') }}
                      </td>
                  </tr>
              @endforelse
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>