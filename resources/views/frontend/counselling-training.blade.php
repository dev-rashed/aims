@extends('layouts.frontend.app')

@section('meta_keywords', 'LIPC')

@section('title', 'LIPC')

@section('content')

    <!-- About Section Start -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
        <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
            <a href="/" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">Counselling Training</a>
        </div>
    </section>
    <!-- About Section Start -->
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Counselling Training</li>
            </ol>
        </nav>
        <!-- Main Content -->
        <div class="row g-5 align-items-start">
            <!-- Left Content -->
            <div class="col-lg-8">
                <h2 class="section-heading">Continuing Professional Development (CPD) with AIMS</h2>
                <p>At AIMS, we are committed to the <strong>ongoing professional growth</strong> of those involved in
                    counselling,
                    mental
                    health, and spiritual care within Muslim communities worldwide.
                </p>
                <p>We work in partnership with organisations and institutions that <strong>offer Islamic counselling and
                        mental
                        health training</strong> across the globe, and we actively support the development and
                    recognition of
                    culturally and spiritually informed practice.
                </p>
                <p>Our <strong>CPD programme</strong> is designed to enhance skills, deepen knowledge, and strengthen
                    ethical and
                    faith-integrated practice in counselling and pastoral care. Whether you're a practitioner, trainer,
                    or
                    student, you'll find our events enriching and relevant.
                </p>

                <!-- What We Offer Accordion -->
                <section class="mx-auto">
                    <h2 class="section-heading">What We Offer:</h2>

                    <div class="accordion" id="cpdAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    Global CPD Events
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    Interactive online workshops and webinars focusing on a range of counselling topics,
                                    including trauma, family dynamics, addiction, youth support, and more — all through an
                                    Islamic lens.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Faith-Informed Counselling Seminars
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    Specialised training on integrating Islamic principles into counselling practice,
                                    including
                                    spiritual assessment, Islamic ethics in therapy, and cultural sensitivity.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Pastoral Care Workshops
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    Sessions focused on developing compassionate care and support within communities,
                                    suitable
                                    for imams, chaplains, community leaders, and volunteers.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Exclusive Member Supervision Circles
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    Access to member-only reflective practice groups, led by experienced supervisors, to
                                    support
                                    your professional and spiritual development.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Free Members Forums
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    Safe, supportive spaces for members to connect, share insights, and explore real-world
                                    challenges in the field of counselling and care.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    Annual Conferences and Special Events
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    In-person and virtual conferences that bring together experts, practitioners, and
                                    learners
                                    from around the world to discuss trends, research, and best practices in Islamic mental
                                    health.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    Special Access for Partner Organisations
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#cpdAccordion">
                                <div class="accordion-body">
                                    Organisations that are members of AIMS receive exclusive opportunities to co-host
                                    events,
                                    promote their training programmes, and engage in collaborative projects.
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            <!-- Right Card -->
            <div class="col-lg-4">
                @include('frontend.comon.pastoral-care-card')
            </div>
        </div>
    </div>
    <!-- About Section End -->


@endsection
@push('css')
    <style>
        .section-heading {
            color: #307c96;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }


        .text-highlight {
            color: #f44336;
        }

        .btn-orange {
            background-color: #ff8000;
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 10px 25px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-orange:hover {
            background-color: #e67300;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        li.breadcrumb-item {
            font-size: 15px;
            font-weight: 800;
        }

        li.breadcrumb-item a {
            color: #307c96;
        }

        li.breadcrumb-item a:hover {
            color: #307c96 !important;
            text-decoration: underline !important;
        }

        li.breadcrumb-item.active {
            color: #868686;
        }


        @media (max-width: 767.98px) {
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
@endpush
