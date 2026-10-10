@extends('layouts.account')
@section('title', 'Employee Sign Up')
@section('workspace_label', 'Start your job search')
@section('story_heading')Bring your skills.<br><span>Find your next role.</span>@endsection
@section('story_intro', 'Create your employee account for quick access to job listings, application links, and agency support.')
@section('story_tools')
<ul class="auth-tools">
    <li><span aria-hidden="true">01</span><div><strong>Create your account</strong><p>Use your name, email address, and a password.</p></div></li>
    <li><span aria-hidden="true">02</span><div><strong>Find a suitable role</strong><p>Explore current openings across Canada.</p></div></li>
    <li><span aria-hidden="true">03</span><div><strong>Submit an application</strong><p>Share your experience and résumé through the application form.</p></div></li>
</ul>
@endsection
@section('account_label', 'Employee registration')
@section('heading', 'Let’s get started.')
@section('intro', 'Create an account to access your employee dashboard. Applying for a job is a separate step.')
@section('content')
@include('account.partials.form', ['registration' => true, 'actionRoute' => 'employee.register', 'formId' => 'employee-sign-up-form', 'submitLabel' => 'Create employee account', 'alternateRoute' => 'employee.sign-in', 'alternateLabel' => 'Already have an account? Sign in'])
@endsection
