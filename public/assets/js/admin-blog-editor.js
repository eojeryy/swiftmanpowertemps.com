(() => {
    const wrappers = [...document.querySelectorAll('[data-richtext]')];
    if (!wrappers.length) return;
    const escapeHtml = value => {
        const node = document.createElement('div');
        node.textContent = value;
        return node.innerHTML;
    };
    function sync(wrapper) {
        const editor = wrapper.querySelector('.richtext-editor');
        wrapper.querySelector('.richtext-source').value = editor.textContent.trim() ? editor.innerHTML.trim() : '';
    }
    function toolbarState(wrapper) {
        wrapper.querySelectorAll('[data-command]').forEach(button => {
            let active = false;
            try { active = document.queryCommandState(button.dataset.command); } catch (_) { /* Command is not supported. */ }
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-pressed', String(active));
        });
    }
    wrappers.forEach(wrapper => {
        const source = wrapper.querySelector('.richtext-source');
        const editor = wrapper.querySelector('.richtext-editor');
        const label = document.querySelector(`label[for="${source.id}"]`);
        editor.innerHTML = !source.value ? '' : /<[a-z][\s\S]*>/i.test(source.value) ? source.value : source.value.split(/\n{2,}/).map(p => `<p>${escapeHtml(p).replace(/\n/g, '<br>')}</p>`).join('');
        editor.setAttribute('aria-invalid', source.getAttribute('aria-invalid') || 'false');
        if (source.hasAttribute('aria-describedby')) editor.setAttribute('aria-describedby', source.getAttribute('aria-describedby'));
        source.dataset.wasRequired = String(source.required);
        source.required = false;
        label?.setAttribute('for', editor.id);
        label?.addEventListener('click', () => editor.focus());
        wrapper.classList.add('is-enhanced');
        editor.addEventListener('input', () => { sync(wrapper); toolbarState(wrapper); editor.setAttribute('aria-invalid', 'false'); });
        ['keyup', 'mouseup'].forEach(event => editor.addEventListener(event, () => toolbarState(wrapper)));
        // Keep pasted content readable and avoid importing styles from other sites.
        editor.addEventListener('paste', event => {
            if (!event.clipboardData) return;
            event.preventDefault();
            document.execCommand('insertText', false, event.clipboardData.getData('text/plain'));
            sync(wrapper);
        });
        wrapper.querySelectorAll('[data-command], [data-richtext-link]').forEach(button => {
            button.addEventListener('mousedown', event => event.preventDefault());
            button.addEventListener('click', () => {
                editor.focus();
                if (button.hasAttribute('data-richtext-link')) {
                    const value = window.prompt('Enter a full link URL (https://…)');
                    if (value === null || !value.trim()) return;
                    try {
                        const url = new URL(value.trim());
                        if (!['https:', 'http:', 'mailto:', 'tel:'].includes(url.protocol)) throw new Error('Unsupported link');
                        document.execCommand('createLink', false, url.href);
                    } catch (_) {
                        window.alert('Please enter a valid https, http, email, or phone link.');
                        return;
                    }
                } else {
                    document.execCommand(button.dataset.command, false, button.dataset.commandValue);
                }
                sync(wrapper);
                toolbarState(wrapper);
            });
        });
    });
    const form = wrappers[0].closest('form');
    let feedback = null;
    form?.addEventListener('submit', event => {
        let invalid = null;
        wrappers.forEach(wrapper => {
            sync(wrapper);
            const source = wrapper.querySelector('.richtext-source');
            const editor = wrapper.querySelector('.richtext-editor');
            const empty = source.dataset.wasRequired === 'true' && !source.value;
            editor.setAttribute('aria-invalid', String(empty));
            if (empty && !invalid) invalid = editor;
        });
        if (invalid) {
            event.preventDefault();
            if (!feedback) {
                feedback = document.createElement('p');
                feedback.className = 'workspace-field-error';
                feedback.setAttribute('role', 'alert');
                form.querySelector('.form-actions').before(feedback);
            }
            feedback.textContent = 'Please enter both a short excerpt and the full post content.';
            invalid.focus();
        } else {
            feedback?.remove();
            feedback = null;
        }
    });
    const imageInput = document.getElementById('image');
    const preview = document.querySelector('[data-image-preview]');
    const previewWrapper = document.querySelector('[data-image-preview-wrapper]');
    const originalImage = preview?.getAttribute('src');
    let objectUrl = null;
    imageInput?.addEventListener('change', () => {
        if (!preview || !previewWrapper) return;
        if (objectUrl) URL.revokeObjectURL(objectUrl);
        const file = imageInput.files[0];
        objectUrl = file ? URL.createObjectURL(file) : null;
        preview.src = objectUrl || originalImage || '';
        preview.hidden = !file && !originalImage;
        previewWrapper.classList.toggle('is-empty', preview.hidden);
        document.querySelector('[data-image-preview-label]').textContent = file ? 'Selected picture preview' : 'Current picture';
    });
    window.addEventListener('pagehide', () => { if (objectUrl) URL.revokeObjectURL(objectUrl); });
})();
