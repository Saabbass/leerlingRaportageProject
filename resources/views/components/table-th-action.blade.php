<th {!! $attributes->merge([
  'scope' => 'col',
  'class' =>
      'px-4 py-2 bg-primaryLightHero dark:bg-primaryDarkHero text-left text-sm font-medium text-primaryLightText dark:text-primaryDarkText',
]) !!}>
{{ $slot }}
</th>