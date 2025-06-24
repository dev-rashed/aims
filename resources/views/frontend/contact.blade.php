@extends('layouts.frontend.app')

@section('content')

<!-- Contact Section Start -->
<section class="section contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-40 border-0">
                    <div class="card-body p-lg-5">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h1 class="fs-1 fw-bold text-primary-500">Get In Touch</h1>
                                <p class="fs-16 fw-bold text-primary-800">We are here for you! How can we help?</p>
                                <form id="submit" action="{{ route('contact.store') }}" method="post" class="mt-4">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" name="name" id="name" class="form-control border-primary-500 rounded-6 h-49 text-gray-600" placeholder="Enter your name" />
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" id="email" class="form-control border-primary-500 rounded-6 h-49 text-gray-600" placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="details" id="details" rows="5" placeholder="Go ahead, we are listening...." class="form-control border-primary-500 rounded-6 text-gray-600"></textarea>
                                    </div>

                                    <x-frontend.recaptcha />
                                    
                                    <div class="mb-3">
                                        <button type="submit" class="btn bg-primary-500 rounded-10 w-100 py-2 text-white fw-bold fs-14">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 mt-5 ms-lg-auto mt-lg-0">
                                <img src="{{ asset('build/assets/frontend/images/contact.png') }}" class="img-fluid" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection
