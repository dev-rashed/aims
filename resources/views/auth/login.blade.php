@extends('layouts.frontend.app')

@section('content')

<!-- Login Section Start -->
<section class="section auth-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <img src="{{ asset('build/assets/frontend/images/login.png') }}" class="img-fluid" alt="" />
            </div>
            @php
                $url = url()->previous();
                $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
                session()->put('previous_url', $url);
            @endphp
            <div class="col-lg-5 mt-5 mt-md-0">
                <div class="card shadow-lg border-0 rounded-20">
                    <form id="submit" action="{{ route('login') }}" method="POST" data-redirect="{{ $route == 'neurologist.details' ? $url : '/' }}">
                        @csrf
                        <div class="card-body">

                            <div class="section-heading mb-5">
                                <h1 class="heading">Welcome Back</h1>
                                <p class="fw-bold text-primary-800 fs-16">Login To Your Account</p>
                            </div>

                            <div class="form-group">
                                <img src="{{ asset('build/assets/frontend/images/footer/2.svg') }}" alt="">
                                <input type="email" name="email" id="email" class="form-control" required @if(request()->has('email')) value="{{ request()->get('email') }}" @endif placeholder="Email" />
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
                                <div>
                                    <a href="{{ route('password.request') }}" class="text-primary-500 fs-14">Forget Password</a>
                                </div>
                            </div>

                            @if (config('app.env') == 'local')
                                <div class="text-center my-3">
                                    <a href="{{ route('passwordless.login', 1) }}" class="btn btn-primary px-5 py-2 rounded-10 text-white fw-bold fs-14">User</a>
                                    <a href="{{ route('passwordless.login', 3) }}" class="btn btn-primary px-5 py-2 rounded-10 text-white fw-bold fs-14">Practitioner</a>
                                </div>
                            @endif

                            <div class="text-center">
                                <button type="submit" class="btn bg-primary-500 rounded-10 text-white fw-bold fs-14">Login</button>
                            </div>
                            <p class="mb-0 fs-16 text-gray-700 mt-4 text-center">
                                Not a member yet ?
                                <a href="{{ route('register') }}" class="text-primary-500">Register now</a>
                            </p>

                            <div class="text-center my-3">
                                <a href="{{ route('social.login', 'google') }}" class="btn px-5 py-2 rounded-10 text-white fw-bold fs-14 w-100" style="background-color: #0F9D58">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0039 0C5.37491 0 0 5.373 0 12C0 18.627 5.37491 24 12.0039 24C22.0139 24 24.2691 14.707 23.3301 10H22H19.7324H12V14H19.7383C18.8487 17.4483 15.726 20 12 20C7.582 20 4 16.418 4 12C4 7.582 7.582 4 12 4C14.009 4 15.8391 4.74575 17.2441 5.96875L20.0859 3.12891C17.9519 1.18491 15.1169 0 12.0039 0Z" fill="#fff"/>
                                    </svg>
                                    Connect with Google
                                </a>
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
