<button {{ $attributes->merge(['class' => $getClasses()]) }}>
    {{ $slot }}
</button>