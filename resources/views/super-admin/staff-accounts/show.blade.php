@extends('layouts.admin')

@section('title', 'View Blog Staff Account | Super Admin')
@section('page_title', 'View Blog Staff Account')
@section('page_intro', 'Review this staff account and open the correct login route.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-staff-detail.css') }}">
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
