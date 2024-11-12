@props(['active'])

@php
$classes = ($active ?? false)
            ? 'hover:underline rounded-xl text-primaryLightText dark:text-secondaryDarkText hover:text-[#50E3C2] dark:hover:text-[#FF6F61] [text-shadow:4px_4px_7px_rgba(0,0,0,0.25)]'
            : 'hover:underline rounded-xl text-primaryLightText dark:text-secondaryDarkText hover:text-[#50E3C2] dark:hover:text-[#FF6F61] [text-shadow:4px_4px_7px_rgba(0,0,0,0.25)]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>