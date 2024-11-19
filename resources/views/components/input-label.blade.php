@props(['value'])

<label
  {{ $attributes->merge(['class' => 'block font-medium text-md text-secondaryLightText dark:text-primaryDarkText']) }}>
  {{ $value ?? $slot }}
</label>
