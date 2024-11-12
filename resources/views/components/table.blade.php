<table {!! $attributes->merge([
  'class' =>
      'min-w-full divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide mt-4',
]) !!}>
{{ $slot }}
</table>