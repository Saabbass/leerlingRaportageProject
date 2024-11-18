<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Gebruikers') }}
    </x-page-title>
    <!-- ... existing code ... -->
  </x-slot>

  <div class="py-12">
    @if (auth()->user()->role !== 'teacher')
      <!-- ... existing code ... -->
    @else
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- ... existing code ... -->
        
        <!-- Student Detail Section -->
        <div class="my-4 px-6">
          <x-hero-title>
            {{ __('Student Details:') }}
          </x-hero-title>
          <div class="bg-white shadow-md rounded-lg p-6">
            <p><strong>{{ __('Voornaam:') }}</strong> {{ $student->first_name }}</p>
            <p><strong>{{ __('Achternaam:') }}</strong> {{ $student->last_name }}</p>
            {{-- <p><strong>{{ __('id:') }}</strong> {{ $student->id }}</p> --}}
            <p><strong>{{ __('Email:') }}</strong> {{ $student->email }}</p>
            <p><strong>{{ __('Rol:') }}</strong> {{ __('Student') }}</p>
            <p><strong>{{ __('Geregistreerd op:') }}</strong> {{ $student->created_at->format('d-m-Y') }}</p>
          </div>
        </div>
        <!-- End of Student Detail Section -->

        <!-- Parent Detail Section -->
        <div class="my-4 px-6">
          <x-hero-title>
            {{ __('Ouder Details:') }}
          </x-hero-title>
          <div class="bg-white shadow-md rounded-lg p-6">
            @if($student->parents->isEmpty())
              <p>{{ __('Geen ouders gevonden.') }}</p>
            @else
              @foreach($student->parents as $parentRelationship)
                @php
                  $parent = \App\Models\User::find($parentRelationship->parent_id); // Fetch the parent details
                @endphp
                <p><strong>{{ __('Ouder Voornaam:') }}</strong> {{ $parent->first_name }}</p>
                <p><strong>{{ __('Ouder Achternaam:') }}</strong> {{ $parent->last_name }}</p>
                {{-- <p><strong>{{ __('id:') }}</strong> {{ $parent->id }}</p> --}}
                <p><strong>{{ __('Ouder Email:') }}</strong> {{ $parent->email }}</p>
                <hr>
              @endforeach
            @endif
          </div>
        </div>
        <!-- End of Parent Detail Section -->

        <!-- ... existing code ... -->
      </div>
    @endif
  </div>
</x-app-layout>
