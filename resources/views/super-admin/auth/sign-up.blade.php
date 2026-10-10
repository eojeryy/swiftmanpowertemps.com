@extends('layouts.account')
@section('title', 'Super Admin Sign Up')
@section('workspace_label', 'Your agency workspace')
@section('story_heading')Build your team.<br><span>Keep hiring moving.</span>@endsection
@section('story_intro', 'Set up leadership access to the agency’s recruitment and website workspace.')
@section('story_tools')
<ul class="auth-tools">
    <li><span aria-hidden="true">01</span><div><strong>Recruitment overview</strong><p>Review employer requests and job applications.</p></div></li>
    <li><span aria-hidden="true">02</span><div><strong>Website content</strong><p>Manage blog posts, categories, and published openings.</p></div></li>
    <li><span aria-hidden="true">03</span><div><strong>Team access</strong><p>Create blog staff accounts for your content team.</p></div></li>
</ul>
@endsection
@section('account_label', 'Super admin registration')
@section('heading', 'Set up your workspace.')
@section('intro')Create your admin account. {{ $remainingSlots }} of 2 super admin slots remaining.@endsection
@section('content')
@include('account.partials.form', ['registration' => true, 'actionRoute' => 'super-admin.register', 'formId' => 'super-admin-sign-up-form', 'submitLabel' => 'Create super admin account', 'alternateRoute' => 'super-admin.sign-in', 'alternateLabel' => 'Already have access? Sign in'])
@endsection
