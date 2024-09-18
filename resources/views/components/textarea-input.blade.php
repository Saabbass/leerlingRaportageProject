@props(['value' => ''])

<textarea {{ $attributes->merge(['class' => 'form-textarea']) }}>{{ $value }}</textarea>
