<td {!! $attributes->merge([
  'colspan' => '6',
  'class' =>
      'px-4 py-2 text-center text-sm text-secondaryLightText dark:text-primaryDarkText',
]) !!}>
{{ $slot }}
</td>