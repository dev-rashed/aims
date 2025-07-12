@extends('layouts.frontend.app')

@section('content')

    <!-- Hero Section Start -->
    <section class="section hero-section">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-7 col-xl-5">
                    <div class="text-white">
                        <h1 class="titles">Find the right <span class="text-yellow">help</span>, here.</h1>
                    </div>

                    <div class="mt-5">
                        <form action="{{ route('directory.index') }}" method="get">
                            <input type="hidden" name="distance" value="5">
                            <div class="row mt-4 gy-3">
                                <div class="col-12">
                                    <input type="text" name="location" id="location" placeholder="Type your location"
                                        class="form-control" style="height: 48px">
                                </div>
                                <div class="col-12">
                                    <div class="row gy-3">
                                        <div class="col-12 col-md-8">
                                            <select name="professions[]" class="selectize">
                                                <option value="" selected>I’m looking for – –</option>
                                                @foreach ($professions as $profession)
                                                    <option value="{{ $profession->slug }}">{{ $profession->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <button type="submit" class="btn read-more-btn w-100"
                                                style="height: 50px">Search</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <div class="container">
        <!-- Add inside your container -->
        <div class="section">
            <div class="row text-center justify-content-center g-4 circle-icon">
                <!-- Counselling -->
                <div class="col-12 col-md-3">
                    <a href="#" class="text-black">
                        <div class="info-box p-4">
                            <img src="{{ asset('images/info-icon-one.svg') }}" class="img-fluid mb-3"
                                alt="Counselling Icon">
                            <h4 class="text-success">COUNSELLING</h4>
                        </div>
                    </a>
                </div>

                <!-- Coaching -->
                <div class="col-12 col-md-3">
                    <a href="#" class="text-black">
                        <div class="info-box p-4">
                            <img src="{{ asset('images/info-icon-two.svg') }}" class="img-fluid mb-3" alt="Coaching Icon">
                            <h4 class="text-danger">COACHING</h4>
                        </div>
                    </a>
                </div>

                <!-- Spiritual Direction -->
                <div class="col-12 col-md-3">
                    <a href="#" class="text-black">
                        <div class="info-box p-4">
                            <img src="{{ asset('images/info-icon-three.svg') }}" class="img-fluid mb-3"
                                alt="Spiritual Direction Icon">
                            <h4 class="text-warning">SPIRITUAL DIRECTION</h4>
                        </div>
                    </a>
                </div>

                <!-- Pastoral Care -->
                <div class="col-12 col-md-3">
                    <a href="{{ route('pastoral-care') }}" class="text-black">
                        <div class="info-box p-4">
                            <img src="{{ asset('images/info-icon-four.svg') }}" class="img-fluid mb-3"
                                alt="Pastoral Care Icon">
                            <h4 class="text-info">PASTORAL CARE</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="section">
            <!-- Bottom Section - Image Cards -->
            <div class="d-flex flex-wrap justify-content-center row g-4">
                <!-- Specialist Directory Card -->
                <div class="col-12 col-sm-6 col-md-4 p-2">
                    <a href="{{ route('directory.index') }}">
                        <div class="card-overlay card-overlay-specialist w-100 h-64">
                            <img src="{{ asset('images/image-1.jpeg') }}"
                                onerror="this.onerror=null;this.src='https://placehold.co/600x400/FFB74D/ffffff?text=Specialist+Directory';"
                                alt="Specialist Directory">
                            <div class="card-text">Specialist Directory</div>
                        </div>
                    </a>
                </div>

                <!-- Ethical & Islamic Card -->
                <div class="col-12 col-sm-6 col-md-4 p-2">
                    <a href="{{ route('ethical.index') }}">
                        <div class="card-overlay card-overlay-ethical w-100 h-64">
                            <img src="{{ asset('images/image-3.jpeg') }}"
                                onerror="this.onerror=null;this.src='https://placehold.co/600x400/4CAF50/ffffff?text=Ethical+%26+Islamic';"
                                alt="Ethical & Islamic">
                            <div class="card-text">Ethical & Islamic</div>
                        </div>
                    </a>
                </div>

                <!-- Empowering Professionals Card -->
                <div class="col-12 col-sm-6 col-md-4 p-2">
                    <a href="{{ route('membership.index') }}">
                        <div class="card-overlay card-overlay-empowering w-100 h-64">
                            <img src="{{ asset('images/image-2.jpeg') }}"
                                onerror="this.onerror=null;this.src='https://placehold.co/600x400/2196F3/ffffff?text=Empowering+Professionals';"
                                alt="Empowering Professionals">
                            <div class="card-text">Empowering Professionals</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <section class="section" style="padding-top: 36px !important;">

            <div class="workshop-wrapper odd">
                <div class="content-section">
                    <p class="tagline">Pastoral Care</p>
                    <h1>Pastoral Care & Community Support Training</h1>
                    <p>At AIMS, we recognise <strong>pastoral care</strong>—or <em>rahmah-based community support</em>—as a
                        core
                        Islamic responsibility rooted in compassion (<em>rahmah</em>), empathy, and service to others. It
                        involves nurturing meaningful relationships, offering emotional and spiritual support, and fostering
                        a
                        sense of collective responsibility and care within the <strong>Ummah</strong> and wider society.</p>

                    <p>Inspired by Islamic teachings on mercy, mutual support, and accountability, we believe that
                        <strong>caring for others is a communal duty (fard kifayah)</strong>—something we are all called to
                        in
                        different ways, wherever Allah places us.
                    </p>

                    <a href="{{ route('pastoral-care') }}" class="button">Find out more...</a>
                </div>
                <div class="image-section">
                    <img src="{{ asset('images/workshop.jpeg') }}" alt="Workshop">
                </div>
            </div>

            <div class="workshop-wrapper even">
                <div class="text-content">
                    <span class="tagline">Counselling Training</span>
                    <h1>Continuing Professional Development (CPD) with AIMS</h1>
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

                    <a href="{{ route('counselling-training') }}" class="button">Find out more</a>
                </div>

                <div class="image-content">
                    <img src="{{ asset('images/counselling.jpeg') }}" alt="Counselling">
                </div>
            </div>

            <div class="workshop-wrapper odd">
                <div class="content-section" style="background-color: #f5a623">
                    <p class="tagline">Awards</p>
                    <h1>Mental Health Awards</h1>
                    <p>The Association of Islamic Mental Health Specialists (AIMS) is proud to announce the National Muslim
                        Mental Health Awards. This prestigious event is a significant project of AIMS, designed to recognise
                        and celebrate the outstanding contributions of individuals and organisations dedicated to advancing
                        mental health within the Muslim community.
                        Synopsis
                        The National Muslim Mental Health Awards, a key initiative by AIMS, will highlight the exceptional
                        efforts of mental health professionals, advocates, researchers, and community leaders who have made
                        significant strides in promoting mental well-being among Muslims. Through this event, we aim to
                        honour those who have demonstrated excellence, innovation, and compassion in their work, thereby
                        inspiring others to contribute to this vital field.....</p>
                    <a href="https://muslimmentalhealthawards.com/" class="button">Find out more...</a>
                </div>
                <div class="image-section">
                    <img src="{{ asset('images/awards.jpeg') }}" alt="Workshop">
                </div>
            </div>
        </section>

    </div>



    <!-- Video Section Start -->
    <x-frontend.section class="practicioner-section bg-primary-500">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <p class="sub-heading mb-0 text-yellow">REGISTER</p>
                    <h1 class="heading text-white heading-after after-bg-yellow">as an AIMS Practicioner</h1>
                    <p class="description mx-auto text-white mt-4">
                        Empowering you to access appropriate and faith-sensitive help whilst promoting the highest standards
                        of care across the industry
                    </p>
                    <div class="mt-5">
                        <a href="{{ route('membership.index') }}" class="btn read-more-btn">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ Vite::image('register-shape.png') }}" class="practicioner-shape" alt="" srcset="">
    </x-frontend.section>
    <!-- Video Section End -->


    <section class="section ethical-framework" style="padding-bottom: 83px !important;">
        <div class="container">
            <figure class="image-layer">
                <img src="https://new.aimsonline.org/build/assets/ethical.d7408e95.png" alt="" class="img-fluid">
            </figure>
            <div class="row clearfix">
                <div class="col-lg-7 col-xl-6 inner-column">
                    <div class="inner-box">
                        <div class="sec-title light">
                            <span>OUR ETHICAL FRAMEWORK</span>
                            <h2>Will always protect our users</h2>
                        </div>
                        <div class="ethical-content">
                            <div class="text">
                                <p>
                                    The Code is intended as a framework to enable The Association of Islamic Mental Health
                                    Specialists members and other Muslim counsellors, therapists, and imams to engage with
                                    their
                                    clients and service users and community members in the most effective manner, thereby
                                    improving the state of Muslim counselling and service providers around the world.
                                </p>
                            </div>
                            <div class="mt-4">
                                <a href="https://new.aimsonline.org/ethical-standards" class="btn read-more-btn">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (sectionSetting('insight_section'))
        <!-- Article Section Start -->
        <x-frontend.section class="article-section bg-gray-100" style="padding-bottom: 83px !important">
            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="section-heading" style="margin-bottom: 0px !important;">
                        <p class="sub-heading text-yellow mb-0">Resources</p>
                        <h1 class="heading heading-after">Learning</h1>
                    </div>
                </div>
            </div>

            <div class="row gy-5">
                @foreach ($articles as $article)
                    <x-frontend.article-card :article="$article" class="col-sm-6 col-lg-4 col-xl-3" />
                @endforeach

                <div class="col-12 text-center">
                    <a href="{{ route('article.index') }}" class="btn read-more-btn">Read More</a>
                </div>
            </div>
        </x-frontend.section>
        <!-- Article Section End -->
    @endif

    <!-- Event Section Start -->
    <x-frontend.section class="event-section">

        <div class="row mb-4 align-items-center">
            <div class="col-6 mb-4">
                <div class="section-heading">
                    <h1 class="heading heading-after">Our Events</h1>
                </div>
            </div>
            <div class="col-6 mb-4">
                <x-frontend.carousel-button />
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-5">
                <div class="owl-carousel owl-theme">
                    @foreach ($events as $event)
                        <x-frontend.event-card :event="$event" />
                    @endforeach
                </div>
            </div>
        </div>
    </x-frontend.section>
    <!-- Event Section End -->

