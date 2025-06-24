@extends('layouts.frontend.app')

@section('content')

<!-- Education Section Start -->
<x-frontend.section
    class="education-section"
    style="background-image: url('{{ asset('build/assets/frontend/images/education-bg.png') }}')"
>
    <div class="row align-items-center">
        <div class="col-md-4 text-center text-md-start">
            <h1 class="fw-bold fs-1 text-primary-900">
                Mental health
                counselling,
                anywhere,anytime
            </h1>
        </div>
        <div class="col-md-4 my-5 my-md-0">
            <img src="{{ asset('build/assets/frontend/images/education.png') }}" class="img-fluid" alt="education" />
        </div>
        <div class="col-md-4 text-center text-md-end">
            <h4 class="fs-4 fw-bold text-primary-900">Together for mental health</h4>
            <p class="fs-16 text-gray-600">
                Practice Skills to help with   Mental-Health Challenges
                support and to quality care
            </p>
            <a href="#" class="btn bg-primary-500 rounded-26 py-2 px-4 text-white">Show Courses</a>
        </div>
    </div>
</x-frontend.section>

<!-- Education Section End -->

<!-- Course Section Start -->
<x-frontend.section class="course-section" id="online-course">
    <div class="row align-items-center">
        <div class="col-12 mb-5">
            <div class="section-heading">
                <h1 class="heading">Online Courses</h1>
            </div>
        </div>
        <div class="col-10">
            <div class="section-filtering">
                <a href="#" class="active">Popular</a>
                <a href="#" class="">New</a>
                <a href="#" class="">Editor’s Choice</a>
            </div>
        </div>
        <div class="col-2">
            <x-frontend.carousel-button />
        </div>

        <div class="col-12 mt-5">
            <div class="owl-carousel owl-theme">
                @foreach ($data['onlineCourses'] as $course)
                    <x-frontend.course-card :course="$course" />
                @endforeach
            </div>
        </div>

    </div>
</x-frontend.section>
<!-- Course Section End -->

<!-- Advanced Course Section Start -->
<x-frontend.section class="course-section" id="advanced-course">
    <div class="row align-items-center">
        <div class="col-12 mb-5">
            <div class="section-heading">
                <h1 class="heading">Advanced Courses</h1>
            </div>
        </div>
        <div class="col-10">
            <div class="section-filtering">
                <a href="#" class="active">Popular</a>
                <a href="#" class="">New</a>
                <a href="#" class="">Editor’s Choice</a>
            </div>
        </div>
        <div class="col-2">
            <x-frontend.carousel-button />
        </div>

        <div class="col-12 mt-5">
            <div class="owl-carousel owl-theme">
                @foreach ($data['advancedCourses'] as $course)
                    <x-frontend.course-card :course="$course" />
                @endforeach
            </div>
        </div>
    </div>
</x-frontend.section>
<!-- Advanced Course Section End -->

<!-- counsellor Section Start -->
<x-frontend.section class="counsellor-section">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h3 class="fs-3 fw-bold text-primary-900">Our Counsellor</h3>
        </div>

        <x-frontend.carousel-button />
    </div>
    <div class="row align-items-center">

        <div class="col-12 mt-5">
            <div class="owl-carousel owl-theme">
                @foreach ($data['counsellors'] as $counsellor)
                    <x-frontend.counsellor-card :counsellor="$counsellor" />
                @endforeach
            </div>
        </div>

    </div>
</x-frontend.section>
<!-- counsellor Section End -->

<!-- Subscribe Section Start -->
<x-frontend.section class="subscribe-section">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="d-flex bg-s-cover bg-p-bottom align-items-center justify-content-center rounded-41" style="background-image: url('{{ asset('build/assets/frontend/images/subscriber-bg.png') }}');height:458px">
                <div class="text-center text-white">
                    <h1 class="fs-1 fw-bold">Enter your email to get the latest news</h1>
                    <p class="mb-0 fs-16 fw-medium">
                        You will get the latest notifications about the latest school
                    </p>

                    <div class="bg-white border border-gray-500 rounded-20 py-2 px-3 mt-3">
                        <form id="submit" action="{{ route('subscribe') }}" method="post" class="d-flex align-items-center justify-content-between">
                            @csrf
                            <div class="d-flex align-items-center p-2 w-100">
                                <label for="email">
                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333496 2.00008C0.333496 1.2637 0.930449 0.666748 1.66683 0.666748H12.3335C13.0699 0.666748 13.6668 1.2637 13.6668 2.00008V10.0001C13.6668 10.7365 13.0699 11.3334 12.3335 11.3334H1.66683C0.930451 11.3334 0.333496 10.7365 0.333496 10.0001V2.00008ZM2.67922 2.00008L7.00016 5.7809L11.3211 2.00008H2.67922ZM12.3335 2.88593L7.43917 7.16847C7.18782 7.3884 6.81251 7.3884 6.56116 7.16847L1.66683 2.88593V10.0001H12.3335V2.88593Z" fill="#9D9D9D"/>
                                    </svg>
                                </label>
                                <input type="email" name="email" id="email" required class="form-control text-gray-500 border-0" placeholder="Enter Your Email Address" />
                            </div>
                            <button type="submit" class="btn bg-primary-500 rounded-10 px-5 py-2 text-white">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.section>
<!-- Subscribe Section End -->

@endsection
