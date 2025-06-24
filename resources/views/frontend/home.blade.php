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


    <!-- Top Section - Circles with Icons -->
    <div class="container-fluid d-flex flex-wrap justify-content-evenly g-3  mt-5 mb-5">
        <!-- Counselling -->
        <div class="d-flex flex-column align-items-center mx-3">
            <div class="icon-circle icon-counselling">
                <img src="{{ asset('images') }}/info-icon-one.png" alt="Counselling">
            </div>
            <p class="fw-medium fs-5" style="color: #0d7554">COUNSELLING</p>
        </div>

        <!-- Coaching -->
        <div class="d-flex flex-column align-items-center mx-3 my-3">
            <div class="icon-circle icon-coaching">
                <!-- SVG Icon for Coaching (Person) -->
                <img src="{{ asset('images') }}/info-icon-two.png" alt="Counselling">
            </div>
            <p class="fw-medium fs-5" style="color: #b82864">COACHING</p>
        </div>

        <!-- Spiritual Direction -->
        <div class="d-flex flex-column align-items-center mx-3 my-3">
            <div class="icon-circle icon-spiritual">
                <!-- SVG Icon for Spiritual Direction (Praying Person) -->
                <img src="{{ asset('images') }}/info-icon-three.png" alt="Counselling">

            </div>
            <p class="fw-medium fs-5" style="color: #fbaa2d">SPIRITUAL DIRECTION</p>
        </div>
        <!-- Pastoral Care -->
        <div class="d-flex flex-column align-items-center mx-3 my-3">
            <div class="icon-circle icon-pastoral">
                <!-- SVG Icon for Pastoral Care (Hands) -->
                <img src="{{ asset('images') }}/info-icon-four.png" alt="Counselling">
            </div>
            <p class="fw-medium fs-5" style="color: #1897bb">PASTORLA CARE</p>
        </div>
    </div>

    <div class="container">
        <!-- Bottom Section - Image Cards -->
        <div class="container-fluid d-flex flex-wrap justify-content-center row g-4">
            <!-- Specialist Directory Card -->
            <div class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card-overlay card-overlay-specialist w-100 h-64">
                    <img src="{{ asset('images/image-1.jpeg') }}"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/FFB74D/ffffff?text=Specialist+Directory';"
                        alt="Specialist Directory">
                    <div class="card-text">Specialist Directory</div>
                </div>
            </div>

            <!-- Ethical & Islamic Card -->
            <div class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card-overlay card-overlay-ethical w-100 h-64">
                    <img src="{{ asset('images/image-3.jpeg') }}"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/4CAF50/ffffff?text=Ethical+%26+Islamic';"
                        alt="Ethical & Islamic">
                    <div class="card-text">Ethical & Islamic</div>
                </div>
            </div>

            <!-- Empowering Professionals Card -->
            <div class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card-overlay card-overlay-empowering w-100 h-64">
                    <img src="{{ asset('images/image-2.jpeg') }}"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/2196F3/ffffff?text=Empowering+Professionals';"
                        alt="Empowering Professionals">
                    <div class="card-text">Empowering Professionals</div>
                </div>
            </div>
        </div>
    </div>


    @if (sectionSetting('service_section'))
        <!-- Service Section Start -->
        <x-frontend.section class="service-section">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="section-heading">
                        <p class="sub-heading text-yellow mb-0">Hi There</p>
                        <h1 class="heading heading-after">Welcome to AIMS</h1>
                        <p class="description">
                            Empowering you to access appropriate and faith-sensitive help whilst promoting the highest
                            standards of care across the industry
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                @foreach ($services as $key => $service)
                    <x-frontend.service-card :service="$service" :class="'service-card-' . $key + 1" />
                @endforeach
            </div>
        </x-frontend.section>
        <!-- Service Section End -->
    @endif





    <section class="section">
        <div class="container">
            <h3 class="heading heading-after section-heading">Become a member</h3>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="https://new.aimsonline.org/images/counseling.svg" alt="Counselling">
                    </div>
                    <h4 class="feature-title">Counselling</h4>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="https://new.aimsonline.org/images/mentoring.svg" alt="Coaching">
                    </div>
                    <h4 class="feature-title">Coaching</h4>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="https://new.aimsonline.org/images/spiritual.svg" alt="Spiritual Direction">
                    </div>
                    <h4 class="feature-title">Spiritual Direction</h4>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="https://new.aimsonline.org/images/healthcare.svg" alt="Pastoral Care">
                    </div>
                    <h4 class="feature-title">Pastoral Care</h4>
                </div>
            </div>
        </div>
    </section>

    <style>
        .section-heading {
            color: #307c96;
            font-weight: 600;
            margin-bottom: 120px;
            font-size: 2rem;
        }

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

        @media (max-width: 1200px) {
            .section-heading {
                font-size: 1.9rem;
            }

            .feature-title {
                font-size: 22px;
            }

            .feature-card {
                margin-bottom: 60px;
                padding: 80px 20px 25px;
            }

            .feature-card .feature-icon {
                width: 140px;
                height: 140px;
                top: -60px;
            }
        }

        @media (max-width: 992px) {
            .section-heading {
                font-size: 1.8rem;
            }

            .feature-title {
                font-size: 22px;
            }

            .feature-card {
                margin-bottom: 60px;
                padding: 80px 20px 25px;
            }

            .feature-card .feature-icon {
                width: 140px;
                height: 140px;
                top: -60px;
            }
        }

        @media (max-width: 768px) {
            .section-heading {
                font-size: 1.7rem;
            }

            .feature-title {
                font-size: 20px;
            }

            .feature-card {
                margin-bottom: 50px;
                padding: 80px 20px 25px;
            }

            .feature-card .feature-icon {
                width: 120px;
                height: 120px;
                top: -40px;
            }
        }

        @media (max-width: 480px) {
            .feature-title {
                font-size: 18px;
            }

            .feature-card {
                padding: 80px 15px 25px;
            }
        }
    </style>



    <div class="container">
        <div class="workshop-wrapper">
            <div class="image-section">
                <img src="https://www.acc-uk.org/wp-content/uploads/2024/01/AdobeStock_509115372-768x512.jpg.webp"
                    alt="Workshop">
            </div>
            <div class="content-section">
                <p class="tagline">PROFESSIONAL TRAINING</p>
                <h1>Pastoral care workshops and courses</h1>
                <p>We are committed to promoting quality pastoral care through our training resources which enable:</p>
                <ul>
                    <li><strong>ALL</strong> of church to develop quality relationships</li>
                    <li><strong>SOME</strong> of church to develop their pastoral gifts</li>
                    <li><strong>a FEW</strong> of church to equip the all and the some</li>
                </ul>
                <p>
                    Each resource is interactive, raising questions, encouraging the sharing of experience, embracing
                    discussion, developing skills where appropriate and using scripture and prayer.
                </p>
                <a href="#" class="button">Find out more...</a>
            </div>
        </div>
    </div>

    <style>
        .workshop-wrapper {
            display: flex;
            flex-wrap: wrap;
            border-radius: 2px;
            overflow: hidden;
            gap: 20px;
        }

        .image-section {
            flex: 1 1 200px;
            max-width: 100%;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .content-section {
            flex: 1 1 600px;
            background-color: #2baf7f;
            padding: 40px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .tagline {
            font-size: 0.9rem;
            color: #d1f3ea;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: 500;
        }

        h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        ul li {
            margin-bottom: 10px;
            color: #fff;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            background-color: transparent;
            border: 2px solid #fff;
            color: #fff;
            padding: 10px 20px;
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
            color: #4fa186;
        }

        /* 🔁 Responsive Breakpoints */
        @media (max-width: 992px) {
            .content-section {
                padding: 30px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .workshop-wrapper {
                flex-direction: column;
            }

            .content-section {
                padding: 25px;
            }

            h1 {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .content-section {
                padding: 20px;
            }

            h1 {
                font-size: 1.2rem;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <section class="container">
        <div class="training-container">
            <div class="text-content">
                <span class="tagline">PROFESSIONAL TRAINING</span>
                <h1>Counselling training</h1>

                <h3>Qualifying training</h3>
                <p>
                    If you are hoping to qualify as a counsellor, or progress in the profession,
                    we have a directory of courses run by organisations affiliated with ACC at all levels.
                    Visit our <a href="#" class="highlight-link">Find a training course</a>.
                </p>

                <h3>Continuing Professional Development (CPD) with ACC</h3>
                <p>
                    Throughout the year we offer relevant, enriching and affordable CPD training to support your
                    continuing professional development as a counsellor/psychotherapist. We invite trusted and
                    experienced trainers to deliver high quality teaching in-person and online. If you are an ACC
                    member, you will receive regular emails about any upcoming ACC training as well as training
                    delivered by members or associates, and free members-only forums.
                </p>

                <a href="#" class="button">Find out more</a>
            </div>

            <div class="image-content">
                <img src="https://www.acc-uk.org/wp-content/uploads/2024/12/1d3445fb-385a-43ef-8721-e0b190695d07-1024x574.jpg.webp"
                    alt="Counselling">
            </div>
        </div>
    </section>

    <style>
        .training-container {
            display: flex;
            flex-wrap: wrap;
            margin: 50px auto;
            border-radius: 2px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            gap: 20px;
        }

        .text-content {
            background-color: #2e5f76;
            color: #ffffff;
            padding: 40px;
            flex: 1 1 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .tagline {
            display: block;
            text-transform: uppercase;
            font-size: 0.9rem;
            margin-bottom: 10px;
            color: #cde6f2;
        }

        h1 {
            font-size: 2rem;
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
        }

        .highlight-link {
            color: #f9a03f;
            text-decoration: none;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            border: 2px solid #fff;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: #fff;
            color: #2e5f76;
        }

        .image-content {
            flex: 1 1 200px;
            max-width: 100%;
        }

        .image-content img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* 🔁 Responsive styles */
        @media (max-width: 992px) {
            .text-content {
                padding: 30px;
            }

            h1 {
                font-size: 1.7rem;
            }
        }

        @media (max-width: 768px) {
            .training-container {
                flex-direction: column;
            }

            .text-content {
                padding: 25px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .text-content {
                padding: 20px;
            }

            h1 {
                font-size: 1.3rem;
            }

            h3 {
                font-size: 1rem;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>


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


    <section class="section ethical-framework">
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


    {{-- <x-frontend.section class="ethical-framework">
        <figure class="image-layer">
            <img src="{{ Vite::image('ethical.png') }}" alt="" class="img-fluid">
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
                                Specialists members and other Muslim counsellors, therapists, and imams to engage with their
                                clients and service users and community members in the most effective manner, thereby
                                improving the state of Muslim counselling and service providers around the world.
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('ethical.index') }}" class="btn read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.section> --}}

    @if (sectionSetting('insight_section'))
        <!-- Article Section Start -->
        <x-frontend.section class="article-section bg-gray-100">
            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="section-heading">
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



    {{-- <section class="section article-section bg-gray-100">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="section-heading">
                        <p class="sub-heading text-yellow mb-0">Resources</p>
                        <h1 class="heading heading-after">Learning</h1>
                    </div>
                </div>
            </div>

            <div class="row gy-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="https://new.aimsonline.org/insight/spending-time-productively">
                                <figure class="image">
                                    <img src="https://phplaravel-1108885-4387301.cloudwaysapps.com/storage/article/UKFK7uqOE30Qw4Ww.jpg"
                                        alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <div class="d-flex align-items-xl-center">
                                        <img src="https://new.aimsonline.org/build/assets/frontend/images/pen.png"
                                            alt="" srcset="">
                                        <p class="mb-0 ms-1"></p>
                                    </div>
                                    <div class="d-flex align-items-xl-center">
                                        <img src="https://new.aimsonline.org/build/assets/frontend/images/book.png"
                                            alt="" srcset="">
                                        <p class="mb-0 ms-1">6 min</p>
                                    </div>

                                </div>
                            </div>
                            <div class="category">
                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1C0 0.447715 0.447715 0 1 0H9C9.26522 0 9.51957 0.105357 9.70711 0.292893L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071L11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L0.292893 9.70711C0.105357 9.51957 0 9.26522 0 9V1ZM2 2V8.58579L11 17.5858L17.5858 11L8.58579 2H2Z"
                                        fill="#0D0D0D"></path>
                                    <path
                                        d="M7 5.5C7 6.32843 6.32843 7 5.5 7C4.67157 7 4 6.32843 4 5.5C4 4.67157 4.67157 4 5.5 4C6.32843 4 7 4.67157 7 5.5Z"
                                        fill="#0D0D0D"></path>
                                </svg>
                                <p class="mb-0 ms-2">Islamic</p>
                            </div>

                            <h3>
                                <a href="https://new.aimsonline.org/insight/spending-time-productively">Spending time
                                    productively</a>
                            </h3>
                            <div>
                                <p class="text-gray-500">2 years ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="https://new.aimsonline.org/insight/loneliness">
                                <figure class="image">
                                    <img src="https://phplaravel-1108885-4387301.cloudwaysapps.com/storage/article/0gUdlYY27t06lqJD.jpg"
                                        alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <div class="d-flex align-items-xl-center">
                                        <img src="https://new.aimsonline.org/build/assets/frontend/images/pen.png"
                                            alt="" srcset="">
                                        <p class="mb-0 ms-1"></p>
                                    </div>
                                    <div class="d-flex align-items-xl-center">
                                        <img src="https://new.aimsonline.org/build/assets/frontend/images/book.png"
                                            alt="" srcset="">
                                        <p class="mb-0 ms-1">5 min</p>
                                    </div>

                                </div>
                            </div>
                            <div class="category">
                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1C0 0.447715 0.447715 0 1 0H9C9.26522 0 9.51957 0.105357 9.70711 0.292893L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071L11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L0.292893 9.70711C0.105357 9.51957 0 9.26522 0 9V1ZM2 2V8.58579L11 17.5858L17.5858 11L8.58579 2H2Z"
                                        fill="#0D0D0D"></path>
                                    <path
                                        d="M7 5.5C7 6.32843 6.32843 7 5.5 7C4.67157 7 4 6.32843 4 5.5C4 4.67157 4.67157 4 5.5 4C6.32843 4 7 4.67157 7 5.5Z"
                                        fill="#0D0D0D"></path>
                                </svg>
                                <p class="mb-0 ms-2">Mental health</p>
                            </div>

                            <h3>
                                <a href="https://new.aimsonline.org/insight/loneliness">Loneliness</a>
                            </h3>
                            <div>
                                <p class="text-gray-500">2 years ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="https://new.aimsonline.org/insight/work-life-balance-whilst-working-from-home">
                                <figure class="image">
                                    <img src="https://phplaravel-1108885-4387301.cloudwaysapps.com/storage/article/GPpP57GVBumjD673.jpg"
                                        alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <div class="d-flex align-items-xl-center">
                                        <img src="https://new.aimsonline.org/build/assets/frontend/images/pen.png"
                                            alt="" srcset="">
                                        <p class="mb-0 ms-1"></p>
                                    </div>
                                    <div class="d-flex align-items-xl-center">
                                        <img src="https://new.aimsonline.org/build/assets/frontend/images/book.png"
                                            alt="" srcset="">
                                        <p class="mb-0 ms-1">4 min</p>
                                    </div>

                                </div>
                            </div>
                            <div class="category">
                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1C0 0.447715 0.447715 0 1 0H9C9.26522 0 9.51957 0.105357 9.70711 0.292893L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071L11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L0.292893 9.70711C0.105357 9.51957 0 9.26522 0 9V1ZM2 2V8.58579L11 17.5858L17.5858 11L8.58579 2H2Z"
                                        fill="#0D0D0D"></path>
                                    <path
                                        d="M7 5.5C7 6.32843 6.32843 7 5.5 7C4.67157 7 4 6.32843 4 5.5C4 4.67157 4.67157 4 5.5 4C6.32843 4 7 4.67157 7 5.5Z"
                                        fill="#0D0D0D"></path>
                                </svg>
                                <p class="mb-0 ms-2">Life-Coach</p>
                            </div>

                            <h3>
                                <a href="https://new.aimsonline.org/insight/work-life-balance-whilst-working-from-home">Work-life
                                    balance whilst working from home</a>
                            </h3>
                            <div>
                                <p class="text-gray-500">2 years ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <a href="https://new.aimsonline.org/insight" class="btn read-more-btn">Read More</a>
                </div>
            </div>
        </div>
    </section> --}}






    <!-- Event Section Start -->
    <x-frontend.section class="event-section">

        <div class="row mb-4 align-items-center">
            <div class="col-6 mb-4">
                <div class="section-heading">
                    {{-- <p class="sub-heading text-yellow mb-0">Resources</p> --}}
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
            {{-- <div class="col-12 text-center mt-2">
            <a href="{{route('event.index')}}" class="text-primary-500">View All</a>
        </div> --}}
        </div>
    </x-frontend.section>
    <!-- Event Section End -->

@endsection
@push('css')
    <style>
        .h-64 {
            height: 16rem !important;
        }

        .icon-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            /* border: 2px solid; */
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        }

        .icon-counselling {
            border-color: #38a169;
            /* Green */
        }

        .icon-coaching {
            border-color: #d53f8c;
            /* Pink */
        }

        .icon-spiritual {
            border-color: #dd6b20;
            /* Orange */
        }

        .icon-pastoral {
            border-color: #3182ce;
            /* Blue */
        }

        /* Custom styles for the images to match the gradient overlay effect */
        .card-overlay {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            /* rounded-lg */
            /*border: 1px solid rgba(0, 0, 0, 0.1); !* Added outline *!*/
            /*outline: 1px solid rgba(0, 0, 0, 0.1); !* Added outline *!*/
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
            /* Orange gradient */
        }

        .card-overlay-ethical {
            border: 2px solid #0D7554;
        }

        .card-overlay-ethical::before {
            background: linear-gradient(to bottom, rgba(0, 128, 0, 0.0) 50%, rgba(0, 128, 0, 0.6) 100%);
            /* Green gradient */
        }

        .card-overlay-empowering::before {
            background: linear-gradient(to bottom, rgba(0, 100, 255, 0.0) 50%, rgba(0, 100, 255, 0.6) 100%);
            /* Blue gradient */
        }

        .card-overlay-empowering {
            border: 2px solid #1897BB;
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

        .h-64 {
            /* Added for consistent height as Bootstrap doesn't have direct h-64 */
            height: 16rem;
            /* 64 * 0.25rem = 16rem */
        }
    </style>
@endpush
