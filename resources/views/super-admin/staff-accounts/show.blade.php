@extends('layouts.admin')

@section('title', 'View Blog Staff Account | Super Admin')
@section('page_title', 'View Blog Staff Account')
@section('page_intro', 'Review this staff account and open the correct login route.')

@section('styles')
<style>
    .staff-show-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1.1fr) minmax(300px, 0.9fr);
    }

    .staff-show-list {
        display: grid;
        gap: 14px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .staff-show-list li {
        background: #fff8f5;
        border-radius: 18px;
        padding: 16px 18px;
    }

    .staff-show-list strong {
        display: block;
        font-size: 13px;
        letter-spacing: 0.1em;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .staff-login-box {
        background: #111827;
        border-radius: 22px;
        color: #fff;
        padding: 24px;
    }

    .staff-login-box code {
        background: rgba(255,255,255,0.1);
        border-radius: 12px;
        display: block;
        margin-top: 12px;
        padding: 12px 14px;
        word-break: break-all;
    }

    .staff-show-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 18px;
    }

    .staff-show-actions a {
        border-radius: 16px;
        font-weight: 800;
        padding: 12px 14px;
        text-decoration: none;
    }

    .staff-show-actions .primary {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        color: #fff;
    }

    .staff-show-actions .secondary {
        background: #fff7f5;
        border: 1px solid #f1ddd6;
        color: #334155;
    }

    @media (max-width: 1024px) {
        .staff-show-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
@php($inviteUrl = route('super-admin.sign-in', ['email' => $staffAccount->email]))
<div class="staff-show-grid">
    <section class="admin-card">
        <h3>{{ $staffAccount->name }}</h3>
        <ul class="staff-show-list">
            <li>
                <strong>Email</strong>
                <span>{{ $staffAccount->email }}</span>
            </li>
            <li>
                <strong>Role</strong>
                <span>Blog Staff</span>
            </li>
            <li>
                <strong>Created</strong>
                <span>{{ $staffAccount->created_at?->format('M d, Y h:i A') }}</span>
            </li>
        </ul>
    </section>

    <section class="staff-login-box">
        <h3>Login Route</h3>
        <p>Blog staff sign in through the admin login page below.</p>
        <code>{{ $inviteUrl }}</code>
        <div class="staff-show-actions">
            <a href="{{ route('super-admin.sign-in', ['email' => $staffAccount->email]) }}" class="primary">Open Login Page</a>
            <a href="{{ route('super-admin.staff-accounts.edit', $staffAccount) }}" class="secondary">Edit Staff Account</a>
        </div>
    </section>
</div>
@endsection
