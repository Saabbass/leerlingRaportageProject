<x-app-layout>
  <x-slot name="header">
    <x-page-title>
      {{ __('Bericht aanmaken') }}
    </x-page-title>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="p-6 overflow-hidden shadow-sm bg-secondaryLightHero dark:bg-secondaryDarkHero sm:rounded-lg">
        <form method="POST" action="{{ route('messages.store') }}">
          @csrf
          <div class="mb-4">
            <x-input-label for="title">{{ __('Titel') }}</x-input-label>
            <x-text-input type="text" id="title" name="title" required />
          </div>

          <div class="mb-4">
            <x-input-label for="content">{{ __('Inhoud') }}</x-input-label>
            <x-textarea-input id="content" name="content" required></x-textarea-input>
          </div>

          @if (auth()->user()->role == 'teacher')
            <div class="mb-4">
              <x-input-label for="recipient_type">{{ __('Type gebruiker') }}</x-input-label>
              <x-select id="recipient_type" name="recipient_type" required>
                <option value="student">{{ __('Student') }}</option>
                <option value="parent">{{ __('Parent') }}</option>
              </x-select>
            </div>
          @endif
          @if (auth()->user()->role == 'parent')
          <div class="mb-4">
            <x-input-label for="recipient_type">{{ __('Type gebruiker') }}</x-input-label>
            <x-select id="recipient_type" name="recipient_type" required>
              <option value="teacher">{{ __('Docent') }}</option>
            </x-select>
          </div>
          @endif

          <div class="mb-4">
            <x-input-label for="user_id">{{ __('Aan') }}</x-input-label>
            <div class="relative">
              <select id="user_id" name="user_id[]" multiple required class="w-full max-w-xl form-select" style="width: 100%">
                <!-- Users will be dynamically inserted here based on recipient_type -->
              </select>
              <div id="selected-tags" class="flex flex-wrap gap-2 mt-2">
                <!-- Selected tags will appear here -->
              </div>
            </div>
          </div>

          <div class="flex items-center justify-end gap-2 mt-4">
            <x-cancel-button href="{{ route('messages.index') }}">
              {{ __('Annuleer') }}
            </x-cancel-button>
            <x-accept-button>
              {{ __('Verstuur bericht') }}
            </x-accept-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

<!-- Include jQuery and Select2 JS (required for the searchable dropdown) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script>
  // Handle the recipient type change (Teacher selects Student/Parent, Parent only selects Teacher)
  document.getElementById('recipient_type').addEventListener('change', function() {
    var recipientType = this.value;
    var userSelect = document.getElementById('user_id');
    
    // Clear the current options
    userSelect.innerHTML = '';

    // Dynamically populate the dropdown based on recipient type
    if (recipientType === 'student') {
      @foreach ($students as $student)
        var option = document.createElement('option');
        option.value = '{{ $student->id }}';
        option.text = '{{ $student->first_name }} {{ $student->last_name }}';
        userSelect.appendChild(option);
      @endforeach
    } else if (recipientType === 'parent') {
      @foreach ($parents as $parent)
        var option = document.createElement('option');
        option.value = '{{ $parent->id }}';
        option.text = '{{ $parent->first_name }} {{ $parent->last_name }}';
        userSelect.appendChild(option);
      @endforeach
    } else {
      // Default to showing all available users (teachers for parent)
      @foreach ($teachers as $teacher)
        var option = document.createElement('option');
        option.value = '{{ $teacher->id }}';
        option.text = '{{ $teacher->first_name }} {{ $teacher->last_name }}';
        userSelect.appendChild(option);
      @endforeach
    }

    // Re-initialize select2 after adding options
    $('#user_id').select2();
  });

  // Trigger change event on page load to populate the recipient list based on the current recipient type
  document.getElementById('recipient_type').dispatchEvent(new Event('change'));

  // Initialize Select2 with search feature for the dropdown
  $(document).ready(function() {
    $('#user_id').select2({
      placeholder: "Zoek en kies gebruikers",  // Placeholder text
      allowClear: true,  // Allow clearing the selection
      width: '100%',  // Make the select box take the full width
    });

    // Add event listener for selection (for multiple selections)
    $('#user_id').on('change', function() {
      var selectedOptions = $(this).val();  // Get selected values
      var selectedTagsContainer = $('#selected-tags');
      selectedTagsContainer.empty();  // Clear existing tags

      // Loop through selected values and create tags
      selectedOptions.forEach(function(userId) {
        // Skip if the tag already exists
        if ($('#tag-' + userId).length > 0) {
          return;
        }

        // Find the selected option text
        var optionText = $('#user_id option[value="' + userId + '"]').text();

        // Create a new tag (bubble) for the selected user
        var tag = $('<div>')
          .attr('id', 'tag-' + userId)
          .addClass('bg-blue-200 text-blue-800 px-3 py-1 rounded-full flex items-center gap-2 mb-2')
          .text(optionText);

        // Create remove button for the tag
        var removeBtn = $('<button>')
          .addClass('bg-transparent text-blue-800 border-none focus:outline-none')
          .text('×')
          .on('click', function() {
            // Remove the tag and deselect the option in the dropdown
            tag.remove();
            $('#user_id').val($('#user_id').val().filter(function(id) { return id !== userId; }));
            $('#user_id').trigger('change');  // Trigger change event to update dropdown
          });

        tag.append(removeBtn);
        selectedTagsContainer.append(tag);
      });
    });
  });
</script>