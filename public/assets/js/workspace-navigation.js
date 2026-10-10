(() => {
    const body = document.body;
    const sidebar = document.getElementById('admin-sidebar');
    const toggle = document.querySelector('[data-admin-sidebar-toggle]');
    const main = document.querySelector('.admin-main');
    const mobile = window.matchMedia('(max-width: 1024px)');
    if (!sidebar || !toggle) return;
    const focusable = () => [...sidebar.querySelectorAll('a[href], button, input, select, textarea, [tabindex="0"]')]
        .filter(element => !element.disabled && element.getClientRects().length);
    function close(restoreFocus = true) {
        const wasOpen = body.classList.contains('admin-sidebar-open');
        body.classList.remove('admin-sidebar-open');
        main.inert = false;
        sidebar.removeAttribute('role');
        sidebar.removeAttribute('aria-modal');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation');
        if (wasOpen && restoreFocus) toggle.focus();
    }
    toggle.addEventListener('click', () => {
        if (!mobile.matches) return;
        if (body.classList.contains('admin-sidebar-open')) return close();
        body.classList.add('admin-sidebar-open');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Close navigation');
        sidebar.setAttribute('role', 'dialog');
        sidebar.setAttribute('aria-modal', 'true');
        main.inert = true;
        focusable()[0]?.focus();
    });
    document.querySelectorAll('[data-admin-sidebar-close]').forEach(element => element.addEventListener('click', () => close()));
    document.addEventListener('keydown', event => {
        if (!body.classList.contains('admin-sidebar-open')) return;
        if (event.key === 'Escape') { event.preventDefault(); close(); }
        if (event.key !== 'Tab') return;
        const items = focusable();
        const first = items[0];
        const last = items[items.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last?.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first?.focus(); }
    });
    document.querySelectorAll('[data-admin-nav-toggle]').forEach(button => button.addEventListener('click', () => {
        const open = button.closest('[data-admin-nav-group]').classList.toggle('open');
        button.setAttribute('aria-expanded', String(open));
    }));
    mobile.addEventListener('change', () => { if (!mobile.matches) close(false); });
    const updateHeader = () => body.classList.toggle('admin-scrolled', window.scrollY > 12);
    window.addEventListener('scroll', updateHeader, { passive: true });
    window.addEventListener('pageshow', () => { close(false); updateHeader(); });
    updateHeader();
})();
