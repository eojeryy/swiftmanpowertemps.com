@extends('layouts.app')

@section('title', 'Place Job Order | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .placejob-section .form-inner {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        padding: 34px 30px;
    }

    .placejob-section .form-inner.mr-0 {
        margin-right: 0;
    }

    .placejob-section .title-inner {
        margin-bottom: 24px;
    }

    .placejob-section .title-inner h2 {
        margin-bottom: 8px;
    }

    .placejob-section .title-inner p {
        color: #64748b;
        margin: 0;
    }

    .placejob-section .icon-box {
        margin-bottom: 14px;
    }

    .placejob-section .job-form .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .placejob-section .job-form .form-group input[type='text'],
    .placejob-section .job-form .form-group input[type='email'],
    .placejob-section .job-form .form-group textarea,
    .placejob-section .job-form .form-group .nice-select {
        border: 1px solid #eae0d9;
        border-radius: 5px;
        color: #766068;
        display: block;
        font-size: 17px;
        font-weight: 500;
        width: 100%;
    }

    .placejob-section .job-form .form-group input[type='text'],
    .placejob-section .job-form .form-group input[type='email'] {
        height: 54px;
        padding: 10px 20px;
    }

    .placejob-section .job-form .form-group .nice-select {
        height: 54px;
        line-height: 54px;
        padding-left: 20px;
        padding-right: 40px;
    }

    .placejob-section .job-form .form-group .nice-select:after {
        border-bottom: 2px solid #b39ea5;
        border-right: 2px solid #b39ea5;
    }

    .placejob-section .job-form .column .form-group .nice-select {
        margin-bottom: 20px;
    }

    .placejob-section .job-form .column .form-group:last-child .nice-select {
        margin-bottom: 0;
    }

    .placejob-section .job-form .column:first-child .form-group .nice-select {
        z-index: 1;
    }

    .place-job-feedback {
        margin-bottom: 30px;
        padding: 18px 22px;
        border-radius: 16px;
        border: 1px solid transparent;
        box-shadow: 0 16px 40px rgba(16, 24, 40, 0.08);
    }

    .place-job-feedback strong {
        display: block;
        margin-bottom: 6px;
        font-size: 18px;
    }

    .place-job-feedback p,
    .place-job-feedback li {
        color: #4a5568;
        margin: 0;
    }

    .place-job-feedback ul {
        margin: 0;
        padding-left: 18px;
    }

    .place-job-feedback--success {
        background: #ecfdf3;
        border-color: #9ce3b5;
    }

    .place-job-feedback--success strong {
        color: #0f8a4b;
    }

    .place-job-feedback--error {
        background: #fef2f2;
        border-color: #f5b5b5;
    }

    .place-job-feedback--error strong {
        color: #b42318;
    }

    .textarea-box {
        background: #fff;
        border: 1px solid #eae0d9;
        border-radius: 18px;
        overflow: hidden;
    }

    .textarea-toolbar {
        align-items: center;
        background: #fff8f5;
        border-bottom: 1px solid #f1ddd6;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 0;
        padding: 12px;
    }

    .textarea-toolbar button {
        align-items: center;
        background: #fff;
        border: 1px solid #f1ddd6;
        border-radius: 12px;
        color: #334155;
        cursor: pointer;
        display: inline-flex;
        font: inherit;
        font-size: 13px;
        font-weight: 700;
        justify-content: center;
        min-height: 40px;
        padding: 0 14px;
        width: auto;
    }

    .textarea-toolbar button:hover {
        background: #fff1ed;
        border-color: #dc2626;
        color: #9f271a;
    }

    .job-form textarea[name="message"] {
        background: #fff;
        border: 0;
        border-radius: 0;
        color: #0f172a;
        font: inherit;
        line-height: 1.7;
        min-height: 220px;
        padding: 18px 20px;
        resize: vertical;
        width: 100%;
    }

    .placejob-section .job-form .form-group > .theme-btn-one {
        display: block;
        padding: 14px 44px;
        width: 100%;
    }

    .textarea-toolbar button,
    .placejob-section .job-form .form-group .textarea-toolbar button {
        display: inline-flex;
        width: auto;
        min-width: 40px;
    }

    .job-form textarea[name="message"]:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        outline: none;
    }

    .job-form textarea[name="message"]::placeholder {
        color: #94a3b8;
    }

    .textarea-help {
        color: #64748b;
        display: block;
        font-size: 13px;
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<section class="page-title pb-0" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Place Your Job</h1>
                <p>Our team moves quickly to help you secure dependable talent for urgent or ongoing staffing needs.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Employers</li>
                <li>Place Job Order</li>
            </ul>
            <div class="bg-shape"></div>
        </div>
    </div>
</section>

<section class="placejob-section">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Request Needed Talent</span>
            <h2>Tell Us About Your Hiring Needs</h2>
            <p>We are committed to responding quickly to your staffing request. Fill out the form below and we will be in touch shortly.</p>
        </div>

        @if (session('status'))
            <div id="place-job-feedback" class="place-job-feedback place-job-feedback--success">
                <strong>Job request sent successfully</strong>
                <p>{{ session('status') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div id="place-job-feedback" class="place-job-feedback place-job-feedback--error">
                <strong>Please check the form details</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('place.job.submit') }}" class="job-form">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-inner">
                            <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-58.png') }}" alt=""></figure>
                            <h2>Company Details</h2>
                            <p>Please fill out your company details here.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="company_name" placeholder="Company Name*" value="{{ old('company_name') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="website" placeholder="Website" value="{{ old('website') }}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="select-box">
                                    <select class="wide" name="industry">
                                        <option value="Warehousing" @selected(old('industry', 'Warehousing') === 'Warehousing') data-display="Industry*">Industry*</option>
                                        <option value="Warehousing" @selected(old('industry') === 'Warehousing')>Warehousing</option>
                                        <option value="Logistics" @selected(old('industry') === 'Logistics')>Logistics</option>
                                        <option value="Construction" @selected(old('industry') === 'Construction')>Construction</option>
                                        <option value="Administration" @selected(old('industry') === 'Administration')>Administration</option>
                                        <option value="Customer Support" @selected(old('industry') === 'Customer Support')>Customer Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="company_phone" placeholder="Phone*" value="{{ old('company_phone') }}" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="company_address" placeholder="Address (eg: No,Street,City,State,Zip)" value="{{ old('company_address') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-inner">
                            <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-59.png') }}" alt=""></figure>
                            <h2>Contact Person</h2>
                            <p>Please fill out your contact person details here.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="contact_first_name" placeholder="First Name*" value="{{ old('contact_first_name') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="contact_last_name" placeholder="Last Name*" value="{{ old('contact_last_name') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone*" value="{{ old('phone') }}" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="profile_link" placeholder="https://www.facebook.com/person.xxxx" value="{{ old('profile_link') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-column">
                    <div class="form-inner mr-0">
                        <div class="title-inner">
                            <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-60.png') }}" alt=""></figure>
                            <h2>Request Talent</h2>
                            <p>Here you can leave your job details and submit your job post.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                <div class="form-group">
                                    <div class="select-box">
                                        <select class="wide" name="specialization">
                                            <option value="Temporary Staffing" @selected(old('specialization', 'Temporary Staffing') === 'Temporary Staffing') data-display="Specialisation">Specialisation</option>
                                            <option value="Temporary Staffing" @selected(old('specialization') === 'Temporary Staffing')>Temporary Staffing</option>
                                            <option value="Direct Hire" @selected(old('specialization') === 'Direct Hire')>Direct Hire</option>
                                            <option value="Contract Staffing" @selected(old('specialization') === 'Contract Staffing')>Contract Staffing</option>
                                            <option value="General Labour" @selected(old('specialization') === 'General Labour')>General Labour</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="job_location" placeholder="Job Location" value="{{ old('job_location') }}" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pay_rate" placeholder="Pay Rate Range" value="{{ old('pay_rate') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                <div class="form-group">
                                    <input type="text" name="position_hiring_for" placeholder="Position hiring for" value="{{ old('position_hiring_for') }}" required>
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select class="wide" name="preferred_pronoun">
                                            <option value="" @selected(old('preferred_pronoun', '') === '') data-display="Preferred Pronoun">Preferred Pronoun</option>
                                            <option value="No Preference" @selected(old('preferred_pronoun') === 'No Preference')>No Preference</option>
                                            <option value="He/Him" @selected(old('preferred_pronoun') === 'He/Him')>He/Him</option>
                                            <option value="She/Her" @selected(old('preferred_pronoun') === 'She/Her')>She/Her</option>
                                            <option value="They/Them" @selected(old('preferred_pronoun') === 'They/Them')>They/Them</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select class="wide" name="openings_count">
                                            <option value="" @selected(old('openings_count', '') === '') data-display="Number of Openings">Number of Openings</option>
                                            <option value="1" @selected(old('openings_count') === '1')>1</option>
                                            <option value="2-5" @selected(old('openings_count') === '2-5')>2-5</option>
                                            <option value="6-10" @selected(old('openings_count') === '6-10')>6-10</option>
                                            <option value="10+" @selected(old('openings_count') === '10+')>10+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Job Title / Hiring Subject*" value="{{ old('subject') }}" required>
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select class="wide" name="interest">
                                            <option value="Temporary Staffing" @selected(old('interest', 'Temporary Staffing') === 'Temporary Staffing') data-display="Service Needed">Service Needed</option>
                                            <option value="Temporary Staffing" @selected(old('interest') === 'Temporary Staffing')>Temporary Staffing</option>
                                            <option value="Direct Hire" @selected(old('interest') === 'Direct Hire')>Direct Hire</option>
                                            <option value="Contract Staffing" @selected(old('interest') === 'Contract Staffing')>Contract Staffing</option>
                                            <option value="General Employer Enquiry" @selected(old('interest') === 'General Employer Enquiry')>General Employer Enquiry</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="textarea-box">
                                        <div class="textarea-toolbar" data-textarea-toolbar>
                                            <button type="button" data-format="bold">B</button>
                                            <button type="button" data-format="italic"><em>I</em></button>
                                            <button type="button" data-format="underline"><u>U</u></button>
                                            <button type="button" data-format="ul">&bull; List</button>
                                            <button type="button" data-format="ol">1. List</button>
                                            <button type="button" data-format="quote">Quote</button>
                                            <button type="button" data-format="link">Link</button>
                                        </div>
                                        <textarea name="message" placeholder="Job Description">{{ old('message') }}</textarea>
                                    </div>
                                    <small class="textarea-help">Select text and use the buttons above to add simple formatting.</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="theme-btn-one">Post Your Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="clients-section alternet-2">
    <div class="outer-container">
        <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            <figure class="clients-logo-box">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/clients/clients-logo-13.png') }}" alt=""></a>
                <span class="logo-title"><a href="{{ route('home') }}">Visit Website</a></span>
            </figure>
            <figure class="clients-logo-box">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/clients/clients-logo-14.png') }}" alt=""></a>
                <span class="logo-title"><a href="{{ route('home') }}">Visit Website</a></span>
            </figure>
            <figure class="clients-logo-box">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/clients/clients-logo-15.png') }}" alt=""></a>
                <span class="logo-title"><a href="{{ route('home') }}">Visit Website</a></span>
            </figure>
            <figure class="clients-logo-box">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/clients/clients-logo-16.png') }}" alt=""></a>
                <span class="logo-title"><a href="{{ route('home') }}">Visit Website</a></span>
            </figure>
            <figure class="clients-logo-box">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/clients/clients-logo-17.png') }}" alt=""></a>
                <span class="logo-title"><a href="{{ route('home') }}">Visit Website</a></span>
            </figure>
            <figure class="clients-logo-box">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/clients/clients-logo-18.png') }}" alt=""></a>
                <span class="logo-title"><a href="{{ route('home') }}">Visit Website</a></span>
            </figure>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    window.addEventListener('load', function () {
        const feedback = document.getElementById('place-job-feedback');

        if (feedback) {
            feedback.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var textarea = document.querySelector('textarea[name="message"]');
        var toolbar = document.querySelector('[data-textarea-toolbar]');

        if (!textarea || !toolbar) {
            return;
        }

        function replaceSelection(transformer) {
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var selected = textarea.value.slice(start, end);
            var result = transformer(selected);

            textarea.setRangeText(result.text, start, end, 'end');
            textarea.focus();

            if (typeof result.selectionStart === 'number' && typeof result.selectionEnd === 'number') {
                textarea.setSelectionRange(start + result.selectionStart, start + result.selectionEnd);
            }
        }

        function wrapSelection(prefix, suffix, fallback) {
            replaceSelection(function (selected) {
                var text = selected || fallback;
                return {
                    text: prefix + text + suffix,
                    selectionStart: prefix.length,
                    selectionEnd: prefix.length + text.length
                };
            });
        }

        function listSelection(ordered) {
            replaceSelection(function (selected) {
                var lines = (selected || 'List item')
                    .split('\n')
                    .filter(function (line) { return line.trim() !== ''; });

                if (!lines.length) {
                    lines = ['List item'];
                }

                var text = lines.map(function (line, index) {
                    return ordered ? (index + 1) + '. ' + line : '• ' + line;
                }).join('\n');

                return {
                    text: text,
                    selectionStart: 0,
                    selectionEnd: text.length
                };
            });
        }

        toolbar.querySelectorAll('button[data-format]').forEach(function (button) {
            button.addEventListener('click', function () {
                var format = button.getAttribute('data-format');

                if (format === 'bold') {
                    wrapSelection('<strong>', '</strong>', 'Bold text');
                    return;
                }

                if (format === 'italic') {
                    wrapSelection('<em>', '</em>', 'Italic text');
                    return;
                }

                if (format === 'underline') {
                    wrapSelection('<u>', '</u>', 'Underlined text');
                    return;
                }

                if (format === 'ul') {
                    listSelection(false);
                    return;
                }

                if (format === 'ol') {
                    listSelection(true);
                    return;
                }

                if (format === 'quote') {
                    wrapSelection('<blockquote>', '</blockquote>', 'Quoted text');
                    return;
                }

                if (format === 'link') {
                    var url = window.prompt('Enter the link URL');

                    if (!url) {
                        return;
                    }

                    replaceSelection(function (selected) {
                        var text = selected || 'Link text';

                        return {
                            text: '<a href="' + url + '">' + text + '</a>',
                            selectionStart: 0,
                            selectionEnd: text.length
                        };
                    });
                }
            });
        });
    });
</script>
@endsection
