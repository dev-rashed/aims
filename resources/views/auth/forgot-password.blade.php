@extends('layouts.frontend.app')

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
                    <form id="submit" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="section-heading mb-5">
                                <h1 class="heading">Password Recovery</h1>
                                <p class="fw-bold text-primary-800 fs-16">Enter your email and instructions will sent to you!</p>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('build/assets/frontend/images/footer/2.svg') }}" alt="">
                                <input type="email" name="email" id="email" class="form-control" required placeholder="Email" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-primary-500 rounded-10 text-white fw-bold fs-14">Reset Password</button>
                            </div>
                            <p class="mb-0 fs-16 text-gray-700 mt-4 text-center">
                                Back to
                                <a href="{{ route('login') }}" class="text-primary-500">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Login Section End -->

@endsection
