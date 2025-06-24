@extends('layouts.frontend.app')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
<style>
    .select2-dropdown {
        z-index: 999999999;
    }
</style>
@endpush

@section('content')
<!-- Directory Section Start -->
<section class="section directory-section">
    <div class="container">
        <div class="row">

            <div class="col-xl-4 large-filter">
                <div class="filters-area">
                    <div class="filter-close d-xl-none">
                        <img src="{{ asset('build/assets/frontend/images/icons/close.svg') }}" class="me-2" alt="filter" />
                    </div>
                    <div class="filtering">
                        @include('frontend.directory.filter', ['data' => $data])
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-8">

                <button id="filter" class="d-xl-none btn bg-primary-500 rounded-10 py-2 px-4 text-white fw-bold fs-14 d-flex align-items-center justify-content-center mb-4">
                    <img src="{{ asset('build/assets/frontend/images/icons/filter.svg') }}" class="me-2" alt="filter" />
                    Filter
                </button>

                <div id="therapists">
                    @include('frontend.directory.therapists', ['therapists' => $therapists])
                </div>
            </div>
        </div>

        {{-- <div class="mobile-filter-area d-xl-none">
            <div class="filter-close">
                <img src="{{ asset('build/assets/frontend/images/icons/close.svg') }}" class="me-2" alt="filter" />
            </div>
            <div class="filtering">
                @include('frontend.directory.filter', ['data' => $data])
            </div>
        </div> --}}
    </div>
</section>
<!-- Directory Section End -->
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
@endpush
