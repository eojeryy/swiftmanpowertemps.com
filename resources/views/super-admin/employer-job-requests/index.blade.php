@extends('layouts.admin')

@section('title', 'Job Requests | Super Admin')
@section('page_title', 'Job Requests')
@section('page_intro', 'Review employer submissions and approve the ones that should be published on the public job openings page.')

@section('styles')
@include('super-admin.employer-job-requests._styles')
@endsection

@section('content')
<div class="request-stack">
    <div class="request-toolbar">
        <div>
            <h3>Employer Approval Queue</h3>
            <p>Each place-job submission lands here first. Open a request to review it and publish it when you are ready.</p>
        </div>
        <div class="request-badges">
            <span class="request-badge">{{ $pendingCount }} pending</span>
            <span class="request-badge">{{ $approvedCount }} approved</span>
        </div>
    </div>

    <div class="admin-card">
        @if ($requests->isEmpty())
            <div class="request-empty">
                <h3>No employer job requests yet</h3>
                <p>When employers submit the public place-job form, their requests will show up here for review.</p>
            </div>
        @else
            <div class="request-table-wrap">
                <table class="request-table">
                    <thead>
                        <tr>
                            <th>Role Request</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Contact</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $jobRequest)
                            <tr>
                                <td class="request-title-cell">
                                    <strong>{{ $jobRequest->position_hiring_for }}</strong>
                                    <small>{{ $jobRequest->specialization }} in {{ $jobRequest->job_location }}</small>
                                </td>
                                <td>
                                    <strong>{{ $jobRequest->company_name }}</strong>
                                    <small>{{ $jobRequest->industry }}</small>
                                </td>
                                <td>
                                    <span class="request-status {{ $jobRequest->status }}">{{ $jobRequest->status }}</span>
                                </td>
                                <td>
                                    <strong>{{ trim($jobRequest->contact_first_name.' '.$jobRequest->contact_last_name) }}</strong>
                                    <small>{{ $jobRequest->email }}</small>
                                </td>
                                <td>
                                    <strong>{{ $jobRequest->created_at?->format('M d, Y') }}</strong>
                                    <small>{{ $jobRequest->created_at?->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <div class="request-actions-row">
                                        <a href="{{ route('super-admin.job-requests.show', $jobRequest) }}" class="request-btn request-btn-secondary">View</a>
                                        @if ($jobRequest->status !== 'approved')
                                            <form method="post" action="{{ route('super-admin.job-requests.approve', $jobRequest) }}" onsubmit="return confirm('Approve and publish this job request?');">
                                                @csrf
                                                <button type="submit" class="request-btn request-btn-primary">Approve</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
