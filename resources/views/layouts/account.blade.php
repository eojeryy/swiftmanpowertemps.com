<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#172b25">
    <title>@yield('title') | Swift Manpower Temps Agency Ltd</title>
    <link rel="icon" href="{{ asset('assets/images/logo/swiftmta4.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/admin-signin.css') }}" rel="stylesheet">
</head>
<body>
    <a class="auth-skip" href="#account-form">Skip to account form</a>
    <header class="auth-header">
        <a class="auth-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/swiftmta4.png') }}" alt="" width="68" height="60"><span>Swift Manpower<small>Temps Agency Ltd</small></span></a>
        <a class="auth-back" href="{{ route('home') }}"><span aria-hidden="true">←</span> Back to website</a>
    </header>
    <main class="auth-main">
        <div class="auth-layout">
            <section class="auth-story" aria-labelledby="account-story-title">
                <span class="auth-eyebrow"><span class="auth-dot" aria-hidden="true"></span> @yield('workspace_label')</span>
                <h2 id="account-story-title">@yield('story_heading')</h2>
                <p>@yield('story_intro')</p>
                @yield('story_tools')
                <div class="auth-story-footer">Swift Manpower Temps Agency Ltd<span>Calgary, Alberta</span></div>
            </section>
            <section class="auth-card" id="account-form" aria-labelledby="account-title" tabindex="-1">
                <span class="auth-card-label">@yield('account_label')</span>
                <h1 id="account-title">@yield('heading')</h1>
                <p class="auth-intro">@yield('intro')</p>
                @if(session('status'))
                    <div class="auth-feedback auth-feedback-success" role="status">{{ session('status') }}</div>
                @endif
                @if($errors->any())
                    <div class="auth-feedback auth-feedback-error" id="account-feedback" role="alert" tabindex="-1">
                        <strong>Please check the following:</strong>
                        <ul>@foreach($errors->getMessages() as $field => $messages)
                            @foreach($messages as $message)<li><a href="#{{ in_array($field, ['name', 'email', 'password', 'password_confirmation']) ? $field : 'account-form' }}">{{ $message }}</a></li>@endforeach
                        @endforeach</ul>
                    </div>
                @endif
                @yield('content')
                <div class="auth-help"><strong>Need a hand?</strong><p><a href="{{ route('contact') }}">Contact our team</a> for help with your account.</p></div>
            </section>
        </div>
    </main>
    <footer class="auth-footer"><span>&copy; {{ now()->year }} Swift Manpower Temps Agency Ltd.</span><a href="{{ route('job.openings') }}">Explore job openings <span aria-hidden="true">↗</span></a></footer>
    <script src="{{ asset('assets/js/account-forms.js') }}" defer></script>
</body>
</html>
