@extends('layouts.admin')

@section('title', 'Edit Blog Staff Account | Super Admin')
@section('page_title', 'Edit Blog Staff Account')
@section('page_intro', 'Update the staff member details or reset their password.')

@section('styles')
<style>
    .staff-edit-card {
        max-width: 720px;
    }

    .staff-form-grid {
        display: grid;
        gap: 16px;
    }

    .staff-form-field label {
        display: block;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .staff-form-field input {
        border: 1px solid #dbe4ee;
        border-radius: 16px;
        font: inherit;
        padding: 14px 16px;
        width: 100%;
    }

    .staff-form-note {
        color: #64748b;
        margin: 0;
    }

    .staff-form-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .staff-btn {
        border-radius: 18px;
        display: inline-flex;
        font-weight: 800;
        padding: 14px 18px;
        text-decoration: none;
    }

    .staff-btn-primary {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        border: 0;
        color: #fff;
        cursor: pointer;
    }

    .staff-btn-secondary {
        background: #fff7f5;
        border: 1px solid #f1ddd6;
        color: #334155;
    }
</style>
@endsection

@section('content')
<section class="admin-card staff-edit-card">
    <form method="post" action="{{ route('super-admin.staff-accounts.update', $staffAccount) }}" class="staff-form-grid">
        @csrf
        @method('put')
        <div class="staff-form-field">
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $staffAccount->name) }}" required>
        </div>
        <div class="staff-form-field">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $staffAccount->email) }}" required>
        </div>
        <div class="staff-form-field">
            <label for="password">New password</label>
            <input id="password" type="password" name="password">
        </div>
        <div class="staff-form-field">
            <label for="password_confirmation">Confirm new password</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>
        <p class="staff-form-note">Leave the password fields empty if you only want to change the name or email address.</p>
        <div class="staff-form-actions">
            <button type="submit" class="staff-btn staff-btn-primary">Save Changes</button>
            <a href="{{ route('super-admin.staff-accounts.index') }}" class="staff-btn staff-btn-secondary">Back to Staff Accounts</a>
        </div>
    </form>
</section>
@endsection
