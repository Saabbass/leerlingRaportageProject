@props(['value' => ''])

<textarea {{ $attributes->merge(['class' => 'form-textarea text-[#333333] dark:text-[#E0E0E0] bg-[#C8E6C9] dark:bg-[#2E3B4E]']) }}>{{ $value }}</textarea>
