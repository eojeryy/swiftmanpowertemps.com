<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Sign Up | Swift Manpower Temps Agency Ltd</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            background:
                radial-gradient(circle at top left, rgba(239, 68, 68, 0.18), transparent 28%),
                linear-gradient(135deg, #fff7f5 0%, #f8fafc 48%, #eef2ff 100%);
            color: #0f172a;
            font-family: "Manrope", sans-serif;
            margin: 0;
            min-height: 100vh;
        }

        * {
            box-sizing: border-box;
        }

        .auth-wrap {
            display: grid;
            gap: 36px;
            grid-template-columns: 1.05fr 0.95fr;
            max-width: 1180px;
            margin: 0 auto;
            min-height: 100vh;
            padding: 36px 24px;
            align-items: center;
        }

        .auth-copy {
            padding-right: 24px;
        }

        .eyebrow {
            color: #b91c1c;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .auth-copy h1 {
            font-size: 64px;
            line-height: 1.02;
            margin: 16px 0 18px;
        }

        .auth-copy p {
            color: #475569;
            font-size: 18px;
            max-width: 560px;
        }

        .copy-points {
            display: grid;
            gap: 16px;
            margin-top: 34px;
        }

        .copy-point {
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 22px;
            padding: 18px 20px;
        }

        .copy-point strong {
            display: block;
            margin-bottom: 6px;
        }

        .copy-point span {
            color: #64748b;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 30px;
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.12);
            padding: 34px;
        }

        .auth-card h2 {
            font-size: 30px;
            margin: 0 0 10px;
        }

        .auth-card p {
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

        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        input {
            background: #fff;
            border: 1px solid #dbe3ef;
            border-radius: 16px;
            font: inherit;
            padding: 15px 16px;
            width: 100%;
        }

        input:focus {
            border-color: #ef4444;
            outline: none;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
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
            width: 100%;
        }

        .text-link {
            color: #b91c1c;
            padding-left: 0;
            padding-right: 0;
        }

        .auth-footer {
            color: #64748b;
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .auth-wrap {
                grid-template-columns: 1fr;
            }

            .auth-copy {
                padding-right: 0;
            }

            .auth-copy h1 {
                font-size: 44px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-wrap">
        <section class="auth-copy">
            <div class="eyebrow">Swift Manpower Temps Agency Ltd</div>
            <h1>Create a super admin account for the control center.</h1>
            <p>Use this secure registration page to create super admin access for managing your staffing website and future internal operations.</p>

            <div class="copy-points">
                <div class="copy-point">
                    <strong>Protected admin access</strong>
                    <span>Only super admin accounts can open the dashboard and its private navigation area.</span>
                </div>
                <div class="copy-point">
                    <strong>Fast entry to site controls</strong>
                    <span>Reach job openings, contact pages, and live website links from one left-side menu.</span>
                </div>
                <div class="copy-point">
                    <strong>Built for your team</strong>
                    <span>Create more than one super admin when trusted staff need dashboard access.</span>
                </div>
            </div>
        </section>

        <section class="auth-card">
            <h2>Super Admin Sign Up</h2>
            <p>Create an admin account and go directly into the dashboard after registration.</p>

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

            <form method="post" action="{{ route('super-admin.register') }}">
                @csrf
                <div class="form-grid">
                    <div>
                        <label for="name">Full name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div>
                        <label for="email">Email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required>
                    </div>
                    <div>
                        <label for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>
                    <button class="submit-btn" type="submit">Create Super Admin</button>
                </div>
            </form>

            <div class="auth-footer">
                Already have access?
                <a class="text-link" href="{{ route('super-admin.sign-in') }}">Sign in here</a>
            </div>
        </section>
    </div>
</body>
</html>
