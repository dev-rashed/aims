@extends('layouts.frontend.app')

@section('meta_keywords', 'Member Benefits')

@section('title', 'Member Benefits')

@section('content')

<!-- About Section Start -->
<section class="section" style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
    <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
        <a href="#" class="text-white align-self-center">Home</a>
        <span class="mx-2 align-self-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z" fill="#fff"/>
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
                <h4 class="mb-4">Member Benefits of the Association of Islamic Mental Health Specialists (AIMS)</h4>

                <p>
                    Being a member of the Association of Islamic Mental Health Specialists (AIMS) is more than just joining a Islamic community professional organisation- it is an opportunity to align your practice with authentic Islamic principles and become part of a global effort to elevate the standard of Islamic mental health support for the global Muslim community.
                </p>
                <p>
                    By becoming a member, you gain access to exclusive benefits and demonstrate your commitment to integrating Islamic ethics and values into your work, fostering trust and confidence within the community you serve.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section about-section bg-gray-200">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 col-xl-10">
                <h3 class="mb-3">Why Join AIMS?</h3>
            </div>

            <div class="row gy-3">
                @foreach ($objectives as $objective)
                    <div class="col-12">
                        <div class="card border-0 rounded-md">
                            <div class="card-body p-4">
                                <h4 class="mb-3">{{ $loop->iteration }}. {{ $objective['title'] }}</h4>
                                <p>{{ $objective['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                        <h3 class="mb-3">A Path of Reward and Excellence</h3>
                        <p class="mb-4">
                            Joining AIMS is not just a professional step- it is a spiritual journey. By aligning your practice with the authentic teachings of Islam and dedicating yourself to the betterment of the Muslim Ummah, you gain the opportunity to seek both worldly success and the pleasure of Allah (SWT).
                        </p>
                        <p class="mb-4">
                            Invest in your growth, strengthen your faith, and contribute to the revival of Islamic mental health practices. Your membership matters, not just for you, but for the entire Muslim community.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card bg-gray-200 border-0">
                    <div class="card-body text-center py-5 p-lg-5">
                        <div class="p-lg-4">
                            <h2 class="mb-4">Join Us Today</h2>
                            <p class="fs-18">
                                Become part of AIMS and take your place in a trusted and growing network of Islamic mental health specialists dedicated to excellence, authenticity, and service to Allah’s creation. Together, we can make a lasting impact.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
