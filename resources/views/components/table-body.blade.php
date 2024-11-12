<tbody {!! $attributes->merge([
  'class' =>
      'bg-secondaryLightHero dark:bg-secondaryDarkHero divide-y divide-primaryLightDevide dark:divide-primaryDarkDevide text-sm',
]) !!}>
{{ $slot }}
</tbody>