@props(['value' => ''])

<textarea
  {{ $attributes->merge([
      'class' => 
        'form-textarea text-primaryLightText dark:text-primaryDarkText bg-primaryLightHero dark:bg-primaryDarkHero border-primaryLightBorder dark:border-primaryDarkBorder focus:border-primaryLightFocusBorder
        dark:focus:border-primaryDarkFocusBorder focus:ring-primaryLightFocusRing dark:focus:ring-primaryDarkFocusRing rounded-md shadow-sm block mt-1 w-full bg-blend-color-dodge shadow-sm drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]',
  ]) }}>{{ $value }}</textarea>
