@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'inline-flex items-center px-4 py-3 bg-primaryLightButton dark:bg-secondaryDarkButton border border-transparent rounded-md font-semibold text-xs text-primaryLightText dark:text-primaryDarkText uppercase tracking-widest hover:bg-primaryLightButtonHover dark:hover:bg-primaryDarkButtonHover focus:ring-primaryLightFocusRing dark:focus:ring-primaryDarkFocusRing focus:ring-2 transition ease-in-out duration-150 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]'
          : 'inline-flex items-center px-4 py-3 bg-primaryLightButton dark:bg-secondaryDarkButton border border-transparent rounded-md font-semibold text-xs text-primaryLightText dark:text-primaryDarkText 
          hover:text-secondaryLightTextHover dark:hover:text-primaryDarkTextHover uppercase tracking-widest hover:bg-primaryLightButtonHover dark:hover:bg-primaryDarkButtonHover focus:ring-primaryLightFocusRing dark:focus:ring-primaryDarkFocusRing focus:ring-2 transition ease-in-out duration-150 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
