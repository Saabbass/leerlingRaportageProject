@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'text-primaryLightText dark:text-primaryDarkText bg-primaryLightHero dark:bg-primaryDarkHero border-primaryLightBorder dark:border-primaryDarkBorder focus:border-primaryLightFocusBorder
        dark:focus:border-primaryDarkFocusBorder focus:ring-primaryLightFocusRing dark:focus:ring-primaryDarkFocusRing rounded-md shadow-sm block mt-1 w-full bg-blend-color-dodge',
]) !!}>
