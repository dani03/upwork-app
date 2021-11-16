<div x-data="{ open : false }" class="my-2"
    @flash-message.window="open = true; setTimeout(() => open = false, 5000);">
    <div x-show="open" x-cloak class="border {{ $type ? $colors[$type] : '' }} px-1 py-2 rounded text-center ">
        {{ $message }}
    </div>
</div>
