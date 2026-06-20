@extends('layouts.app')

@section('title', 'Apply Now | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .resume-field {
        display: grid;
        gap: 12px;
    }

    .resume-picker {
        align-items: center;
        background: #fff8f5;
        border: 1px dashed #f1c8bd;
        border-radius: 18px;
        cursor: pointer;
        display: inline-flex;
        font-weight: 700;
        gap: 10px;
        justify-content: center;
        min-height: 58px;
        padding: 0 18px;
        transition: border-color 0.2s ease, background-color 0.2s ease;
    }

    .resume-picker:hover {
        background: #fff1ed;
        border-color: #dc2626;
    }

    .resume-input {
        display: none;
    }

    .resume-selected {
        align-items: center;
        background: #fff;
        border: 1px solid #dbe3ef;
        border-radius: 18px;
        display: none;
        gap: 14px;
        justify-content: space-between;
        padding: 14px 16px;
    }

    .resume-selected.is-visible {
        display: flex;
    }

    .resume-selected strong {
        color: #0f172a;
        display: block;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .resume-selected span {
        color: #64748b;
        display: block;
        font-size: 13px;
    }

    .resume-remove {
        background: #fff1ed;
        border: 1px solid #f1c8bd;
        border-radius: 12px;
        color: #9f271a;
        cursor: pointer;
        font: inherit;
        font-size: 13px;
        font-weight: 700;
        padding: 10px 14px;
        white-space: nowrap;
    }

    .resume-help {
        color: #64748b;
        display: block;
        font-size: 13px;
    }

    .textarea-toolbar {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 12px;
    }

    .textarea-toolbar button {
        align-items: center;
        background: #fff8f5;
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

    .apply-form textarea[name="message"] {
        background: #fff;
        border: 1px solid #dbe3ef;
        border-radius: 18px;
        color: #0f172a;
        font: inherit;
        min-height: 180px;
        padding: 14px 16px;
        resize: vertical;
        width: 100%;
    }

    .apply-form textarea[name="message"]:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        outline: none;
    }

    .apply-form textarea[name="message"]::placeholder {
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
@php
    $employeeUser = auth()->check() && ! auth()->user()->is_super_admin ? auth()->user() : null;
    $nameParts = $employeeUser ? preg_split('/\s+/', trim($employeeUser->name), 2) : [];
    $prefillFirstName = old('fname', $nameParts[0] ?? '');
    $prefillLastName = old('lname', $nameParts[1] ?? '');
    $prefillEmail = old('email', $employeeUser?->email ?? '');
@endphp
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Apply Now</h1>
                <p>Send your application details to Swift Manpower Temps Agency Ltd and let our team guide you to the next step.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Job Seekers</li>
                <li>Apply Now</li>
            </ul>
        </div>
    </div>
</section>

<section class="contactinfo-section contact-page-section">
    <div class="auto-container">
        @if ($employeeUser)
            <div class="alert alert-info mb-4">
                You are signed in as <strong>{{ $employeeUser->name }}</strong>. We have prefilled a few application details for you.
            </div>
        @else
            <div class="alert alert-light border mb-4">
                You can apply without signing in. If you already have an employee account, signing in helps you fill this form faster.
                <a href="{{ route('employee.sign-in') }}">Employee sign in</a>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('apply.submit') }}" class="apply-form default-form" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-inner">
                            <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-64.png') }}" alt=""></figure>
                            <h2>Basic Infomation</h2>
                            <p>Please fill out your contact person details here.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="fname" placeholder="First Name*" value="{{ $prefillFirstName }}" autocomplete="given-name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="lname" placeholder="Last Name*" value="{{ $prefillLastName }}" autocomplete="family-name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email*" value="{{ $prefillEmail }}" autocomplete="email" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" autocomplete="tel" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="address" placeholder="Address (eg: No,Street,City,State,Zip)" value="{{ old('address') }}" autocomplete="street-address" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-inner">
                            <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-65.png') }}" alt=""></figure>
                            <h2>Qualification</h2>
                            <p>Please fill out your qualification details here.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="education" placeholder="Education" value="{{ old('education') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="select-box">
                                    <select class="wide" name="skills">
                                        <option value="General Skills" @selected(old('skills', 'General Skills') === 'General Skills') data-display="Skills">Skills</option>
                                        <option value="Warehouse Operations" @selected(old('skills') === 'Warehouse Operations')>Warehouse Operations</option>
                                        <option value="Administrative Support" @selected(old('skills') === 'Administrative Support')>Administrative Support</option>
                                        <option value="Customer Service" @selected(old('skills') === 'Customer Service')>Customer Service</option>
                                        <option value="General Labour" @selected(old('skills') === 'General Labour')>General Labour</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="experience" placeholder="Total Experience" value="{{ old('experience') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="qualities" placeholder="Personal Qualities" value="{{ old('qualities') }}" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <div class="resume-field">
                                    <label class="resume-picker" for="upload_file">
                                        <i class="flaticon-cloud-computing"></i>
                                        <span>Select Resume File</span>
                                    </label>
                                    <input id="upload_file" class="resume-input" type="file" name="upload_file" accept=".pdf,.doc,.docx" required>
                                    <div class="resume-selected" data-resume-selected>
                                        <div>
                                            <strong data-resume-name>No file selected</strong>
                                            <span data-resume-meta>PDF or Word document, up to 1 MB.</span>
                                        </div>
                                        <button type="button" class="resume-remove" data-resume-remove>Remove</button>
                                    </div>
                                    <small class="resume-help">Accepted files: PDF, DOC, DOCX. Maximum size: 1 MB.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-column">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="job_number" placeholder="Job Number*" value="{{ old('job_number') }}" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <div class="select-box">
                                <select class="wide" name="work_status">
                                    <option value="Select Desired Work Status" @selected(old('work_status', 'Select Desired Work Status') === 'Select Desired Work Status') data-display="Select Desired Work Status">Select Desired Work Status</option>
                                    <option value="Full Time" @selected(old('work_status') === 'Full Time')>Full Time</option>
                                    <option value="Part Time" @selected(old('work_status') === 'Part Time')>Part Time</option>
                                    <option value="Temporary" @selected(old('work_status') === 'Temporary')>Temporary</option>
                                    <option value="Contract" @selected(old('work_status') === 'Contract')>Contract</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <div class="textarea-toolbar" data-textarea-toolbar>
                                <button type="button" data-format="bold">B</button>
                                <button type="button" data-format="italic"><em>I</em></button>
                                <button type="button" data-format="underline"><u>U</u></button>
                                <button type="button" data-format="ul">&bull; List</button>
                                <button type="button" data-format="ol">1. List</button>
                                <button type="button" data-format="quote">Quote</button>
                                <button type="button" data-format="link">Link</button>
                            </div>
                            <textarea name="message" placeholder="Additional Information ...">{{ old('message') }}</textarea>
                            <small class="textarea-help">Select text and use the buttons above to add simple formatting.</small>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                            <button type="submit" class="theme-btn-one">Apply for Job</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var resumeInput = document.getElementById('upload_file');
        var resumeSelected = document.querySelector('[data-resume-selected]');
        var resumeName = document.querySelector('[data-resume-name]');
        var resumeMeta = document.querySelector('[data-resume-meta]');
        var resumeRemove = document.querySelector('[data-resume-remove]');
        var textarea = document.querySelector('textarea[name="message"]');
        var toolbar = document.querySelector('[data-textarea-toolbar]');

        function formatSize(size) {
            if (size < 1024) {
                return size + ' bytes';
            }

            if (size < 1024 * 1024) {
                return (size / 1024).toFixed(1).replace('.0', '') + ' KB';
            }

            return (size / (1024 * 1024)).toFixed(1).replace('.0', '') + ' MB';
        }

        function clearResume() {
            resumeInput.value = '';
            resumeSelected.classList.remove('is-visible');
            resumeName.textContent = 'No file selected';
            resumeMeta.textContent = 'PDF or Word document, up to 1 MB.';
        }

        if (resumeInput && resumeSelected && resumeName && resumeMeta && resumeRemove) {
            resumeInput.addEventListener('change', function () {
                var file = resumeInput.files && resumeInput.files[0];

                if (!file) {
                    clearResume();
                    return;
                }

                resumeName.textContent = file.name;
                resumeMeta.textContent = formatSize(file.size);
                resumeSelected.classList.add('is-visible');
            });

            resumeRemove.addEventListener('click', clearResume);
        }

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
