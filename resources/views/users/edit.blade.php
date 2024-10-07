<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <x-input-label for="first_name" value="{{ __('First Name') }}" />
        <x-text-input id="first_name" name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus />
        <x-input-error :messages="$errors->updateUser->get('first_name')" class="mt-2" />
    </div>

    <div class="mb-4">
        <label for="last_name" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Last Name') }}</label>
        <x-text-input id="last_name" name="last_name" type="text" value="{{ old('last_name', $user->last_name) }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
        <x-input-error :messages="$errors->updateUser->get('last_name')" class="mt-2" />
    </div>

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Email') }}</label>
        <x-text-input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
        <x-input-error :messages="$errors->updateUser->get('email')" class="mt-2" />
    </div>

    <div class="mb-4">
        <label for="role" class="block text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">{{ __('Role') }}</label>
        <select id="role" name="role" class="bg-[#C8E6C9] dark:bg-[#2E3B4E] mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
            <option value="parent" {{ $user->role == 'parent' ? 'selected' : '' }}>Parent</option>
            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
        </select>
        <x-input-error :messages="$errors->updateUser->get('role')" class="mt-2" />
    </div>
    <div class="mt-6">
        <x-primary-button>{{ __('Update User') }}</x-primary-button>
    </div>
</form>
</x-app-layout>

