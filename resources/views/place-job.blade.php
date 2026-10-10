@extends('layouts.app')
@section('title', 'Request Staff in Canada | Swift Manpower Temps Agency')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/employer-request.css') }}">
@endsection
@section('content')
@php
    $companyFields = [
        ['name' => 'company_name', 'label' => 'Company name', 'required' => true, 'autocomplete' => 'organization', 'placeholder' => 'Your business name'],
        ['name' => 'industry', 'label' => 'Industry', 'required' => true, 'placeholder' => 'Select your industry', 'options' => ['Warehousing', 'Logistics', 'Construction', 'Manufacturing', 'Administration', 'Customer Support', 'Hospitality', 'Other']],
        ['name' => 'company_phone', 'label' => 'Company phone', 'required' => true, 'type' => 'tel', 'max' => 50, 'placeholder' => 'e.g. 587-555-0123'],
        ['name' => 'website', 'label' => 'Company website', 'type' => 'url', 'autocomplete' => 'url', 'placeholder' => 'https://yourcompany.ca'],
        ['name' => 'company_address', 'label' => 'Company address', 'required' => true, 'wide' => true, 'max' => 500, 'autocomplete' => 'street-address', 'placeholder' => 'Street address, city, province and postal code'],
    ];
    $contactFields = [
        ['name' => 'contact_first_name', 'label' => 'First name', 'required' => true, 'autocomplete' => 'given-name'],
        ['name' => 'contact_last_name', 'label' => 'Last name', 'required' => true, 'autocomplete' => 'family-name'],
        ['name' => 'email', 'label' => 'Work email', 'required' => true, 'type' => 'email', 'autocomplete' => 'email', 'placeholder' => 'you@yourcompany.ca'],
        ['name' => 'phone', 'label' => 'Direct phone', 'required' => true, 'type' => 'tel', 'autocomplete' => 'tel', 'max' => 50, 'placeholder' => 'The best number to reach you'],
        ['name' => 'profile_link', 'label' => 'Professional profile', 'type' => 'url', 'max' => 500, 'placeholder' => 'https://www.linkedin.com/in/yourprofile'],
        ['name' => 'preferred_pronoun', 'label' => 'Your pronouns', 'placeholder' => 'Prefer not to say', 'options' => ['He/Him', 'She/Her', 'They/Them']],
    ];
    $roleFields = [
        ['name' => 'position_hiring_for', 'label' => 'Position you’re hiring for', 'required' => true, 'placeholder' => 'e.g. Warehouse associate'],
        ['name' => 'job_location', 'label' => 'Job location', 'required' => true, 'placeholder' => 'e.g. Calgary, Alberta'],
        ['name' => 'interest', 'label' => 'Staffing service', 'required' => true, 'placeholder' => 'Choose the support you need', 'options' => ['Temporary Staffing', 'Direct Hire', 'Contract Staffing', 'General Employer Enquiry']],
        ['name' => 'specialization', 'label' => 'Role category', 'required' => true, 'placeholder' => 'Choose a role category', 'options' => ['General Labour', 'Warehouse Support', 'Skilled Trades', 'Office Support', 'Customer Support', 'Other']],
        ['name' => 'openings_count', 'label' => 'Number of openings', 'placeholder' => 'Choose a range', 'options' => ['1', '2-5', '6-10', '10+']],
        ['name' => 'pay_rate', 'label' => 'Pay range (CAD)', 'placeholder' => 'e.g. $22–$26 per hour', 'help' => 'Include whether the rate is hourly or annual.'],
        ['name' => 'subject', 'label' => 'Request subject', 'required' => true, 'wide' => true, 'placeholder' => 'e.g. Hiring warehouse staff for our Calgary team', 'help' => 'A short title to help our team identify your request.'],
    ];
@endphp
<section class="request-page-intro">
    <div class="auto-container">
        <a href="{{ route('employer.overview') }}" class="request-back">
