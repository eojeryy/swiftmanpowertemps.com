@extends('layouts.admin')

@section('title', 'Super Admin Dashboard | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Super Admin Dashboard')
@section('page_intro', 'A secure workspace for monitoring admin access and moving quickly across the Swift Manpower website.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-dashboard.css') }}">
@endsection

@section('content')
<div class="dashboard-grid">
    <section class="admin-card dashboard-hero">
        <div class="dashboard-hero-grid">
            <div class="dashboard-hero-copy">
                <span>YOUR STAFFING WORKSPACE</span>
                <h3>Good to see you, {{ explode(' ', trim(auth()->user()?->name ?? 'Admin'))[0] }}.</h3>
                <p>Keep hiring moving. Review employer requests and connect the right people with their next opportunity.</p>
                <div class="dashboard-hero-actions">
                    <a href="{{ route('super-admin.job-requests.index') }}" class="primary">Review requests <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="{{ route('super-admin.applicants.index') }}" class="secondary">Browse applicants</a>
                </div>
            </div>
            <div class="hero-aside-card">
                <span>{{ now()->format('l, F j, Y') }}</span>
                <strong>{{ $pendingJobRequestCount }}</strong>
                <p>employer request{{ $pendingJobRequestCount === 1 ? '' : 's' }} awaiting review</p>
            </div>
        </div>
    </section>

    <section class="metric-grid" aria-label="Hiring overview">
        @foreach ([
            ['Pending requests', $pendingJobRequestCount, 'Ready for your review', 'fas fa-inbox', route('super-admin.job-requests.index')],
            ['Live job openings', $publishedJobCount, 'Currently accepting applications', 'fas fa-briefcase', route('super-admin.job-openings.index')],
            ['Applications', $totalJobApplicationCount, $jobsWithApplicantCount.' jobs with applicants', 'fas fa-users', route('super-admin.applicants.index')],
            ['Needs a job check', $unmatchedApplications->count(), 'Applications to match to a role', 'fas fa-link', route('super-admin.applicants.index')],
        ] as [$label, $value, $note, $icon, $url])
            <a class="admin-card metric-card" href="{{ $url }}">
                <div class="metric-heading"><span class="metric-label">{{ $label }}</span><i class="{{ $icon }}" aria-hidden="true"></i></div>
                <strong class="metric-value">{{ $value }}</strong>
                <p class="metric-note">{{ $note }}</p>
            </a>
        @endforeach
    </section>

    <section class="content-grid">
        <div class="admin-card section-shell soft">
            <div class="dashboard-card-title">
                <h3>Latest hiring requests</h3>
                <span>Recent submissions and their current status</span>
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
        <div class="admin-card section-shell">
            <div class="dashboard-card-title">
                <h3>Team &amp; access</h3>
                <span>Recent admin accounts</span>
            </div>

            <div class="access-summary"><div><strong>{{ $totalUserCount }}</strong><span>Website users</span></div><div><strong>{{ $superAdminCount }}</strong><span>Super admins</span></div></div>
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

    </section>

    <section class="admin-card section-shell soft">
        <div class="dashboard-card-title">
            <h3>Applicants by job</h3>
            <span>{{ $jobsWithApplicantCount }} roles with applicants. Expand a role to review candidates.</span>
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
                        <div class="applicant-action-row job-actions">
                            <a href="{{ route('super-admin.applicants.index') }}#job-applicants-{{ $jobEntry['job']->id }}" class="primary-action">Open applicant review</a>
                            <a href="{{ route('job.details.show', $jobEntry['job']) }}">View public job</a>
                        </div>
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
                <details class="unmatched-box">
                    <summary>Applications needing a job check <span class="pill">{{ $unmatchedApplications->count() }}</span></summary>
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
                </details>
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
