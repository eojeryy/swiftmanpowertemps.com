@extends('layouts.admin')

@section('title', 'Blog Staff Accounts | Super Admin')
@section('page_title', 'Blog Staff Accounts')
@section('page_intro', 'Create blog staff logins for team members who should only manage blog content.')

@section('styles')
<style>
    .staff-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1fr);
    }

    .staff-card {
        overflow: hidden;
        position: relative;
    }

    .staff-card::before {
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.08), transparent 55%);
        content: "";
        inset: 0;
        pointer-events: none;
        position: absolute;
    }

    .staff-card > * {
        position: relative;
        z-index: 1;
    }

    .staff-form-shell {
        display: grid;
        gap: 22px;
    }

    .staff-form-banner {
        align-items: center;
        background: linear-gradient(135deg, #111827 0%, #7f1d1d 100%);
        border-radius: 24px;
        color: #fff;
        display: grid;
        gap: 16px;
        grid-template-columns: minmax(0, 1.3fr) minmax(220px, 0.7fr);
        padding: 24px;
    }

    .staff-form-banner h4 {
        color: #fff;
        font-size: 24px;
        margin: 0 0 10px;
    }

    .staff-form-banner p,
    .staff-form-banner li {
        color: rgba(255, 255, 255, 0.82);
        margin: 0;
    }

    .staff-form-banner ul {
        display: grid;
        gap: 10px;
        list-style: none;
        margin: 16px 0 0;
        padding: 0;
    }

    .staff-form-banner li {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 10px 12px;
    }

    .staff-form-highlight {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 22px;
        padding: 20px;
    }

    .staff-form-highlight span {
        color: #fecaca;
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .staff-form-highlight strong {
        display: block;
        font-size: 36px;
        line-height: 1;
        margin-bottom: 10px;
    }

    .staff-form-highlight small {
        color: rgba(255, 255, 255, 0.8);
        display: block;
        line-height: 1.6;
    }

    .staff-form-grid {
        display: grid;
        gap: 18px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .staff-form-field-full {
        grid-column: 1 / -1;
    }

    .staff-form-field label {
        display: block;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.06em;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .staff-form-field input {
        background: #fff;
        border: 1px solid #dbe4ee;
        border-radius: 18px;
        font: inherit;
        padding: 15px 16px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        width: 100%;
    }

    .staff-form-field input:focus {
        border-color: #ef4444;
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
        outline: none;
        transform: translateY(-1px);
    }

    .staff-form-footer {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: space-between;
    }

    .staff-form-footer p {
        margin: 0;
        max-width: 70ch;
    }

    .staff-note,
    .staff-empty,
    .staff-login-text,
    .staff-date-text,
    .staff-name-cell span {
        color: #64748b;
    }

    .staff-form-submit {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        border: 0;
        border-radius: 18px;
        color: #fff;
        cursor: pointer;
        font: inherit;
        font-weight: 800;
        min-width: 220px;
        padding: 16px 22px;
    }

    .staff-login-route {
        align-items: center;
        background: linear-gradient(135deg, #111827, #7f1d1d);
        border-radius: 22px;
        color: #fff;
        display: flex;
        gap: 18px;
        justify-content: space-between;
        margin-bottom: 22px;
        padding: 22px 24px;
    }

    .staff-login-route p {
        color: rgba(255, 255, 255, 0.82);
        margin: 8px 0 0;
        word-break: break-all;
    }

    .staff-login-route a {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 16px;
        color: #fff;
        font-weight: 800;
        padding: 12px 14px;
        text-decoration: none;
        white-space: nowrap;
    }

    .staff-table-wrap {
        overflow-x: auto;
    }

    .staff-table {
        border-collapse: separate;
        border-spacing: 0 14px;
        min-width: 1080px;
        width: 100%;
    }

    .staff-table thead th {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        padding: 0 18px 8px;
        text-align: left;
        text-transform: uppercase;
    }

    .staff-table tbody td {
        background: linear-gradient(180deg, #fff, #fffdfa);
        border-bottom: 1px solid #efe5e0;
        border-top: 1px solid #efe5e0;
        padding: 20px 18px;
        vertical-align: top;
    }

    .staff-table tbody td:first-child {
        border-left: 1px solid #efe5e0;
        border-radius: 22px 0 0 22px;
    }

    .staff-table tbody td:last-child {
        border-radius: 0 22px 22px 0;
        border-right: 1px solid #efe5e0;
    }

    .staff-name-cell strong {
        color: #111827;
        display: block;
        font-size: 17px;
        margin-bottom: 6px;
    }

    .staff-login-text {
        display: block;
        line-height: 1.6;
        word-break: break-all;
    }

    .staff-date-text {
        display: block;
        white-space: nowrap;
    }

    .staff-badge {
        background: #fff1ed;
        border-radius: 999px;
        color: #9a3412;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .staff-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .staff-action {
        align-items: center;
        background: #fff7f5;
        border: 1px solid #f1ddd6;
        border-radius: 14px;
        color: #334155;
        display: inline-flex;
        font-size: 13px;
        font-weight: 800;
        justify-content: center;
        padding: 10px 12px;
        text-decoration: none;
    }

    .staff-copy-button {
        cursor: pointer;
        position: relative;
        transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease;
    }

    .staff-copy-button.is-copied {
        background: #ecfdf3;
        border-color: #bbf7d0;
        color: #166534;
    }

    .staff-action-danger {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        border-radius: 14px;
        color: #be123c;
        cursor: pointer;
        font: inherit;
        font-size: 13px;
        font-weight: 800;
        padding: 10px 12px;
    }

    @media (max-width: 1100px) {
        .staff-form-banner {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .staff-form-grid {
            grid-template-columns: 1fr;
        }

        .staff-form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .staff-form-submit {
            width: 100%;
        }

        .staff-login-route {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
@php($staffLoginRoute = route('super-admin.sign-in'))
<div class="staff-grid">
    <section class="admin-card staff-card">
        <div class="dashboard-card-title">
            <h3>Create Staff Account</h3>
            <span>Set up a staff login for uploading, editing, and publishing blog posts from a cleaner full-width workspace.</span>
        </div>

        <div class="staff-form-shell">
            <div class="staff-form-banner">
                <div>
                    <h4>Invite a blog content manager</h4>
                    <p>Create focused staff access for teammates who should only work on blog publishing without touching the rest of the admin system.</p>
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
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="staff-form-field">
                    <label for="email">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="staff-form-field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div class="staff-form-field">
                    <label for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
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
            <span>Manage all blog staff accounts from one full-width table with faster access to view, edit, invite, and delete actions.</span>
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
            <div class="staff-table-wrap">
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>Staff Member</th>
                            <th>Role</th>
                            <th>Invite Route</th>
                            <th>Created</th>
                            <th>Actions</th>
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
