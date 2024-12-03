@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'text-sm inline-flex items-center underline text-primaryLightAction dark:text-primaryDarkAction hover:text-primaryLightActionHover dark:hover:text-primaryDarkActionHover'
          : 'text-sm inline-flex items-center underline text-primaryLightAction dark:text-primaryDarkAction hover:text-primaryLightActionHover dark:hover:text-primaryDarkActionHover';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>