<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">{{ __('Subject List') }}</h3>
                        <a href="{{ route('subject.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create New Subject') }}
                        </a>
                    </div>
                    <div class="mt-4">
                        @foreach ($subject as $subj)
                            <div class="flex justify-between items-center border-b py-2">
                                <div>
                                    <span>{{ $subj->subject_name }}</span>
                                    <p>{{ $subj->description }}</p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="{{ route('subject.edit', $subj->id) }}" class="text-blue-500 hover:underline">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('subject.destroy', $subj->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this subject?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>