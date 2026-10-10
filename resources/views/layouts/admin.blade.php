<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin | Swift Manpower Temps Agency Ltd')</title>
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
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
    @php($adminUser = auth()->user())
    @php($isSuperAdmin = $adminUser?->isSuperAdmin() ?? false)
    @php($isBlogStaff = $adminUser?->isBlogStaff() ?? false)
    <div class="admin-sidebar-overlay" data-admin-sidebar-close></div>
    <div class="admin-shell">
        <aside class="admin-sidebar" id="admin-sidebar" aria-label="Admin navigation">
            <div class="admin-brand">
                <div class="admin-sidebar-head">
                    <div>
                        <span>{{ $isBlogStaff ? 'Blog Staff' : 'Super Admin' }}</span>
                        <h1>Swift Manpower Admin</h1>
                        <p>{{ $isBlogStaff ? 'Manage blog content from one focused workspace.' : 'Manage the staffing website from one clean control panel.' }}</p>
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
                @if ($isSuperAdmin)
                    <a href="{{ route('super-admin.sign-up') }}">
                        <span>Create Admin</span>
                        <span class="nav-badge">New</span>
                    </a>
                    <a href="{{ route('super-admin.staff-accounts.index') }}" class="{{ request()->routeIs('super-admin.staff-accounts.*') ? 'active' : '' }}">
                        <span>Blog Staff</span>
                        <span class="nav-badge">Team</span>
                    </a>
                @endif
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
                @if ($isSuperAdmin)
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
                @endif
                <form method="post" action="{{ route('super-admin.logout') }}">
                    @csrf
                    <button type="submit">
                        <span>Sign Out</span>
                        <span class="nav-badge">Exit</span>
                    </button>
                </form>
            </nav>

            <div class="admin-sidebar-footer">
                @if ($isSuperAdmin)
                    <h3>Need a quick check?</h3>
                    <p>Review current openings, contact details, and live site pages directly from the dashboard menu.</p>
                    <a href="{{ route('about.company') }}">Open company profile</a>
                @else
                    <h3>Content access only</h3>
                    <p>This account is limited to the blog workspace so staff can focus on publishing safely.</p>
                    <a href="{{ route('super-admin.blogs.index') }}">Open blog list</a>
                @endif
            </div>
        </aside>

        <main class="admin-main">
            <div class="admin-topbar-shell">
                <div class="admin-topbar">
                    <div class="admin-topbar-copy">
                        <span class="admin-topbar-label">{{ $isBlogStaff ? 'Blog Workspace' : 'Control Center' }}</span>
                        <h2>@yield('page_title', 'Admin Dashboard')</h2>
                        <p>@yield('page_intro', 'Secure access for Swift Manpower Temps Agency Ltd super admins.')</p>
                    </div>

                    <div class="admin-topbar-tools">
                        <button class="admin-mobile-toggle" type="button" data-admin-sidebar-toggle aria-controls="admin-sidebar" aria-expanded="false" aria-label="Open navigation">
                            <i class="fas fa-bars"></i>
                        </button>

                        <div class="admin-quick-links">
                            <a href="{{ route('home') }}"><i class="fas fa-globe"></i><span>Site</span></a>
                            @if ($isSuperAdmin)
                                <a href="{{ route('job.openings') }}"><i class="fas fa-briefcase"></i><span>Jobs</span></a>
                            @else
                                <a href="{{ route('super-admin.blogs.create') }}"><i class="fas fa-pen"></i><span>New Post</span></a>
                            @endif
                        </div>

                        @auth
                            <div class="admin-user">
                                <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                                <div>
                                    <strong>{{ auth()->user()->name }}</strong>
                                    <small>{{ auth()->user()->email }} • {{ auth()->user()->adminLabel() }}</small>
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
    <script src="{{ asset('assets/js/internal-tables.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
