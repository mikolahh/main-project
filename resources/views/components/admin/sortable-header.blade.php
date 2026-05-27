<th class="admin-table__th">
    <button
        wire:click="sortBy('{{ $field }}')"
        class="admin-table__sort"
        type="button"
        >
        <span>
            {{ $slot }}
        </span>
        @if($isActive())
            <span class="admin-table__sort-icon">
                {{ $isAsc() ? '↑' : '↓' }}
            </span>
        @endif
    </button>
</th>