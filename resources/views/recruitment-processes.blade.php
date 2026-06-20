@extends('layouts.app')

@section('title', 'Recruitment Processes | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .recruitment-processes-section .accordion .card {
        border: 0;
        border-radius: 18px;
        box-shadow: 0 18px 45px rgba(70, 43, 52, 0.08);
        margin-bottom: 18px;
        overflow: hidden;
    }

    .recruitment-processes-section .accordion .card-header {
        background: #fff;
        border-bottom: 0;
        padding: 0;
    }

    .recruitment-processes-section .accordion .btn-link {
        align-items: center;
        color: #462b34;
        display: flex;
        font-family: 'Nunito Sans', sans-serif;
        font-size: 20px;
        font-weight: 800;
        justify-content: space-between;
        padding: 24px 28px;
        text-align: left;
        text-decoration: none;
        white-space: normal;
        width: 100%;
    }

    .recruitment-processes-section .accordion .btn-link:hover,
    .recruitment-processes-section .accordion .btn-link:focus {
        color: #ff5956;
        text-decoration: none;
    }

    .recruitment-processes-section .accordion .btn-link::after {
        color: #ff5956;
        content: '+';
        font-size: 28px;
        line-height: 1;
        margin-left: 18px;
    }

    .recruitment-processes-section .accordion .btn-link[aria-expanded="true"]::after {
        content: '-';
    }

    .recruitment-processes-section .accordion .card-body {
        color: #766068;
        font-size: 17px;
        line-height: 30px;
        padding: 0 28px 28px;
    }

    .recruitment-processes-section .step-label {
        color: #ff5956;
        display: block;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.16em;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
</style>
@endsection

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Recruitment Processes</h1>
                <p>See how our screening, communication, and coordination processes help make hiring smoother for employers and candidates.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Recruitment Processes</li>
            </ul>
        </div>
    </div>
</section>

<section class="recruitment-processes-section faq-section bg-color-2">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Recruitment Backed by Better Processes</span>
            <h2>How Our Recruitment Process Supports Better Outcomes</h2>
            <p>We use practical, organized steps to help employers hire more smoothly and help candidates move through the process with clarity.</p>
        </div>

        <div class="accordion" id="recruitmentProcessesAccordion">
            <div class="card">
                <div class="card-header" id="headingSourcing">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSourcing" aria-expanded="true" aria-controls="collapseSourcing">
                        <span>
                            <span class="step-label">01</span>
                            Candidate Sourcing
                        </span>
                    </button>
                </div>
                <div id="collapseSourcing" class="collapse show" aria-labelledby="headingSourcing" data-parent="#recruitmentProcessesAccordion">
                    <div class="card-body">
                        We identify candidates who fit the role requirements and work expectations. This helps employers spend more time reviewing relevant matches and less time sorting through poor-fit applications.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingCoordinated">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseCoordinated" aria-expanded="false" aria-controls="collapseCoordinated">
                        <span>
                            <span class="step-label">02</span>
                            Coordinated Hiring
                        </span>
                    </button>
                </div>
                <div id="collapseCoordinated" class="collapse" aria-labelledby="headingCoordinated" data-parent="#recruitmentProcessesAccordion">
                    <div class="card-body">
                        Our team helps manage interviews, scheduling, and communication efficiently. Clear coordination reduces confusion, keeps timelines moving, and supports a better experience for both employers and candidates.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingSupport">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSupport" aria-expanded="false" aria-controls="collapseSupport">
                        <span>
                            <span class="step-label">03</span>
                            Long-Term Support
                        </span>
                    </button>
                </div>
                <div id="collapseSupport" class="collapse" aria-labelledby="headingSupport" data-parent="#recruitmentProcessesAccordion">
                    <div class="card-body">
                        We stay involved to support stronger placements and better staffing outcomes. Continued communication after hiring helps address early questions and supports long-term success.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
