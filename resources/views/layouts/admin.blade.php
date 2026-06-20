<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin | Swift Manpower Temps Agency Ltd')</title>
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --admin-bg: #f5f7fb;
            --admin-surface: #ffffff;
            --admin-sidebar: #0f172a;
            --admin-sidebar-soft: rgba(255, 255, 255, 0.08);
            --admin-text: #0f172a;
            --admin-muted: #64748b;
            --admin-accent: #c53030;
            --admin-accent-soft: #fff1f0;
            --admin-border: #e2e8f0;
            --admin-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: radial-gradient(circle at top left, #fff5f5, transparent 35%), var(--admin-bg);
            color: var(--admin-text);
            font-family: "Manrope", sans-serif;
            margin: 0;
        }

        body.admin-scrolled .admin-topbar-shell {
            box-shadow: 0 20px 42px rgba(15, 23, 42, 0.14);
        }

        body.admin-sidebar-open {
            overflow: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .admin-shell {
            display: grid;
            grid-template-columns: 290px 1fr;
            min-height: 100vh;
        }

        .admin-sidebar {
            background: linear-gradient(180deg, #111827 0%, #0f172a 100%);
            color: #fff;
            padding: 34px 24px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .admin-sidebar-overlay {
            background: rgba(15, 23, 42, 0.52);
            inset: 0;
            opacity: 0;
            pointer-events: none;
            position: fixed;
            transition: opacity 0.25s ease;
            z-index: 45;
        }

        .admin-brand {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 28px;
            padding-bottom: 24px;
        }

        .admin-sidebar-head {
            align-items: flex-start;
            display: flex;
            gap: 16px;
            justify-content: space-between;
        }

        .admin-brand span {
            color: #fca5a5;
            display: block;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.16em;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .admin-brand h1 {
            font-size: 28px;
            line-height: 1.1;
            margin: 0 0 10px;
        }

        .admin-brand p,
        .admin-nav-note,
        .admin-user small {
            color: rgba(255, 255, 255, 0.72);
        }

        .admin-brand p {
            margin: 0;
        }

        .admin-sidebar-close {
            align-items: center;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            color: #fff;
            cursor: pointer;
            display: none;
            font: inherit;
            font-size: 18px;
            height: 44px;
            justify-content: center;
            margin-top: 2px;
            width: 44px;
        }

        .admin-nav {
            display: grid;
            gap: 10px;
            margin-bottom: 24px;
        }

        .admin-nav-group {
            display: grid;
            gap: 10px;
        }

        .admin-nav a,
        .admin-nav button {
            align-items: center;
            background: transparent;
            border: 0;
            border-radius: 18px;
            color: #fff;
            cursor: pointer;
            display: flex;
            font: inherit;
            gap: 12px;
            justify-content: space-between;
            padding: 14px 16px;
            text-align: left;
            width: 100%;
        }

        .admin-nav-label {
            flex: 1 1 auto;
        }

        .admin-nav a:hover,
        .admin-nav button:hover,
        .admin-nav a.active {
            background: var(--admin-sidebar-soft);
        }

        .admin-nav button.active {
            background: var(--admin-sidebar-soft);
        }

        .admin-subnav {
            display: grid;
            gap: 8px;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            padding-left: 14px;
            transition: max-height 0.28s ease, opacity 0.2s ease, margin-top 0.2s ease;
        }

        .admin-nav-group.open .admin-subnav {
            margin-top: 4px;
            max-height: 200px;
            opacity: 1;
        }

        .admin-subnav a {
            background: rgba(255, 255, 255, 0.04);
            border-radius: 15px;
            color: rgba(255, 255, 255, 0.88);
            font-size: 14px;
            justify-content: flex-start;
            padding: 12px 14px;
        }

        .admin-subnav a.active,
        .admin-subnav a:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        .admin-nav-chevron {
            color: rgba(255, 255, 255, 0.75);
            font-size: 12px;
            margin-left: auto;
            transition: transform 0.2s ease;
        }

        .admin-nav-group.open .admin-nav-chevron {
            transform: rotate(180deg);
        }

        .nav-badge {
            background: rgba(255, 255, 255, 0.14);
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            padding: 6px 10px;
            text-transform: uppercase;
        }

        .admin-sidebar-footer {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 22px;
            margin-top: 28px;
            padding: 18px;
        }

        .admin-sidebar-footer h3 {
            font-size: 16px;
            margin: 0 0 8px;
        }

        .admin-sidebar-footer p {
            color: rgba(255, 255, 255, 0.75);
            font-size: 14px;
            margin: 0 0 14px;
        }

        .admin-sidebar-footer a {
            color: #fecaca;
            font-size: 14px;
            font-weight: 700;
        }

        .admin-main {
            min-width: 0;
            padding: 28px;
        }

        .admin-topbar-shell {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 0 0 0 28px;
            left: 290px;
            position: fixed;
            right: 0;
            top: 0;
            transition: box-shadow 0.25s ease, transform 0.25s ease, background 0.25s ease;
            z-index: 40;
        }

        .admin-topbar {
            align-items: center;
            display: flex;
            gap: 18px;
            justify-content: space-between;
            min-height: 88px;
            padding: 14px 20px;
        }

        .admin-topbar h2 {
            font-size: 24px;
            line-height: 1.15;
            margin: 0;
        }

        .admin-topbar p {
            color: var(--admin-muted);
            margin: 0;
            display: none;
        }

        .admin-topbar-copy {
            min-width: 0;
        }

        .admin-topbar-label {
            align-items: center;
            color: var(--admin-accent);
            display: inline-flex;
            font-size: 12px;
            font-weight: 800;
            gap: 8px;
            letter-spacing: 0.14em;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .admin-topbar-label::before {
            background: linear-gradient(135deg, #ef4444, #7f1d1d);
            border-radius: 999px;
            content: "";
            display: inline-block;
            height: 10px;
            width: 10px;
        }

        .admin-topbar-tools {
            align-items: center;
            display: flex;
            flex-shrink: 0;
            gap: 10px;
        }

        .admin-mobile-toggle {
            align-items: center;
            background: #fff4ef;
            border: 1px solid #f1ddd6;
            border-radius: 16px;
            color: #0f172a;
            cursor: pointer;
            display: none;
            font: inherit;
            font-size: 12px;
            font-weight: 800;
            gap: 10px;
            padding: 10px 12px;
        }

        .admin-mobile-toggle i {
            color: var(--admin-accent);
        }

        .admin-quick-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .admin-quick-links a {
            align-items: center;
            background: #fff8f5;
            border: 1px solid #f1ddd6;
            border-radius: 16px;
            color: #334155;
            display: inline-flex;
            font-size: 12px;
            font-weight: 800;
            gap: 8px;
            padding: 10px 12px;
            transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease;
        }

        .admin-quick-links a:hover {
            background: #fff1ed;
            border-color: #ef4444;
            transform: translateY(-2px);
        }

        .admin-quick-links a i {
            color: var(--admin-accent);
        }

        .admin-user {
            align-items: center;
            background: linear-gradient(180deg, #ffffff, #fff7f5);
            border: 1px solid var(--admin-border);
            border-radius: 18px;
            box-shadow: var(--admin-shadow);
            display: flex;
            gap: 14px;
            padding: 10px 12px;
        }

        .admin-user strong {
            display: block;
            font-size: 14px;
            line-height: 1.2;
        }

        .admin-user small {
            color: var(--admin-muted);
            font-size: 12px;
        }

        .admin-avatar {
            align-items: center;
            background: linear-gradient(135deg, #ef4444, #7f1d1d);
            border-radius: 14px;
            color: #fff;
            display: inline-flex;
            font-size: 15px;
            font-weight: 800;
            height: 40px;
            justify-content: center;
            width: 40px;
        }

        .admin-content {
            min-width: 0;
            padding-top: 108px;
        }

        .flash-status,
        .flash-errors {
            border-radius: 20px;
            margin-bottom: 24px;
            padding: 16px 18px;
        }

        .flash-status {
            background: #ecfdf3;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .flash-errors {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #9f1239;
        }

        .flash-errors ul {
            margin: 0;
            padding-left: 18px;
        }

        .admin-card {
            background: var(--admin-surface);
            border: 1px solid var(--admin-border);
            border-radius: 28px;
            box-shadow: var(--admin-shadow);
            padding: 24px;
        }

        @media (max-width: 1024px) {
            .admin-shell {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                height: 100vh;
                left: 0;
                max-width: 320px;
                position: fixed;
                top: 0;
                transform: translateX(-100%);
                transition: transform 0.28s ease;
                width: calc(100vw - 54px);
                z-index: 60;
            }

            body.admin-sidebar-open .admin-sidebar {
                transform: translateX(0);
            }

            body.admin-sidebar-open .admin-sidebar-overlay {
                opacity: 1;
                pointer-events: auto;
            }

            .admin-topbar-shell {
                border-radius: 0 0 24px 24px;
                box-shadow: 0 14px 30px rgba(15, 23, 42, 0.12);
                left: 0;
                right: 0;
                top: 0;
            }

            .admin-sidebar-close {
                display: inline-flex;
            }

            .admin-mobile-toggle {
                display: inline-flex;
            }

            .admin-topbar p {
                display: block;
                margin-top: 8px;
            }

            .admin-user {
                max-width: 100%;
            }

            .admin-user > div:last-child {
                min-width: 0;
            }

            .admin-user strong,
            .admin-user small {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }

        @media (max-width: 767px) {
            .admin-main {
                padding: 14px;
            }

            .admin-topbar-shell {
                border-radius: 0 0 20px 20px;
                box-shadow: 0 16px 34px rgba(15, 23, 42, 0.14);
                left: 0;
                right: 0;
                top: 0;
            }

            .admin-topbar {
                align-items: flex-start;
                flex-direction: column;
                min-height: 0;
                padding: 14px;
            }

            .admin-topbar h2 {
                font-size: 22px;
            }

            .admin-topbar-copy,
            .admin-topbar-tools {
                width: 100%;
            }

            .admin-topbar-tools,
            .admin-quick-links {
                align-items: stretch;
                flex-direction: column;
                width: 100%;
            }

            .admin-quick-links a,
            .admin-user {
                width: 100%;
            }

            .admin-mobile-toggle {
                justify-content: center;
                width: 100%;
            }

            .admin-content {
                padding-top: 210px;
            }
        }

        @media (max-width: 520px) {
            .admin-brand h1 {
                font-size: 24px;
            }

            .admin-sidebar {
                padding: 24px 18px;
                width: calc(100vw - 28px);
            }

            .admin-card {
                border-radius: 22px;
                padding: 18px;
            }

            .flash-status,
            .flash-errors {
                border-radius: 16px;
                padding: 14px 15px;
            }

            .admin-content {
                padding-top: 230px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="admin-sidebar-overlay" data-admin-sidebar-close></div>
    <div class="admin-shell">
        <aside class="admin-sidebar" id="admin-sidebar">
            <div class="admin-brand">
                <div class="admin-sidebar-head">
                    <div>
                        <span>Super Admin</span>
                        <h1>Swift Manpower Admin</h1>
                        <p>Manage the staffing website from one clean control panel.</p>
                    </div>
                    <button class="admin-sidebar-close" type="button" data-admin-sidebar-close aria-label="Close menu">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('super-admin.dashboard') }}" class="{{ request()->routeIs('super-admin.dashboard') ? 'active' : '' }}">
                    <span>Dashboard</span>
                    <span class="nav-badge">Home</span>
                </a>
                <a href="{{ route('super-admin.sign-up') }}">
                    <span>Create Admin</span>
                    <span class="nav-badge">New</span>
                </a>
                <div class="admin-nav-group {{ request()->routeIs('super-admin.blogs.*') ? 'open' : '' }}" data-admin-nav-group>
                    <button
                        type="button"
                        class="{{ request()->routeIs('super-admin.blogs.*') ? 'active' : '' }}"
                        data-admin-nav-toggle
                        aria-expanded="{{ request()->routeIs('super-admin.blogs.*') ? 'true' : 'false' }}"
                    >
                        <span class="admin-nav-label">Blog</span>
                        <span class="admin-nav-chevron"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="admin-subnav">
                        <a href="{{ route('super-admin.blogs.create') }}" class="{{ request()->routeIs('super-admin.blogs.create') ? 'active' : '' }}">Post Blog</a>
                        <a href="{{ route('super-admin.blogs.index') }}" class="{{ request()->routeIs('super-admin.blogs.index', 'super-admin.blogs.edit', 'super-admin.blogs.show') ? 'active' : '' }}">List Blog</a>
                    </div>
                </div>
                <div class="admin-nav-group {{ request()->routeIs('super-admin.blog-categories.*') ? 'open' : '' }}" data-admin-nav-group>
                    <button
                        type="button"
                        class="{{ request()->routeIs('super-admin.blog-categories.*') ? 'active' : '' }}"
                        data-admin-nav-toggle
                        aria-expanded="{{ request()->routeIs('super-admin.blog-categories.*') ? 'true' : 'false' }}"
                    >
                        <span class="admin-nav-label">Category</span>
                        <span class="admin-nav-chevron"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="admin-subnav">
                        <a href="{{ route('super-admin.blog-categories.create') }}" class="{{ request()->routeIs('super-admin.blog-categories.create') ? 'active' : '' }}">Add Category</a>
                        <a href="{{ route('super-admin.blog-categories.index') }}" class="{{ request()->routeIs('super-admin.blog-categories.index', 'super-admin.blog-categories.edit', 'super-admin.blog-categories.show') ? 'active' : '' }}">List Category</a>
                    </div>
                </div>
                <a href="{{ route('super-admin.job-requests.index') }}" class="{{ request()->routeIs('super-admin.job-requests.*') ? 'active' : '' }}">
                    <span>Job Requests</span>
                    <span class="nav-badge">Queue</span>
                </a>
                <a href="{{ route('super-admin.applicants.index') }}" class="{{ request()->routeIs('super-admin.applicants.*') ? 'active' : '' }}">
                    <span>Applicants</span>
                    <span class="nav-badge">Review</span>
                </a>
                <a href="{{ route('super-admin.job-openings.index') }}" class="{{ request()->routeIs('super-admin.job-openings.*') ? 'active' : '' }}">
                    <span>Job Openings</span>
                    <span class="nav-badge">Admin</span>
                </a>
                <a href="{{ route('job.openings') }}">
                    <span>Public Jobs</span>
                    <span class="nav-badge">Live</span>
                </a>
                <a href="{{ route('contact') }}">
                    <span>Contact Page</span>
                    <span class="nav-badge">Live</span>
                </a>
                <a href="{{ route('home') }}">
                    <span>Website Home</span>
                    <span class="nav-badge">Site</span>
                </a>
                <form method="post" action="{{ route('super-admin.logout') }}">
                    @csrf
                    <button type="submit">
                        <span>Sign Out</span>
                        <span class="nav-badge">Exit</span>
                    </button>
                </form>
            </nav>

            <div class="admin-sidebar-footer">
                <h3>Need a quick check?</h3>
                <p>Review current openings, contact details, and live site pages directly from the dashboard menu.</p>
                <a href="{{ route('about.company') }}">Open company profile</a>
            </div>
        </aside>

        <main class="admin-main">
            <div class="admin-topbar-shell">
                <div class="admin-topbar">
                    <div class="admin-topbar-copy">
                        <span class="admin-topbar-label">Control Center</span>
                        <h2>@yield('page_title', 'Admin Dashboard')</h2>
                        <p>@yield('page_intro', 'Secure access for Swift Manpower Temps Agency Ltd super admins.')</p>
                    </div>

                    <div class="admin-topbar-tools">
                        <button class="admin-mobile-toggle" type="button" data-admin-sidebar-toggle aria-controls="admin-sidebar" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </button>

                        <div class="admin-quick-links">
                            <a href="{{ route('home') }}"><i class="fas fa-globe"></i><span>Site</span></a>
                            <a href="{{ route('job.openings') }}"><i class="fas fa-briefcase"></i><span>Jobs</span></a>
                        </div>

                        @auth
                            <div class="admin-user">
                                <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                                <div>
                                    <strong>{{ auth()->user()->name }}</strong>
                                    <small>{{ auth()->user()->email }}</small>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            <div class="admin-content">
                @if (session('status'))
                    <div class="flash-status">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="flash-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var body = document.body;
            var sidebarToggle = document.querySelector('[data-admin-sidebar-toggle]');
            var sidebarCloseTargets = document.querySelectorAll('[data-admin-sidebar-close]');
            var navGroupToggles = document.querySelectorAll('[data-admin-nav-toggle]');
            var mediaQuery = window.matchMedia('(max-width: 1024px)');

            var updateAdminHeaderState = function () {
                body.classList.toggle('admin-scrolled', window.scrollY > 12);
            };

            var closeSidebar = function () {
                body.classList.remove('admin-sidebar-open');

                if (sidebarToggle) {
                    sidebarToggle.setAttribute('aria-expanded', 'false');
                }
            };

            var toggleSidebar = function () {
                if (! mediaQuery.matches) {
                    return;
                }

                var isOpen = body.classList.toggle('admin-sidebar-open');

                if (sidebarToggle) {
                    sidebarToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                }
            };

            updateAdminHeaderState();
            window.addEventListener('scroll', updateAdminHeaderState, { passive: true });

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }

            sidebarCloseTargets.forEach(function (element) {
                element.addEventListener('click', closeSidebar);
            });

            navGroupToggles.forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    var group = toggle.closest('[data-admin-nav-group]');
                    var isOpen = group.classList.toggle('open');
                    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                });
            });

            window.addEventListener('resize', function () {
                if (! mediaQuery.matches) {
                    closeSidebar();
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
