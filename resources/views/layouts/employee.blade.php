<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Dashboard | Swift Manpower Temps Agency Ltd')</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --employee-bg: #f6f7fb;
            --employee-surface: #ffffff;
            --employee-sidebar: #0f172a;
            --employee-sidebar-soft: rgba(255, 255, 255, 0.08);
            --employee-text: #0f172a;
            --employee-muted: #64748b;
            --employee-accent: #b91c1c;
            --employee-border: #e2e8f0;
            --employee-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        * { box-sizing: border-box; }
        body {
            background: radial-gradient(circle at top left, #fff5f5, transparent 35%), var(--employee-bg);
            color: var(--employee-text);
            font-family: "Manrope", sans-serif;
            margin: 0;
        }
        body.employee-scrolled .employee-topbar-shell {
            box-shadow: 0 20px 42px rgba(15, 23, 42, 0.14);
        }
        a { color: inherit; text-decoration: none; }
        .employee-shell {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
        }
        .employee-sidebar {
            background: linear-gradient(180deg, #111827 0%, #0f172a 100%);
            color: #fff;
            padding: 32px 22px;
        }
        .employee-brand {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 26px;
            padding-bottom: 22px;
        }
        .employee-brand span {
            color: #fecaca;
            display: block;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.16em;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .employee-brand h1 {
            font-size: 28px;
            line-height: 1.08;
            margin: 0 0 10px;
        }
        .employee-brand p { color: rgba(255,255,255,0.72); margin: 0; }
        .employee-nav { display: grid; gap: 10px; }
        .employee-nav a, .employee-nav button {
            align-items: center;
            background: transparent;
            border: 0;
            border-radius: 18px;
            color: #fff;
            cursor: pointer;
            display: flex;
            font: inherit;
            font-weight: 700;
            justify-content: space-between;
            padding: 14px 16px;
            text-align: left;
            width: 100%;
        }
        .employee-nav a:hover,
        .employee-nav a.active,
        .employee-nav button:hover {
            background: var(--employee-sidebar-soft);
        }
        .employee-pill {
            background: rgba(255,255,255,0.14);
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            padding: 6px 10px;
            text-transform: uppercase;
        }
        .employee-main { padding: 26px; }
        .employee-topbar-shell {
            backdrop-filter: blur(16px);
            align-items: center;
            background: rgba(255,255,255,0.82);
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 0 0 0 28px;
            left: 280px;
            position: fixed;
            right: 0;
            top: 0;
            transition: box-shadow 0.25s ease, transform 0.25s ease, background 0.25s ease;
            z-index: 40;
        }
        .employee-topbar {
            align-items: center;
            display: flex;
            gap: 18px;
            justify-content: space-between;
            min-height: 88px;
            padding: 14px 20px;
        }
        .employee-topbar-copy { min-width: 0; }
        .employee-topbar-label {
            align-items: center;
            color: var(--employee-accent);
            display: inline-flex;
            font-size: 12px;
            font-weight: 800;
            gap: 8px;
            letter-spacing: 0.14em;
            margin-bottom: 6px;
            text-transform: uppercase;
        }
        .employee-topbar-label::before {
            background: linear-gradient(135deg, #ef4444, #7f1d1d);
            border-radius: 999px;
            content: "";
            display: inline-block;
            height: 10px;
            width: 10px;
        }
        .employee-topbar h2 { font-size: 24px; line-height: 1.15; margin: 0; }
        .employee-topbar p { color: var(--employee-muted); display: none; margin: 0; }
        .employee-topbar-tools {
            align-items: center;
            display: flex;
            flex-shrink: 0;
            gap: 10px;
        }
        .employee-quick-links {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: flex-end;
        }
        .employee-quick-links a {
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
        .employee-quick-links a:hover {
            background: #fff1ed;
            border-color: #ef4444;
            transform: translateY(-2px);
        }
        .employee-user {
            align-items: center;
            background: linear-gradient(180deg, #ffffff, #fff7f5);
            border: 1px solid var(--employee-border);
            border-radius: 18px;
            box-shadow: var(--employee-shadow);
            display: flex;
            gap: 14px;
            padding: 10px 12px;
        }
        .employee-avatar {
            align-items: center;
            background: linear-gradient(135deg, #dc2626, #7f1d1d);
            border-radius: 14px;
            color: #fff;
            display: inline-flex;
            font-size: 15px;
            font-weight: 800;
            height: 40px;
            justify-content: center;
            width: 40px;
        }
        .employee-user strong { display: block; font-size: 14px; line-height: 1.2; }
        .employee-user small { color: var(--employee-muted); font-size: 12px; }
        .employee-content { padding-top: 108px; }
        .flash-status, .flash-errors {
            border-radius: 18px;
            margin-bottom: 20px;
            padding: 14px 16px;
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
        .flash-errors ul { margin: 0; padding-left: 18px; }
        .employee-card {
            background: var(--employee-surface);
            border: 1px solid var(--employee-border);
            border-radius: 26px;
            box-shadow: var(--employee-shadow);
            padding: 24px;
        }
        @media (max-width: 1024px) {
            .employee-shell { grid-template-columns: 1fr; }
            .employee-topbar-shell {
                border-radius: 0 0 24px 24px;
                left: 0;
            }
        }
        @media (max-width: 767px) {
            .employee-main { padding: 18px; }
            .employee-topbar { align-items: flex-start; flex-direction: column; }
            .employee-topbar-tools { align-items: flex-start; flex-direction: column-reverse; width: 100%; }
            .employee-quick-links { justify-content: flex-start; }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="employee-shell">
        <aside class="employee-sidebar">
            <div class="employee-brand">
                <span>Employee Area</span>
                <h1>Swift Manpower Employee</h1>
                <p>Your simple space for job search access and support links.</p>
            </div>
            <nav class="employee-nav">
                <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
                    <span>Dashboard</span>
                    <span class="employee-pill">Home</span>
                </a>
                <a href="{{ route('job.openings') }}">
                    <span>Job Openings</span>
                    <span class="employee-pill">Jobs</span>
                </a>
                <a href="{{ route('apply.now') }}">
                    <span>Apply Now</span>
                    <span class="employee-pill">Apply</span>
                </a>
                <a href="{{ route('contact') }}">
                    <span>Contact Support</span>
                    <span class="employee-pill">Help</span>
                </a>
                <form method="post" action="{{ route('employee.logout') }}">
                    @csrf
                    <button type="submit">
                        <span>Sign Out</span>
                        <span class="employee-pill">Exit</span>
                    </button>
                </form>
            </nav>
        </aside>
        <main class="employee-main">
            <div class="employee-topbar-shell">
                <div class="employee-topbar">
                    <div class="employee-topbar-copy">
                        <span class="employee-topbar-label">Employee Center</span>
                        <h2>@yield('page_title', 'Employee Dashboard')</h2>
                        <p>@yield('page_intro', 'A simple dashboard for Swift Manpower employee accounts.')</p>
                    </div>
                    <div class="employee-topbar-tools">
                        <div class="employee-quick-links">
                            <a href="{{ route('job.openings') }}"><span>Jobs</span></a>
                            <a href="{{ route('apply.now') }}"><span>Apply</span></a>
                        </div>
                        @auth
                            <div class="employee-user">
                                <div class="employee-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                                <div>
                                    <strong>{{ auth()->user()->name }}</strong>
                                    <small>{{ auth()->user()->email }}</small>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="employee-content">
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
        window.addEventListener('scroll', () => {
            document.body.classList.toggle('employee-scrolled', window.scrollY > 12);
        });
    </script>
</body>
</html>
