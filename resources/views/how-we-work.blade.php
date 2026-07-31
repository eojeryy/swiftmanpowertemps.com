@extends('layouts.app')

@section('title', 'How We Work | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .how-we-work-section {
        background:
            radial-gradient(circle at top, rgba(120, 216, 51, 0.1), transparent 28%),
            linear-gradient(180deg, #f7faf6 0%, #edf4ea 100%);
        padding: 110px 0 120px;
    }

    .how-we-work-section .sec-title {
        margin-bottom: 55px;
    }

    .how-we-work-section .accordion {
        max-width: 920px;
        margin: 0 auto;
    }

    .how-we-work-section .accordion .card {
        background: linear-gradient(180deg, #ffffff, #f7fbf5);
        border: 1px solid rgba(120, 216, 51, 0.14);
        border-radius: 24px;
        box-shadow: 0 24px 55px rgba(13, 21, 17, 0.08);
        margin-bottom: 22px;
        overflow: hidden;
    }

    .how-we-work-section .accordion .card-header {
        background: transparent;
        border-bottom: 0;
        padding: 0;
    }

    .how-we-work-section .accordion .btn-link {
        align-items: center;
        color: #0d1511;
        display: flex;
        font-family: 'Nunito Sans', sans-serif;
        font-size: 20px;
        font-weight: 800;
        justify-content: space-between;
        padding: 28px 30px;
        text-align: left;
        text-decoration: none;
        white-space: normal;
        width: 100%;
    }

    .how-we-work-section .accordion .btn-link:hover,
    .how-we-work-section .accordion .btn-link:focus {
        color: #5cab21;
        text-decoration: none;
    }

    .how-we-work-section .accordion .btn-link::after {
        align-items: center;
        background: rgba(120, 216, 51, 0.12);
        border: 1px solid rgba(120, 216, 51, 0.18);
        border-radius: 50%;
        color: #5cab21;
        content: '+';
        display: inline-flex;
        flex: 0 0 48px;
        font-size: 28px;
        height: 48px;
        justify-content: center;
        line-height: 1;
        margin-left: 18px;
        transition: all 0.3s ease;
        width: 48px;
    }

    .how-we-work-section .accordion .btn-link[aria-expanded="true"]::after {
        content: '-';
        background: #0d1511;
        border-color: #0d1511;
        color: #78d833;
    }

    .how-we-work-section .accordion .card-body {
        color: #627068;
        font-size: 17px;
        line-height: 30px;
        padding: 0 30px 30px;
    }

    .how-we-work-section .step-label {
        color: #5cab21;
        display: block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.18em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .how-we-work-section .step-title {
        display: block;
        font-size: 28px;
        line-height: 1.25;
        color: #0d1511;
    }

    @media (max-width: 767px) {
        .how-we-work-section {
            padding: 90px 0;
        }

        .how-we-work-section .accordion .btn-link {
            font-size: 18px;
            padding: 22px 22px;
        }

        .how-we-work-section .accordion .btn-link::after {
            flex-basis: 42px;
            height: 42px;
            width: 42px;
        }

        .how-we-work-section .accordion .card-body {
            padding: 0 22px 24px;
        }

        .how-we-work-section .step-title {
            font-size: 22px;
        }
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
                            <span class="step-title">Review Hiring Requirements</span>
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
                            <span class="step-title">Screen and Shortlist Candidates</span>
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
                            <span class="step-title">Support Placement and Follow-Up</span>
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
