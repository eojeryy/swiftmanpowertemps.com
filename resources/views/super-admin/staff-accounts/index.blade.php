@extends('layouts.admin')

@section('title', 'Blog Staff Accounts | Super Admin')
@section('page_title', 'Blog Staff Accounts')
@section('page_intro', 'Create blog staff logins for team members who should only manage blog content.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-staff-list.css') }}">
@endsection

@section('content')
@php($staffLoginRoute = route('super-admin.sign-in'))
<div class="staff-grid">
    <section class="admin-card staff-card">
        <div class="dashboard-card-title">
            <h3>Create Staff Account</h3>
            <span>Give your content team access to blog publishing.</span>
        </div>

        <div class="staff-form-shell">
            <div class="staff-form-banner">
                <div>
                    <h4>Invite a blog content manager</h4>
                    <p>Blog staff can create and edit articles. Recruitment and account management remain restricted to super admins.</p>
                    <ul>
                        <li>Blog-only dashboard access</li>
                        <li>Can create, edit, and upload post content</li>
                        <li>No applicant, jobs, or category admin access</li>
                    </ul>
                </div>
                <div class="staff-form-highlight">
                    <span>Staff Login Route</span>
                    <strong>/super-admin/sign-in</strong>
                    <small>Share the admin sign-in page with blog staff after creating their account.</small>
                </div>
            </div>

            <form method="post" action="{{ route('super-admin.staff-accounts.store') }}" class="staff-form-grid">
                @csrf
                <div class="staff-form-field">
                    <label for="name">Full name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" @if($errors->has('name')) aria-describedby="name-error" @endif autocomplete="name" maxlength="255">
                @error('name')<p class="workspace-field-error" id="name-error">{{ $message }}</p>@enderror
                </div>
                <div class="staff-form-field">
                    <label for="email">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" @if($errors->has('email')) aria-describedby="email-error" @endif autocomplete="email" maxlength="255">
                @error('email')<p class="workspace-field-error" id="email-error">{{ $message }}</p>@enderror
                </div>
                <div class="staff-form-field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}" @if($errors->has('password')) aria-describedby="password-error" @endif autocomplete="new-password" minlength="8">
                @error('password')<p class="workspace-field-error" id="password-error">{{ $message }}</p>@enderror
                </div>
                <div class="staff-form-field">
                    <label for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required aria-invalid="{{ $errors->has('password_confirmation') ? 'true' : 'false' }}" @if($errors->has('password_confirmation')) aria-describedby="password_confirmation-error" @endif autocomplete="new-password" minlength="8">
                @error('password_confirmation')<p class="workspace-field-error" id="password_confirmation-error">{{ $message }}</p>@enderror
                </div>
                <div class="staff-form-field staff-form-field-full">
                    <div class="staff-form-footer">
                        <p class="staff-note">This account will not be able to open applicants, job requests, categories, or other admin sections. It is limited to the blog workspace.</p>
                        <button type="submit" class="staff-form-submit">Create Blog Staff Account</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="admin-card staff-card">
        <div class="dashboard-card-title">
            <h3>Current Blog Staff</h3>
            <span>Review your content team and share their sign-in link.</span>
        </div>

        <div class="staff-login-route">
            <div>
                <strong>Blog staff login route</strong>
                <p>{{ $staffLoginRoute }}</p>
            </div>
            <a href="{{ $staffLoginRoute }}">Open Login Page</a>
        </div>

        @if ($staffAccounts->isEmpty())
            <p class="staff-empty">No blog staff accounts have been created yet.</p>
        @else
            @include('account.partials.table-filter', ['tableId' => 'staff-records', 'label' => 'staff accounts'])
            <div class="staff-table-wrap" tabindex="0" role="region" aria-label="Staff accounts table">
                <table class="staff-table" id="staff-records">
                    <thead>
                        <tr>
                            <th scope="col">Staff Member</th>
                            <th scope="col">Role</th>
                            <th scope="col">Invite Route</th>
                            <th scope="col">Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffAccounts as $staffAccount)
                            @php($inviteUrl = route('super-admin.sign-in', ['email' => $staffAccount->email]))
                            <tr>
                                <td class="staff-name-cell">
                                    <strong>{{ $staffAccount->name }}</strong>
                                    <span>{{ $staffAccount->email }}</span>
                                </td>
                                <td>
                                    <span class="staff-badge">Blog Staff</span>
                                </td>
                                <td>
                                    <span class="staff-login-text">{{ $inviteUrl }}</span>
                                </td>
                                <td>
                                    <span class="staff-date-text">{{ $staffAccount->created_at?->format('M d, Y') }}</span>
                                    <span class="staff-date-text">{{ $staffAccount->created_at?->format('h:i A') }}</span>
                                </td>
                                <td>
                                    <div class="staff-actions">
                                        <a href="{{ route('super-admin.staff-accounts.show', $staffAccount) }}" class="staff-action">View</a>
                                        <a href="{{ route('super-admin.staff-accounts.edit', $staffAccount) }}" class="staff-action">Edit</a>
                                        <button
                                            type="button"
                                            class="staff-action staff-copy-button"
                                            data-invite-link="{{ $inviteUrl }}"
                                            data-default-label="Invite Link"
                                        >
                                            Invite Link
                                        </button>
                                        <form method="post" action="{{ route('super-admin.staff-accounts.destroy', $staffAccount) }}" onsubmit="return confirm('Delete this blog staff account?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="staff-action-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var copyButtons = document.querySelectorAll('.staff-copy-button');

        copyButtons.forEach(function (button) {
            button.addEventListener('click', async function () {
                var inviteLink = button.getAttribute('data-invite-link');
                var defaultLabel = button.getAttribute('data-default-label') || 'Invite Link';

                try {
                    await navigator.clipboard.writeText(inviteLink);
                    button.textContent = 'Copied';
                    button.classList.add('is-copied');

                    window.setTimeout(function () {
                        button.textContent = defaultLabel;
                        button.classList.remove('is-copied');
                    }, 1800);
                } catch (error) {
                    button.textContent = 'Copy Failed';

                    window.setTimeout(function () {
                        button.textContent = defaultLabel;
                    }, 1800);
                }
            });
        });
    });
</script>
@endsection
