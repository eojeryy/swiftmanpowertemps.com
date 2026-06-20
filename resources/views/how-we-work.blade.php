@extends('layouts.app')

@section('title', 'How We Work | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .how-we-work-section .accordion .card {
        border: 0;
        border-radius: 18px;
        box-shadow: 0 18px 45px rgba(70, 43, 52, 0.08);
        margin-bottom: 18px;
        overflow: hidden;
    }

    .how-we-work-section .accordion .card-header {
        background: #fff;
        border-bottom: 0;
        padding: 0;
    }

    .how-we-work-section .accordion .btn-link {
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

    .how-we-work-section .accordion .btn-link:hover,
    .how-we-work-section .accordion .btn-link:focus {
        color: #ff5956;
        text-decoration: none;
    }

    .how-we-work-section .accordion .btn-link::after {
        color: #ff5956;
        content: '+';
        font-size: 28px;
        line-height: 1;
        margin-left: 18px;
    }

    .how-we-work-section .accordion .btn-link[aria-expanded="true"]::after {
        content: '-';
    }

    .how-we-work-section .accordion .card-body {
        color: #766068;
        font-size: 17px;
        line-height: 30px;
        padding: 0 28px 28px;
    }

    .how-we-work-section .step-label {
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
                <h1>How We Work</h1>
                <p>Explore the steps we follow to support employers from hiring request through placement and follow-up.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>How We Work</li>
            </ul>
        </div>
    </div>
</section>

<section class="how-we-work-section faq-section bg-color-2">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Our Plan & Working Style</span>
            <h2>How Swift Manpower Supports Each Placement</h2>
            <p>We use a practical, step-by-step approach to help businesses move through hiring with clarity and confidence.</p>
        </div>

        <div class="accordion" id="howWeWorkAccordion">
            <div class="card">
                <div class="card-header" id="headingRequirements">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseRequirements" aria-expanded="true" aria-controls="collapseRequirements">
                        <span>
                            <span class="step-label">Step 01</span>
                            Review Hiring Requirements
                        </span>
                    </button>
                </div>
                <div id="collapseRequirements" class="collapse show" aria-labelledby="headingRequirements" data-parent="#howWeWorkAccordion">
                    <div class="card-body">
                        We start by understanding the role, timeline, and qualities needed for success. This helps us align the search with the employer's expectations before candidates are introduced.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingCandidates">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseCandidates" aria-expanded="false" aria-controls="collapseCandidates">
                        <span>
                            <span class="step-label">Step 02</span>
                            Screen and Shortlist Candidates
                        </span>
                    </button>
                </div>
                <div id="collapseCandidates" class="collapse" aria-labelledby="headingCandidates" data-parent="#howWeWorkAccordion">
                    <div class="card-body">
                        Qualified candidates are reviewed, screened, and prepared for employer consideration. Our goal is to narrow the field to people who best fit the role and work environment.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingPlacement">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsePlacement" aria-expanded="false" aria-controls="collapsePlacement">
                        <span>
                            <span class="step-label">Step 03</span>
                            Support Placement and Follow-Up
                        </span>
                    </button>
                </div>
                <div id="collapsePlacement" class="collapse" aria-labelledby="headingPlacement" data-parent="#howWeWorkAccordion">
                    <div class="card-body">
                        We help coordinate placement details and maintain communication after hiring. This follow-up helps placements stay organized and gives employers continued support as the role gets underway.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
