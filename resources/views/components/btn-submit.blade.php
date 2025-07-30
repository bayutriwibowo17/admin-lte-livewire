<button type="submit" {{ $attributes->merge(['class' => 'btn']) }}>
    <span wire:loading wire:target="{{ $target }}" class="spinner-border spinner-border-sm"></span>
    {{ $slot }}
</button>
