@extends('layouts.employee')

@section('title', 'Employee Dashboard | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Employee Dashboard')
@section('page_intro', 'A simple employee home for job search access, application shortcuts, and support details.')

@section('styles')
<style>
    .employee-dashboard-grid { display: grid; gap: 22px; }
    .employee-hero {
        align-items: center;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: #fff;
        display: grid;
        gap: 18px;
        grid-template-columns: 1.3fr 0.7fr;
        overflow: hidden;
        position: relative;
    }
    .employee-hero::before {
        background: radial-gradient(circle at top right, rgba(239,68,68,0.38), transparent 35%);
        content: "";
        inset: 0;
        position: absolute;
    }
    .employee-hero > * { position: relative; z-index: 1; }
    .employee-hero h3 { color: #fff; font-size: 30px; margin: 0 0 10px; }
    .employee-hero p, .employee-hero li { color: rgba(255,255,255,0.82); }
    .employee-hero ul {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        list-style: none;
        margin: 18px 0 0;
        padding: 0;
    }
    .employee-hero li {
        background: rgba(255,255,255,0.08);
        border-radius: 999px;
        padding: 10px 14px;
    }
    .employee-hero-stat {
        background: rgba(255,255,255,0.08);
        border-radius: 22px;
        padding: 22px;
    }
    .employee-hero-stat strong {
        color: #fff;
        display: block;
        font-size: 34px;
        margin-bottom: 8px;
    }
    .employee-cards {
        display: grid;
        gap: 22px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    .employee-card h3 { font-size: 22px; margin: 0 0 10px; }
    .employee-card p, .employee-list li, .employee-card small { color: var(--employee-muted); line-height: 1.7; }
    .employee-link {
        color: var(--employee-accent);
        display: inline-block;
        font-size: 14px;
        font-weight: 800;
        margin-top: 12px;
    }
    .employee-list {
        display: grid;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .employee-list li {
        background: #fff8f5;
        border-radius: 18px;
        padding: 14px 16px;
    }
    @media (max-width: 1199px) {
        .employee-hero, .employee-cards { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="employee-dashboard-grid">
    <section class="employee-card employee-hero">
        <div>
            <h3>Welcome to your employee dashboard.</h3>
            <p>Use this area to move quickly between the public job seeker pages that matter most while keeping a simple signed-in employee home.</p>
            <ul>
                <li>Open current jobs fast</li>
                <li>Go straight to the application form</li>
                <li>Contact the Swift Manpower team</li>
            </ul>
        </div>
        <div class="employee-hero-stat">
            <strong>3</strong>
            <span>main shortcuts ready for your job search flow</span>
        </div>
    </section>
    <section class="employee-cards">
        <div class="employee-card">
            <h3>Browse Open Roles</h3>
            <p>Review current openings across warehouse, labour, support, and operations work.</p>
            <a href="{{ route('job.openings') }}" class="employee-link">Open job listings</a>
        </div>
        <div class="employee-card">
            <h3>Apply Quickly</h3>
            <p>Jump straight to the application page and submit your information when you are ready.</p>
            <a href="{{ route('apply.now') }}" class="employee-link">Go to apply now</a>
        </div>
        <div class="employee-card">
            <h3>Get Support</h3>
            <p>Contact the agency if you need help with a role, your application, or next steps.</p>
            <a href="{{ route('contact') }}" class="employee-link">Contact support</a>
        </div>
    </section>
    <section class="employee-card">
        <h3>Helpful Reminders</h3>
        <ul class="employee-list">
            <li>Keep your email and phone number current when applying for positions.</li>
            <li>Use the public application form to submit your work details and resume reference.</li>
            <li>Reach out through the contact page if you want help identifying the best role fit.</li>
        </ul>
    </section>
</div>
@endsection
