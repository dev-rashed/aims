@extends('layouts.frontend.app')

@section('content')
    <style>
        .membership-section .membership-plan:nth-child(1) .card-header Specificity: (0, 4, 0) {
            background-color: #4db088 !important;
            color: #ffffff !important;
        }
    </style>
    <!-- Membership Section Start -->
    <section class="section membership-top-section">
        <div class="container position-relative">
            <figure class="image-layer">
                <img src="{{ Vite::image('membership-img.png') }}" alt="" class="img-fluid">
            </figure>
            <div class="row align-items-xl-end gy-4">
                <div class="col-lg-6 col-xl-7">
                    <div class="section-heading" style="text-align: justify">
                        <h1 class="heading text-primary-500 mb-0">AIMS</h1>
                        <h1 class="heading heading-after text-yellow">Membership</h1>
                        <p class="description mt-4 w-100">
                            Members of AIMS are bound by our Ethical Framework for the Counselling Professions and our
                            Professional Conduct Procedure. You must read and agree to these as part of your application
                            process. You should also read our membership policies.
                        </p>
                        <p class="description mt-4 w-100">
                            Benefits of membership include a global recognition through our brand and presence on our
                            website and directory, resources and guidance to support your practice, discounted access to
                            exclusive events, workshops and CPD opportunities, as well as access to a network of
                            professionals holding the same values and desire to support their communities. With
                            accreditation and official membership, you will be able to gain greater public trust and
                            confidence in your services whilst allowing AIMS to support you and raise accountability and
                            standards of your output.
                        </p>

                    </div>
                    <div class="section-heading mt-5">
                        <a href="{{ url('/ethical-standards') }}" style="width: fit-content;border-bottom: 1px solid;">
                            <p class="sub-heading mb-0 text-yellow">SEE OUR ETHICAL FRAMEWORK</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Membership Section End -->

    <!-- Membership Section Start -->
    <section class="section membership-section bg-gray-100">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <p class="sub-heading mb-0 text-yellow">JOIN NOW</p>
                        <h1 class="heading text-primary-500 heading-after mb-0">Membership Options</h1>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="tabs-buttons">
                        <ul class="nav nav-pills justify-content-lg-end justify-content-center" id="pills-tab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-14 fw-bold" id="pills-monthly-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-monthly" type="button" role="tab"
                                    aria-controls="pills-monthly" aria-selected="false">Monthly</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fs-14 fw-bold" id="pills-yearly-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-yearly" type="button" role="tab"
                                    aria-controls="pills-yearly" aria-selected="true">ANNUALLY</button>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row mt-4 mt-lg-5">
                <div class="col-12">
                    <div class="tab-content" id="pills-tabContent">
                        @foreach (['monthly', 'yearly'] as $key => $package)
                            <div @class(['tab-pane fade', ' show active' => $key != 0]) id="pills-{{ $package }}" role="tabpanel"
                                aria-labelledby="pills-{{ $package }}-tab" tabindex="0">
                                <div class="row gx-4 gx-xxl-5 gy-4">
                                    @foreach ($membershipPlans as $membershipPlan)
                                        <div class="col-md-6 col-lg-3 mb-4 membership-plan">
                                            <x-frontend.price-card :plan="$membershipPlan" :package="$package" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Membership Section End -->
@endsection
