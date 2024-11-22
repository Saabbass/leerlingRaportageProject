@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'text-sm inline-flex items-center text-infoLightAction dark:text-infoDarkAction hover:text-changeLightActionHover dark:hover:text-changeDarkActionHover'
          : 'text-sm inline-flex items-center text-infoLightAction dark:text-infoDarkAction hover:text-changeLightActionHover dark:hover:text-changeDarkActionHover';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>