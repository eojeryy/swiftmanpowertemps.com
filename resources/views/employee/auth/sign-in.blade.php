@extends('layouts.account')
@section('title', 'Employee Sign In')
@section('workspace_label', 'Your next opportunity')
@section('story_heading')Your skills.<br>Your future.<br><span>Your next step.</span>@endsection
@section('story_intro', 'Find opportunities in Canada and get support from a team that understands your job search.')
@section('story_tools')
<ul class="auth-tools">
    <li><span aria-hidden="true">01</span><div><strong>Explore open roles</strong><p>Browse warehouse, labour, and operations opportunities.</p></div></li>
    <li><span aria-hidden="true">02</span><div><strong>Take the next step</strong><p>Open the application form when you find a suitable role.</p></div></li>
    <li><span aria-hidden="true">03</span><div><strong>Get support</strong><p>Reach our team for guidance with your job search.</p></div></li>
</ul>
@endsection
@section('account_label', 'Employee sign in')
@section('heading', 'Welcome back.')
@section('intro', 'Sign in to your employee dashboard.')
@section('content')
@include('account.partials.form', ['registration' => false, 'actionRoute' => 'employee.authenticate', 'formId' => 'employee-sign-in-form', 'submitLabel' => 'Sign in', 'alternateRoute' => 'employee.sign-up', 'alternateLabel' => 'New here? Create an account'])
@endsection
