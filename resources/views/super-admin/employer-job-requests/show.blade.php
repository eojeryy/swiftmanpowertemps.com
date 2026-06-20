@extends('layouts.admin')

@section('title', 'Review Job Request | Super Admin')
@section('page_title', 'Review Job Request')
@section('page_intro', 'Check the employer details, role request, and publishing status before sending the job live to the public openings page.')

@section('styles')
@include('super-admin.employer-job-requests._styles')
@endsection

@section('content')
<div class="request-view-grid">
    <div class="admin-card request-summary-card">
        <div class="request-chip-row">
            <span class="request-chip">{{ $jobRequest->status }}</span>
            <span class="request-chip">{{ $jobRequest->specialization }}</span>
            <span class="request-chip">{{ $jobRequest->job_location }}</span>
        </div>

        <h3>{{ $jobRequest->position_hiring_for }}</h3>
        <p class="request-summary-text">{{ $jobRequest->company_name }} submitted this request through the public place-job form.</p>

        <div class="request-summary">{{ $jobRequest->message ?: 'No extra job description was provided by the employer.' }}</div>
    </div>

    <div class="admin-card request-panel">
        <h3>Publish Actions</h3>
        <div class="request-note-box">
            <p class="request-notes">
                Approving this request creates a real public `JobOpening` record that will immediately appear on the live job openings page.
            </p>
        </div>

        <div class="request-action-stack">
            @if ($jobRequest->status !== 'approved')
                <form method="post" action="{{ route('super-admin.job-requests.approve', $jobRequest) }}" onsubmit="return confirm('Approve and publish this job request?');">
                    @csrf
                    <button type="submit" class="request-btn request-btn-primary">Approve And Publish</button>
                </form>
            @else
                <span class="request-status approved">Approved</span>
            @endif

            @if ($publishedJob)
                <a href="{{ route('job.details.show', $publishedJob) }}" class="request-btn request-btn-secondary">Open Published Job</a>
            @endif

            <a href="{{ route('super-admin.job-requests.index') }}" class="request-btn request-btn-secondary">Back To Queue</a>
        </div>
    </div>

    <div class="admin-card request-panel">
        <h3>Employer Details</h3>
        <ul class="request-meta-list">
            <li>
                <strong>Company</strong>
                <span>{{ $jobRequest->company_name }}</span>
            </li>
            <li>
                <strong>Industry</strong>
                <span>{{ $jobRequest->industry }}</span>
            </li>
            <li>
                <strong>Website</strong>
                <span>{{ $jobRequest->website ?: 'Not provided' }}</span>
            </li>
            <li>
                <strong>Company Phone</strong>
                <span>{{ $jobRequest->company_phone }}</span>
            </li>
            <li>
                <strong>Company Address</strong>
                <span>{{ $jobRequest->company_address }}</span>
            </li>
        </ul>
    </div>

    <div class="admin-card request-panel">
        <h3>Request Details</h3>
        <ul class="request-meta-list">
            <li>
                <strong>Contact Person</strong>
                <span>{{ trim($jobRequest->contact_first_name.' '.$jobRequest->contact_last_name) }}</span>
            </li>
            <li>
                <strong>Email</strong>
                <span>{{ $jobRequest->email }}</span>
            </li>
            <li>
                <strong>Phone</strong>
                <span>{{ $jobRequest->phone }}</span>
            </li>
            <li>
                <strong>Specialization</strong>
                <span>{{ $jobRequest->specialization }}</span>
            </li>
            <li>
                <strong>Job Location</strong>
                <span>{{ $jobRequest->job_location }}</span>
            </li>
            <li>
                <strong>Position Hiring For</strong>
                <span>{{ $jobRequest->position_hiring_for }}</span>
            </li>
            <li>
                <strong>Pay Rate</strong>
                <span>{{ $jobRequest->pay_rate ?: 'Not provided' }}</span>
            </li>
            <li>
                <strong>Openings Count</strong>
                <span>{{ $jobRequest->openings_count ?: 'Not provided' }}</span>
            </li>
            <li>
                <strong>Service Needed</strong>
                <span>{{ $jobRequest->interest }}</span>
            </li>
            <li>
                <strong>Submitted</strong>
                <span>{{ $jobRequest->created_at?->format('M d, Y h:i A') }}</span>
            </li>
            <li>
                <strong>Approved</strong>
                <span>{{ $jobRequest->approved_at?->format('M d, Y h:i A') ?? 'Not approved yet' }}</span>
            </li>
        </ul>
    </div>
</div>
@endsection
