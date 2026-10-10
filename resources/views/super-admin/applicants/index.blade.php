@extends('layouts.admin')

@section('title', 'Applicants | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Applicants By Job')
@section('page_intro', 'Open a job to review each candidate, email them, call them, or send an interview invitation.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-applicants.css') }}">
@endsection

@section('content')
<div class="applicant-page-grid">
    <section class="admin-card applicant-hero">
        <div class="applicant-hero-grid">
            <div class="applicant-hero-copy">
                <span>Candidate review</span>
                <h3>{{ $isFilteredToJob ? 'Find the right person for this role.' : 'Meet your next great hire.' }}</h3>
                <p>
                    @if ($isFilteredToJob)
                        You are viewing only the applicants matched to <strong>{{ $selectedJobEntry['job']->title }}</strong> in {{ $selectedJobEntry['job']->location }}. Use the general view button to return to all job applications.
                    @else
                        Review candidates by role, contact them, and arrange interviews. Check applications with unmatched job numbers below.
                    @endif
                </p>
                <div class="applicant-hero-actions">
                    @if ($isFilteredToJob)
                        <a href="#job-applicants-{{ $selectedJobEntry['job']->id }}" class="hero-action primary">Review applicants</a>
                        <a href="{{ route('super-admin.applicants.index') }}" class="hero-action secondary">View general applications</a>
                    @else
                        <a href="#applicants-by-job" class="hero-action primary">Review applicants by job</a>
                        @if($unmatchedApplications->isNotEmpty())<a href="#manual-checks" class="hero-action secondary">Check unmatched applications</a>@endif
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
                    ? 'You are currently seeing only the applicants matched to the selected job opening.'
                    : 'Open a job to review each candidate, email them, call them, or send an interview invitation.' }}
            </span>
        </div>

        @if ($isFilteredToJob)
            <div class="applicant-action-row" style="margin-bottom: 18px;">
                <a href="{{ route('super-admin.applicants.index') }}" class="primary">View general applications</a>
                <a href="{{ route('super-admin.job-openings.index') }}">Back to job openings</a>
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
                                ? 'No saved applications currently match the selected job opening.'
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
