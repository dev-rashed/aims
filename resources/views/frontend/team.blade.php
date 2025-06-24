@extends('layouts.frontend.app')

@section('meta_keywords', 'Team')

@section('title', 'Team')

@section('content')

    <!-- About Section Start -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:250px;">
        <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
            <a href="/" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="{{ route('advisors') }}" class="text-white align-self-center">Team</a>
        </div>
    </section>
    <!-- About Section End -->


    <!-- ========== OUR TEAM SECTION ========== -->
    <section id="our-team" class="section bgcolor-gray section-common-space">
        <div class="container">

            <div class="row gy-5">

                <div class="col-12 col-xl-10 text-center mx-auto">
                    <h1 class="fs-1 fw-bold text-primary-500">{{ setting('team_title') }}</h1>

                    <div class="my-4 text fw-300">{!! setting('team_description') !!}</div>
                </div>

                <div class="col-12 col-xl-10 text-center mx-auto">
                    @if (!empty(setting('team_items')))
                        @php $items = json_decode(setting('team_items')) @endphp

                        <div class="row gx-5">
                            <div class="col-md-12 col-lg-8">

                                <!-- team-slider -->
                                <div class="team-slider owl-carousel owl-theme">

                                    @foreach ($items as $advisor)
                                        <div class="item">
                                            <div class="media rounded-2">
                                                <div class="pull-left img-wrapper">
                                                    <img src="{{ uploadedFile($advisor->image) }}" alt="{{ $advisor->name }}" class="team-slider-img rounded-top-2">
                                                </div>
                                                <div class="media-body">
                                                    <div class="info match-height rounded-bottom-2">
                                                        <p class="degination ft-fm-1">{{ $advisor->designation ?? 'CO-FOUNDER'}}</p>
                                                        <h3 class="fs-3 mb-4">{{ $advisor->name }}</h3>

                                                        <div class="texts-area-scrollbar">{!! $advisor->description !!}</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div> <!-- //#team-slider -->

                            </div> <!-- //.col-md-12 col-lg-6 -->

                            <div class="col-md-12 col-lg-4">

                                <div class="team-slider-thumb row">
                                    @foreach ($items as $advisor)
                                        <div class="col-6 col-lg-12">
                                            <div class="thumb">
                                                <img src="{{ uploadedFile($advisor->image) }}" alt="{{ $advisor->name }}">
                                                <div class="caption">
                                                    <p class="degination">{{ $advisor->designation ?? 'CO-FOUNDER'}}</p>
                                                    <h4 class="title fs-4">{{ $advisor->name }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>

                    @endif
                </div>
            </div>


        </div> <!-- //.container -->
    </section>
    <!-- //End our-team -->


@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"
        integrity="sha512-/bOVV1DV1AQXcypckRwsR9ThoCj7FqTV2/0Bm79bL3YSyLkVideFLE3MIZkq1u5t28ke1c0n31WYCOrO01dsUg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
