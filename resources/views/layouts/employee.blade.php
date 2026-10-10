<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Dashboard | Swift Manpower Temps Agency Ltd')</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-workspace.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/internal-components.css') }}">
    <noscript><style>
        @media(max-width:1024px) { .admin-sidebar { position:relative; width:100%; height:auto; transform:none; visibility:visible; } .admin-mobile-toggle,.admin-sidebar-close { display:none; } }
    </style></noscript>
</head>
<body>
    <a class="workspace-skip" href="#workspace-content">Skip to main content</a>
    <div class="admin-sidebar-overlay" data-admin-sidebar-close></div>
    <div class="admin-shell">
        <aside class="admin-sidebar" id="admin-sidebar" aria-label="Employee navigation">
            <button class="admin-sidebar-close" type="button" data-admin-sidebar-close aria-label="Close navigation">×</button>
            <div class="admin-brand">
                <span>Employee Area</span>
                <h1>Swift Manpower Employee</h1>
                <p>Your next opportunity starts here.</p>
            </div>
            <nav class="admin-nav">
                <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
                    <span>Dashboard</span>
                    <span class="nav-badge">Home</span>
                </a>
                <a href="{{ route('job.openings') }}">
                    <span>Job Openings</span>
                    <span class="nav-badge">Jobs</span>
                </a>
                <a href="{{ route('apply.now') }}">
                    <span>Apply Now</span>
                    <span class="nav-badge">Apply</span>
                </a>
                <a href="{{ route('contact') }}">
                    <span>Contact Support</span>
                    <span class="nav-badge">Help</span>
                </a>
                <form method="post" action="{{ route('employee.logout') }}">
                    @csrf
                    <button type="submit">
                        <span>Sign Out</span>
                        <span class="nav-badge">Exit</span>
                    </button>
                </form>
            </nav>
        </aside>
        <main class="admin-main">
            <div class="admin-topbar-shell">
                <div class="admin-topbar">
                    <div class="admin-topbar-copy">
                        <span class="admin-topbar-label">Employee Center</span>
                        <h2>@yield('page_title', 'Employee Dashboard')</h2>
                        <p>@yield('page_intro', 'A simple dashboard for Swift Manpower employee accounts.')</p>
                    </div>
                    <div class="admin-topbar-tools">
                        <button class="admin-mobile-toggle" type="button" data-admin-sidebar-toggle aria-controls="admin-sidebar" aria-expanded="false" aria-label="Open navigation">☰</button>
                        <div class="admin-quick-links">
                            <a href="{{ route('job.openings') }}"><span>Jobs</span></a>
                            <a href="{{ route('apply.now') }}"><span>Apply</span></a>
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
            <div class="admin-content" id="workspace-content" tabindex="-1">
                @if (session('status'))
                    <div class="flash-status" role="status">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="flash-errors" role="alert">
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
    <script src="{{ asset('assets/js/workspace-navigation.js') }}" defer></script>
</body>
</html>
