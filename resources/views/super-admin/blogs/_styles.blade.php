<style>
    .blog-form-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1.5fr) minmax(300px, 0.85fr);
    }

    .form-panel {
        padding: 28px;
    }

    .form-side-stack {
        display: grid;
        gap: 24px;
    }

    .form-section-title {
        margin-bottom: 22px;
    }

    .form-section-title h3 {
        font-size: 24px;
        margin: 0 0 8px;
    }

    .form-section-title span {
        color: #64748b;
        display: block;
        line-height: 1.7;
    }

    .form-grid-two {
        display: grid;
        gap: 18px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .form-field + .form-field {
        margin-top: 18px;
    }

    .form-field label {
        display: block;
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .form-field input,
    .form-field select,
    .form-field textarea {
        background: #fff;
        border: 1px solid #dbe3ef;
        border-radius: 18px;
        color: #0f172a;
        font: inherit;
        padding: 14px 16px;
        width: 100%;
    }

    .form-field textarea {
        min-height: 120px;
        resize: none;
    }

    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        outline: none;
    }

    .form-actions {
        display: grid;
        gap: 12px;
    }

    .admin-btn {
        align-items: center;
        border-radius: 18px;
        display: inline-flex;
        font-size: 14px;
        font-weight: 800;
        justify-content: center;
        padding: 14px 18px;
        text-align: center;
    }

    .admin-btn-primary {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        border: 0;
        color: #fff;
        cursor: pointer;
    }

    .admin-btn-secondary {
        background: #fff7f5;
        border: 1px solid #f1ddd6;
        color: #334155;
    }

    .admin-btn-danger {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #be123c;
        cursor: pointer;
    }

    .richtext-wrap {
        border: 1px solid #dbe3ef;
        border-radius: 18px;
        overflow: hidden;
    }

    .richtext-toolbar {
        align-items: center;
        background: #fff8f5;
        border-bottom: 1px solid #f1ddd6;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px;
    }

    .richtext-toolbar button {
        align-items: center;
        background: #fff;
        border: 1px solid #ead8d1;
        border-radius: 12px;
        color: #334155;
        cursor: pointer;
        display: inline-flex;
        font: inherit;
        font-size: 13px;
        font-weight: 800;
        height: 38px;
        justify-content: center;
        min-width: 38px;
        padding: 0 12px;
    }

    .richtext-toolbar button:hover,
    .richtext-toolbar button.is-active {
        background: #fff1ed;
        border-color: #dc2626;
        color: #9f271a;
    }

    .richtext-editor {
        background: #fff;
        min-height: 150px;
        outline: none;
        padding: 16px;
    }

    .richtext-editor[data-size="sm"] {
        min-height: 120px;
    }

    .richtext-editor[data-size="lg"] {
        min-height: 260px;
    }

    .richtext-editor:empty::before {
        color: #94a3b8;
        content: attr(data-placeholder);
    }

    .richtext-editor p {
        margin: 0 0 1em;
    }

    .richtext-editor p:last-child {
        margin-bottom: 0;
    }

    .richtext-editor ul,
    .richtext-editor ol {
        margin: 0 0 1em 1.3em;
    }

    .richtext-source {
        display: none;
    }

    .field-note {
        color: #64748b;
        display: block;
        font-size: 13px;
        margin-top: 8px;
    }

    .image-preview-card {
        background: #fff8f5;
        border: 1px solid #f1ddd6;
        border-radius: 18px;
        margin-top: 14px;
        padding: 14px;
    }

    .image-preview-card span {
        color: #64748b;
        display: block;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .image-preview-card img {
        border-radius: 14px;
        display: block;
        max-height: 220px;
        object-fit: cover;
        width: 100%;
    }

    .image-preview-card.is-empty img {
        display: none;
    }

    .image-preview-empty {
        color: #94a3b8;
        font-size: 14px;
        margin: 0;
    }

    .image-preview-card:not(.is-empty) .image-preview-empty {
        display: none;
    }

    @media (max-width: 1199px) {
        .blog-form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .form-grid-two {
            grid-template-columns: 1fr;
        }

        .form-panel {
            padding: 22px;
        }
    }
</style>
