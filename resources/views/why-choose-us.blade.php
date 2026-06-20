@extends('layouts.app')

@section('title', 'Why Choose Us | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .why-choose-us-section .accordion .card {
        border: 0;
        border-radius: 18px;
        box-shadow: 0 18px 45px rgba(70, 43, 52, 0.08);
        margin-bottom: 18px;
        overflow: hidden;
    }

    .why-choose-us-section .accordion .card-header {
        background: #fff;
        border-bottom: 0;
        padding: 0;
    }

    .why-choose-us-section .accordion .btn-link {
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

    .why-choose-us-section .accordion .btn-link:hover,
    .why-choose-us-section .accordion .btn-link:focus {
        color: #ff5956;
        text-decoration: none;
    }

    .why-choose-us-section .accordion .btn-link::after {
        color: #ff5956;
        content: '+';
        font-size: 28px;
        line-height: 1;
        margin-left: 18px;
    }

    .why-choose-us-section .accordion .btn-link[aria-expanded="true"]::after {
        content: '-';
    }

    .why-choose-us-section .accordion .card-body {
        color: #766068;
        font-size: 17px;
        line-height: 30px;
        padding: 0 28px 28px;
    }
</style>
@endsection

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Why Choose Us</h1>
                <p>See why businesses trust Swift Manpower Temps Agency Ltd for responsive staffing support and dependable recruitment service.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Why Choose Us</li>
            </ul>
        </div>
    </div>
</section>

<section class="why-choose-us-section faq-section bg-color-2">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Why Businesses Choose Us</span>
            <h2>Employer Benefits at a Glance</h2>
            <p>Each part of our service is designed to help businesses hire with confidence and keep operations moving smoothly.</p>
        </div>

        <div class="accordion" id="whyChooseUsAccordion">
            <div class="card">
                <div class="card-header" id="headingScreening">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseScreening" aria-expanded="true" aria-controls="collapseScreening">
                        Dependable Screening
                    </button>
                </div>
                <div id="collapseScreening" class="collapse show" aria-labelledby="headingScreening" data-parent="#whyChooseUsAccordion">
                    <div class="card-body">
                        We review candidates carefully so employers can hire with more confidence. Our screening process is focused on understanding role requirements, checking suitability, and improving the likelihood of a strong match from the beginning.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingHiring">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseHiring" aria-expanded="false" aria-controls="collapseHiring">
                        Faster Hiring Support
                    </button>
                </div>
                <div id="collapseHiring" class="collapse" aria-labelledby="headingHiring" data-parent="#whyChooseUsAccordion">
                    <div class="card-body">
                        Our process helps reduce delays and keeps recruitment moving efficiently. We stay responsive, communicate clearly, and help employers move from job request to placement with less friction.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFlexible">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFlexible" aria-expanded="false" aria-controls="collapseFlexible">
                        Flexible Staffing Options
                    </button>
                </div>
                <div id="collapseFlexible" class="collapse" aria-labelledby="headingFlexible" data-parent="#whyChooseUsAccordion">
                    <div class="card-body">
                        We support temporary and long-term staffing needs without unnecessary complexity. Whether your business needs short-term coverage, project-based help, or support that may lead to permanent placement, we work to fit the situation.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingReach">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseReach" aria-expanded="false" aria-controls="collapseReach">
                        Strong Candidate Reach
                    </button>
                </div>
                <div id="collapseReach" class="collapse" aria-labelledby="headingReach" data-parent="#whyChooseUsAccordion">
                    <div class="card-body">
                        We connect with job seekers across roles and help place people where they fit best. This wider reach helps employers access workers with different strengths, experience levels, and availability.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
