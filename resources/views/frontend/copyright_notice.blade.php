@extends('layouts.frontend.app')

@section('meta_keywords', 'Copyright Notice')
@section('meta_description', 'Learn about our copyright notice')

@section('title', 'Copyright Notice')

@section('content')

    <!-- About Section Start -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:250px;">
        <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
            <a href="#" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">Copyright Notice</a>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="section service-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fs-1 fw-bold text-primary-500">Copyright Notice: Learn about our copyright notice</h1>

                    <div class="my-4">
                        <p>All content on this website is the intellectual property of the Association of Islamic Mental
                            Health Specialists (AIMS) and is protected under applicable copyright laws.</p>
                        <p>You may not reproduce, copy, or repurpose any material from this site for the creation of your
                            own directory, supplier listings, or for any other use beyond its intended purpose — namely, to
                            obtain information and contact details of mental health professionals, supervisors, or
                            organisations in order to access the services they offer.</p>

                        <p>Any information you provide through <a target="_blank" href="https://aims-uk.org">aims-uk.org</a> is treated
                            confidentially and will not be shared with third parties without your consent.</p>
                        <p>The AIMS logo may only be used by individual members and affiliate members to indicate active
                            membership. It must not be used to suggest AIMS approval, verification, or endorsement of
                            events, training, publications, or other materials unless explicit, prior written permission has
                            been granted by AIMS. The organisation reserves the right to refuse such permission.</p>
                        <p>Breaches of these terms will be taken seriously under AIMS regulations and may lead to disciplinary action.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

@endsection
