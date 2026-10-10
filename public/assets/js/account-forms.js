(() => {
    const form = document.querySelector('[data-account-form]');
    if (!form) return;
    const submit = form.querySelector('[data-submit]');
    const label = form.querySelector('[data-submit-label]');
    const status = form.querySelector('[data-form-status]');
    const initialLabel = label.textContent;
    const initiallyDisabled = submit.disabled;
    const password = form.querySelector('#password');
    const confirmation = form.querySelector('#password_confirmation');
    const toggles = form.querySelectorAll('[data-password-target]');

    toggles.forEach(toggle => {
        const input = document.getElementById(toggle.dataset.passwordTarget);
        const caps = document.getElementById(`${input.id}-caps`);
        const fieldLabel = form.querySelector(`label[for="${input.id}"]`).textContent.toLowerCase();
        toggle.hidden = false;
        toggle.addEventListener('click', () => {
            const reveal = input.type === 'password';
            input.type = reveal ? 'text' : 'password';
            toggle.textContent = reveal ? 'Hide' : 'Show';
            toggle.setAttribute('aria-label', `${reveal ? 'Hide' : 'Show'} ${fieldLabel}`);
            toggle.setAttribute('aria-pressed', String(reveal));
        });
        ['keydown', 'keyup'].forEach(type => input.addEventListener(type, event => {
            if (typeof event.getModifierState === 'function') caps.hidden = !event.getModifierState('CapsLock');
        }));
        input.addEventListener('blur', () => { caps.hidden = true; });
    });

    function updateMatch() {
        if (!confirmation) return;
        const mismatched = confirmation.value && password.value !== confirmation.value;
        confirmation.setCustomValidity(mismatched ? 'Please enter the same password in both fields.' : '');
        document.getElementById('password_confirmation-help').textContent = !confirmation.value
            ? 'Enter the same password again.' : (mismatched ? 'Passwords do not match yet.' : 'Passwords match.');
    }
    password.addEventListener('input', updateMatch);
    confirmation?.addEventListener('input', updateMatch);
    form.addEventListener('submit', event => {
        updateMatch();
        if (!form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }
        submit.disabled = true;
        form.setAttribute('aria-busy', 'true');
        label.textContent = confirmation ? 'Creating account…' : 'Signing in…';
        status.textContent = 'Please wait.';
    });
    window.addEventListener('pageshow', () => {
        submit.disabled = initiallyDisabled;
        form.removeAttribute('aria-busy');
        label.textContent = initialLabel;
        status.textContent = '';
        toggles.forEach(toggle => {
            const input = document.getElementById(toggle.dataset.passwordTarget);
            input.type = 'password';
            toggle.textContent = 'Show';
            toggle.setAttribute('aria-pressed', 'false');
            toggle.setAttribute('aria-label', `Show ${form.querySelector(`label[for="${input.id}"]`).textContent.toLowerCase()}`);
            document.getElementById(`${input.id}-caps`).hidden = true;
        });
        updateMatch();
    });
    document.getElementById('account-feedback')?.focus();
})();
