@props(['status', 'title', 'message'])

@extends('layouts.frontend.app')

@section('title', $title ?? $message)

@section('content')
    <!-- Error Section Start -->
    <section class="section error-section" style="background-image:url({{ asset('build/assets/frontend/images/error-bg.svg')}})">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-10">
                    <div class="text-center">
                        <h1 class="heading">{{ $status }}</h1>
                        <p class="sub-heading">{{ $message }}</p>
                        <a href="/" class="btn bg-primary-600 rounded-10 text-white px-4 py-2">
                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.45089 0.477362C7.79196 0.818434 7.79196 1.37142 7.45089 1.71249L3.7016 5.46178H13.8203C14.3026 5.46178 14.6937 5.8528 14.6937 6.33515C14.6937 6.8175 14.3026 7.20852 13.8203 7.20852H3.7016L7.45089 10.9578C7.79196 11.2989 7.79196 11.8519 7.45089 12.1929C7.10981 12.534 6.55683 12.534 6.21575 12.1929L0.975531 6.95272C0.811742 6.78893 0.719727 6.56678 0.719727 6.33515C0.719727 6.10352 0.811742 5.88137 0.975531 5.71758L6.21575 0.477362C6.55683 0.13629 7.10981 0.13629 7.45089 0.477362Z" fill="white"/>
                            </svg>
                            Return to Homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Error Section End -->
@endsection

