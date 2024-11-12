@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'inline-flex items-center px-4 py-3 bg-cancelLightButton dark:bg-cancelDarkButton border border-transparent rounded-md font-semibold text-xs text-primaryLightText dark:text-primaryDarkText uppercase tracking-widest hover:bg-cancelLightButtonHover dark:hover:bg-cancelDarkButtonHover focus:ring-primaryLightFocusRing dark:focus:ring-primaryDarkFocusRing focus:ring-2 transition ease-in-out duration-150 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]'
          : 'inline-flex items-center px-4 py-3 bg-cancelLightButton dark:bg-cancelDarkButton border border-transparent rounded-md font-semibold text-xs text-primaryLightText dark:text-primaryDarkText uppercase tracking-widest hover:bg-cancelLightButtonHover dark:hover:bg-cancelDarkButtonHover focus:ring-primaryLightFocusRing dark:focus:ring-primaryDarkFocusRing focus:ring-2 transition ease-in-out duration-150 drop-shadow-[4px_4px_7px_rgba(0,0,0,0.25)]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>