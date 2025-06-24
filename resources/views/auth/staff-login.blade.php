@extends('layouts.frontend.app')

@section('title', 'Admin Login')

@section('content')

<!-- Login Section Start -->
<section class="section auth-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <img src="{{ asset('build/assets/frontend/images/login.png') }}" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-5 mt-5 mt-md-0">
                <div class="card shadow-lg border-0 rounded-20">
                    <form id="submit" action="{{ route('staff.login') }}" method="POST" data-redirect="{{ route('staff.login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="section-heading mb-5">
                                <h1 class="heading">Welcome Back</h1>
                                <p class="fw-bold text-primary-800 fs-16">Login To Admin Panel</p>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('build/assets/frontend/images/footer/2.svg') }}" alt="">
                                <input type="email" name="email" id="email" class="form-control" required placeholder="Email" />
                                <div class="invalid-feedback" id="invalid_email"></div>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('build/assets/frontend/images/footer/3.svg') }}" id="passwordShowHide" data-type="password" alt="Hide">
                                <img src="{{ asset('build/assets/frontend/images/footer/4.svg') }}" id="passwordShowHide" data-type="text" alt="Show" class="d-none">
                                <input type="password" name="password" id="password" required class="form-control" placeholder="Password" />
                                <div class="invalid-feedback" id="invalid_password"></div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                                    <label class="form-check-label text-gray-600 fs-16" for="remember_me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-primary-500 rounded-10 text-white fw-bold fs-14">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Login Section End -->

@endsection
