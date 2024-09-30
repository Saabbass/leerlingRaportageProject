@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-[#333333] dark:text-[#E0E0E0] bg-[#C8E6C9] dark:bg-[#2E3B4E] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
