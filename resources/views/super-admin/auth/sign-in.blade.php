<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#172b25">
    <title>Admin Sign In | Swift Manpower Temps Agency Ltd</title>
    <link rel="icon" href="{{ asset('assets/images/logo/swiftmta4.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/admin-signin.css') }}" rel="stylesheet">
</head>
<body>
    <a class="auth-skip" href="#signin">Skip to sign in</a>
    <header class="auth-header">
        <a class="auth-brand" href="{{ route('home') }}" aria-label="Swift Manpower Temps Agency home"><img src="{{ asset('assets/images/logo/swiftmta4.png') }}" alt="" width="68" height="60"><span>Swift Manpower<small>Temps Agency Ltd</small></span></a>
        <a class="auth-back" href="{{ route('home') }}"><span aria-hidden="true">←</span> Back to website</a>
    </header>
    <main class="auth-main">
        <div class="auth-layout">
            <section class="auth-story" aria-labelledby="workspace-title">
                <span class="auth-eyebrow"><span class="auth-dot" aria-hidden="true"></span> Your agency workspace</span>
                <h2 id="workspace-title">People.<br>Possibilities.<br><span>Progress.</span></h2>
                <p>A dedicated workspace for recruitment and website content, with the tools available to your account.</p>
                <ul class="auth-tools">
                    <li><span aria-hidden="true">01</span><div><strong>Recruitment</strong><p>Review applications and coordinate the next steps.</p></div></li>
                    <li><span aria-hidden="true">02</span><div><strong>Employer requests</strong><p>Turn staffing needs into new opportunities.</p></div></li>
                    <li><span aria-hidden="true">03</span><div><strong>Blog &amp; content</strong><p>Share guidance that helps employers and job seekers.</p></div></li>
                </ul>
                <div class="auth-story-footer">Swift Manpower Temps Agency Ltd<span>Calgary, Alberta</span></div>
            </section>
            <section class="auth-card" id="signin" aria-labelledby="signin-title" tabindex="-1">
                <span class="auth-card-label">Admin &amp; blog staff access</span>
                <h1 id="signin-title">Welcome back.</h1>
                <p class="auth-intro">Sign in to continue to your dashboard.</p>
                @if(session('status'))
                    <div class="auth-feedback auth-feedback-success" role="status">{{ session('status') }}</div>
                @endif
                @if($errors->any())
                    <div class="auth-feedback auth-feedback-error" role="alert" id="signin-feedback" tabindex="-1"><strong>We couldn’t sign you in.</strong><ul>@foreach($errors->getMessages() as $field => $messages)<li><a href="#{{ in_array($field, ['email', 'password']) ? $field : 'signin' }}">{{ $messages[0] }}</a></li>@endforeach</ul></div>
                @endif
                <form method="post" action="{{ route('super-admin.authenticate') }}" id="super-admin-signin-form">
                    @csrf
                    <div class="auth-field">
                        <label for="email">Email address</label>
                        <input class="auth-input" id="email" type="email" name="email" value="{{ old('email', request('email')) }}" autocomplete="username" inputmode="email" autocapitalize="none" spellcheck="false" placeholder="you@yourcompany.ca" required aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" aria-describedby="email-help {{ $errors->has('email') ? 'email-error' : '' }}">
                        <p class="auth-field-help" id="email-help">Use the email address registered to your admin or blog staff account.</p>
                        @error('email')<p class="auth-field-error" id="email-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="auth-field">
                        <label for="password">Password</label>
                        <div class="auth-password-wrap">
                            <input class="auth-input auth-password-input" id="password" type="password" name="password" autocomplete="current-password" placeholder="Enter your password" required aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}" aria-describedby="password-help caps-lock-note {{ $errors->has('password') ? 'password-error' : '' }}">
                            <button class="auth-password-toggle" type="button" aria-label="Show password" aria-controls="password" aria-pressed="false" hidden>Show</button>
                        </div>
                        <p class="auth-field-help" id="password-help">Passwords are case-sensitive.</p>
                        <p class="auth-caps-lock" id="caps-lock-note" role="status" hidden>Caps Lock is on.</p>
                        @error('password')<p class="auth-field-error" id="password-error">{{ $message }}</p>@enderror
                    </div>
                    <label class="auth-remember" for="remember"><input id="remember" type="checkbox" name="remember" value="1" @checked(old('remember'))><span>Keep me signed in on this device</span></label>
                    <button class="auth-submit" type="submit" id="super-admin-submit"><span data-submit-label>Sign in to dashboard</span><span aria-hidden="true" data-submit-arrow>→</span></button>
                    <span class="auth-form-status" data-form-status role="status"></span>
                </form>
                <div class="auth-help"><strong>Need help accessing your account?</strong><p>Contact your agency administrator or <a href="{{ route('contact') }}">reach out to our team</a>.</p></div>
                <div class="auth-setup"><a href="{{ route('super-admin.sign-up') }}">Set up an admin account <span aria-hidden="true">↗</span></a></div>
            </section>
        </div>
    </main>
    <footer class="auth-footer"><span>&copy; {{ now()->year }} Swift Manpower Temps Agency Ltd.</span><a href="{{ route('employee.sign-in') }}">Candidate sign in <span aria-hidden="true">↗</span></a></footer>
    <script>
        (function () {
            const form = document.getElementById('super-admin-signin-form');
            const submit = document.getElementById('super-admin-submit');
            const submitLabel = submit.querySelector('[data-submit-label]');
            const status = form.querySelector('[data-form-status]');
            const toggle = document.querySelector('.auth-password-toggle');
            const password = document.getElementById('password');
            const capsLock = document.getElementById('caps-lock-note');
            toggle.hidden = false;
            toggle.addEventListener('click', function () {
                const reveal = password.type === 'password';
                password.type = reveal ? 'text' : 'password';
                toggle.textContent = reveal ? 'Hide' : 'Show';
                toggle.setAttribute('aria-label', reveal ? 'Hide password' : 'Show password');
                toggle.setAttribute('aria-pressed', String(reveal));
            });
            function checkCapsLock(event) {
                if (typeof event.getModifierState === 'function') capsLock.hidden = !event.getModifierState('CapsLock');
            }
            password.addEventListener('keydown', checkCapsLock);
            password.addEventListener('keyup', checkCapsLock);
            password.addEventListener('blur', function () { capsLock.hidden = true; });
            form.addEventListener('submit', function () {
                submit.disabled = true;
                form.setAttribute('aria-busy', 'true');
                submitLabel.textContent = 'Signing in…';
                status.textContent = 'Signing in. Please wait.';
            });
            window.addEventListener('pageshow', function () {
                submit.disabled = false;
                form.removeAttribute('aria-busy');
                submitLabel.textContent = 'Sign in to dashboard';
                status.textContent = '';
                password.type = 'password';
                toggle.textContent = 'Show';
                toggle.setAttribute('aria-label', 'Show password');
                toggle.setAttribute('aria-pressed', 'false');
                capsLock.hidden = true;
            });
            const feedback = document.getElementById('signin-feedback');
            if (feedback) feedback.focus();
        })();
    </script>
</body>
</html>
