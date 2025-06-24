@extends('layouts.frontend.app')

@section('meta_keywords', $page->meta_keywords)
@section('meta_keywords', $page->meta_keywords)

@section('title', $page->name)

@section('content')

<!-- About Section Start -->
<section class="section" style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:250px;">
    <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
        <a href="#" class="text-white align-self-center">Home</a>
        <span class="mx-2 align-self-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z" fill="#fff"/>
            </svg>
        </span>
        <a href="#" class="text-white align-self-center">{{ $page->name }}</a>
    </div>
</section>
<!-- About Section End -->

<!-- Service Section Start -->
<section class="section service-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 fw-bold text-primary-500">{{ $page->title }}</h1>

                <div class="my-4">{!! $page->description !!}</div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End -->

@endsection
