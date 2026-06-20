@extends('layouts.admin')

@section('title', 'Job Openings | Super Admin')
@section('page_title', 'Job Openings')
@section('page_intro', 'Review internal job-opening records separately from the public-facing openings page.')

@section('styles')
<style>
    .job-admin-stack {
        --job-accent: #b91c1c;
        --job-accent-deep: #7f1d1d;
        --job-ink: #0f172a;
        --job-muted: #64748b;
        --job-border: #e2e8f0;
        --job-surface: #ffffff;
        --job-soft: #fff8f5;
        --job-soft-2: #fff1ed;
        --job-shadow: 0 20px 46px rgba(15, 23, 42, 0.08);
        display: grid;
        gap: 24px;
    }

    .job-admin-hero {
        background:
            radial-gradient(circle at top right, rgba(248, 113, 113, 0.22), transparent 30%),
            linear-gradient(135deg, #111827, #1f2937 58%, #7f1d1d 120%);
        color: #fff;
        overflow: hidden;
        position: relative;
    }

    .job-admin-hero::before {
        background:
            linear-gradient(120deg, rgba(255, 255, 255, 0.08), transparent 50%),
            radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.12), transparent 30%);
        content: "";
        inset: 0;
        position: absolute;
    }

    .job-admin-hero > * {
        position: relative;
        z-index: 1;
    }

    .job-admin-hero-grid {
        align-items: end;
        display: grid;
        gap: 28px;
        grid-template-columns: minmax(0, 1.3fr) minmax(300px, 0.7fr);
    }

    .job-admin-hero-copy span {
        color: rgba(255, 255, 255, 0.72);
        display: inline-block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.18em;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .job-admin-hero-copy h3 {
        color: #fff;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.05;
        margin: 0 0 14px;
        max-width: 12ch;
    }

    .job-admin-hero-copy p,
    .job-hero-insight p,
    .job-toolbar p,
    .job-table td small,
    .job-record-meta span,
    .job-empty p {
        color: var(--job-muted);
        line-height: 1.7;
        margin: 0;
    }

    .job-admin-hero-copy p {
        color: rgba(255, 255, 255, 0.82);
        max-width: 60ch;
    }

    .job-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 22px;
    }

    .job-hero-actions a,
    .job-action-row a,
    .job-toolbar-link {
        align-items: center;
        border-radius: 999px;
        display: inline-flex;
        font-size: 13px;
        font-weight: 800;
        gap: 8px;
        justify-content: center;
        padding: 12px 16px;
    }

    .job-hero-actions a {
        border: 1px solid rgba(255, 255, 255, 0.18);
        color: #fff;
    }

    .job-hero-actions a.primary {
        background: #fff;
        color: var(--job-ink);
    }

    .job-hero-actions a.secondary {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
    }

    .job-hero-insight {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 28px;
        padding: 24px;
    }

    .job-hero-insight span {
        color: rgba(255, 255, 255, 0.68);
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .job-hero-insight strong {
        color: #fff;
        display: block;
        font-size: 48px;
        line-height: 1;
        margin-bottom: 10px;
    }

    .job-stat-grid {
        display: grid;
        gap: 22px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .job-stat-card {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.08), transparent 35%),
            linear-gradient(180deg, #fff, #fff9f6);
        border: 1px solid var(--job-border);
        border-radius: 28px;
        box-shadow: var(--job-shadow);
        padding: 24px;
        position: relative;
    }

    .job-stat-card strong {
        color: var(--job-ink);
        display: block;
        font-size: 42px;
        line-height: 1;
        margin-bottom: 8px;
    }

    .job-stat-card span {
        color: var(--job-muted);
        display: block;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .job-stat-card p {
        color: #475569;
        margin: 0;
    }

    .job-toolbar {
        align-items: center;
        display: flex;
        gap: 16px;
        justify-content: space-between;
    }

    .job-toolbar h3 {
        color: var(--job-ink);
        font-size: 26px;
        margin: 0;
    }

    .job-toolbar-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .job-toolbar-link {
        background: var(--job-soft);
        border: 1px solid #f1ddd6;
        color: #334155;
    }

    .job-toolbar-link.primary {
        background: linear-gradient(135deg, var(--job-accent), var(--job-accent-deep));
        border-color: transparent;
        color: #fff;
    }

    .job-table-wrap {
        overflow-x: auto;
    }

    .job-table {
        border-collapse: separate;
        border-spacing: 0 14px;
        min-width: 1080px;
        width: 100%;
    }

    .job-table thead th {
        color: var(--job-muted);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        padding: 0 18px 6px;
        text-align: left;
        text-transform: uppercase;
    }

    .job-table tbody td {
        background: #fff;
        border-bottom: 1px solid #eef2f7;
        border-top: 1px solid #eef2f7;
        padding: 18px;
        vertical-align: top;
    }

    .job-table tbody td:first-child {
        border-left: 1px solid #eef2f7;
        border-radius: 22px 0 0 22px;
    }

    .job-table tbody td:last-child {
        border-radius: 0 22px 22px 0;
        border-right: 1px solid #eef2f7;
    }

    .job-record-title strong {
        color: var(--job-ink);
        display: block;
        font-size: 18px;
        margin-bottom: 8px;
    }

    .job-record-title small {
        color: var(--job-muted);
        display: block;
        line-height: 1.6;
    }

    .job-status {
        border-radius: 999px;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .job-status.active {
        background: #ecfdf3;
        color: #166534;
    }

    .job-status.inactive,
    .job-status.closed {
        background: #fff7ed;
        color: #9a3412;
    }

    .job-status.draft {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .job-chip-row {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    .job-chip {
        background: var(--job-soft-2);
        border-radius: 999px;
        color: var(--job-accent);
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
    }

    .job-action-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .job-action-row a {
        background: #fff;
        border: 1px solid #f4c9c4;
        color: var(--job-accent);
        padding: 11px 16px;
    }

    .job-action-row a.primary {
        background: linear-gradient(135deg, var(--job-accent), var(--job-accent-deep));
        border-color: transparent;
        color: #fff;
    }

    .job-empty {
        background:
            radial-gradient(circle at top right, rgba(185, 28, 28, 0.08), transparent 34%),
            linear-gradient(180deg, #fff, #fff7f5);
        border: 1px dashed #f1c7c2;
        border-radius: 28px;
        min-height: 240px;
        padding: 40px 32px;
        text-align: center;
    }

    .job-empty span {
        color: var(--job-accent);
        display: inline-block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.16em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .job-empty h3 {
        color: var(--job-ink);
        font-size: 28px;
        margin: 0 0 12px;
    }

    @media (max-width: 1199px) {
        .job-admin-hero-grid,
        .job-stat-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .job-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .job-toolbar-actions {
            width: 100%;
        }

        .job-toolbar-link {
            width: 100%;
        }

        .job-hero-insight strong {
            font-size: 40px;
        }
    }
</style>
@endsection

@section('content')
<div class="job-admin-stack">
    <section class="admin-card job-admin-hero">
        <div class="job-admin-hero-grid">
            <div class="job-admin-hero-copy">
                <span>Backend Job Records</span>
                <h3>Manage internal job-opening records away from the public listing.</h3>
                <p>This page is for super admins to review the jobs already stored in the system, check their publishing state, and jump into either the live public page or the original employer request flow.</p>
                <div class="job-hero-actions">
                    <a href="{{ route('super-admin.job-requests.index') }}" class="primary">Open request queue</a>
                    <a href="{{ route('job.openings') }}" class="secondary">View public job page</a>
                </div>
            </div>
            <div class="job-hero-insight">
                <span>Live On Website</span>
                <strong>{{ $activeJobCount }}</strong>
                <p>{{ $activeJobCount === 1 ? 'Job is' : 'Jobs are' }} currently active and visible on the public job openings page.</p>
            </div>
        </div>
    </section>

    <section class="job-stat-grid">
        <div class="job-stat-card">
            <span>Total Records</span>
            <strong>{{ $totalJobCount }}</strong>
            <p>All backend job-opening records stored in the application.</p>
        </div>
        <div class="job-stat-card">
            <span>Active Jobs</span>
            <strong>{{ $activeJobCount }}</strong>
            <p>Openings currently marked active and available to job seekers.</p>
        </div>
        <div class="job-stat-card">
            <span>Published This Week</span>
            <strong>{{ $recentlyPublishedCount }}</strong>
            <p>Jobs published within the last 7 days.</p>
        </div>
    </section>

    <section class="admin-card">
        <div class="job-toolbar">
            <div>
                <h3>Backend Job Opening List</h3>
                <p>This internal list is separate from the frontend job openings page and is designed for admin review.</p>
            </div>
            <div class="job-toolbar-actions">
                <a href="{{ route('super-admin.job-requests.index') }}" class="job-toolbar-link primary">Review new requests</a>
                <a href="{{ route('job.openings') }}" class="job-toolbar-link">Open public page</a>
            </div>
        </div>

        @if ($jobOpenings->isEmpty())
            <div class="job-empty">
                <span>No Published Jobs Yet</span>
                <h3>Your backend job list is still empty</h3>
                <p>Once you approve employer job requests, the generated `JobOpening` records will appear here for internal review.</p>
            </div>
        @else
            <div class="job-table-wrap">
                <table class="job-table">
                    <thead>
                        <tr>
                            <th>Job Opening</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Work Type</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobOpenings as $job)
                            <tr>
                                <td class="job-record-title">
                                    <strong>{{ $job->title }}</strong>
                                    <small>{{ $job->category }} in {{ $job->location }}</small>
                                    <div class="job-chip-row">
                                        <span class="job-chip">Job ID {{ str_pad((string) $job->id, 4, '0', STR_PAD_LEFT) }}</span>
                                        @if ($job->schedule)
                                            <span class="job-chip">{{ $job->schedule }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="job-record-meta">
                                    <strong>{{ $job->company_name }}</strong>
                                    <span>{{ $job->location }}</span>
                                </td>
                                <td>
                                    <span class="job-status {{ strtolower($job->status) }}">{{ $job->status }}</span>
                                </td>
                                <td class="job-record-meta">
                                    <strong>{{ $job->employment_type }}</strong>
                                    <span>{{ $job->published_at ? 'Published job record' : 'Saved record' }}</span>
                                </td>
                                <td class="job-record-meta">
                                    <strong>{{ $job->published_at?->format('M d, Y') ?? $job->created_at?->format('M d, Y') }}</strong>
                                    <span>{{ ($job->published_at ?? $job->created_at)?->format('h:i A') }}</span>
                                </td>
                                <td>
                                    <div class="job-action-row">
                                        <a href="{{ route('job.details.show', $job) }}" class="primary">Open live job</a>
                                        <a href="{{ route('super-admin.applicants.index', ['job' => $job->id]) }}#job-applicants-{{ $job->id }}">View applicants</a>
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
