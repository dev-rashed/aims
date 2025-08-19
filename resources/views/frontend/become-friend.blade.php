@extends('layouts.frontend.app')

@section('meta_keywords', 'Become A Friend')

@section('title', 'Become A Friend')

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
            <a href="#" class="text-white align-self-center">Become A Friend</a>
        </div>
    </section>
    <!-- About Section Start -->
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Become A Friend</li>
            </ol>
        </nav>
        <!-- Main Content -->
        <div class="row align-items-start">
            <div class="col-lg-8">
                <!-- Left Content -->
                <h2 class="section-heading">Become a Friend or Associate Member of AIMS</h2>
                <p class="text-muted">We invite you to become a Friend of AIMS or an Associate Member, and join our
                    growing global community of individuals committed to promoting compassionate, faith-informed mental
                    health and wellbeing within Muslim communities.</p>
                <p>This option is ideal for those who may not be directly involved in counselling but still wish to stay
                    connected, contribute, and benefit from our resources.</p>

                <h2 class="section-heading">You are warmly welcomed if you are:</h2>
                <ul>
                    <li class="text-muted">A <strong>retired counsellor</strong> or former mental health professional</li>
                    <li class="text-muted">A <strong>teacher, imam, chaplain, youth worker, healthcare provider</strong>, or
                        someone involved in a related helping profession</li>
                    <li class="text-muted">Involved in <strong>Muslim community work</strong>, dawah, or support services
                    </li>
                    <li class="text-muted">Someone who <strong>shares our values</strong> and wants to support the
                        development of Islamic counselling and mental health services</li>
                    <li class="text-muted">Interested in building links with a professional organisation that promotes high
                        standards in training, ethics, and care</li>
                </ul>

                <h2 class="section-heading">Benefits of Being a Friend or Associate Member</h2>

                <ul class="">
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Complimentary access to <strong>AIMS' professional journal</strong> and member
                            newsletters</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Discounts on selected <strong>AIMS training courses and CPD events</strong>.</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small><strong>Free access to member forums</strong> for learning, discussion, and community
                            support</small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>Opportunities to stay informed about developments in <strong>Islamic mental health and
                                counselling</strong></small>
                    </li>
                    <li class="list-group-item d-flex align-items-start gap-2">
                        <span class="check-mark me-2">✓</span>
                        <small>A meaningful way to <strong>support AIMS’ mission and global impact</strong></small>
                    </li>
                </ul>


                <!-- Membership Commitments -->
                <div class="mt-4">
                    <div class="custom-note-box">
                        <h5>⚠️ Please Note:</h5>
                        <ul>
                            <li class="text-muted"><strong>Friend or Associate Member status does not confer professional
                                    membership</strong>,
                                nor does it imply accountability or endorsement for the purposes of public practice.</li>
                            <li class="text-muted"><strong>Friends and Associate Members do not hold voting rights</strong>
                                and are not listed
                                on the AIMS professional membership register.</li>
                            <li class="text-muted">This category is intended for <strong>support, engagement, and shared
                                    learning</strong>, not
                                as a pathway to accredited professional status.</li>
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

        .custom-note-box {
            background-color: #fff8e1;
            border: 1px solid #ffecb3;
            padding: 20px;
            border-left: 5px solid #ffc107;
            border-radius: 6px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            margin-top: 20px;
        }

        .custom-note-box h5 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #795548;
        }

        .custom-note-box ul {
            padding-left: 20px;
            margin: 0;
        }

        .custom-note-box li {
            margin-bottom: 10px;
            line-height: 1.6;
        }
    </style>
@endpush
