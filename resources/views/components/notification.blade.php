<div x-data="{ show: false, message: '', type: '' }" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-4"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-4"
     @notify.window="show = true; message = $event.detail.message; type = $event.detail.type; setTimeout(() => show = false, 3000)"
     class="fixed p-4 text-gray-800 bg-white rounded-lg shadow-lg bottom-4 right-4 dark:bg-gray-800 dark:text-gray-200"
     :class="{
        'bg-green-500 text-white': type === 'success',
        'bg-red-500 text-white': type === 'error',
        'bg-yellow-500 text-white': type === 'warning',
        'bg-blue-500 text-white': type === 'info'
     }">
    <p x-text="message"></p>
</div>