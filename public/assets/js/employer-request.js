/* Progressive enhancement: the normal textarea remains usable without editor support. */
(function () {
    'use strict';

    function initialize() {
        const form = document.getElementById('employer-request-form');
        if (!form) return;

        const wrapper = form.querySelector('[data-request-editor]');
        const source = form.querySelector('#field-message');
        const editor = form.querySelector('#description-editor');
        const toolbar = wrapper.querySelector('.request-editor-toolbar');
        const count = wrapper.querySelector('[data-editor-count]');
        const linkPanel = wrapper.querySelector('[data-link-panel]');
        const linkInput = wrapper.querySelector('#description-link');
        const linkError = wrapper.querySelector('#description-link-error');
        const submitButton = form.querySelector('[data-submit-request]');
        const submitError = form.querySelector('[data-submit-error]');
        const outlineStatus = form.querySelector('[data-outline-status]');
        const maxLength = 5000;
        let savedRange = null;
        let enhanced = false;

        function rememberSelection() {
            const selection = window.getSelection();
            if (selection && selection.rangeCount && editor.contains(selection.anchorNode) && editor.contains(selection.focusNode)) {
                savedRange = selection.getRangeAt(0).cloneRange();
            }
        }

        function restoreSelection() {
            editor.focus();
            const selection = window.getSelection();
            if (!selection) return;
            selection.removeAllRanges();
            if (savedRange && editor.contains(savedRange.commonAncestorContainer)) {
                selection.addRange(savedRange);
            } else {
                const range = document.createRange();
                range.selectNodeContents(editor);
                range.collapse(false);
                selection.addRange(range);
            }
        }

        // Match the server's character count, including paragraph and list breaks.
        function descriptionText() {
            if (!enhanced) return source.value.trim();
            function read(node) {
                if (node.nodeType === Node.TEXT_NODE) return node.textContent;
                if (node.nodeType !== Node.ELEMENT_NODE) return '';
                if (node.tagName === 'BR') return '\n';
                const text = Array.from(node.childNodes).map(read).join('');
                return text + (/^(P|DIV|H2|H3|LI|BLOCKQUOTE|UL|OL)$/.test(node.tagName) ? '\n' : '');
            }
            return Array.from(editor.childNodes).map(read).join('').trim();
        }

        function sync() {
            const text = descriptionText();
            if (enhanced) {
                source.value = text ? editor.innerHTML : '';
                editor.dataset.empty = String(!text);
            }
            const length = Array.from(text).length;
            count.textContent = length.toLocaleString() + ' / 5,000 characters';
            count.classList.toggle('is-over-limit', length > maxLength);
            if (enhanced) editor.setAttribute('aria-invalid', String(length > maxLength));
            if (length <= maxLength) {
                submitError.hidden = true;
            }
            return length <= maxLength;
        }

        function updateToolbar() {
            toolbar.querySelectorAll('[aria-pressed][data-command]').forEach(function (button) {
                try {
                    button.setAttribute('aria-pressed', String(document.queryCommandState(button.dataset.command)));
                } catch (_) {
                    button.setAttribute('aria-pressed', 'false');
                }
            });
        }

        function command(name, value) {
            restoreSelection();
            document.execCommand(name, false, value || null);
            rememberSelection();
            sync();
            updateToolbar();
        }

        function insertPlainText(text) {
            // Pasted Word/browser content never brings styles, images or executable markup.
            restoreSelection();
            if (!document.execCommand('insertText', false, text)) {
                const selection = window.getSelection();
                if (!selection || !selection.rangeCount) return;
                const range = selection.getRangeAt(0);
                const node = document.createTextNode(text);
                range.deleteContents();
                range.insertNode(node);
                range.setStartAfter(node);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
            }
            rememberSelection();
            sync();
        }

        if (editor && typeof document.execCommand === 'function' && typeof document.queryCommandSupported === 'function' && document.queryCommandSupported('bold')) {
            enhanced = true;
            source.hidden = true;
            source.setAttribute('aria-hidden', 'true');
            form.querySelector('#description-label').htmlFor = editor.id;
            const descriptionErrorLink = document.querySelector('a[href="#field-message"]');
            if (descriptionErrorLink) descriptionErrorLink.href = '#description-editor';
            editor.hidden = false;
            toolbar.hidden = false;
            form.querySelector('[data-outline-actions]').hidden = false;
            if (source.getAttribute('aria-invalid') === 'true') {
                editor.setAttribute('aria-describedby', 'description-help description-count field-message-error');
            }

            document.addEventListener('selectionchange', function () {
                rememberSelection();
                if (document.activeElement === editor) updateToolbar();
            });
            editor.addEventListener('compositionend', sync);
            editor.addEventListener('input', sync);
            editor.addEventListener('blur', rememberSelection);
            editor.addEventListener('paste', function (event) {
                if (!event.clipboardData) return;
                event.preventDefault();
                rememberSelection();
                insertPlainText(event.clipboardData.getData('text/plain'));
            });
            editor.addEventListener('drop', function (event) {
                event.preventDefault();
                if (event.dataTransfer) insertPlainText(event.dataTransfer.getData('text/plain'));
            });
            // Links can be edited without navigating away from an unfinished form.
            editor.addEventListener('click', function (event) {
                if (event.target.closest('a')) event.preventDefault();
            });

            toolbar.addEventListener('mousedown', function (event) {
                if (event.target.closest('button')) event.preventDefault();
            });
            toolbar.querySelectorAll('[data-command]').forEach(function (button) {
                button.addEventListener('click', function () {
                    linkPanel.hidden = true;
                    command(button.dataset.command, button.dataset.value);
                });
            });
            toolbar.querySelector('[data-editor-link]').addEventListener('click', function () {
                rememberSelection();
                const selection = window.getSelection();
                const anchorNode = selection && selection.anchorNode;
                const anchor = anchorNode && (anchorNode.nodeType === Node.ELEMENT_NODE ? anchorNode : anchorNode.parentElement).closest('a');
                if (anchor && editor.contains(anchor)) {
                    const range = document.createRange();
                    range.selectNodeContents(anchor);
                    savedRange = range;
                }
                linkInput.value = anchor && editor.contains(anchor) ? anchor.getAttribute('href') : '';
                linkError.hidden = true;
                linkPanel.hidden = false;
                linkInput.focus();
            });

            function applyLink() {
                let url;
                try {
                    url = new URL(linkInput.value.trim());
                    if (!['http:', 'https:'].includes(url.protocol)) throw new Error('Unsupported URL');
                } catch (_) {
                    linkError.hidden = false;
                    linkInput.setAttribute('aria-invalid', 'true');
                    linkInput.focus();
                    return;
                }
                linkInput.removeAttribute('aria-invalid');
                linkPanel.hidden = true;
                restoreSelection();
                if (window.getSelection().isCollapsed) {
                    const escaped = url.href.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                    command('insertHTML', '<a href="' + escaped + '">' + escaped + '</a>');
                } else {
                    command('createLink', url.href);
                }
            }
            linkPanel.querySelector('[data-link-apply]').addEventListener('click', applyLink);
            linkPanel.querySelector('[data-link-cancel]').addEventListener('click', function () {
                linkPanel.hidden = true;
                restoreSelection();
            });
            linkInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') { event.preventDefault(); applyLink(); }
                if (event.key === 'Escape') { event.preventDefault(); linkPanel.hidden = true; restoreSelection(); }
            });
            form.querySelector('[data-editor-outline]').addEventListener('click', function () {
                if (descriptionText()) {
                    outlineStatus.textContent = 'Clear the description first to start with an outline. Your existing text has been kept.';
                    editor.focus();
                    return;
                }
                editor.focus();
                savedRange = null;
                command('insertHTML', '<h3>About the role</h3><p>Describe the work and your team.</p><h3>Responsibilities</h3><ul><li>Add the main duties.</li></ul><h3>Skills and experience</h3><ul><li>Add required skills or qualifications.</li></ul><h3>Schedule and start date</h3><p>Add shift hours, assignment length and your expected start date.</p>');
                outlineStatus.textContent = 'Outline added. Replace the sample text with your role details.';
            });
        } else {
            source.addEventListener('input', sync);
        }

        const progress = form.parentElement.querySelector('[data-request-progress]');
        const requiredFields = Array.from(form.querySelectorAll('[required]'));
        function updateProgress() {
            const completed = requiredFields.filter(function (field) { return field.value.trim() && field.validity.valid; }).length;
            const percent = Math.round(completed / requiredFields.length * 100);
            progress.querySelector('progress').value = percent;
            progress.querySelector('[data-progress-label]').textContent = percent + '%';
        }
        progress.hidden = false;
        form.addEventListener('input', updateProgress);
        form.addEventListener('change', updateProgress);
        form.addEventListener('submit', function (event) {
            if (!sync()) {
                event.preventDefault();
                submitError.textContent = 'Please shorten the job description to 5,000 characters or fewer.';
                submitError.hidden = false;
                (enhanced ? editor : source).focus();
                return;
            }
            submitButton.disabled = true;
            submitButton.textContent = 'Sending your request…';
        });
        window.addEventListener('pageshow', function () {
            submitButton.disabled = false;
            submitButton.textContent = 'Send staffing request →';
            updateProgress();
            sync();
        });
        updateProgress();
        sync();

        const feedback = document.getElementById('place-job-feedback');
        if (feedback) feedback.focus();
        form.querySelectorAll('[aria-invalid="true"]').forEach(function (field) {
            field.addEventListener('input', function () {
                if (field.validity && field.validity.valid) field.removeAttribute('aria-invalid');
            });
        });
    }

    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initialize);
    else initialize();
})();
