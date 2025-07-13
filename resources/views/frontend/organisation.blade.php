@extends('layouts.frontend.app')

@section('meta_keywords', 'organisation')

@section('title', 'Organisation')

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
            <a href="#" class="text-white align-self-center">Organisation</a>
        </div>
    </section>
    <!-- About Section Start -->
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Organisation</li>
            </ol>
        </nav>
        <!-- Main Content -->
        <div class="row align-items-start">
            <div class="col-lg-8">
                <!-- Left Content -->
                <h2 class="section-heading">Organisational Membership with AIMS</h2>
                <p class="text-muted">We warmly welcome applications from Muslim counselling and mental health
                    organisations around the world. AIMS offers three types of organisational membership:</p>

                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card h-100 p-3">
                            <h5 class="card-title text-teal fw-semibold mb-3">Counselling Organisational Member</h5>
                            <p class="card-text text-muted small mb-0">
                                For organisations providing counselling services to the public and/or offering hybrid
                                services that include trained listeners and professional counsellors.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 p-3">
                            <h5 class="card-title text-teal fw-semibold mb-3">Training Organisational Member</h5>
                            <p class="card-text text-muted small mb-0">
                                For organisations that offer counselling and mental health training programmes.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 p-3">
                            <h5 class="card-title text-teal fw-semibold mb-3">Counselling and Training Organisational Member
                            </h5>
                            <p class="card-text text-muted small mb-0">
                                For organisations providing both counselling services and professional training in
                                counselling or mental health.
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="section-heading">Membership Benefits</h2>

                <ul class="">
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Being part of a <strong>global Muslim professional body</strong> committed to high standards
                            in counselling, mental health, and spiritual care.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Recognition as an <strong>organisational member of AIMS</strong>, with permission to display
                            the AIMS membership badge on your website and promotional materials.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Access to <strong>timely support and professional guidance</strong>.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Affiliation with an organisation that supports <strong>accountability and ethical
                                practice</strong>, including an external complaints process aligned with AIMS' Code of
                            Ethics and Practice.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>A <strong>free listing</strong> in our global directory for counselling and training
                            organisations.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Free promotion of <strong>introductory, qualifying, and specialist training courses</strong>
                            via the AIMS platform.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Free promotion of up to <strong>five CPD events per year</strong> on the AIMS
                            website.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Advertising opportunities in our digital publications and newsletters on a <strong>first
                                come,
                                first served basis</strong>.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Free promotion of <strong>job vacancies</strong> and <strong>volunteer roles</strong>, as
                            well
                            as <strong>placement opportunities</strong> for students and trainees.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Access to <strong>member-only resources</strong>, including articles, policy templates, and
                            professional guidance.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Complimentary access for your staff and volunteers to <strong>member forums and online
                                discussions</strong>.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Discounts on AIMS-organised events and conferences (for one designated attendee per
                            event).</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small><strong>Reduced student membership rates</strong> for trainees studying with an
                            AIMS-affiliated training provider.</small>
                    </li>
                </ul>


                <!-- Membership Commitments -->
                <div class="my-5">
                    <div>
                        <h2 class="section-heading">Membership Commitments</h2>
                        <ul>
                            <li class="text-muted">
                                Advertising opportunities in our digital publications and
                                newsletters on a <strong>first come, first served basis</strong>.</li>
                            <li class="text-muted">Free promotion of <strong>job vacancies</strong> and
                                <strong>volunteer roles</strong>, as well as <strong>placement opportunities</strong> for
                                students and trainees.
                            </li>
                            <li class="text-muted ">Access to <strong>member-only resources</strong>, including
                                articles, policy templates, and professional guidance.</li>
                            <li class="text-muted">Complimentary access for your staff and volunteers to <strong>member
                                    forums and online discussions</strong>.</li>
                            <li class="text-muted">Discounts on AIMS-organised events and conferences (for one
                                designated attendee per event).</li>
                            <li class="text-muted"><strong>Reduced student membership rates</strong> for trainees
                                studying with an AIMS-affiliated training provider.</li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Right Card -->
            <div class="col-lg-4">
                @include('frontend.comon.membership-card')
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

        .check-mark {
            color: #307c96;
            font-weight: 700;
            font-size: 1rem;
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
