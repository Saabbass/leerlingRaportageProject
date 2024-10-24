<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-[#333333] dark:text-[#E0E0E0] leading-tight">
      {{ __('Leraar') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-[#79b5ff] dark:bg-[#263238] overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div
          class="p-6 flex flex-wrap justify-evenly gap-1 text-[#955b24] dark:text-[#FFC107]  bg-[#C8E6C9] dark:bg-[#2E3B4E]">
          <a href="{{ route('subject.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Vakken</a>
          <a href="{{ route('grades.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Cijfers</a>
          <a href="{{ route('attendance.index') }}"
            class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Aanwezigheid</a>
          @if (auth()->user()->role === 'teacher')
            <a href="{{ route('teacher.index') }}"
              class="hover:underline rounded-xl hover:text-[#104E8B] dark:hover:text-[#FF6F61]">Leraar</a>
          @endif
        </div>
        <div class="p-6 text-[#333333] dark:text-[#E0E0E0]">
          <div class="flex justify-between items-center mb-6">
            <h3 class="font-semibold text-lg text-[#333333] dark:text-[#E0E0E0] leading-tight">
              {{ __('Relaties tussen Gebruikers, Ouders en Studenten:') }}
            </h3>
            @if (auth()->user()->role === 'teacher')
              <a href="{{ route('teacher.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Nieuwe koppeling maken') }}
              </a>
            @endif
          </div>
        </div>
        <table class="min-w-full divide-y divide-[#F5A623] dark:divide-[#FF6F61] mt-4">
          <thead>
            <tr>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                {{ __('Naam van de Ouder') }}
              </th>
              <th scope="col"
                class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]">
                {{ __('Naam van de Student') }}
              </th>
              <th scope="col"
              class="px-4 py-2 bg-[#C8E6C9] dark:bg-[#2E3B4E] text-left text-sm font-medium text-[#333333] dark:text-[#E0E0E0]"></th>
            </tr>
          </thead>
          <tbody class="bg-[#79b5ff] dark:bg-[#263238] divide-y divide-[#F5A623] dark:divide-[#FF6F61]">
            @foreach ($data as $item)
              <tr>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                  {{ $item->parent->first_name }} {{ $item->parent->last_name }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-[#333333] dark:text-[#E0E0E0]">
                  {{ $item->student->first_name }} {{ $item->student->last_name }}</td>
                <td>
                  <a href="{{ route('teacher.edit', ['parent_id' => $item->parent_id, 'student_id' => $item->student_id]) }}"
                    class="btn btn-warning text-blue-500 hover:underline">Edit</a>
                  <form
                    action="{{ route('teacher.destroy', ['parent_id' => $item->parent_id, 'student_id' => $item->student_id]) }}"
                    method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-[#D0021B] dark:text-[#FF6F61] hover:underline"
                      onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
