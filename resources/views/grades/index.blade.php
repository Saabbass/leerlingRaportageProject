<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">{{ __('Grade List') }}</h3>
                        <a href="{{ route('grades.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create New Grade') }}
                        </a>
                    </div>
                    <div class="mt-4">
                        @foreach ($grades as $grade)
                            <div class="flex justify-between items-center border-b py-2">
                                <div>
                                    <span>{{ $grade->assignment_name }}</span>
                                    <p>{{ $subjects->firstWhere('id', $grade->subject_id)->subject_name }}</p>
                                    <p>{{ __('Grade: ') }}{{ $grade->grade }}</p>
                                    <p>{{ __('Date: ') }}{{ $grade->date }}</p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="{{ route('grades.edit', $grade->id) }}" class="text-blue-500 hover:underline">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this grade?') }}');">
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
