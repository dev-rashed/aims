@extends('layouts.frontend.app')

@php
    $data = match($payment->for) {
        'Booking' => [
            'title' => 'Your event is booked!',
            'description' => 'Enjoy the excitement and entertainment. Thank you for choosing us!',
        ],
        'Enroll'  => [
            'title' => 'Payment Confirmation',
            'description' => 'Your payment successfully completed.',
        ],
        default   => [
            'title' => 'Apply Membership',
            'description' => 'Apply for membership successfully. Admin will be approved your account within 24 hours.',
        ],
    };
@endphp

@section('title', $data['title'])

@section('content')

<!-- About Section Start -->
<section class="section p-0 bg-s-cover bg-r-no" style="background-image: url({{ asset('build/assets/frontend/images/membership-bg.svg') }});height:216px;">
    <div class="d-flex h-100 justify-content-center alig-items-center">
        <h1 class="fs-1 fw-bold text-primary-900 align-self-center">{{ $data['title'] }}</h1>
    </div>
</section>
<!-- About Section End -->


<!-- Checkout Section Start -->
<x-frontend.section class="checkout-section">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-lg mt-5">
                <div class="card-body p-4 p-lg-5 text-center">
                    <h4 class="fs-4 fw-bold text-primary-900 mb-4">Thank you, {{ $payment->user?->full_name }}</h4>
                    <p>{{ $data['description'] }}</p>
                </div>
            </div>
        </div>
    </div>
</x-frontend.section>
<!-- Checkout Section End -->

@endsection
