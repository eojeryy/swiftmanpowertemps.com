<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Sign In | Swift Manpower Temps Agency Ltd</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-accent: #78d833;
            --brand-accent-strong: #5cab21;
            --brand-accent-soft: #dff6cf;
            --brand-charcoal: #0d1511;
            --brand-panel: #1d2a23;
            --brand-text: #29352e;
            --brand-muted: #627068;
            --brand-surface: #f6faf4;
            --brand-surface-2: #e7f1e2;
            --brand-border: rgba(120, 216, 51, 0.18);
        }
        body {
            background:
                radial-gradient(circle at top left, rgba(120, 216, 51, 0.18), transparent 26%),
                linear-gradient(135deg, #eef6ea 0%, #e3efdd 38%, #f9fcf7 38%, #f9fcf7 100%);
            color: var(--brand-charcoal);
            font-family: "Manrope", sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        * { box-sizing: border-box; }
        .signin-shell { display: grid; gap: 34px; grid-template-columns: 0.95fr 1.05fr; margin: 0 auto; max-width: 1180px; min-height: 100vh; padding: 36px 24px; align-items: center; }
        .signin-copy {
            background:
                radial-gradient(circle at top left, rgba(120, 216, 51, 0.14), transparent 28%),
                linear-gradient(180deg, rgba(16, 27, 21, 0.96), rgba(26, 41, 31, 0.94));
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 32px;
            color: #fff;
            padding: 40px;
            box-shadow: 0 28px 64px rgba(13, 21, 17, 0.18);
        }
        .signin-copy span { color: #c9f0aa; display: block; font-size: 12px; font-weight: 800; letter-spacing: 0.18em; text-transform: uppercase; }
        .signin-copy h1 { font-size: 50px; line-height: 1.05; margin: 16px 0; }
        .signin-copy p, .signin-points small { color: rgba(255,255,255,0.78); }
        .signin-points { display: grid; gap: 14px; margin-top: 26px; }
        .signin-points div {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(120, 216, 51, 0.16);
            border-radius: 20px;
            padding: 18px 20px;
            backdrop-filter: blur(4px);
        }
        .signin-points strong { color: #ffffff; display: block; margin-bottom: 6px; }
        .signin-points small { color: rgba(255,255,255,0.9); display: block; }
        .signin-card {
            background:
                radial-gradient(circle at top right, rgba(120, 216, 51, 0.12), transparent 26%),
                linear-gradient(180deg, rgba(255,255,255,0.98), rgba(244, 249, 241, 0.96));
            border: 1px solid var(--brand-border);
            border-radius: 32px;
            box-shadow: 0 24px 70px rgba(15,23,42,0.1);
            padding: 36px;
        }
        .signin-card h2 { font-size: 30px; margin: 0 0 10px; }
        .signin-card p { color: var(--brand-muted); margin: 0 0 24px; }
        .field { margin-top: 16px; }
        .field-meta { align-items: center; display: flex; gap: 12px; justify-content: space-between; margin-bottom: 8px; }
        .field label { display: block; font-size: 14px; font-weight: 800; margin-bottom: 0; }
        .field-hint { color: var(--brand-muted); font-size: 12px; }
        .input-wrap { position: relative; }
        .field input {
            background: rgba(255,255,255,0.9);
            border: 1px solid rgba(120, 216, 51, 0.16);
            border-radius: 18px;
            font: inherit;
            min-height: 56px;
            padding: 14px 16px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            width: 100%;
        }
        .field input::placeholder { color: #94a3b8; }
        .field input:focus { border-color: var(--brand-accent-strong); box-shadow: 0 0 0 4px rgba(120,216,51,0.12); outline: none; }
        .field input[aria-invalid="true"] { border-color: #e11d48; box-shadow: 0 0 0 4px rgba(225,29,72,0.08); }
        .password-input { padding-right: 58px; }
        .toggle-password {
            align-items: center;
            background: transparent;
            border: 0;
            color: var(--brand-muted);
            cursor: pointer;
            display: inline-flex;
            font: inherit;
            font-size: 13px;
            font-weight: 700;
            height: 100%;
            justify-content: center;
            padding: 0 16px;
            position: absolute;
            right: 0;
            top: 0;
        }
        .toggle-password:hover { color: var(--brand-accent-strong); }
        .field-note, .field-error { font-size: 12px; line-height: 1.5; margin-top: 8px; }
        .field-note { color: var(--brand-muted); }
        .field-error { color: #be123c; font-weight: 700; }
        .remember { align-items: center; display: flex; gap: 10px; margin-top: 16px; }
        .auth-btn {
            background: linear-gradient(135deg, var(--brand-charcoal), var(--brand-panel));
            border: 0;
            border-radius: 18px;
            color: #fff;
            cursor: pointer;
            font: inherit;
            font-weight: 800;
            margin-top: 20px;
            min-height: 56px;
            padding: 16px 18px;
            width: 100%;
            box-shadow: 0 18px 34px rgba(13, 21, 17, 0.14);
        }
        .auth-btn:disabled { cursor: wait; opacity: 0.8; }
        .auth-link { color: var(--brand-accent-strong); display: inline-block; font-weight: 800; margin-top: 18px; }
        .flash-status, .flash-errors { border-radius: 18px; margin-bottom: 16px; padding: 14px 16px; }
        .flash-status { background: #ecfdf3; border: 1px solid #bbf7d0; color: #166534; }
        .flash-errors { background: #fff1f2; border: 1px solid #fecdd3; color: #9f1239; }
        .flash-errors ul { margin: 0; padding-left: 18px; }
        .remember span { color: var(--brand-text); }
        @media (max-width: 991px) { .signin-shell { grid-template-columns: 1fr; } .signin-copy h1 { font-size: 42px; } }
    </style>
</head>
<body>
    <div class="signin-shell">
        <section class="signin-copy">
            <span>Employee Access</span>
            <h1>Sign in to your employee dashboard.</h1>
            <p>Use your employee account to reach job openings, application links, and support shortcuts faster.</p>
            <div class="signin-points">
                <div><strong>Quick navigation</strong><small>Open jobs, apply now, and contact support from one simple dashboard.</small></div>
                <div><strong>Separate from admin</strong><small>This sign-in page is only for employee accounts, not super admins.</small></div>
                <div><strong>Public pages stay available</strong><small>Employees can still use the public application and contact pages anytime.</small></div>
            </div>
        </section>
        <section class="signin-card">
            <h2>Employee Sign In</h2>
            <p>Enter your email and password to continue.</p>
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
            <form method="post" action="{{ route('employee.authenticate') }}" id="employee-sign-in-form">
                @csrf
                <div class="field">
                    <div class="field-meta">
                        <label for="email">Email address</label>
                        <span class="field-hint">Required</span>
                    </div>
                    <div class="input-wrap">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" inputmode="email" placeholder="name@example.com" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" required>
                    </div>
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @else
                        <div class="field-note">Use the email linked to your employee account.</div>
                    @enderror
                </div>
                <div class="field">
                    <div class="field-meta">
                        <label for="password">Password</label>
                        <span class="field-hint">Required</span>
                    </div>
                    <div class="input-wrap">
                        <input id="password" class="password-input" type="password" name="password" autocomplete="current-password" placeholder="Enter your password" aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}" required>
                        <button class="toggle-password" type="button" aria-label="Show password">Show</button>
                    </div>
                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @else
                        <div class="field-note">Passwords are case-sensitive.</div>
                    @enderror
                </div>
                <label class="remember" for="remember"><input id="remember" type="checkbox" name="remember" value="1"><span>Keep me signed in</span></label>
                <button class="auth-btn" type="submit" id="signin-submit">Sign In</button>
            </form>
            <a href="{{ route('employee.sign-up') }}" class="auth-link">Need an account? Sign up</a>
        </section>
    </div>
    <script>
        const signInForm = document.getElementById('employee-sign-in-form');
        const signInSubmit = document.getElementById('signin-submit');
        const passwordToggle = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password');

        passwordToggle.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';

            passwordInput.type = isHidden ? 'text' : 'password';
            passwordToggle.textContent = isHidden ? 'Hide' : 'Show';
            passwordToggle.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });

        signInForm.addEventListener('submit', () => {
            signInSubmit.disabled = true;
            signInSubmit.textContent = 'Signing In...';
        });
    </script>
</body>
</html>
