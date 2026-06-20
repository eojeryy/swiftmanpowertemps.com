<style>
    .category-form-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1.3fr) minmax(280px, 0.85fr);
    }

    .category-panel {
        padding: 28px;
    }

    .category-side-stack {
        display: grid;
        gap: 24px;
    }

    .category-section-title {
        margin-bottom: 22px;
    }

    .category-section-title h3 {
        font-size: 24px;
        margin: 0 0 8px;
    }

    .category-section-title span {
        color: #64748b;
        display: block;
        line-height: 1.7;
    }

    .category-field + .category-field {
        margin-top: 18px;
    }

    .category-field label {
        display: block;
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .category-field input,
    .category-field select,
    .category-field textarea {
        background: #fff;
        border: 1px solid #dbe3ef;
        border-radius: 18px;
        color: #0f172a;
        font: inherit;
        padding: 14px 16px;
        width: 100%;
    }

    .category-field textarea {
        min-height: 170px;
        resize: none;
    }

    .category-field input:focus,
    .category-field select:focus,
    .category-field textarea:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        outline: none;
    }

    .category-actions {
        display: grid;
        gap: 12px;
    }

    .category-btn {
        align-items: center;
        border-radius: 18px;
        display: inline-flex;
        font-size: 14px;
        font-weight: 800;
        justify-content: center;
        padding: 14px 18px;
        text-align: center;
    }

    .category-btn-primary {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        border: 0;
        color: #fff;
        cursor: pointer;
    }

    .category-btn-secondary {
        background: #fff7f5;
        border: 1px solid #f1ddd6;
        color: #334155;
    }

    .category-btn-danger {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #be123c;
        cursor: pointer;
    }

    .category-list-stack {
        display: grid;
        gap: 22px;
    }

    .category-toolbar {
        align-items: center;
        display: flex;
        gap: 16px;
        justify-content: space-between;
    }

    .category-toolbar p {
        color: #64748b;
        margin: 6px 0 0;
    }

    .category-toolbar .category-btn {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        color: #fff;
    }

    .category-table-wrap {
        overflow-x: auto;
    }

    .category-table {
        border-collapse: separate;
        border-spacing: 0 14px;
        min-width: 860px;
        width: 100%;
    }

    .category-table thead th {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        padding: 0 18px 6px;
        text-align: left;
        text-transform: uppercase;
    }

    .category-table tbody td {
        background: #fff;
        border-bottom: 1px solid #eef2f7;
        border-top: 1px solid #eef2f7;
        padding: 18px;
        vertical-align: top;
    }

    .category-table tbody td:first-child {
        border-left: 1px solid #eef2f7;
        border-radius: 20px 0 0 20px;
    }

    .category-table tbody td:last-child {
        border-radius: 0 20px 20px 0;
        border-right: 1px solid #eef2f7;
    }

    .category-title-cell strong {
        display: block;
        font-size: 17px;
        margin-bottom: 8px;
    }

    .category-title-cell span,
    .category-meta,
    .category-empty p,
    .category-view-card p,
    .category-meta-list li span {
        color: #64748b;
    }

    .category-status {
        border-radius: 999px;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .category-status.active {
        background: #ecfdf3;
        color: #166534;
    }

    .category-status.inactive {
        background: #fff7ed;
        color: #9a3412;
    }

    .category-actions-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .category-actions-row a,
    .category-actions-row button {
        align-items: center;
        background: #fff8f5;
        border: 1px solid #f1ddd6;
        border-radius: 14px;
        color: #334155;
        cursor: pointer;
        display: inline-flex;
        font: inherit;
        font-size: 13px;
        font-weight: 800;
        justify-content: center;
        padding: 10px 12px;
    }

    .category-actions-row button {
        background: #fff1f2;
        border-color: #fecdd3;
        color: #be123c;
    }

    .category-empty {
        padding: 34px;
        text-align: center;
    }

    .category-empty h3 {
        margin-bottom: 10px;
    }

    .category-view-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1.3fr) minmax(280px, 0.8fr);
    }

    .category-view-card {
        padding: 28px;
    }

    .category-view-card h3 {
        font-size: 28px;
        line-height: 1.2;
        margin: 0 0 12px;
    }

    .category-chip {
        background: #fff4ef;
        border-radius: 999px;
        color: #9f271a;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 16px;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .category-description {
        background: #fcfcfd;
        border: 1px solid #eef2f7;
        border-radius: 24px;
        line-height: 1.8;
        min-height: 180px;
        padding: 22px;
        white-space: pre-wrap;
    }

    .category-meta-list {
        display: grid;
        gap: 14px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .category-meta-list li {
        background: #fff8f5;
        border-radius: 18px;
        padding: 16px 18px;
    }

    .category-meta-list li strong {
        display: block;
        font-size: 13px;
        letter-spacing: 0.12em;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .category-view-actions {
        display: grid;
        gap: 12px;
        margin-top: 24px;
    }

    @media (max-width: 1199px) {
        .category-form-grid,
        .category-view-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .category-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .category-panel,
        .category-view-card {
            padding: 22px;
        }
    }
</style>
