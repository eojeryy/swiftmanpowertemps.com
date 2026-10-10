<form method="post" action="{{ route($actionRoute) }}" id="{{ $formId }}" data-account-form>
    @csrf
    @if($registration)
        <div class="auth-field">
            <label for="name">Full name</label>
            <input class="auth-input" id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="255" placeholder="Your full name" required aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" @if($errors->has('name')) aria-describedby="name-error" @endif>
            @error('name')<p class="auth-field-error" id="name-error">{{ $message }}</p>@enderror
        </div>
    @endif
    <div class="auth-field">
        <label for="email">Email address</label>
        <input class="auth-input" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" inputmode="email" maxlength="255" placeholder="name@example.com" required aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" @if($errors->has('email')) aria-describedby="email-error" @endif>
        @error('email')<p class="auth-field-error" id="email-error">{{ $message }}</p>@enderror
    </div>
    @foreach($registration ? ['password' => 'Password', 'password_confirmation' => 'Confirm password'] : ['password' => 'Password'] as $field => $label)
        <div class="auth-field">
            <label for="{{ $field }}">{{ $label }}</label>
            <div class="auth-password-wrap">
                <input class="auth-input auth-password-input" id="{{ $field }}" type="password" name="{{ $field }}" autocomplete="{{ $registration ? 'new-password' : 'current-password' }}" placeholder="{{ $field === 'password_confirmation' ? 'Repeat your password' : ($registration ? 'Create a password' : 'Enter your password') }}" @if($registration) minlength="8" @endif required aria-invalid="{{ $errors->has($field) ? 'true' : 'false' }}" aria-describedby="{{ $field }}-help {{ $field }}-caps {{ $errors->has($field) ? $field.'-error' : '' }}">
                <button class="auth-password-toggle" type="button" data-password-target="{{ $field }}" aria-label="Show {{ strtolower($label) }}" aria-controls="{{ $field }}" aria-pressed="false" hidden>Show</button>
            </div>
            <p class="auth-field-help" id="{{ $field }}-help">{{ $field === 'password_confirmation' ? 'Enter the same password again.' : ($registration ? 'Use at least 8 characters.' : 'Passwords are case-sensitive.') }}</p>
            <p class="auth-caps-lock" id="{{ $field }}-caps" role="status" hidden>Caps Lock is on.</p>
            @error($field)<p class="auth-field-error" id="{{ $field }}-error">{{ $message }}</p>@enderror
        </div>
    @endforeach
    @unless($registration)
        <label class="auth-remember" for="remember"><input id="remember" type="checkbox" name="remember" value="1" @checked(old('remember'))><span>Keep me signed in on this device</span></label>
    @endunless
    <button class="auth-submit" type="submit" data-submit @disabled($registration && isset($remainingSlots) && $remainingSlots < 1)><span data-submit-label>{{ $submitLabel }}</span><span aria-hidden="true">→</span></button>
    <span class="auth-form-status" data-form-status role="status"></span>
</form>
<div class="auth-setup"><a href="{{ route($alternateRoute) }}">{{ $alternateLabel }} <span aria-hidden="true">↗</span></a></div>