@endsection
@push('css')
    <style>
        .section {
            padding: 114px 0 0 0;
        }

        .nice-select .option:hover,
        .nice-select .option.focus,
        .nice-select .option.selected.focus {
            /* background-color: #0f7d97; */
        }

        .nice-select-dropdown ul li {
            margin-bottom: 0px !important;
            color: #000000 !important;
            /* border-bottom: 1px solid #000000; */
        }


        .nice-select.open .nice-select-dropdown {
            box-shadow: 0 20px 60px #00000010;
        }

        /* === Section Heading === */
        .section-heading {
            color: #307c96;
            font-weight: 600;
            margin-bottom: 120px;
            font-size: 2rem;
        }

        /* === Feature Cards Grid === */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: #fff;
            box-shadow: 0 20px 60px #00000010;
            cursor: pointer;
            border: 1px solid #fff;
            padding: 80px 10px 25px;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 160px;
            height: 160px;
            position: absolute;
            top: -70px;
            left: 50%;
            transform: translateX(-50%);
        }

        .feature-icon img {
            width: 100%;
            height: 100%;
            transition: transform 1s ease;
            opacity: 0.9;
        }

        .feature-icon img:hover {
            transform: scale(1.05);
            opacity: 1;
        }

        .feature-title {
            font-size: 24px;
            font-weight: 600;
            color: #307c96;
            margin-top: 30px;
        }

        /* === Layout Wrappers === */
        .workshop-wrapper {
            display: flex;
            flex-wrap: wrap;
            border-radius: 2px;
            overflow: hidden;
            gap: 20px;
            margin: 50px auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }



        .workshop-wrapper.odd {
            flex-direction: row-reverse;
        }



        /* === Image Sections === */
        .image-section,
        .image-content {
            flex: 1 1 200px;
            max-width: 100%;
        }

        .subscribe-section {
            padding-bottom: 114px !important;
        }

        .image-section img,
        .image-content img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* === Content/Text Sections === */
        .content-section,
        .text-content {
            flex: 1 1 600px;
            padding: 40px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .content-section {
            background-color: #2baf7f;
        }

        .text-content {
            background-color: #2e5f76;
        }

        /* === Typography === */
        .tagline {
            font-size: 0.9rem;
            color: #cde6f2;
            text-transform: uppercase;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .content-section .tagline {
            color: #d1f3ea;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        p {
            line-height: 1.6;
            margin-top: 10px;
            color: #fff;
        }

        ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        ul li {
            margin-bottom: 10px;
            color: #fff;
        }

        /* === Buttons === */
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            border: 2px solid #fff;
            background-color: transparent;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
            width: 200px;
            text-align: center;
        }

        .button:hover {
            background-color: #fff;
            color: #2e5f76;
        }

        .content-section .button:hover {
            color: #4fa186;
        }

        .highlight-link {
            color: #f9a03f;
            text-decoration: none;
            font-weight: bold;
        }

        /* === Card Overlay Styles === */
        .card-overlay {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        .card-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.6) 100%);
            z-index: 1;
            border-radius: 0.5rem;
        }

        .card-overlay-specialist {
            border: 2px solid #FBAA2D;
        }

        .card-overlay-specialist::before {
            background: linear-gradient(to bottom, rgba(255, 165, 0, 0.0) 50%, rgba(255, 165, 0, 0.6) 100%);
        }

        .card-overlay-ethical {
            border: 2px solid #0D7554;
        }

        .card-overlay-ethical::before {
            background: linear-gradient(to bottom, rgba(0, 128, 0, 0.0) 50%, rgba(0, 128, 0, 0.6) 100%);
        }

        .card-overlay-empowering {
            border: 2px solid #1897BB;
        }

        .card-overlay-empowering::before {
            background: linear-gradient(to bottom, rgba(0, 100, 255, 0.0) 50%, rgba(0, 100, 255, 0.6) 100%);
        }

        .card-overlay img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .card-text {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            color: white;
            font-weight: 600;
            text-align: center;
            z-index: 2;
        }

        /* === Utility === */
        .h-64 {
            height: 16rem !important;
        }

        .circle-icon div img {
            width: 160px;
            height: 160px;
        }

        .circle-icon div h4 {
            font-weight: 600;
        }

        .ethical-framework .ethical-content .text p {
            color: #000000;
        }

        .article-description,
        .article-description * {
            color: #000 !important;
        }

        .info-box {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .info-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 7px 10px rgba(108, 108, 108, 0.1);
            cursor: pointer;
        }


        /* === Responsive === */
        @media (max-width: 1200px) {
            .section-heading {
                font-size: 1.9rem;
            }

            .feature-title {
                font-size: 22px;
            }

            .feature-card {
                padding: 80px 20px 25px;
                margin-bottom: 60px;
            }

            .feature-card .feature-icon {
                width: 140px;
                height: 140px;
                top: -60px;
            }
        }

        @media (max-width: 992px) {
            .circle-icon div img {
                width: 160px;
                height: auto;
            }

            .workshop-wrapper.odd {
                flex-direction: column-reverse;
            }

            .workshop-wrapper.even {
                flex-direction: column-reverse;
            }

            .section-heading {
                font-size: 1.8rem;
            }

            h1 {
                font-size: 1.7rem;
            }

            .content-section,
            .text-content {
                padding: 30px;
            }

            .feature-title {
                font-size: 22px;
            }
        }

        @media (max-width: 768px) {
            .section-heading {
                font-size: 1.7rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .feature-title {
                font-size: 20px;
            }

            .workshop-wrapper,
            .training-container {
                flex-direction: column;
            }

            .content-section,
            .text-content {
                padding: 25px;
            }

            .feature-card {
                padding: 80px 20px 25px;
                margin-bottom: 50px;
            }

            .feature-card .feature-icon {
                width: 120px;
                height: 120px;
                top: -40px;
            }
        }

        @media (max-width: 480px) {
            .section {
                padding: 20px 0;
            }

            h1 {
                font-size: 1.3rem;
            }

            h3 {
                font-size: 1rem;
            }

            .feature-title {
                font-size: 18px;
            }

            .content-section,
            .text-content {
                padding: 20px;
            }

            .button {
                width: 100%;
            }
        }
    </style>
@endpush