<span aria-hidden="true">←</span> Employer services</a>
        <span class="eyebrow">Your next hire starts here</span>
        <h1>Tell us about the<br>people you need.</h1>
        <p>Share a few details about your business and the role. Our Calgary team will review your request and contact you to discuss your staffing needs.</p>
    </div>
</section>
<section class="employer-request-section">
    <div class="auto-container">
        @if(session('status'))
            <div class="request-feedback request-feedback-success" id="place-job-feedback" role="status" tabindex="-1">
<h2>Thank you for your request</h2>
<p>{{ session('status') }}</p>
<a href="{{ route('job.openings') }}">Explore current job openings →</a>
</div>
        @endif
        @if($errors->any())
            <div class="request-feedback request-feedback-error" id="place-job-feedback" role="alert" tabindex="-1">
<h2>A few details need your attention</h2>
<p>Your entries have been kept. Review the fields below and submit again.</p>
<ul>@foreach($errors->getMessages() as $name => $messages)<li>
<a href="#field-{{ $name }}">{{ $messages[0] }}</a>
</li>@endforeach</ul>
</div>
        @endif
        <div class="employer-request-layout">
            <form method="post" action="{{ route('place.job.submit') }}" class="employer-request-form" id="employer-request-form">
                @csrf
                <p class="required-note">
<span aria-hidden="true">*</span> Required fields</p>
                <fieldset class="request-panel" id="company-details">
<legend>
<span class="request-step">01</span> Your company</legend>
<p class="panel-intro">A little context about your business and where you operate.</p>
<div class="employer-fields">@foreach($companyFields as $field)@include('partials.employer-field', ['field' => $field])@endforeach</div>
</fieldset>
                <fieldset class="request-panel" id="contact-details">
<legend>
<span class="request-step">02</span> Your contact details</legend>
<p class="panel-intro">Who should we speak with about this hiring request?</p>
<div class="employer-fields">@foreach($contactFields as $field)@include('partials.employer-field', ['field' => $field])@endforeach</div>
</fieldset>
                <fieldset class="request-panel" id="role-details">
<legend>
<span class="request-step">03</span> The role &amp; your requirements</legend>
<p class="panel-intro">Help us understand the work, the location and the skills that matter.</p>
<div class="employer-fields">@foreach($roleFields as $field)@include('partials.employer-field', ['field' => $field])@endforeach</div>
                    <div class="employer-field description-field">
                        <label id="description-label" for="field-message">Job description <span class="field-optional">Optional</span>
</label>
                        <p class="field-help" id="description-help">Describe the responsibilities, required experience, shift times and expected start date.</p>
                        <div class="request-editor" data-request-editor>
                            <div class="request-editor-toolbar" role="toolbar" aria-label="Job description formatting" hidden>
                                <button type="button" data-command="bold" aria-label="Bold" aria-pressed="false" title="Bold (Ctrl/Cmd+B)">
<strong>B</strong>
</button>
                                <button type="button" data-command="italic" aria-label="Italic" aria-pressed="false" title="Italic (Ctrl/Cmd+I)">
<em>I</em>
</button>
                                <button type="button" data-command="underline" aria-label="Underline" aria-pressed="false" title="Underline (Ctrl/Cmd+U)">
<u>U</u>
</button>
                                <span class="toolbar-divider" aria-hidden="true">
</span>
                                <button type="button" data-command="formatBlock" data-value="h3" title="Section heading">Heading</button>
                                <button type="button" data-command="formatBlock" data-value="p" title="Paragraph">Text</button>
                                <button type="button" data-command="formatBlock" data-value="blockquote" title="Block quote">Quote</button>
                                <button type="button" data-command="insertUnorderedList" aria-label="Bullet list" aria-pressed="false" title="Bullet list">• List</button>
                                <button type="button" data-command="insertOrderedList" aria-label="Numbered list" aria-pressed="false" title="Numbered list">1. List</button>
                                <button type="button" data-editor-link aria-label="Insert or edit link" title="Insert or edit link">Link</button>
                                <button type="button" data-command="unlink" aria-label="Remove link" title="Remove link">Unlink</button>
                                <button type="button" data-command="removeFormat" aria-label="Clear text formatting" title="Clear text formatting">Clear style</button>
                                <span class="toolbar-divider" aria-hidden="true">
