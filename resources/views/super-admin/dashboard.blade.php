@extends('layouts.admin')

@section('title', 'Super Admin Dashboard | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Super Admin Dashboard')
@section('page_intro', 'A secure workspace for monitoring admin access and moving quickly across the Swift Manpower website.')

@section('styles')
<style>
    .dashboard-grid {
        --dash-accent: #b91c1c;
        --dash-accent-deep: #7f1d1d;
        --dash-ink: #0f172a;
        --dash-muted: #64748b;
        --dash-border: #e2e8f0;
        --dash-surface: #ffffff;
        --dash-soft: #fff7f3;
        --dash-soft-2: #fff1ed;
        --dash-shadow: 0 22px 50px rgba(15, 23, 42, 0.08);
        --dash-shadow-soft: 0 12px 30px rgba(15, 23, 42, 0.06);
        display: grid;
        gap: 24px;
    }

    .dashboard-hero {
        background:
            radial-gradient(circle at top right, rgba(248, 113, 113, 0.24), transparent 30%),
            linear-gradient(135deg, #111827, #1f2937 58%, #7f1d1d 120%);
        color: #fff;
        overflow: hidden;
        position: relative;
    }

    .dashboard-hero::before {
        background:
            linear-gradient(120deg, rgba(255, 255, 255, 0.08), transparent 50%),
            radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.12), transparent 30%);
        content: "";
        inset: 0;
        position: absolute;
    }

    .dashboard-hero > * {
        position: relative;
        z-index: 1;
    }

    .dashboard-hero-grid {
        align-items: end;
        display: grid;
        gap: 28px;
        grid-template-columns: minmax(0, 1.35fr) minmax(320px, 0.65fr);
    }

    .dashboard-hero-copy span {
        color: rgba(255, 255, 255, 0.72);
        display: inline-block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.18em;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .dashboard-hero-copy h3 {
        color: #fff;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.05;
        margin: 0 0 14px;
        max-width: 11ch;
    }

    .dashboard-hero-copy p {
        color: rgba(255, 255, 255, 0.82);
        font-size: 16px;
        line-height: 1.75;
        margin: 0;
        max-width: 60ch;
    }

    .dashboard-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 22px;
    }

    .dashboard-hero-actions a {
        align-items: center;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 999px;
        color: #fff;
        display: inline-flex;
        font-size: 13px;
        font-weight: 800;
        gap: 8px;
        padding: 12px 16px;
    }

    .dashboard-hero-actions a.primary {
        background: #fff;
        color: var(--dash-ink);
    }

    .dashboard-hero-actions a.secondary {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
    }

    .hero-aside-card {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 28px;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        padding: 24px;
    }

    .hero-aside-card span {
        color: rgba(255, 255, 255, 0.68);
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .hero-aside-card strong {
        color: #fff;
        display: block;
        font-size: 48px;
        line-height: 1;
        margin-bottom: 10px;
    }

    .hero-aside-card p {
        color: rgba(255, 255, 255, 0.82);
        line-height: 1.7;
        margin: 0;
    }

    .metric-grid {
        display: grid;
        gap: 22px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .metric-card {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.1), transparent 35%),
            linear-gradient(180deg, #fff, #fff9f6);
        border: 1px solid var(--dash-border);
        border-radius: 28px;
        box-shadow: var(--dash-shadow-soft);
        overflow: hidden;
        position: relative;
    }

    .metric-card::before {
        background: linear-gradient(135deg, rgba(197, 48, 48, 0.12), transparent 60%);
        content: "";
        inset: 0;
        position: absolute;
    }

    .metric-card::after {
        background: linear-gradient(180deg, rgba(185, 28, 28, 0.12), transparent);
        border-radius: 999px;
        content: "";
        height: 120px;
        position: absolute;
        right: -18px;
        top: -46px;
        width: 120px;
    }

    .metric-card > * {
        position: relative;
        z-index: 1;
    }

    .metric-label {
        color: var(--dash-muted);
        display: block;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .metric-value {
        display: block;
        font-size: 44px;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 12px;
        color: var(--dash-ink);
    }

    .metric-note {
        color: #475569;
        margin: 0;
    }

    .content-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: 1.4fr 1fr;
    }

    .dashboard-card-title {
        align-items: center;
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 22px;
    }

    .dashboard-card-title h3 {
        color: var(--dash-ink);
        font-size: 26px;
        margin: 0;
    }

    .dashboard-card-title span {
        color: var(--dash-muted);
        font-size: 14px;
        max-width: 54ch;
    }

    .activity-list,
    .shortcut-list {
        display: grid;
        gap: 18px;
    }

    .activity-item,
    .shortcut-item {
        background: linear-gradient(180deg, #fff, #fffdfa);
        border: 1px solid #efe5e0;
        border-radius: 24px;
        box-shadow: var(--dash-shadow-soft);
        padding: 20px;
    }

    .activity-item strong,
    .shortcut-item strong {
        display: block;
        color: var(--dash-ink);
        font-size: 18px;
        margin-bottom: 8px;
    }

    .activity-item span,
    .shortcut-item span {
        color: var(--dash-muted);
        display: block;
        line-height: 1.6;
    }

    .shortcut-item a {
        color: var(--dash-accent);
        display: inline-block;
        font-size: 14px;
        font-weight: 800;
        margin-top: 12px;
    }

    .hero-chip-list {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin: 18px 0 0;
        padding: 0;
    }

    .hero-chip-list li {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 999px;
        color: rgba(255, 255, 255, 0.82);
        list-style: none;
        padding: 10px 14px;
    }

    .applicant-overview-grid,
    .applicant-job-grid,
    .recent-applicant-grid {
        display: grid;
        gap: 20px;
    }

    .applicant-overview-grid,
    .recent-applicant-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .applicant-job-card,
    .applicant-stat-card,
    .recent-applicant-card {
        background: var(--dash-surface);
        border: 1px solid var(--dash-border);
        border-radius: 28px;
        box-shadow: var(--dash-shadow-soft);
        padding: 24px;
    }

    .applicant-job-card h4,
    .recent-applicant-card h4,
    .applicant-panel-summary h4 {
        color: var(--dash-ink);
        font-size: 22px;
        margin: 0 0 10px;
    }

    .applicant-job-card p,
    .recent-applicant-card p,
    .applicant-panel-summary p,
    .applicant-meta,
    .applicant-notes,
    .unmatched-copy {
        color: var(--dash-muted);
        line-height: 1.6;
        margin: 0;
    }

    .applicant-stat-card strong {
        display: block;
        color: var(--dash-ink);
        font-size: 42px;
        line-height: 1;
        margin-bottom: 8px;
    }

    .applicant-stat-card,
    .recent-applicant-card,
    .applicant-job-card {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.08), transparent 35%),
            linear-gradient(180deg, #fff, #fff9f6);
    }

    .pill-row,
    .applicant-tag-row,
    .applicant-action-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .pill,
    .applicant-tag {
        background: var(--dash-soft-2);
        border-radius: 999px;
        color: var(--dash-accent);
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.02em;
        padding: 9px 13px;
    }

    .applicant-panel {
        background: linear-gradient(180deg, #ffffff, #fff9f7);
        border: 1px solid var(--dash-border);
        border-radius: 30px;
        box-shadow: var(--dash-shadow);
        overflow: hidden;
    }

    .applicant-panel summary {
        cursor: pointer;
        list-style: none;
        padding: 26px;
    }

    .applicant-panel summary::-webkit-details-marker {
        display: none;
    }

    .applicant-panel[open] summary {
        background: linear-gradient(180deg, #fff7f4, #fffdfc);
    }

    .applicant-panel-summary {
        align-items: flex-start;
        display: flex;
        gap: 18px;
        justify-content: space-between;
    }

    .applicant-panel-count {
        background: linear-gradient(135deg, var(--dash-ink), #1e293b);
        border-radius: 22px;
        box-shadow: 0 18px 34px rgba(15, 23, 42, 0.2);
        color: #fff;
        min-width: 112px;
        padding: 18px 20px;
        text-align: center;
    }

    .applicant-panel-count strong {
        display: block;
        font-size: 32px;
        line-height: 1;
        margin-bottom: 6px;
    }

    .applicant-list {
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0.95)),
            linear-gradient(180deg, #fff8f5, #ffffff);
        border-top: 1px solid var(--dash-border);
        display: grid;
        gap: 20px;
        padding: 26px;
    }

    .applicant-card {
        background: linear-gradient(180deg, #fff, #fffdfa);
        border: 1px solid #f1e4dd;
        border-radius: 26px;
        box-shadow: 0 16px 34px rgba(15, 23, 42, 0.07);
        padding: 24px;
    }

    .applicant-card-head {
        align-items: flex-start;
        display: flex;
        gap: 16px;
        justify-content: space-between;
        margin-bottom: 14px;
    }

    .applicant-card-head h5 {
        color: var(--dash-ink);
        font-size: 21px;
        margin: 0 0 6px;
    }

    .applicant-card-head span {
        color: var(--dash-muted);
        display: block;
    }

    .applicant-grid {
        display: grid;
        gap: 14px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        margin-bottom: 18px;
    }

    .applicant-grid div {
        background: linear-gradient(180deg, #fff8f4, #ffffff);
        border: 1px solid #f2e8e3;
        border-radius: 20px;
        padding: 15px 16px;
    }

    .applicant-grid strong {
        color: var(--dash-ink);
        display: block;
        font-size: 12px;
        margin-bottom: 6px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .applicant-action-row a {
        align-items: center;
        background: #fff;
        border: 1px solid #f4c9c4;
        border-radius: 999px;
        color: var(--dash-accent);
        display: inline-flex;
        font-size: 14px;
        font-weight: 800;
        gap: 8px;
        padding: 11px 16px;
        transition: transform 0.2s ease, background 0.2s ease, border-color 0.2s ease;
    }

    .applicant-action-row a:hover {
        background: var(--dash-soft-2);
        border-color: #ef4444;
        transform: translateY(-1px);
    }

    .applicant-action-row a.primary-action {
        background: linear-gradient(135deg, var(--dash-accent), var(--dash-accent-deep));
        border-color: transparent;
        color: #fff;
    }

    .unmatched-box {
        background:
            radial-gradient(circle at top right, rgba(251, 146, 60, 0.12), transparent 34%),
            linear-gradient(180deg, #fff8f6, #fffdfc);
        border: 1px dashed #f5b59a;
        border-radius: 28px;
        padding: 24px;
    }

    .unmatched-meta {
        display: grid;
        gap: 10px;
    }

    .unmatched-meta span {
        background: #fff8f5;
        border: 1px solid #f5e4db;
        border-radius: 18px;
        padding: 11px 13px;
    }

    .activity-item:nth-child(even) {
        background: #fff4ef;
        border-color: #f0c7bf;
    }

    .activity-item:nth-child(even) .unmatched-meta span {
        background: #ffffff;
    }

    .unmatched-meta strong {
        color: var(--dash-ink);
        display: inline;
        font-size: 12px;
        letter-spacing: 0.06em;
        margin: 0 8px 0 0;
        text-transform: uppercase;
    }

    .section-shell {
        background: linear-gradient(180deg, #fff, #fffafa);
    }

    .section-shell.soft {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.06), transparent 34%),
            linear-gradient(180deg, #fff8f6, #fffdfd);
    }

    @media (max-width: 1199px) {
        .metric-grid,
        .content-grid,
        .dashboard-hero-grid,
        .applicant-overview-grid,
        .recent-applicant-grid,
        .applicant-grid {
            grid-template-columns: 1fr;
        }

        .applicant-panel-summary,
        .applicant-card-head {
            flex-direction: column;
        }

        .dashboard-card-title {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 767px) {
        .metric-grid {
            grid-template-columns: 1fr;
        }

        .metric-value {
            font-size: 36px;
        }

        .dashboard-hero-copy h3 {
            max-width: none;
        }

        .dashboard-hero-actions,
        .applicant-action-row,
        .pill-row,
        .applicant-tag-row,
        .hero-chip-list {
            width: 100%;
        }

        .dashboard-hero-actions a,
        .applicant-action-row a {
            justify-content: center;
            width: 100%;
        }

        .hero-chip-list li {
            width: 100%;
        }

        .applicant-panel summary,
        .applicant-list,
        .applicant-card,
        .applicant-stat-card,
        .recent-applicant-card,
        .applicant-job-card,
        .unmatched-box {
            padding: 18px;
        }

        .hero-aside-card strong {
            font-size: 40px;
        }
    }

    @media (max-width: 520px) {
        .dashboard-grid {
            gap: 18px;
        }

        .dashboard-card-title h3 {
            font-size: 22px;
        }

        .dashboard-hero-copy p,
        .hero-aside-card p,
        .metric-note,
        .applicant-job-card p,
        .recent-applicant-card p,
        .applicant-panel-summary p {
            font-size: 14px;
        }

        .applicant-panel-count {
            min-width: 0;
            width: 100%;
        }

        .applicant-grid {
            grid-template-columns: 1fr;
        }

        .recent-applicant-card h4,
        .applicant-job-card h4,
        .applicant-panel-summary h4,
        .applicant-card-head h5 {
            font-size: 20px;
        }
    }
</style>
@endsection

@section('content')
<div class="dashboard-grid">
    <section class="admin-card dashboard-hero">
        <div class="dashboard-hero-grid">
            <div class="dashboard-hero-copy">
                <span>Super Admin Control</span>
                <h3>Monitor access, hiring flow, and applicant momentum.</h3>
                <p>You can manage private admin activity, review employer requests, and move quickly from approvals into applicant follow-up from one polished workspace.</p>
                <ul class="hero-chip-list">
                    <li>{{ now()->format('l, F j, Y') }}</li>
                    <li>Secure super admin session</li>
                    <li>Website shortcuts enabled</li>
                </ul>
                <div class="dashboard-hero-actions">
                    <a href="{{ route('super-admin.job-requests.index') }}" class="primary">Review job requests</a>
                    <a href="{{ route('super-admin.applicants.index') }}" class="secondary">Open applicants page</a>
                </div>
            </div>
            <div class="hero-aside-card">
                <span>Current Admin Access</span>
                <strong>{{ $superAdminCount }}</strong>
                <p>{{ $superAdminCount === 1 ? 'Super admin account is' : 'Super admin accounts are' }} active and ready for protected dashboard work.</p>
            </div>
        </div>
    </section>

    <section class="metric-grid">
        <div class="admin-card metric-card">
            <span class="metric-label">Super Admin Accounts</span>
            <span class="metric-value">{{ $superAdminCount }}</span>
            <p class="metric-note">Accounts with full dashboard access and protected navigation privileges.</p>
        </div>
        <div class="admin-card metric-card">
            <span class="metric-label">Total Website Users</span>
            <span class="metric-value">{{ $totalUserCount }}</span>
            <p class="metric-note">All user records currently stored in the application database.</p>
        </div>
        <div class="admin-card metric-card">
            <span class="metric-label">Dashboard Status</span>
            <span class="metric-value">Active</span>
            <p class="metric-note">Your super admin authentication flow and private dashboard are available.</p>
        </div>
        <div class="admin-card metric-card">
            <span class="metric-label">Pending Job Requests</span>
            <span class="metric-value">{{ $pendingJobRequestCount }}</span>
            <p class="metric-note">Employer requests waiting for approval before they can show on the public jobs page.</p>
        </div>
        <div class="admin-card metric-card">
            <span class="metric-label">Live Job Openings</span>
            <span class="metric-value">{{ $publishedJobCount }}</span>
            <p class="metric-note">Public openings currently available to applicants on the website.</p>
        </div>
        <div class="admin-card metric-card">
            <span class="metric-label">Job Applications</span>
            <span class="metric-value">{{ $totalJobApplicationCount }}</span>
            <p class="metric-note">Applications saved from the public apply form and ready for review or interview follow-up.</p>
        </div>
    </section>

    <section class="content-grid">
        <div class="admin-card section-shell">
            <div class="dashboard-card-title">
                <h3>Latest Super Admins</h3>
                <span>Recently created admin accounts</span>
            </div>

            <div class="activity-list">
                @forelse ($latestSuperAdmins as $superAdmin)
                    <div class="activity-item">
                        <strong>{{ $superAdmin->name }}</strong>
                        <span>{{ $superAdmin->email }}</span>
                        <span>Created {{ $superAdmin->created_at?->diffForHumans() ?? 'recently' }}</span>
                    </div>
                @empty
                    <div class="activity-item">
                        <strong>No super admins found yet</strong>
                        <span>Create your first super admin account from the sign-up page to begin using the dashboard.</span>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="admin-card section-shell soft">
            <div class="dashboard-card-title">
                <h3>Job Request Queue</h3>
                <span>Newest employer submissions awaiting review</span>
            </div>

            <div class="shortcut-list">
                @forelse ($latestJobRequests as $jobRequest)
                    <div class="shortcut-item">
                        <strong>{{ $jobRequest->position_hiring_for }}</strong>
                        <span>{{ $jobRequest->company_name }} in {{ $jobRequest->job_location }}. Status: {{ ucfirst($jobRequest->status ?? 'new') }}.</span>
                        <a href="{{ route('super-admin.job-requests.show', $jobRequest) }}">Review request</a>
                    </div>
                @empty
                    <div class="shortcut-item">
                        <strong>No employer requests yet</strong>
                        <span>Submitted place-job requests will appear here for approval.</span>
                        <a href="{{ route('place.job') }}">Open public form</a>
                    </div>
                @endforelse
                <div class="shortcut-item">
                    <strong>Open the full queue</strong>
                    <span>Review every employer request and publish approved jobs to the public listing page.</span>
                    <a href="{{ route('super-admin.job-requests.index') }}">View job requests</a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-card section-shell soft">
        <div class="dashboard-card-title">
            <h3>Applicant Pipeline</h3>
            <span>See applicants by job, contact them fast, or send an interview invite.</span>
        </div>

        <div class="applicant-overview-grid">
            <div class="applicant-stat-card">
                <strong>{{ $totalJobApplicationCount }}</strong>
                <p>total saved application{{ $totalJobApplicationCount === 1 ? '' : 's' }} across your current database.</p>
            </div>
            <div class="applicant-stat-card">
                <strong>{{ $jobsWithApplicantCount }}</strong>
                <p>job opening{{ $jobsWithApplicantCount === 1 ? '' : 's' }} currently mapped to one or more applicants.</p>
            </div>
            <div class="applicant-stat-card">
                <strong>{{ $unmatchedApplications->count() }}</strong>
                <p>application{{ $unmatchedApplications->count() === 1 ? '' : 's' }} need a manual job-number check.</p>
            </div>
        </div>
        <div class="applicant-action-row" style="margin-top: 20px;">
            <a href="{{ route('super-admin.applicants.index') }}" class="primary-action">Open applicant review page</a>
        </div>
    </section>

    <section class="admin-card section-shell">
        <div class="dashboard-card-title">
            <h3>Jobs With Applicants</h3>
            <span>Jump straight into a role and see everyone who applied for it.</span>
        </div>

        <div class="applicant-job-grid">
            @forelse ($jobsWithApplicants as $jobEntry)
                <div class="applicant-job-card">
                    <h4>{{ $jobEntry['job']->title }}</h4>
                    <p>{{ $jobEntry['job']->location }} • {{ $jobEntry['job']->employment_type }} • Job ID {{ $jobEntry['job_id_label'] }}</p>
                    <div class="pill-row" style="margin-top: 14px;">
                        <span class="pill">{{ $jobEntry['applicant_count'] }} applicant{{ $jobEntry['applicant_count'] === 1 ? '' : 's' }}</span>
                        <span class="pill">{{ ucfirst($jobEntry['job']->status) }}</span>
                    </div>
                    <div class="applicant-action-row" style="margin-top: 16px;">
                        <a href="{{ route('super-admin.applicants.index') }}#job-applicants-{{ $jobEntry['job']->id }}" class="primary-action">View applicants</a>
                        <a href="{{ route('job.details.show', $jobEntry['job']) }}">Open public job page</a>
                    </div>
                </div>
            @empty
                <div class="applicant-job-card">
                    <h4>No applicants matched to jobs yet</h4>
                    <p>Applications will appear here after job seekers submit the apply form with a job number that matches one of your listed jobs.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="admin-card section-shell soft">
        <div class="dashboard-card-title">
            <h3>Applicants By Job</h3>
            <span>Open a job to review each candidate, email them, call them, or send an interview invitation.</span>
        </div>

        <div class="applicant-job-grid">
            @forelse ($jobsWithApplicants as $jobEntry)
                <details class="applicant-panel" id="job-applicants-{{ $jobEntry['job']->id }}">
                    <summary>
                        <div class="applicant-panel-summary">
                            <div>
                                <h4>{{ $jobEntry['job']->title }}</h4>
                                <p>{{ $jobEntry['job']->location }} • {{ $jobEntry['job']->employment_type }} • Job ID {{ $jobEntry['job_id_label'] }}</p>
                                <div class="applicant-tag-row" style="margin-top: 12px;">
                                    <span class="applicant-tag">Category: {{ $jobEntry['job']->category }}</span>
                                    <span class="applicant-tag">Status: {{ ucfirst($jobEntry['job']->status) }}</span>
                                </div>
                            </div>
                            <div class="applicant-panel-count">
                                <strong>{{ $jobEntry['applicant_count'] }}</strong>
                                <span>applicant{{ $jobEntry['applicant_count'] === 1 ? '' : 's' }}</span>
                            </div>
                        </div>
                    </summary>

                    <div class="applicant-list">
                        @foreach ($jobEntry['applicants'] as $applicant)
                            @php
                                $phoneLink = preg_replace('/[^0-9+]/', '', $applicant->phone);
                                $interviewSubject = rawurlencode('Interview Invitation for '.$jobEntry['job']->title);
                                $interviewBody = rawurlencode(
                                    "Hello {$applicant->fname} {$applicant->lname},\n\n".
                                    "We reviewed your application for {$jobEntry['job']->title} (Job ID {$jobEntry['job_id_label']}). ".
                                    "We would like to invite you to an interview.\n\n".
                                    "Please reply with your availability and preferred contact time.\n\n".
                                    "Regards,\nSwift Manpower Temps Agency Ltd"
                                );
                            @endphp
                            <article class="applicant-card">
                                <div class="applicant-card-head">
                                    <div>
                                        <h5>{{ $applicant->fname }} {{ $applicant->lname }}</h5>
                                        <span>{{ $applicant->email }}</span>
                                        <span>Applied {{ $applicant->created_at?->diffForHumans() ?? 'recently' }} with job number {{ $applicant->job_number }}</span>
                                    </div>
                                    <div class="pill-row">
                                        <span class="pill">{{ $applicant->work_status }}</span>
                                        <span class="pill">{{ ucfirst($applicant->status ?? 'new') }}</span>
                                    </div>
                                </div>

                                <div class="applicant-grid">
                                    <div>
                                        <strong>Phone</strong>
                                        <span>{{ $applicant->phone }}</span>
                                    </div>
                                    <div>
                                        <strong>Education</strong>
                                        <span>{{ $applicant->education }}</span>
                                    </div>
                                    <div>
                                        <strong>Skills</strong>
                                        <span>{{ $applicant->skills }}</span>
                                    </div>
                                    <div>
                                        <strong>Experience</strong>
                                        <span>{{ $applicant->experience }}</span>
                                    </div>
                                    <div>
                                        <strong>Address</strong>
                                        <span>{{ $applicant->address }}</span>
                                    </div>
                                    <div>
                                        <strong>Qualities</strong>
                                        <span>{{ $applicant->qualities }}</span>
                                    </div>
                                </div>

                                @if (! empty($applicant->message))
                                    <p class="applicant-notes" style="margin-bottom: 16px;">{{ $applicant->message }}</p>
                                @endif

                                <div class="applicant-action-row">
                                    <a href="mailto:{{ $applicant->email }}" class="primary-action">Email applicant</a>
                                    <a href="mailto:{{ $applicant->email }}?subject={{ $interviewSubject }}&body={{ $interviewBody }}">Set interview</a>
                                    <a href="tel:{{ $phoneLink }}">Call applicant</a>
                                    <a href="{{ route('super-admin.applications.resume', $applicant) }}">Download resume</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </details>
            @empty
                <div class="applicant-job-card">
                    <h4>No job-based applicant groups yet</h4>
                    <p>Once applications come in with matching job numbers, each job will get its own review panel here.</p>
                </div>
            @endforelse

            @if ($unmatchedApplications->isNotEmpty())
                <div class="unmatched-box">
                    <h4 style="margin: 0 0 10px;">Applications Needing Manual Check</h4>
                    <p class="unmatched-copy">These applicants submitted a job number that did not match a current job ID automatically. Review the entered job number and contact them directly if needed.</p>
                    <div class="activity-list" style="margin-top: 18px;">
                        @foreach ($unmatchedApplications as $applicant)
                            <div class="activity-item">
                                <strong>{{ $applicant->fname }} {{ $applicant->lname }}</strong>
                                <div class="unmatched-meta">
                                    <span><strong>Email</strong>{{ $applicant->email }}</span>
                                    <span><strong>Phone</strong>{{ $applicant->phone }}</span>
                                    <span><strong>Entered job number</strong>{{ $applicant->job_number }}</span>
                                    <span><strong>Applied job</strong>{{ $applicant->applied_job_label }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="admin-card section-shell">
        <div class="dashboard-card-title">
            <h3>Recent Applications</h3>
            <span>The newest candidates saved from the application form.</span>
        </div>

        <div class="recent-applicant-grid">
            @forelse ($recentJobApplications as $applicant)
                <div class="recent-applicant-card">
                    <h4>{{ $applicant->fname }} {{ $applicant->lname }}</h4>
                    <p>{{ $applicant->email }}</p>
                    <p style="margin-top: 8px;">{{ $applicant->work_status }} • Job Number {{ $applicant->job_number }}</p>
                    <div class="applicant-action-row" style="margin-top: 16px;">
                        <a href="mailto:{{ $applicant->email }}" class="primary-action">Email</a>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $applicant->phone) }}">Call</a>
                    </div>
                </div>
            @empty
                <div class="recent-applicant-card">
                    <h4>No applications yet</h4>
                    <p>Once a candidate submits the public form, their details will appear here for quick follow-up.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
