@extends('layouts.frontend.app')

@section('meta_keywords', 'ambassadors')

@section('title', 'Ambassadors')

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
        <a href="{{ route('ambassadors') }}" class="text-white align-self-center">AIMS Ambassador</a>
    </div>
</section>
<!-- About Section End -->

<!-- Service Section Start -->
<section class="section ambassador-section">
    <div class="container">
        <div class="row gy-5">
            <div class="col-12 col-xl-10 text-center mx-auto">
                <h1 class="fs-1 fw-bold text-primary-500">{{ setting('ambassador_title') }}</h1>

                <div class="my-4 text">{!! setting('ambassador_description') !!}</div>
            </div>
            <div class="col-12">
                <div class="row gy-5">
                    @if (!empty(setting('ambassador_items')))
                        @foreach (json_decode(setting('ambassador_items')) as $key => $advisor)
                            <div class="col-12">
                                <div class="card ambassador-card shadow-sm border-gray-200 {{ $loop->odd ? 'odd':'even' }}">
                                    <div class="card-body p-4">
                                        <div class="row gy-4 gx-5 align-items-center">
                                            <div @class(['col-lg-5 col-xl-4', 'order-lg-1' => $loop->odd, 'order-lg-2' => !$loop->odd])>
                                                <img src="{{ uploadedFile($advisor->image) }}" class="img-fluid w-100 rounded-4" alt="{{ $advisor->name }}" style="height:368px;object-fit: cover;" srcset="{{ uploadedFile($advisor->image) }}">
                                            </div>
                                            <div @class(['col-lg-7 col-xl-8', 'order-lg-1' => $loop->even, 'order-lg-2' => !$loop->even])>
                                                <h4 class="text-primary-500 mb-3">{{ $advisor->name }}</h4>
                                                <div class="texts-area-scrollbar">
                                                    {!! $advisor->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="col-12">
                        <div class="ambassador-img-section">
                            <div class="d-flex h-100 justify-content-center align-items-center fw-bold fs-16">
                                <div>
                                    <h2 class="text-center text-white">If you are interested in becoming <br/> an ambassador   </h2>
                                    <div class="text-center mt-4">
                                        <a href="/aims-ambassadors" class="btn read-more-btn mx-auto">CLICK HERE</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End -->
@endsection
