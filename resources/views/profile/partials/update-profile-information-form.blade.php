<section>
  <header>
    <h2 class="text-lg font-medium text-secondaryLightText dark:text-primaryDarkText">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-secondaryLightText dark:text-primaryDarkText">
      {{ __("Update your account's profile information, email address, and current role.") }}
    </p>
  </header>

  @if (auth()->user()->role === 'teacher' || auth()->user()->role === 'parent')
    <form method="post" action="{{ route('profile.updateRole') }}" class="mt-6 space-y-6">
      @csrf
      @method('patch')

      <!-- Role -->
      <div class="mt-4">
        <x-input-label for="role" :value="__('Current Role')" />
        <x-select id="role" name="role" type="text" required autofocus>
          <option value="student" @if (old('role', $user->role) === 'student') selected @endif>student</option>
          <option value="parent" @if (old('role', $user->role) === 'parent') selected @endif>parent</option>
          <option value="teacher" @if (old('role', $user->role) === 'teacher') selected @endif>teacher</option>
        </x-select>
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
      </div>

      <div class="flex items-center gap-4 text-secondaryLightText dark:text-primaryDarkText">
        <x-primary-button>{{ __('Save Role') }}</x-primary-button>

        @if (session('status') === 'role-updated')
          <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-secondaryLightText dark:text-primaryDarkText">{{ __('Role updated.') }}</p>
        @endif
      </div>
    </form>
  @else
    <p class="text-sm text-secondaryLightText dark:text-primaryDarkText">
      {{ __('You do not have permission to change the role.') }}</p>
  @endif

  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
      <x-input-label for="first_name" :value="__('Firstname')" />
      <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)"
        required autofocus autocomplete="first_name" />
      <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
    </div>

    <div>
      <x-input-label for="last_name" :value="__('Lastname')" />
      <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required
        autofocus autocomplete="last_name" />
      <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
    </div>

    <div hidden>
      <x-input-label for="age" :value="__('Age')" />
      <x-text-input id="age" name="age" type="text" class="mt-1 block w-full" :value="old('age', $user->age)" required
        autofocus autocomplete="age" />
      <x-input-error class="mt-2" :messages="$errors->get('age')" />
    </div>

    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required
        autocomplete="username" />
      <x-input-error class="mt-2" :messages="$errors->get('email')" />

      @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
        <div>
          <p class="text-sm mt-2 text-gray-800">
            {{ __('Your email address is unverified.') }}

            <button form="send-verification"
              class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              {{ __('Click here to re-send the verification email.') }}
            </button>
          </p>

          @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600">
              {{ __('A new verification link has been sent to your email address.') }}
            </p>
          @endif
        </div>
      @endif
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
          {{ __('Saved.') }}</p>
      @endif
    </div>
  </form>
</section>
