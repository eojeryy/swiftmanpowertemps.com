@extends('layouts.admin')

@section('title', 'Edit Blog Staff Account | Super Admin')
@section('page_title', 'Edit Blog Staff Account')
@section('page_intro', 'Update the staff member details or reset their password.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-staff-edit.css') }}">
@endsection

@section('content')
<section class="admin-card staff-edit-card">
    <form method="post" action="{{ route('super-admin.staff-accounts.update', $staffAccount) }}" class="staff-form-grid">
        @csrf
        @method('put')
        <div class="staff-form-field">
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $staffAccount->name) }}" required aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" @if($errors->has('name')) aria-describedby="name-error" @endif autocomplete="name" maxlength="255">
                @error('name')<p class="workspace-field-error" id="name-error">{{ $message }}</p>@enderror
        </div>
        <div class="staff-form-field">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $staffAccount->email) }}" required aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" @if($errors->has('email')) aria-describedby="email-error" @endif autocomplete="email" maxlength="255">
                @error('email')<p class="workspace-field-error" id="email-error">{{ $message }}</p>@enderror
        </div>
        <div class="staff-form-field">
            <label for="password">New password</label>
            <input id="password" type="password" name="password" aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}" @if($errors->has('password')) aria-describedby="password-error" @endif autocomplete="new-password" minlength="8">
                @error('password')<p class="workspace-field-error" id="password-error">{{ $message }}</p>@enderror
        </div>
        <div class="staff-form-field">
            <label for="password_confirmation">Confirm new password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" aria-invalid="{{ $errors->has('password_confirmation') ? 'true' : 'false' }}" @if($errors->has('password_confirmation')) aria-describedby="password_confirmation-error" @endif autocomplete="new-password" minlength="8">
                @error('password_confirmation')<p class="workspace-field-error" id="password_confirmation-error">{{ $message }}</p>@enderror
        </div>
        <p class="staff-form-note">Leave the password fields empty if you only want to change the name or email address.</p>
        <div class="staff-form-actions">
            <button type="submit" class="staff-btn staff-btn-primary">Save Changes</button>
            <a href="{{ route('super-admin.staff-accounts.index') }}" class="staff-btn staff-btn-secondary">Back to Staff Accounts</a>
        </div>
    </form>
</section>
@endsection
