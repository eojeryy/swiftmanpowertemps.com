<style>
    .request-stack {
        display: grid;
        gap: 22px;
    }

    .request-toolbar {
        align-items: center;
        display: flex;
        gap: 16px;
        justify-content: space-between;
    }

    .request-toolbar p,
    .request-summary-text,
    .request-meta-list li span,
    .request-notes,
    .request-table td small {
        color: #64748b;
    }

    .request-toolbar p {
        margin: 6px 0 0;
    }

    .request-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .request-badge {
        background: #fff8f5;
        border: 1px solid #f1ddd6;
        border-radius: 999px;
        color: #334155;
        display: inline-flex;
        font-size: 13px;
        font-weight: 800;
        padding: 10px 14px;
    }

    .request-table-wrap {
        overflow-x: auto;
    }

    .request-table {
        border-collapse: separate;
        border-spacing: 0 14px;
        min-width: 1020px;
        width: 100%;
    }

    .request-table thead th {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        padding: 0 18px 6px;
        text-align: left;
        text-transform: uppercase;
    }

    .request-table tbody td {
        background: #fff;
        border-bottom: 1px solid #eef2f7;
        border-top: 1px solid #eef2f7;
        padding: 18px;
        vertical-align: top;
    }

    .request-table tbody td:first-child {
        border-left: 1px solid #eef2f7;
        border-radius: 20px 0 0 20px;
    }

    .request-table tbody td:last-child {
        border-radius: 0 20px 20px 0;
        border-right: 1px solid #eef2f7;
    }

    .request-title-cell strong,
    .request-meta-list li strong,
    .request-panel h3,
    .request-summary-card h3 {
        display: block;
        margin-bottom: 8px;
    }

    .request-title-cell strong {
        font-size: 17px;
    }

    .request-status {
        border-radius: 999px;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .request-status.new {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .request-status.approved {
        background: #ecfdf3;
        color: #166534;
    }

    .request-status.reviewed {
        background: #fff7ed;
        color: #9a3412;
    }

    .request-actions-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .request-actions-row a,
    .request-actions-row button,
    .request-btn {
        align-items: center;
        border-radius: 16px;
        cursor: pointer;
        display: inline-flex;
        font: inherit;
        font-size: 14px;
        font-weight: 800;
        justify-content: center;
        padding: 12px 16px;
        text-align: center;
    }

    .request-btn-primary {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        border: 0;
        color: #fff;
    }

    .request-btn-secondary {
        background: #fff8f5;
        border: 1px solid #f1ddd6;
        color: #334155;
    }

    .request-empty {
        padding: 36px;
        text-align: center;
    }

    .request-view-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1.3fr) minmax(300px, 0.85fr);
    }

    .request-panel,
    .request-summary-card {
        padding: 28px;
    }

    .request-summary-card {
        background: linear-gradient(180deg, #fff, #fff8f7);
    }

    .request-chip-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 18px;
    }

    .request-chip {
        background: #fff4ef;
        border-radius: 999px;
        color: #9f271a;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .request-summary {
        background: #fcfcfd;
        border: 1px solid #eef2f7;
        border-radius: 24px;
        line-height: 1.8;
        min-height: 180px;
        padding: 22px;
        white-space: pre-wrap;
    }

    .request-detail-grid {
        display: grid;
        gap: 18px;
    }

    .request-meta-list {
        display: grid;
        gap: 14px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .request-meta-list li {
        background: #fff8f5;
        border-radius: 18px;
        padding: 16px 18px;
    }

    .request-meta-list li strong {
        font-size: 13px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .request-note-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 18px;
    }

    .request-action-stack {
        display: grid;
        gap: 12px;
        margin-top: 22px;
    }

    .request-action-stack form {
        margin: 0;
    }

    @media (max-width: 1199px) {
        .request-view-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .request-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .request-panel,
        .request-summary-card {
            padding: 22px;
        }
    }
</style>
