@extends('layouts.frontend.app')

@section('meta_keywords', 'pastoral care')

@section('title', 'Pastoral Care')

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
            <a href="#" class="text-white align-self-center">Pastoral Care</a>
        </div>
    </section>
    <!-- About Section Start -->
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pastoral Care</li>
            </ol>
        </nav>
        <!-- Main Content -->
        <div class="row g-5 align-items-start">
            <!-- Left Content -->
            <div>
                <h2 class="section-heading">Pastoral Care & Community Support Training</h2>
                <p>At AIMS, we recognise <strong>pastoral care</strong>—or <em>rahmah-based community support</em>—as a core
                    Islamic responsibility rooted in compassion (<em>rahmah</em>), empathy, and service to others. It
                    involves nurturing meaningful relationships, offering emotional and spiritual support, and fostering a
                    sense of collective responsibility and care within the <strong>Ummah</strong> and wider society.</p>

                <p>Inspired by Islamic teachings on mercy, mutual support, and accountability, we believe that
                    <strong>caring for others is a communal duty (fard kifayah)</strong>—something we are all called to in
                    different ways, wherever Allah places us.
                </p>

                <ul>
                    <li class="text-muted"><strong>ALL</strong> of us are invited to show care and compassion in everyday
                        life.</li>
                    <li class="text-muted"><strong>SOME</strong> are especially gifted or inclined towards this work and may
                        take on specific
                        community care or support roles.</li>
                    <li class="text-muted"><strong>A FEW</strong> are equipped and entrusted to train, guide, and support
                        others through
                        specialist knowledge, counselling skills, and leadership in the field.</li>
                </ul>

                <hr>

                <h4 class="section-heading">What Pastoral Care May Involve:</h4>
                <ul>
                    <li class="text-muted">Supporting others through difficult times—whether emotional, spiritual, or
                        situational.</li>
                    <li class="text-muted">Walking alongside individuals on the path to <strong>healing and
                            well-being</strong>.</li>
                    <li class="text-muted">Facilitating <strong>reconciliation and connection</strong> with Allah, oneself,
                        and others.</li>
                    <li class="text-muted">Offering gentle guidance, alternative perspectives, and signposting to helpful
                        resources.</li>
                    <li class="text-muted">Engaging in acts of <strong>listening, mentoring, prayerful support, visiting the
                            sick, hospitality,
                            advocacy, practical help</strong>, and more.</li>
                </ul>

                <hr>

                <h4 class="section-heading">Where and How It May Be Offered:</h4>
                <ul>
                    <li class="text-muted"><strong>Formally</strong> through community care teams, Islamic centres, or
                        counselling services.
                    </li>
                    <li class="text-muted"><strong>Informally</strong> in families, friendships, peer groups, or local
                        networks.</li>
                    <li class="text-muted"><strong>Individually</strong> or as part of <strong>small groups or outreach
                            programmes</strong>.
                    </li>
                    <li class="text-muted">In <strong>mosques, Islamic organisations, madrasahs, schools, universities,
                            prisons,
                            workplaces</strong>, or online spaces.</li>
                    <li class="text-muted">By <strong>local, national, or international Muslim organisations</strong>
                        committed to care and
                        support.</li>
                </ul>

                <hr>

                <h4 class="section-heading">Training Through AIMS</h4>
                <p>AIMS provides a wide range of <strong>pastoral care training courses and workshops</strong> designed to
                    meet the needs of:</p>

                <ul>
                    <li class="text-muted"><strong>The ALL</strong> – General training in how to offer effective, ethical,
                        and Islamically
                        grounded care in daily life.</li>
                    <li class="text-muted"><strong>The SOME</strong> – Skill-building for those in designated roles of care,
                        support, or
                        leadership within communities.</li>
                    <li class="text-muted"><strong>The FEW</strong> – Advanced, specialist training for those leading or
                        resourcing others,
                        such as chaplains, counsellors, mental health professionals, or imams.</li>
                </ul>

                <p>Our training covers foundational care principles as well as <strong>specific topics such as grief,
                        trauma, mental health awareness, family conflict, addiction, spiritual crisis</strong>, and
                    more—always with attention to Islamic ethics and cultural sensitivity.</p>

            </div>

            <!-- Right Card -->
            {{-- <div class="col-lg-4">
                @include('frontend.comon.pastoral-care-card')
            </div> --}}
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
