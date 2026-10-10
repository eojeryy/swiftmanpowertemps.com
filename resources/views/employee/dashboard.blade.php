@extends('layouts.employee')

@section('title', 'Employee Dashboard | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Employee Dashboard')
@section('page_intro', 'A simple employee home for job search access, application shortcuts, and support details.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/employee-dashboard.css') }}">
@endsection

@section('content')
<div class="employee-dashboard-grid">
    <section class="admin-card employee-hero">
        <div>
            <h3>Ready for your next opportunity?</h3>
            <p>Explore current roles, submit your application, or talk to our team about your next step.</p>
            <ul>
                <li>Open current jobs fast</li>
                <li>Go straight to the application form</li>
                <li>Contact the Swift Manpower team</li>
            </ul>
        </div>
        <div class="employee-hero-stat">
            <strong>3</strong>
            <span>ways to take your next step</span>
        </div>
    </section>
    <section class="employee-cards">
        <div class="admin-card">
            <h3>Browse Open Roles</h3>
            <p>Review current openings across warehouse, labour, support, and operations work.</p>
            <a href="{{ route('job.openings') }}" class="employee-link">Open job listings</a>
        </div>
        <div class="admin-card">
            <h3>Apply Quickly</h3>
            <p>Jump straight to the application page and submit your information when you are ready.</p>
            <a href="{{ route('apply.now') }}" class="employee-link">Go to apply now</a>
        </div>
        <div class="admin-card">
            <h3>Get Support</h3>
            <p>Contact the agency if you need help with a role, your application, or next steps.</p>
            <a href="{{ route('contact') }}" class="employee-link">Contact support</a>
        </div>
    </section>
    <section class="admin-card">
        <h3>Helpful Reminders</h3>
        <ul class="employee-list">
            <li>Keep your email and phone number current when applying for positions.</li>
            <li>Use the public application form to submit your work details and resume reference.</li>
            <li>Reach out through the contact page if you want help identifying the best role fit.</li>
        </ul>
    </section>
</div>
@endsection
