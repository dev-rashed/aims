@extends('layouts.frontend.app')

@section('meta_keywords', 'spiritual direction, imams, Islamic guidance')

@section('title', 'Spiritual Direction')

@section('content')
    <!-- Banner Section -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
        <div class="d-flex h-100 justify-content-center align-items-center fw-bold fs-16">
            <a href="/" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">Spiritual Direction</a>
        </div>
    </section>

    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Spiritual Direction</li>
            </ol>
        </nav>

        <!-- Main Content -->
        <div class="row align-items-start">
            <div class="col-lg-8">
                <h2 class="section-heading">Spiritual Direction Membership for Imams</h2>
                <h5 class="text-muted mb-4">Support | Standards | Community</h5>

                <p>
                    We are pleased to be developing a <strong>dedicated membership stream for Imams</strong> who are engaged
                    in the vital work of spiritual direction within the Muslim community. This initiative is rooted in our
                    recognition of the <strong>sacred trust</strong> carried by imams who offer spiritual counsel, support,
                    and guidance to individuals and families seeking connection with Allah and clarity in their lives.
                </p>

                <p>
                    Our aim is to honour the role of the imam not only as a teacher and leader, but also as a
                    <strong>spiritual guide</strong>, offering direction grounded in the Qur’an, Sunnah, and the lived
                    tradition of Islamic scholarship.
                </p>

                <h2 class="section-heading">What the Membership Offers</h2>
                <p>This membership is designed to support imams who are engaged in spiritual direction by providing:</p>
                <ul>
                    <li class="text-muted"> <strong>Recognition</strong> of the unique spiritual leadership role imams play
                        in their communities</li>
                    <li class="text-muted">Access to a <strong>community of peer support</strong> and shared learning</li>
                    <li class="text-muted">A clear <strong>code of ethics and good practice</strong> for spiritual direction
                        rooted in Islamic values</li>
                    <li class="text-muted">Ongoing <strong>training and development opportunities</strong> in areas such as
                        spiritual care, boundaries, ethics, and reflective practice</li>
                    <li class="text-muted">Support in navigating complex pastoral and spiritual issues with wisdom and
                        integrity</li>
                </ul>

                <p>
                    We also aim to offer the public a <strong>trusted and searchable directory</strong> of imams who provide
                    spiritual direction, ensuring that individuals seeking support can find
                    <strong>qualified, experienced, and ethically accountable</strong> guides.
                </p>

                <h2 class="section-heading">A Space for Growth and Mutual Support</h2>
                <p>This is not simply a professional membership—it is a space for imams to:</p>
                <ul>
                    <li class="text-muted">Reflect on their spiritual leadership in a changing world</li>
                    <li class="text-muted">Learn from one another in a safe and respectful environment</li>
                    <li class="text-muted">Deepen their own spiritual insight and practice</li>
                    <li class="text-muted">Strengthen the spiritual fabric of the Ummah through excellence in guidance and
                        care</li>
                </ul>

                <h2 class="section-heading">Who Can Join?</h2>
                <p>This membership is for:</p>
                <ul>
                    <li class="text-muted">Imams who are already offering spiritual direction as part of their community
                        work</li>
                    <li class="text-muted">Imams who wish to deepen their understanding and practice of spiritual guidance
                    </li>
                    <li class="text-muted">Imams who value accountability, ongoing learning, and support in fulfilling their
                        role with <strong>ihsan (excellence)</strong></li>
                </ul>
                <p>We also welcome <strong>experienced imams</strong> who would like to help shape this initiative and
                    mentor others within the network.</p>

                <h2 class="section-heading">Help Us Shape This Offering</h2>
                <p>
                    We are currently building the foundations of this membership and warmly invite imams to contribute their
                    insight and experience. If you would like to be involved, or simply stay informed as this initiative
                    develops, please contact us at <a href="mailto:info@aimsonline.org">info@aimsonline.org</a>.
                </p>

                <p>
                    We believe that imams deserve dedicated support as they guide others in faith—and that spiritual
                    direction, when practiced with sincerity, knowledge, and ethics, is one of the most impactful forms of
                    service in our time.
                </p>
            </div>

            <!-- Right Card -->
            <div class="col-lg-4">
                @include('frontend.comon.membership-card')
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .section-heading {
            color: #307c96;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 1rem;
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
