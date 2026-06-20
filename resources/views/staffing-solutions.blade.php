@extends('layouts.app')

@section('title', 'Staffing Solutions | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .staffing-solutions-section .accordion .card {
        border: 0;
        border-radius: 18px;
        box-shadow: 0 18px 45px rgba(70, 43, 52, 0.08);
        margin-bottom: 18px;
        overflow: hidden;
    }

    .staffing-solutions-section .accordion .card-header {
        background: #fff;
        border-bottom: 0;
        padding: 0;
    }

    .staffing-solutions-section .accordion .btn-link {
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

    .staffing-solutions-section .accordion .btn-link:hover,
    .staffing-solutions-section .accordion .btn-link:focus {
        color: #ff5956;
        text-decoration: none;
    }

    .staffing-solutions-section .accordion .btn-link::after {
        color: #ff5956;
        content: '+';
        font-size: 28px;
        line-height: 1;
        margin-left: 18px;
    }

    .staffing-solutions-section .accordion .btn-link[aria-expanded="true"]::after {
        content: '-';
    }

    .staffing-solutions-section .accordion .card-body {
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
                <h1>Staffing Solutions</h1>
                <p>Explore the flexible recruitment and placement services we provide for employers and candidates.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Staffing Solutions</li>
            </ul>
        </div>
    </div>
</section>

<section class="staffing-solutions-section faq-section bg-color-2">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Solutions We Provide</span>
            <h2>Staffing Solutions That Work</h2>
            <p>We provide flexible recruitment support for businesses and practical placement services for candidates seeking the right opportunity.</p>
        </div>

        <div class="accordion" id="staffingSolutionsAccordion">
            <div class="card">
                <div class="card-header" id="headingTemporary">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTemporary" aria-expanded="true" aria-controls="collapseTemporary">
                        Temporary
                    </button>
                </div>
                <div id="collapseTemporary" class="collapse show" aria-labelledby="headingTemporary" data-parent="#staffingSolutionsAccordion">
                    <div class="card-body">
                        Short-term staffing support for employers who need reliable workers quickly. This solution helps businesses respond to absences, peak periods, and changing workload demands without slowing operations.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingDirectHire">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDirectHire" aria-expanded="false" aria-controls="collapseDirectHire">
                        Direct Hire
                    </button>
                </div>
                <div id="collapseDirectHire" class="collapse" aria-labelledby="headingDirectHire" data-parent="#staffingSolutionsAccordion">
                    <div class="card-body">
                        Permanent recruitment support focused on matching qualified candidates to long-term roles. We help employers connect with people who are suited to the position, culture, and expectations of the business.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingContract">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseContract" aria-expanded="false" aria-controls="collapseContract">
                        Contract
                    </button>
                </div>
                <div id="collapseContract" class="collapse" aria-labelledby="headingContract" data-parent="#staffingSolutionsAccordion">
                    <div class="card-body">
                        Contract staffing options that help businesses stay flexible while building strong teams. This approach supports project-based needs and fixed-term roles while keeping hiring practical and adaptable.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
