<th wire:click="doSort('{{ $column }}')" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
    <div class="d-flex justify-content-between align-items-center">
        <span>{{ $label }}</span>
        @if ($sortColumn === $column)
            <span>
                @if ($sortDirection === 'ASC')
                    <i class="fas fa-arrow-up text-primary"></i>
                @else
                    <i class="fas fa-arrow-down text-primary"></i>
                @endif
            </span>
        @endif
    </div>
</th>
