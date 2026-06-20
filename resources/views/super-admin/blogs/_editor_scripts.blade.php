<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editors = document.querySelectorAll('[data-richtext]');

        function normalizeInitialHtml(value) {
            if (! value) {
                return '';
            }

            if (/<[a-z][\s\S]*>/i.test(value)) {
                return value;
            }

            return value
                .split(/\n{2,}/)
                .map(function (paragraph) {
                    return '<p>' + paragraph.replace(/\n/g, '<br>') + '</p>';
                })
                .join('');
        }

        function syncEditor(wrapper) {
            var textarea = wrapper.querySelector('.richtext-source');
            var editor = wrapper.querySelector('.richtext-editor');

            textarea.value = editor.innerHTML.trim();
        }

        function updateToolbarState(wrapper) {
            var buttons = wrapper.querySelectorAll('[data-command]');

            buttons.forEach(function (button) {
                var command = button.getAttribute('data-command');
                var isActive = false;

                try {
                    isActive = document.queryCommandState(command);
                } catch (error) {
                    isActive = false;
                }

                button.classList.toggle('is-active', isActive);
            });
        }

        editors.forEach(function (wrapper) {
            var textarea = wrapper.querySelector('.richtext-source');
            var editor = wrapper.querySelector('.richtext-editor');
            var toolbarButtons = wrapper.querySelectorAll('[data-command], [data-richtext-link]');

            editor.innerHTML = normalizeInitialHtml(textarea.value);

            if (! editor.innerHTML.trim()) {
                editor.innerHTML = '<p><br></p>';
            }

            editor.addEventListener('input', function () {
                syncEditor(wrapper);
                updateToolbarState(wrapper);
            });

            editor.addEventListener('keyup', function () {
                updateToolbarState(wrapper);
            });

            editor.addEventListener('mouseup', function () {
                updateToolbarState(wrapper);
            });

            toolbarButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    editor.focus();

                    if (button.hasAttribute('data-richtext-link')) {
                        var url = window.prompt('Enter the link URL');

                        if (url) {
                            document.execCommand('createLink', false, url);
                        }
                    } else {
                        document.execCommand(
                            button.getAttribute('data-command'),
                            false,
                            button.getAttribute('data-command-value')
                        );
                    }

                    syncEditor(wrapper);
                    updateToolbarState(wrapper);
                });
            });
        });

        document.querySelectorAll('form').forEach(function (form) {
            form.addEventListener('submit', function () {
                editors.forEach(syncEditor);
            });
        });

        var imageInput = document.getElementById('image');
        var imagePreviewWrapper = document.querySelector('[data-image-preview-wrapper]');
        var imagePreview = document.querySelector('[data-image-preview]');
        var imagePreviewLabel = document.querySelector('[data-image-preview-label]');
        var imagePreviewEmpty = document.querySelector('[data-image-preview-empty]');

        if (imageInput && imagePreviewWrapper && imagePreview) {
            imageInput.addEventListener('change', function (event) {
                var file = event.target.files && event.target.files[0];

                if (! file) {
                    return;
                }

                var objectUrl = URL.createObjectURL(file);

                imagePreview.src = objectUrl;
                imagePreview.hidden = false;
                imagePreviewWrapper.classList.remove('is-empty');
                imagePreviewLabel.textContent = 'Selected picture preview';

                if (imagePreviewEmpty) {
                    imagePreviewEmpty.style.display = 'none';
                }
            });
        }
    });
</script>
