<button
  {{ $attributes->merge(['type' => 'submit', 'class' => 'text-sm inline-flex items-center text-deleteLightAction dark:text-deleteDarkAction hover:text-deleteLightActionHover dark:hover:text-deleteDarkActionHover']) }}>
  {{ $slot }}
</button>