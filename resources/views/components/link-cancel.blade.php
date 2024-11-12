@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'text-changeLightAction dark:text-changeDarkAction hover:text-changeLightActionHover dark:hover:text-changeDarkActionHover'
          : 'text-changeLightAction dark:text-changeDarkAction hover:text-changeLightActionHover dark:hover:text-changeDarkActionHover';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>