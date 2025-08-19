@extends('layouts.frontend.app')

@section('meta_keywords', 'About Us')

@section('title', 'About Us')

@section('content')

    <!-- About Section Start -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
        <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
            <a href="#" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">About</a>
        </div>
    </section>
    <!-- About Section End -->

    <section class="section about-section">
        <div class="container">
            <div class="row gy-5">
                <div class="col-12 col-xl-10 text-center mx-auto">
                    <h2 class="mb-3">About Us</h2>
                    <h4 class="mb-4">The Association of Islamic Mental Health Specialists (AIMS)</h4>

                    <p>The Association of Islamic Mental Health Specialists (AIMS), established in 2022, is the leading Islamic
                    professional association for mental health practitioners (therapists, counsellors, coaches, chaplains,
                    Imams, Raqis) and specialists from the global Muslim community. We strive to be a beacon of excellence
                    in developing Islamic practices, ensuring that care provided is grounded in authentic Islamic
                    principles, professional ethics, and cultural sensitivity.</p>

                    <p>Our mission is to develop the global Muslim mental health support sector and empower individuals to
                    access appropriate help while promoting the highest standards of care and ethics within the industry. At
                    AIMS, we believe that mental health is not only a professional responsibility but also a spiritual duty,
                    as it contributes to the holistic well-being of individuals and the overall strength of the Ummah.</p>

                </div>
                <div class="col-12 col-xl-10 text-center mx-auto">
                    <img src="{{ Vite::image('about.jpg') }}" class="img-fluid about-img" alt="About us"
                        srcset="{{ Vite::image('about.jpg') }}" />
                </div>
                <div class="col-12 col-xl-10 text-center mx-auto">
                    <p>
                        We are passionate about advocating the role, relevance, and value of therapeutic care to the public,
                        employers, and commissioners. We are also committed to supporting practitioners in their journey by
                        equipping them with the resources, training, and supervision necessary to excel both professionally
                        and spiritually.
                    </p>
                    <p>
                        If you share these values, we would be delighted to welcome you as a member. By joining AIMS, you
                        will be part of a growing global network of Muslim practitioners and specialists working
                        collectively to raise standards, promote Islamic public safety, and make a meaningful difference in
                        the lives of others.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section mission-section pt-0">
        <div class="container">
            <div class="row gy-5">
                <div class="col-12 col-md-4">
                    <div class="card p-4 h-100 bg-gray-200 border-0">
                        <div class="card-body">
                            <h3 class="mb-4">Vision</h3>
                            <p>To empower individuals and practitioners to serve their communities with excellence,
                                fostering mental and emotional well-being within a framework of authentic Islamic values.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card p-4 h-100 bg-gray-200 border-0">
                        <div class="card-body">
                            <h3 class="mb-4">Mission</h3>
                            <div>
                                <p>- To advance the field of Islamic psychology, counselling , coaching and & mental health by
                                    establishing ethical, professional, and faith-based standards.</p>
                                <p>- To support practitioners with training, supervision, and resources that enhance their
                                    Islamic professional competence and spiritual integrity.</p>
                                <p>- To create a global community of Muslim practitioners & specialists dedicated to uplifting
                                    and empowering the Ummah.</p>
                                <p>- To increase awareness and accessibility of Islamic initiatives, providing clarity and guidance
                                    on best Islamic practices.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section objectives-section pt-0">
        <div class="container">

            <h2 class="mb-4">Objectives</h2>

            <div class="row gy-5">

                @foreach ($objectives as $objective)
                    <div class="col-lg-4">
                        <div class="card text-center h-100 objectives-card">
                            <div class="card-body">
                                <h3 class="mb-3">{{ $objective['title'] }}</h3>
                                <p>{{ $objective['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="section about-section bg-gray-200">
        <div class="container">
            <div class="row gy-5">
                <div class="col-12 col-xl-10">
                    <h3 class="mb-3">What We Stand For</h3>
                    <h4 class="mb-4">At AIMS, we’re committed to:</h4>

                    <p>Promoting Islamic ethical and professional excellence in mental health care.</p>
                    <p>Advocating for the relevance and value of authentic Islamic mental health practices.</p>
                    <p>Raising public awareness about the importance of Islamic mental and emotional well-being.</p>
                    <p>
                        Ensuring that practitioners are equipped to provide care that is both Islamically authentic and
                        practically relevant
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section about-section">
        <div class="container">
            <div class="row gy-5">

                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-12 col-xl-10">
                            <h3 class="mb-3">Why Join Us?</h3>
                            <p class="mb-4">
                                By becoming a member of AIMS, you align with a global community of professionals who share
                                your passion for mental health, your dedication to Islamic values, and your commitment to
                                making a difference in the lives of others.
                            </p>
                        </div>
                        <div class="col-12 col-xl-10">
                            <h4 class="mb-3">As a member, you’ll benefit from:</h4>
                            <ul class="list-unstyled">
                                <li class="mb-3">– Monthly Islamic supervision (Irshad) to refine your practice. </li>
                                <li class="mb-3">– Discounts on Islamic mental health courses and training programs. </li>
                                <li class="mb-3">– Access to free workshops, webinars, and other professional development
                                    opportunities. </li>
                                <li class="mb-3">– Networking with a global community of Muslim practitioners. </li>
                                <li class="mb-3">– Resources and tools tailored for Islamic mental health professionals.
                                </li>
                                <li class="mb-3">– Recognition as part of a trusted association that upholds Islamic
                                    ethical standards. </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card bg-gray-200 border-0">
                        <div class="card-body text-center py-5 p-lg-5">
                            <div class="p-lg-4">
                                <h2 class="mb-4">Join Us in Building a Better Future</h2>
                                <p class="fs-18">
                                    If you share our vision of empowering individuals, strengthening communities, and
                                    raising standards in Islamic mental health, we would be honoured to welcome you as a
                                    member. Together, we can advance the role of Islamic mental health in fostering a
                                    healthier, stronger Ummah.
                                </p>
                                <p class="mt-4">CIC Registration Number: 16031775</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div class="card about-card">
                                <div class="card-body text-center py-5">
                                    <div>
                                        <div class="icon">
                                            <img src="{{ asset('build/assets/frontend/images/about-user.png') }}"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <h4 class="mb-0">OUR TEAM</h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('team') }}" class="btn about-btn">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card about-card">
                                <div class="card-body text-center py-5">
                                    <div>
                                        <div class="icon icon-advisor">
                                            <img src="{{ asset('build/assets/frontend/images/mentoring.png') }}"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <h4 class="mb-0">Advisors</h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('advisors') }}" class="btn about-btn">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card about-card">
                                <div class="card-body text-center py-5">
                                    <div>
                                        <div class="icon icon-global">
                                            <img src="{{ asset('build/assets/frontend/images/global-search.png') }}"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <h4 class="mb-0">Global Ambassadors</h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('ambassadors') }}" class="btn about-btn">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
