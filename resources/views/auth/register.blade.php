@extends('layouts.frontend.app')

@section('content')

<x-frontend.section class="membership-section">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="section-heading">
                    <h1 class="heading">Register Now</h1>
                    <p class="description">
                        We’re working to create a world with good mental health
                        for all – and we can’t do it without you.
                    </p>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-lg-5">
                <div class="card shadow-lg rounded-10 border-0 text-gray-800">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <p class="fs-22 fw-bold mb-4">Join Us To</p>
                            <img src="{{ asset('build/assets/frontend/images/mental-health.svg') }}" class="img-fluid" alt="" />
                        </div>
                        <ul class="list-unstyled fw-medium mt-4 mb-0">
                            <li class="d-flex mb-1">
                                <img src="{{ asset('build/assets/frontend/images/icons/check.svg') }}" alt="check" />
                                <span class="ms-2">Take part in our campaigns</span>
                            </li>
                            <li class="d-flex mb-1">
                                <img src="{{ asset('build/assets/frontend/images/icons/check.svg') }}" alt="check" />
                                <span class="ms-2">Share you personal experience</span>
                            </li>
                            <li class="d-flex mb-1">
                                <img src="{{ asset('build/assets/frontend/images/icons/check.svg') }}" alt="check" />
                                <span class="ms-2">Corporate Partnerships</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-5 ms-auto mt-5 mt-lg-0">
                <p class="fs-22 fw-bold text-primary-800 text-center mb-4">Create Your Account</p>

                <form id="submit" action="{{ route('register') }}" method="POST" data-redirect="{{ url('/') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="first_name" id="first_name" class="form-control " placeholder="First Name" />
                            <div class="invalid-feedback" id="invalid_first_name"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" />
                            <div class="invalid-feedback" id="invalid_last_name"></div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="email" name="email" id="email" class="form-control " placeholder="Email" />
                            <div class="invalid-feedback" id="invalid_email"></div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="password" name="password" id="password" class="form-control " placeholder="Password" />
                            <div class="invalid-feedback" id="invalid_password"></div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" />
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" name="location" id="location" class="form-control " placeholder="Your Location" />
                            <div class="invalid-feedback" id="invalid_location"></div>
                        </div>

                        <x-frontend.recaptcha />

                        <div class="col-10 mx-auto mt-3">
                            <button type="submit" class="btn bg-primary-500 rounded-10 w-100 py-3 text-white fw-bold fs-14">Create My Account</button>
                            <p class="mb-0 fs-16 text-gray-700 mt-4 text-center">
                                All ready member ?
                                <a href="{{ route('login') }}" class="text-primary-500">Login</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-frontend.section>

@endsection

@push('js')
    <script>
        function cities() {
            var options = {
                types: ['(postal_code)']
            };
            var location = document.getElementById('location');
            var autoComplete = new google.maps.places.Autocomplete(location)
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_api_key') }}&libraries=places&callback=cities" type="text/javascript"></script>
@endpush