</span>
                                <button type="button" data-command="undo" aria-label="Undo" title="Undo">↶</button>
                                <button type="button" data-command="redo" aria-label="Redo" title="Redo">↷</button>
                            </div>
                            <div class="editor-link-panel" data-link-panel hidden>
                                <label for="description-link">Link address</label>
<div>
<input type="text" inputmode="url" id="description-link" placeholder="https://example.com" aria-describedby="description-link-error">
<button type="button" data-link-apply>Add link</button>
<button type="button" data-link-cancel>Cancel</button>
</div>
<p id="description-link-error" class="field-error" hidden>Enter a complete http or https website address.</p>
                            </div>
                            <textarea id="field-message" name="message" rows="12" placeholder="Tell us about the role…" aria-describedby="description-help description-count {{ $errors->has('message') ? 'field-message-error' : '' }}" @if($errors->has('message')) aria-invalid="true" @endif>{{ old('message') }}</textarea>
                            <div id="description-editor" class="request-editor-surface rich-description" contenteditable="true" role="textbox" aria-multiline="true" aria-labelledby="description-label" aria-describedby="description-help description-count" data-placeholder="Tell us about the role…" hidden>{!! \App\Support\RichText::html(old('message')) !!}</div>
                            <div class="editor-footer">
<span>Clear details help us find the right match.</span>
<span id="description-count" data-editor-count>Up to 5,000 characters</span>
</div>
                        </div>
                        @error('message')<p class="field-error" id="field-message-error">{{ $message }}</p>@enderror
                        <div class="description-outline" data-outline-actions hidden>
<button type="button" data-editor-outline>Start with a job description outline <span aria-hidden="true">↗</span>
</button>
<span>Responsibilities, skills, schedule and start date.</span>
<p class="field-help" data-outline-status role="status">
</p>
</div>
                    </div>
                </fieldset>
                <div class="request-submit">
<div>
<strong>Ready to start the conversation?</strong>
<p>Our team reviews each request before a job is published.</p>
</div>
<button type="submit" class="swift-btn swift-btn-dark" data-submit-request>Send staffing request <span aria-hidden="true">→</span>
</button>
<p class="field-error" data-submit-error role="alert" hidden>
</p>
</div>
            </form>
            <aside class="request-sidebar" aria-label="Help with your staffing request">
                <div class="request-sidebar-card">
<span class="eyebrow">Your staffing brief</span>
<h2>Let’s find your next match.</h2>
<p>Complete the company, contact and role details so we can get to know your needs.</p>
<div class="request-progress" data-request-progress hidden>
<div>
<span>Required details completed</span>
<strong data-progress-label>0%</strong>
</div>
<progress max="100" value="0" aria-label="Required form details completed">
</progress>
</div>
<ol class="request-section-links">
<li>
<a href="#company-details">
<span>01</span> Your company</a>
</li>
<li>
<a href="#contact-details">
<span>02</span> Contact details</a>
</li>
<li>
<a href="#role-details">
<span>03</span> Role &amp; requirements</a>
</li>
</ol>
</div>
                <div class="request-support-card">
<span class="eyebrow">Prefer a conversation?</span>
<h2>We’re here to help.</h2>
<p>Speak with our Calgary team about the people your business needs.</p>
<a href="tel:+15878992598">587-899-2598 <span aria-hidden="true">↗</span>
</a>
<a href="mailto:monica@swiftmanpowertemps.com">Email our team <span aria-hidden="true">↗</span>
</a>
</div>
            </aside>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/employer-request.js') }}" defer>
</script>
@endsection
