<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#4A90E2] dark:bg-[#3B5998] border border-transparent rounded-md font-semibold text-xs text-[#333333] dark:text-[#E0E0E0] uppercase tracking-widest hover:bg-[#357ABD] dark:hover:bg-[#2C3E50] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
