<div class="workspace-filter" data-table-filter="{{ $tableId }}" hidden>
    <label for="{{ $tableId }}-search">Search {{ $label }}</label>
    <input id="{{ $tableId }}-search" type="search" placeholder="Type to filter this list…" autocomplete="off" aria-controls="{{ $tableId }}">
    <p class="workspace-filter-status" role="status" aria-live="polite"></p>
</div>
