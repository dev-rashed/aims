@extends('layouts.frontend.app')

@section('meta_keywords', 'aims-advisors')

@section('title', 'Aims Advisors')

@section('content')

<!-- About Section Start -->
<section class="section" style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:250px;">
    <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
        <a href="/" class="text-white align-self-center">Home</a>
        <span class="mx-2 align-self-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z" fill="#fff"/>
            </svg>
        </span>
        <a href="{{ route('advisors') }}" class="text-white align-self-center">AIMS Advisors</a>
    </div>
</section>
<!-- About Section End -->

<!-- Service Section Start -->
<section class="section service-section">
    <div class="container">
        <div class="row gy-5">
            <div class="col-12 col-xl-10 text-center mx-auto">
                <h1 class="fs-1 fw-bold text-primary-500">{{ setting('advisor_title') }}</h1>

                <div class="my-4 text fw-300">{!! setting('advisor_description') !!}</div>
            </div>

            @if (!empty(setting('advisor_items')))
                <div class="col-12 col-xl-10 mx-auto position-relative">
                    <div class="row">
                        <div class="col-xl-8 mx-auto">
                            <div class="owl-carousel owl-theme">
                                @foreach (json_decode(setting('advisor_items')) as $key => $advisor)
                                    <div class="advisor-item" data-key="{{ $loop->iteration }}">
                                        <div class="text-center">
                                            <div>
                                                <h3 class="fs-3 fw-bold">{{ $advisor->name }}</h3>
                                                <p class="mb-0">{{ $advisor->designation ?? 'CO-FOUNDER'}}</p>
                                            </div>

                                            <div class="my-5">
                                                <img src="{{ uploadedFile($advisor->image) }}" class="advisor-item-img" alt="{{ $advisor->name }}">
                                            </div>

                                            <div class="texts-area-scrollbar" style="max-height: 250px">
                                                {!! $advisor->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- <x-frontend.carousel-button /> --}}

                    <div class="advisor-carousel-buttons">
                        <button class="advisor-carousel-button" id="carousel-prev" data-type="prev">
                            <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1L1 8.5L9 16" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button class="advisor-carousel-button" id="carousel-next" data-type="next">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.292893 13.7071C-0.0976311 13.3166 -0.0976312 12.6834 0.292893 12.2929L5.58579 7L0.292893 1.70711C-0.0976317 1.31658 -0.0976317 0.683417 0.292893 0.292893C0.683417 -0.0976315 1.31658 -0.0976315 1.70711 0.292893L7.70711 6.29289C8.09763 6.68342 8.09763 7.31658 7.70711 7.70711L1.70711 13.7071C1.31658 14.0976 0.683418 14.0976 0.292893 13.7071Z" fill="white"/>
                            </svg>
                        </button>
                    </div>

                </div>
            @endif

        </div>
    </div>
</section>
<!-- Service Section End -->

@endsection
