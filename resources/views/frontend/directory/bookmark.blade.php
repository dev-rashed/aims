@extends('layouts.frontend.app')

@section('content')
<!-- Directory Section Start -->
<section class="section directory-section">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5 text-center">
                <div class="section-heading">
                    <h3 class="fs-3 fw-bold text-primary-800">Your bookmarks</h3>
                    <h3 class="fs-5 fw-bold text-primary-800">Saved Therapists</h3>
                </div>
            </div>
            <div class="col-12 col-xl-9 mx-auto">
                @forelse ($therapists as $therapist)
                    <x-frontend.therapist-card :therapist="$therapist" />
                @empty
                    Not available
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- Directory Section End -->
@endsection