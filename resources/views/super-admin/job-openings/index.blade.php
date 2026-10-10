@extends('layouts.admin')

@section('title', 'Job Openings | Super Admin')
@section('page_title', 'Job Openings')
@section('page_intro', 'Review internal job-opening records separately from the public-facing openings page.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-jobs.css') }}">
@endsection

@section('content')
<div class="job-admin-stack">
    <section class="admin-card job-admin-hero">
        <div class="job-admin-hero-grid">
            <div class="job-admin-hero-copy">
                <span>Published opportunities</span>
                <h3>Keep your job listings in view.</h3>
                <p>Check each role’s status, review its applicants, or open the public listing. Approve employer requests to publish new opportunities.</p>
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
            <p>Every job listed by your agency.</p>
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
                <h3>All job openings</h3>
                <p>Find a role by title, company, location, or status.</p>
            </div>
            <div class="job-toolbar-actions">
                <a href="{{ route('super-admin.job-requests.index') }}" class="job-toolbar-link primary">Review new requests</a>
                <a href="{{ route('job.openings') }}" class="job-toolbar-link">Open public page</a>
            </div>
        </div>

        @if ($jobOpenings->isEmpty())
            <div class="job-empty">
                <span>No Published Jobs Yet</span>
                <h3>Your job list is ready for its first role</h3>
                <p>Approve an employer request to publish your first opportunity.</p>
            </div>
        @else
            @include('account.partials.table-filter', ['tableId' => 'job-records', 'label' => 'job openings'])
            <div class="job-table-wrap" tabindex="0" role="region" aria-label="Job openings table">
                <table class="job-table" id="job-records">
                    <thead>
                        <tr>
                            <th scope="col">Job Opening</th>
                            <th scope="col">Company</th>
                            <th scope="col">Status</th>
                            <th scope="col">Work Type</th>
                            <th scope="col">Published</th>
                            <th scope="col">Actions</th>
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
