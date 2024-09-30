@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#333333] dark:text-[#E0E0E0]']) }}>
    {{ $value ?? $slot }}
</label>
