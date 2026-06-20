@extends('layouts.admin')

@section('title', 'Applicants | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Applicants By Job')
@section('page_intro', 'Open a job to review each candidate, email them, call them, or send an interview invitation.')

@section('styles')
<style>
    .applicant-page-grid {
        --app-accent: #b91c1c;
        --app-accent-deep: #7f1d1d;
        --app-ink: #0f172a;
        --app-muted: #64748b;
        --app-border: #e2e8f0;
        --app-surface: #ffffff;
        --app-soft: #fff6f2;
        --app-soft-2: #fff1ed;
        --app-shadow: 0 22px 50px rgba(15, 23, 42, 0.08);
        --app-shadow-soft: 0 12px 30px rgba(15, 23, 42, 0.06);
    }

    .applicant-page-grid,
    .applicant-overview-grid,
    .applicant-job-grid,
    .recent-applicant-grid {
        display: grid;
        gap: 24px;
    }

    .applicant-overview-grid,
    .recent-applicant-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .applicant-hero {
        background:
            radial-gradient(circle at top right, rgba(248, 113, 113, 0.24), transparent 30%),
            linear-gradient(135deg, #111827, #1f2937 58%, #7f1d1d 120%);
        color: #fff;
        overflow: hidden;
        position: relative;
    }

    .applicant-hero::before {
        background:
            linear-gradient(120deg, rgba(255, 255, 255, 0.08), transparent 50%),
            radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.12), transparent 30%);
        content: "";
        inset: 0;
        position: absolute;
    }

    .applicant-hero > * {
        position: relative;
        z-index: 1;
    }

    .applicant-hero-grid {
        align-items: end;
        display: grid;
        gap: 28px;
        grid-template-columns: minmax(0, 1.35fr) minmax(320px, 0.65fr);
    }

    .applicant-hero-copy span {
        color: rgba(255, 255, 255, 0.72);
        display: inline-block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.18em;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .applicant-hero-copy h3 {
        color: #fff;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.05;
        margin: 0 0 14px;
        max-width: 10ch;
    }

    .applicant-hero-copy p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 16px;
        line-height: 1.75;
        margin: 0;
        max-width: 60ch;
    }

    .applicant-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 22px;
    }

    .hero-action {
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

    .hero-action.primary {
        background: #fff;
        color: var(--app-ink);
    }

    .hero-action.secondary {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
    }

    .hero-insight {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 28px;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        padding: 24px;
    }

    .hero-insight-label {
        color: rgba(255, 255, 255, 0.68);
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .hero-insight strong {
        color: #fff;
        display: block;
        font-size: 48px;
        line-height: 1;
        margin-bottom: 10px;
    }

    .hero-insight p {
        color: rgba(255, 255, 255, 0.82);
        line-height: 1.7;
        margin: 0;
    }

    .applicant-stat-card,
    .applicant-job-card,
    .recent-applicant-card {
        background: var(--app-surface);
        border: 1px solid var(--app-border);
        border-radius: 28px;
        box-shadow: var(--app-shadow-soft);
        padding: 24px;
    }

    .dashboard-card-title {
        align-items: center;
        display: flex;
        gap: 12px;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .dashboard-card-title h3 {
        color: var(--app-ink);
        font-size: 26px;
        margin: 0;
    }

    .dashboard-card-title span,
    .applicant-job-card p,
    .recent-applicant-card p,
    .applicant-panel-summary p,
    .applicant-notes,
    .unmatched-copy {
        color: var(--app-muted);
        line-height: 1.6;
        margin: 0;
    }

    .dashboard-card-title span {
        max-width: 54ch;
    }

    .applicant-stat-card strong {
        display: block;
        font-size: 42px;
        line-height: 1;
        margin-bottom: 8px;
    }

    .applicant-stat-card {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.1), transparent 35%),
            linear-gradient(180deg, #fff, #fff9f6);
        position: relative;
        overflow: hidden;
    }

    .applicant-stat-card::after {
        background: linear-gradient(180deg, rgba(185, 28, 28, 0.12), transparent);
        border-radius: 999px;
        content: "";
        height: 120px;
        position: absolute;
        right: -18px;
        top: -46px;
        width: 120px;
    }

    .applicant-stat-card p,
    .applicant-stat-card strong {
        position: relative;
        z-index: 1;
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
        background: var(--app-soft-2);
        border-radius: 999px;
        color: var(--app-accent);
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.02em;
        padding: 9px 13px;
    }

    .applicant-panel {
        background: linear-gradient(180deg, #ffffff, #fff9f7);
        border: 1px solid var(--app-border);
        border-radius: 30px;
        box-shadow: var(--app-shadow);
        overflow: hidden;
    }

    .applicant-panel summary {
        cursor: pointer;
        list-style: none;
        padding: 26px;
        transition: background 0.2s ease;
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

    .applicant-panel-summary h4 {
        color: var(--app-ink);
        font-size: 24px;
        margin: 0 0 10px;
    }

    .applicant-panel-count {
        background: linear-gradient(135deg, var(--app-ink), #1e293b);
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
        border-top: 1px solid var(--app-border);
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
        margin-bottom: 18px;
    }

    .applicant-card-head h5 {
        color: var(--app-ink);
        font-size: 22px;
        margin: 0 0 8px;
    }

    .applicant-card-head span {
        color: var(--app-muted);
        display: block;
    }

    .applicant-identity {
        display: flex;
        gap: 16px;
        min-width: 0;
    }

    .applicant-avatar {
        align-items: center;
        background: linear-gradient(135deg, #fecaca, #fed7aa);
        border-radius: 22px;
        color: var(--app-accent-deep);
        display: inline-flex;
        flex: 0 0 56px;
        font-size: 20px;
        font-weight: 900;
        height: 56px;
        justify-content: center;
        letter-spacing: 0.04em;
        width: 56px;
    }

    .applicant-meta-copy {
        min-width: 0;
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
        color: var(--app-ink);
        display: block;
        font-size: 12px;
        margin-bottom: 6px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .applicant-note-box {
        background: linear-gradient(180deg, #fff8f5, #fffdfc);
        border: 1px solid #f4dfd6;
        border-radius: 20px;
        margin-bottom: 18px;
        padding: 16px 18px;
    }

    .applicant-note-box strong {
        color: var(--app-accent-deep);
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.08em;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .applicant-action-row a {
        align-items: center;
        background: #fff;
        border: 1px solid #f4c9c4;
        border-radius: 999px;
        color: var(--app-accent);
        display: inline-flex;
        font-size: 14px;
        font-weight: 800;
        gap: 8px;
        padding: 11px 16px;
        transition: transform 0.2s ease, background 0.2s ease, border-color 0.2s ease;
    }

    .applicant-action-row a:hover {
        background: var(--app-soft-2);
        border-color: #ef4444;
        transform: translateY(-1px);
    }

    .applicant-action-row a.primary {
        background: linear-gradient(135deg, var(--app-accent), var(--app-accent-deep));
        border-color: transparent;
        color: #fff;
    }

    .applicant-action-row a.primary:hover {
        background: linear-gradient(135deg, #991b1b, #7f1d1d);
    }

    .recent-applicant-card {
        background: linear-gradient(180deg, #fff, #fff7f5);
        position: relative;
        overflow: hidden;
    }

    .recent-applicant-card::before {
        background: linear-gradient(135deg, rgba(185, 28, 28, 0.08), transparent 55%);
        content: "";
        inset: 0;
        position: absolute;
    }

    .recent-applicant-card > * {
        position: relative;
        z-index: 1;
    }

    .recent-applicant-card h4,
    .applicant-job-card h4 {
        color: var(--app-ink);
        font-size: 22px;
        margin: 0 0 10px;
    }

    .applicant-job-card {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.08), transparent 35%),
            linear-gradient(180deg, #fff, #fffbfa);
    }

    .applicant-job-card-empty,
    .empty-state-card {
        align-items: center;
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.08), transparent 34%),
            linear-gradient(180deg, #fff, #fff7f5);
        border: 1px dashed #f1c7c2;
        display: grid;
        justify-items: start;
        min-height: 220px;
    }

    .empty-state-card {
        text-align: left;
    }

    .empty-kicker {
        color: var(--app-accent);
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.16em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .unmatched-box {
        background:
            radial-gradient(circle at top right, rgba(251, 146, 60, 0.12), transparent 34%),
            linear-gradient(180deg, #fff8f6, #fffdfc);
        border: 1px dashed #f5b59a;
        border-radius: 28px;
        padding: 24px;
    }

    .activity-list {
        display: grid;
        gap: 18px;
    }

    .activity-item {
        background: #fff;
        border: 1px solid #f3d4d7;
        border-radius: 24px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
        padding: 20px;
    }

    .activity-item:nth-child(even) {
        background: #fff7f1;
        border-color: #f0c7bf;
    }

    .activity-item strong {
        display: block;
        font-size: 18px;
        margin-bottom: 12px;
    }

    .activity-item span {
        color: var(--app-muted);
        display: block;
        line-height: 1.6;
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

    .activity-item:nth-child(even) .unmatched-meta span {
        background: #ffffff;
    }

    .unmatched-meta strong {
        color: var(--app-ink);
        display: inline;
        font-size: 12px;
        letter-spacing: 0.06em;
        margin: 0 8px 0 0;
        text-transform: uppercase;
    }

    @media (max-width: 1199px) {
        .applicant-hero-grid,
        .applicant-overview-grid,
        .recent-applicant-grid,
        .applicant-grid {
            grid-template-columns: 1fr;
        }

        .applicant-panel-summary,
        .applicant-card-head {
            flex-direction: column;
        }
    }

    @media (max-width: 767px) {
        .applicant-hero-copy h3 {
            max-width: none;
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

        .hero-insight strong {
            font-size: 40px;
        }

        .applicant-identity {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="applicant-page-grid">
    <section class="admin-card applicant-hero">
        <div class="applicant-hero-grid">
            <div class="applicant-hero-copy">
                <span>Applicant Command Center</span>
                <h3>{{ $isFilteredToJob ? 'Focused review for one job opening.' : 'Review, contact, and move candidates faster.' }}</h3>
                <p>
                    @if ($isFilteredToJob)
                        You are viewing only the applicants matched to <strong>{{ $selectedJobEntry['job']->title }}</strong> in {{ $selectedJobEntry['job']->location }}. Use the general view button to return to all job applications.
                    @else
                        This workspace brings matched applicants, manual job-number checks, and recent submissions into one cleaner hiring flow for your super admin team.
                    @endif
                </p>
                <div class="applicant-hero-actions">
                    @if ($isFilteredToJob)
                        <a href="#job-applicants-{{ $selectedJobEntry['job']->id }}" class="hero-action primary">Review this job applicants</a>
                        <a href="{{ route('super-admin.applicants.index') }}" class="hero-action secondary">View general applications</a>
                    @else
                        <a href="#applicants-by-job" class="hero-action primary">Review applicants by job</a>
                        <a href="#manual-checks" class="hero-action secondary">Open manual checks</a>
                    @endif
                </div>
            </div>
            <div class="hero-insight">
                @if ($isFilteredToJob)
                    <span class="hero-insight-label">Applicants For This Job</span>
                    <strong>{{ $selectedJobEntry['applicant_count'] }}</strong>
                    <p>{{ $selectedJobEntry['job']->title }} currently has {{ $selectedJobEntry['applicant_count'] }} matched applicant{{ $selectedJobEntry['applicant_count'] === 1 ? '' : 's' }} ready for review.</p>
                @else
                    <span class="hero-insight-label">Immediate Focus</span>
                    <strong>{{ $unmatchedApplications->count() }}</strong>
                    <p>{{ $unmatchedApplications->count() === 1 ? 'Application needs' : 'Applications need' }} manual review because the entered job number did not map automatically.</p>
                @endif
            </div>
        </div>
    </section>

    <section class="admin-card">
        <div class="dashboard-card-title">
            <h3>Applicant Pipeline</h3>
            <span>{{ $isFilteredToJob ? 'This summary is focused on the selected job opening.' : 'Review matched applicants and catch any job-number issues fast.' }}</span>
        </div>

        <div class="applicant-overview-grid">
            <div class="applicant-stat-card">
                <strong>{{ $totalJobApplicationCount }}</strong>
                <p>Total saved application{{ $totalJobApplicationCount === 1 ? '' : 's' }}.</p>
            </div>
            <div class="applicant-stat-card">
                <strong>{{ $jobsWithApplicantCount }}</strong>
                <p>Job opening{{ $jobsWithApplicantCount === 1 ? '' : 's' }} with matched applicants.</p>
            </div>
            <div class="applicant-stat-card">
                <strong>{{ $unmatchedApplications->count() }}</strong>
                <p>Application{{ $unmatchedApplications->count() === 1 ? '' : 's' }} needing manual job-number review.</p>
            </div>
        </div>
    </section>

    <section class="admin-card" id="applicants-by-job">
        <div class="dashboard-card-title">
            <h3>{{ $isFilteredToJob ? 'Applicants For Selected Job' : 'Applicants By Job' }}</h3>
            <span>
                {{ $isFilteredToJob
                    ? 'You are currently seeing only the applicants matched to the selected backend job opening.'
                    : 'Open a job to review each candidate, email them, call them, or send an interview invitation.' }}
            </span>
        </div>

        @if ($isFilteredToJob)
            <div class="applicant-action-row" style="margin-bottom: 18px;">
                <a href="{{ route('super-admin.applicants.index') }}" class="primary">View general applications</a>
                <a href="{{ route('super-admin.job-openings.index') }}">Back to backend job openings</a>
            </div>
        @endif

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
                                    <span class="applicant-tag">Job ID {{ $jobEntry['job_id_label'] }}</span>
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
                                    <div class="applicant-identity">
                                        <div class="applicant-avatar">
                                            {{ strtoupper(substr($applicant->fname, 0, 1).substr($applicant->lname, 0, 1)) }}
                                        </div>
                                        <div class="applicant-meta-copy">
                                            <h5>{{ $applicant->fname }} {{ $applicant->lname }}</h5>
                                            <span>{{ $applicant->email }}</span>
                                            <span>Applied {{ $applicant->created_at?->diffForHumans() ?? 'recently' }} with job number {{ $applicant->job_number }}</span>
                                        </div>
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
                                    <div class="applicant-note-box">
                                        <strong>Candidate Note</strong>
                                        <p class="applicant-notes">{{ $applicant->message }}</p>
                                    </div>
                                @endif

                                <div class="applicant-action-row">
                                    <a href="mailto:{{ $applicant->email }}" class="primary">Email applicant</a>
                                    <a href="mailto:{{ $applicant->email }}?subject={{ $interviewSubject }}&body={{ $interviewBody }}">Set interview</a>
                                    <a href="tel:{{ $phoneLink }}">Call applicant</a>
                                    <a href="{{ route('super-admin.applications.resume', $applicant) }}">Download resume</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </details>
            @empty
                <div class="applicant-job-card applicant-job-card-empty">
                    <div>
                        <span class="empty-kicker">Waiting For Matched Applicants</span>
                        <h4>{{ $requestedJobId ? 'No applicants matched this job yet' : 'No job-based applicant groups yet' }}</h4>
                        <p>
                            {{ $requestedJobId
                                ? 'No saved applications currently match the selected backend job opening.'
                                : 'Once applications come in with matching job numbers, each job will get its own review panel here.' }}
                        </p>
                    </div>
                </div>
            @endforelse

            @if (! $isFilteredToJob && $unmatchedApplications->isNotEmpty())
                <div class="unmatched-box" id="manual-checks">
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

    <section class="admin-card">
        <div class="dashboard-card-title">
            <h3>Recent Applications</h3>
            <span>{{ $isFilteredToJob ? 'Quick links back to the latest saved applications across the platform.' : 'The newest candidates saved from the application form.' }}</span>
        </div>

        <div class="recent-applicant-grid">
            @forelse ($recentJobApplications as $applicant)
                <div class="recent-applicant-card">
                    <span class="empty-kicker" style="margin-bottom: 10px;">Recent Submission</span>
                    <h4>{{ $applicant->fname }} {{ $applicant->lname }}</h4>
                    <p>{{ $applicant->email }}</p>
                    <p style="margin-top: 8px;">{{ $applicant->work_status }} • Job Number {{ $applicant->job_number }}</p>
                    <div class="applicant-action-row" style="margin-top: 16px;">
                        <a href="mailto:{{ $applicant->email }}" class="primary">Email</a>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $applicant->phone) }}">Call</a>
                    </div>
                </div>
            @empty
                <div class="recent-applicant-card empty-state-card">
                    <div>
                        <span class="empty-kicker">No Activity Yet</span>
                        <h4>No applications yet</h4>
                        <p>Once a candidate submits the public form, their details will appear here for quick follow-up.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
