<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
            {{ __('Aanwezigheid bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
                    <h3 class="font-semibold text-lg text-[#333333] dark:text-[#E0E0E0] leading-tight">
                        {{ __('Aanwezigheidsdetails bewerken:') }}
                    </h3>
                    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                        @csrf
                        @method('patch')

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Gebruiker') }}</label>
                            <select id="user_id" name="user_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $attendance->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Vak') }}</label>
                            <select id="subject_id" name="subject_id" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $attendance->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Datum') }}</label>
                            <input type="date" id="date" name="date" value="{{ $attendance->date }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" value="{{ old('date') }}" required>
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Reden') }}</label>
                            <textarea id="reason" name="reason" rows="3" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">{{ $attendance->reason }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Status') }}</label>
                            <select id="status" name="status" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>{{ __('Aanwezig') }}</option>
                                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>{{ __('Afwezig') }}</option>
                                <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>{{ __('Laat') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
{{-- 
                        <option value="student" @if (old('role', $user->role) === 'student') selected @endif>student</option>
                        <option value="parent" @if (old('role', $user->role) === 'parent') selected @endif>parent</option>
                        <option value="teacher" @if (old('role', $user->role) === 'teacher') selected @endif>teacher</option>
                      </select>
                      <x-input-error :messages="$errors->get('role')" class="mt-2" /> --}}

                        <div class="flex items-center justify-end">
                            <x-primary-button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Update Attendance') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>