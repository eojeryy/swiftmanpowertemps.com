(() => {
    document.querySelectorAll('[data-table-filter]').forEach(filter => {
        const table = document.getElementById(filter.dataset.tableFilter);
        if (!table?.tBodies[0]) return;
        const input = filter.querySelector('input');
        const status = filter.querySelector('[role="status"]');
        const rows = [...table.tBodies[0].rows];
        const searchableRows = rows.map(row => ({ row, text: row.textContent.toLocaleLowerCase() }));
        filter.hidden = false;
        input.addEventListener('input', () => {
            const terms = input.value.trim().toLocaleLowerCase().split(/\s+/).filter(Boolean);
            let count = 0;
            searchableRows.forEach(({ row, text }) => {
                const matches = terms.every(term => text.includes(term));
                row.hidden = !matches;
                if (matches) count++;
            });
            status.textContent = terms.length ? `${count} of ${rows.length} records shown.${count === 0 ? ' Try a different search.' : ''}` : '';
        });
    });
})();
