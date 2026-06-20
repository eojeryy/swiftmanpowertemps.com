<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Sign Up | Swift Manpower Temps Agency Ltd</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #0f172a 0%, #111827 42%, #f8fafc 42%, #f8fafc 100%); color: #0f172a; font-family: "Manrope", sans-serif; margin: 0; min-height: 100vh; }
        * { box-sizing: border-box; }
        .signup-shell { display: grid; gap: 34px; grid-template-columns: 0.95fr 1.05fr; margin: 0 auto; max-width: 1180px; min-height: 100vh; padding: 36px 24px; align-items: center; }
        .signup-copy { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12); border-radius: 30px; color: #fff; padding: 36px; }
        .signup-copy span { color: #fecaca; display: block; font-size: 12px; font-weight: 800; letter-spacing: 0.18em; text-transform: uppercase; }
        .signup-copy h1 { font-size: 46px; line-height: 1.05; margin: 16px 0; }
        .signup-copy p, .signup-points small { color: rgba(255,255,255,0.78); }
        .signup-points { display: grid; gap: 14px; margin-top: 26px; }
        .signup-points div { background: rgba(15,23,42,0.28); border: 1px solid rgba(255,255,255,0.12); border-radius: 18px; padding: 16px 18px; }
        .signup-points strong { color: #ffffff; display: block; margin-bottom: 6px; }
        .signup-points small { color: rgba(255,255,255,0.9); display: block; }
        .signup-card { background: #fff; border-radius: 30px; box-shadow: 0 24px 70px rgba(15,23,42,0.14); padding: 34px; }
        .signup-card h2 { font-size: 30px; margin: 0 0 10px; }
        .signup-card p { color: #64748b; margin: 0 0 24px; }
        .form-grid { display: grid; gap: 16px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .field { margin-top: 16px; }
        .field.full { grid-column: 1 / -1; }
        .field label { display: block; font-size: 14px; font-weight: 800; margin-bottom: 8px; }
        .field-meta { align-items: center; display: flex; justify-content: space-between; gap: 12px; margin-bottom: 8px; }
        .field-meta label { margin-bottom: 0; }
        .field-hint { color: #64748b; font-size: 12px; }
        .input-wrap { position: relative; }
        .field input { border: 1px solid #dbe3ef; border-radius: 16px; font: inherit; min-height: 54px; padding: 14px 16px; transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease; width: 100%; }
        .field input::placeholder { color: #94a3b8; }
        .field input:focus { background: #fff; border-color: #dc2626; box-shadow: 0 0 0 4px rgba(220,38,38,0.1); outline: none; }
        .field input[aria-invalid="true"] { border-color: #e11d48; box-shadow: 0 0 0 4px rgba(225,29,72,0.08); }
        .password-input { padding-right: 58px; }
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
        .toggle-password:hover { color: #b91c1c; }
        .field-note, .field-error, .form-note { font-size: 12px; line-height: 1.5; margin-top: 8px; }
        .field-note, .form-note { color: #64748b; }
        .field-error { color: #be123c; font-weight: 700; }
        .strength-row {
            align-items: center;
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .strength-bar {
            background: #e2e8f0;
            border-radius: 999px;
            flex: 1;
            height: 8px;
            overflow: hidden;
        }
        .strength-bar span {
            background: linear-gradient(135deg, #f97316, #dc2626);
            border-radius: inherit;
            display: block;
            height: 100%;
            transition: width 0.2s ease, background-color 0.2s ease;
            width: 0;
        }
        .strength-text { color: #64748b; font-size: 12px; font-weight: 700; min-width: 92px; text-align: right; }
        .form-summary {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            color: #475569;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 18px;
            padding: 14px 16px;
        }
        .auth-btn { background: linear-gradient(135deg, #dc2626, #7f1d1d); border: 0; border-radius: 16px; color: #fff; cursor: pointer; font: inherit; font-weight: 800; margin-top: 20px; min-height: 54px; padding: 16px 18px; width: 100%; }
        .auth-btn:disabled { cursor: wait; opacity: 0.8; }
        .auth-link { color: #b91c1c; display: inline-block; font-weight: 800; margin-top: 18px; }
        .flash-status, .flash-errors { border-radius: 18px; margin-bottom: 16px; padding: 14px 16px; }
        .flash-status { background: #ecfdf3; border: 1px solid #bbf7d0; color: #166534; }
        .flash-errors { background: #fff1f2; border: 1px solid #fecdd3; color: #9f1239; }
        .flash-errors ul { margin: 0; padding-left: 18px; }
        @media (max-width: 991px) {
            .signup-shell { grid-template-columns: 1fr; }
            .signup-copy h1 { font-size: 40px; }
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="signup-shell">
        <section class="signup-copy">
            <span>Employee Access</span>
            <h1>Create your employee account.</h1>
            <p>Register once to access job openings, application links, and support shortcuts faster.</p>
            <div class="signup-points">
                <div><strong>Quick setup</strong><small>Create your account with just your name, email, and password.</small></div>
                <div><strong>Separate from admin</strong><small>This sign-up page is only for employee accounts, not super admins.</small></div>
                <div><strong>Direct access</strong><small>Go straight to your employee dashboard after registration.</small></div>
            </div>
        </section>
        <section class="signup-card">
            <h2>Employee Sign Up</h2>
            <p>Enter your details to create your account.</p>
            <div class="form-summary">Use a valid email and a password with at least 8 characters. You will be taken straight to your employee dashboard after sign up.</div>
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
            <form method="post" action="{{ route('employee.register') }}" id="employee-sign-up-form">
                @csrf
                <div class="form-grid">
                    <div class="field full">
                        <div class="field-meta">
                            <label for="name">Full name</label>
                            <span class="field-hint">Required</span>
                        </div>
                        <div class="input-wrap">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="e.g. Jane Doe" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" required>
                        </div>
                        @error('name')
                            <div class="field-error">{{ $message }}</div>
                        @else
                            <div class="field-note">Enter the name you want attached to your employee account.</div>
                        @enderror
                    </div>
                    <div class="field full">
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
                            <div class="field-note">We will use this email as your employee sign-in.</div>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="field-meta">
                            <label for="password">Password</label>
                            <span class="field-hint">Minimum 8 characters</span>
                        </div>
                        <div class="input-wrap">
                            <input id="password" class="password-input" type="password" name="password" autocomplete="new-password" placeholder="Create a password" aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}" required>
                            <button class="toggle-password" type="button" data-target="password" aria-label="Show password">Show</button>
                        </div>
                        @error('password')
                            <div class="field-error">{{ $message }}</div>
                        @else
                            <div class="field-note">Use a password that is easy for you to remember but hard for others to guess.</div>
                        @enderror
                        <div class="strength-row" aria-hidden="true">
                            <div class="strength-bar"><span id="password-strength-bar"></span></div>
                            <div class="strength-text" id="password-strength-text">Not entered</div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-meta">
                            <label for="password_confirmation">Confirm password</label>
                            <span class="field-hint">Must match</span>
                        </div>
                        <div class="input-wrap">
                            <input id="password_confirmation" class="password-input" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Repeat your password" aria-invalid="{{ $errors->has('password_confirmation') ? 'true' : 'false' }}" required>
                            <button class="toggle-password" type="button" data-target="password_confirmation" aria-label="Show password confirmation">Show</button>
                        </div>
                        @error('password_confirmation')
                            <div class="field-error">{{ $message }}</div>
                        @else
                            <div class="field-note" id="password-match-text">Re-enter the same password to avoid sign-up errors.</div>
                        @enderror
                    </div>
                </div>
                <div class="form-note">By creating an account, you are registering as an employee user and not as a super admin.</div>
                <button class="auth-btn" type="submit" id="signup-submit">Create Employee Account</button>
            </form>
            <a href="{{ route('employee.sign-in') }}" class="auth-link">Already have an account? Sign in</a>
        </section>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');
        const strengthBar = document.getElementById('password-strength-bar');
        const strengthText = document.getElementById('password-strength-text');
        const matchText = document.getElementById('password-match-text');
        const form = document.getElementById('employee-sign-up-form');
        const submitButton = document.getElementById('signup-submit');

        document.querySelectorAll('.toggle-password').forEach((button) => {
            button.addEventListener('click', () => {
                const input = document.getElementById(button.dataset.target);
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                button.textContent = isHidden ? 'Hide' : 'Show';
                button.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            });
        });

        const updatePasswordStrength = () => {
            const value = passwordInput.value;
            let score = 0;

            if (value.length >= 8) score += 1;
            if (/[A-Z]/.test(value) || /[a-z]/.test(value)) score += 1;
            if (/\d/.test(value)) score += 1;
            if (/[^A-Za-z0-9]/.test(value)) score += 1;

            const states = [
                { width: '0%', text: 'Not entered', color: '#cbd5e1' },
                { width: '25%', text: 'Too weak', color: '#fb7185' },
                { width: '50%', text: 'Fair', color: '#fb923c' },
                { width: '75%', text: 'Good', color: '#f59e0b' },
                { width: '100%', text: 'Strong', color: '#16a34a' },
            ];

            const state = states[value.length === 0 ? 0 : score];
            strengthBar.style.width = state.width;
            strengthBar.style.background = state.color;
            strengthText.textContent = state.text;
        };

        const updatePasswordMatch = () => {
            if (!confirmInput.value) {
                matchText.textContent = 'Re-enter the same password to avoid sign-up errors.';
                matchText.style.color = '#64748b';
                return;
            }

            const matches = passwordInput.value === confirmInput.value;
            matchText.textContent = matches ? 'Passwords match.' : 'Passwords do not match yet.';
            matchText.style.color = matches ? '#166534' : '#be123c';
        };

        passwordInput.addEventListener('input', () => {
            updatePasswordStrength();
            updatePasswordMatch();
        });

        confirmInput.addEventListener('input', updatePasswordMatch);

        form.addEventListener('submit', () => {
            submitButton.disabled = true;
            submitButton.textContent = 'Creating Account...';
        });

        updatePasswordStrength();
        updatePasswordMatch();
    </script>
</body>
</html>
