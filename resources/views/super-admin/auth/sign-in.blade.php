<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Sign In | Swift Manpower Temps Agency Ltd</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            background:
                radial-gradient(circle at bottom right, rgba(15, 23, 42, 0.14), transparent 30%),
                linear-gradient(135deg, #0f172a 0%, #111827 38%, #f8fafc 38%, #f8fafc 100%);
            color: #0f172a;
            font-family: "Manrope", sans-serif;
            margin: 0;
            min-height: 100vh;
        }

        * {
            box-sizing: border-box;
        }

        .signin-wrap {
            display: grid;
            gap: 36px;
            grid-template-columns: 0.95fr 1.05fr;
            max-width: 1180px;
            margin: 0 auto;
            min-height: 100vh;
            padding: 36px 24px;
            align-items: center;
        }

        .signin-panel {
            background: linear-gradient(160deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.02));
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 32px;
            color: #fff;
            padding: 40px 36px;
            backdrop-filter: blur(10px);
        }

        .signin-panel span {
            color: #fecaca;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .signin-panel h1 {
            font-size: 52px;
            line-height: 1.03;
            margin: 18px 0 16px;
        }

        .signin-panel p {
            color: rgba(255, 255, 255, 0.78);
            font-size: 17px;
            margin-bottom: 28px;
        }

        .signin-list {
            display: grid;
            gap: 14px;
        }

        .signin-list div {
            background: rgba(15, 23, 42, 0.28);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 18px;
            padding: 16px 18px;
        }

        .signin-list strong {
            color: #ffffff;
            display: block;
            margin-bottom: 6px;
        }

        .signin-list small {
            color: rgba(255, 255, 255, 0.9);
            display: block;
        }

        .signin-card {
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 30px 70px rgba(15, 23, 42, 0.14);
            padding: 36px;
        }

        .signin-card h2 {
            font-size: 30px;
            margin: 0 0 10px;
        }

        .signin-card p {
            color: #64748b;
            margin: 0 0 28px;
        }

        .flash-status,
        .flash-errors {
            border-radius: 18px;
            margin-bottom: 18px;
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

        .flash-errors ul {
            margin: 0;
            padding-left: 18px;
        }

        .form-grid {
            display: grid;
            gap: 18px;
        }

        .field-meta {
            align-items: center;
            display: flex;
            gap: 12px;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .field-hint {
            color: #64748b;
            font-size: 12px;
        }

        .input-wrap {
            position: relative;
        }

        input[type="email"],
        input[type="password"] {
            border: 1px solid #dbe3ef;
            border-radius: 16px;
            font: inherit;
            min-height: 54px;
            padding: 15px 16px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            width: 100%;
        }

        input::placeholder {
            color: #94a3b8;
        }

        input:focus {
            border-color: #dc2626;
            outline: none;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.12);
        }

        input[aria-invalid="true"] {
            border-color: #e11d48;
            box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.08);
        }

        .password-input {
            padding-right: 58px;
        }

        .toggle-password {
            align-items: center;
            background: transparent;
            border: 0;
            color: #64748b;
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

        .toggle-password:hover {
            color: #b91c1c;
        }

        .field-note,
        .field-error {
            font-size: 12px;
            line-height: 1.5;
            margin-top: 8px;
        }

        .field-note {
            color: #64748b;
        }

        .field-error {
            color: #be123c;
            font-weight: 700;
        }

        .remember-row {
            align-items: center;
            color: #475569;
            display: flex;
            gap: 10px;
        }

        .remember-row input {
            width: auto;
        }

        .submit-btn,
        .text-link {
            border-radius: 16px;
            display: inline-flex;
            font-size: 15px;
            font-weight: 800;
            justify-content: center;
            padding: 16px 20px;
            text-decoration: none;
        }

        .submit-btn {
            background: linear-gradient(135deg, #dc2626, #7f1d1d);
            border: 0;
            color: #fff;
            cursor: pointer;
            min-height: 54px;
            width: 100%;
        }

        .submit-btn:disabled {
            cursor: wait;
            opacity: 0.8;
        }

        .text-link {
            color: #b91c1c;
            padding-left: 0;
            padding-right: 0;
        }

        .signin-footer {
            color: #64748b;
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .signin-wrap {
                grid-template-columns: 1fr;
            }

            body {
                background: linear-gradient(180deg, #0f172a 0%, #0f172a 24%, #f8fafc 24%, #f8fafc 100%);
            }

            .signin-panel h1 {
                font-size: 42px;
            }
        }
    </style>
</head>
<body>
    <div class="signin-wrap">
        <section class="signin-panel">
            <span>Secure Access</span>
            <h1>Sign in to your super admin dashboard.</h1>
            <p>Use your super admin account to access dashboard tools, protected pages, and website shortcuts faster.</p>

            <div class="signin-list">
                <div>
                    <strong>Quick navigation</strong>
                    <small>Open dashboard tools and live website pages from one simple admin area.</small>
                </div>
                <div>
                    <strong>Separate from employee access</strong>
                    <small>This sign-in page is only for approved super admin accounts.</small>
                </div>
                <div>
                    <strong>Team-ready control</strong>
                    <small>Create additional super admin accounts when trusted staff need access.</small>
                </div>
            </div>
        </section>

        <section class="signin-card">
            <h2>Super Admin Sign In</h2>
            <p>Enter your admin credentials to continue.</p>

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

            <form method="post" action="{{ route('super-admin.authenticate') }}" id="super-admin-signin-form">
                @csrf
                <div class="form-grid">
                    <div>
                        <div class="field-meta">
                            <label for="email">Email address</label>
                            <span class="field-hint">Required</span>
                        </div>
                        <div class="input-wrap">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" inputmode="email" placeholder="admin@example.com" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" required>
                        </div>
                        @error('email')
                            <div class="field-error">{{ $message }}</div>
                        @else
                            <div class="field-note">Use the email attached to your approved super admin account.</div>
                        @enderror
                    </div>
                    <div>
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
                    <label class="remember-row" for="remember">
                        <input id="remember" type="checkbox" name="remember" value="1">
                        <span>Keep me signed in on this device</span>
                    </label>
                    <button class="submit-btn" type="submit" id="super-admin-submit">Sign In</button>
                </div>
            </form>

            <div class="signin-footer">
                Need a new super admin account?
                <a class="text-link" href="{{ route('super-admin.sign-up') }}">Create one here</a>
            </div>
        </section>
    </div>
    <script>
        const adminSignInForm = document.getElementById('super-admin-signin-form');
        const adminSubmitButton = document.getElementById('super-admin-submit');
        const adminPasswordToggle = document.querySelector('.toggle-password');
        const adminPasswordInput = document.getElementById('password');

        adminPasswordToggle.addEventListener('click', () => {
            const isHidden = adminPasswordInput.type === 'password';

            adminPasswordInput.type = isHidden ? 'text' : 'password';
            adminPasswordToggle.textContent = isHidden ? 'Hide' : 'Show';
            adminPasswordToggle.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });

        adminSignInForm.addEventListener('submit', () => {
            adminSubmitButton.disabled = true;
            adminSubmitButton.textContent = 'Signing In...';
        });
    </script>
</body>
</html>
