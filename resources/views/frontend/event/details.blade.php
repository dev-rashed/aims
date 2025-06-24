@extends('layouts.frontend.app')

@section('content')

<!-- Event Details Section Start -->
<x-frontend.section class="event-details-section">
    <div class="row">
        <div class="col-lg-5">
            <h1 class="fs-1 fw-bold text-primary-500">Children’s Mental Health Awareness Day</h1>
            <img src="{{ uploadedFile($event->image) }}" class="w-100 mt-4 rounded-10" alt="{{ $event->counsellor?->full_name }}" style="height: 300px" />
        </div>
        <div class="col-lg-7 ps-lg-5">
            <p class="fs-22 fw-bold text-primary-900">Events Details</p>
            <p class="fw-medium text-gray-600 fs-16">{{ $event->short_description }}</p>

            <div class="d-flex align-items-center my-5">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ uploadedFile($event->counsellor?->image) }}" class="w-60 h-60 rounded-100" alt="{{ $event->counsellor?->full_name }}" srcset="{{ uploadedFile($event->counsellor?->image) }}" />
                    </div>
                    <div class="ms-2">
                        <p class="fw-medium fs-14 text-gray-500 mb-0">Counsellor</p>
                        <p class="fw-bold fs-16 text-primary-700 mb-0">{{ $event->counsellor?->full_name }}</p>
                    </div>
                </div>
                <div class="ms-5">
                    <p class="fw-medium text-gray-500 mb-0">Last Updated</p>
                    <p class="fw-bold fs-16 text-primary-800 mb-0">{{ $event->updated_at->diffForHumans() }}</p>
                </div>
                <div class="ms-5">
                    <p class="fw-medium text-gray-500 mb-0">Price</p>
                    <p class="fw-bold fs-16 text-primary-800 mb-0">
                        {{ $event->price > 0 ? convertAmount($event->price) : 'Free' }}
                    </p>
                </div>
            </div>

            <div>
                <div class="d-flex">
                    <div class="w-45 h-45 bg-primary-100 rounded-10 d-flex align-items-center justify-content-center">
                        <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0.5C3.6 0.5 0 4.1 0 8.5C0 13.9 7 20 7.3 20.3C7.5 20.4 7.8 20.5 8 20.5C8.2 20.5 8.5 20.4 8.7 20.3C9 20 16 13.9 16 8.5C16 4.1 12.4 0.5 8 0.5ZM8 18.2C5.9 16.2 2 11.9 2 8.5C2 5.2 4.7 2.5 8 2.5C11.3 2.5 14 5.2 14 8.5C14 11.8 10.1 16.2 8 18.2ZM8 4.5C5.8 4.5 4 6.3 4 8.5C4 10.7 5.8 12.5 8 12.5C10.2 12.5 12 10.7 12 8.5C12 6.3 10.2 4.5 8 4.5ZM8 10.5C6.9 10.5 6 9.6 6 8.5C6 7.4 6.9 6.5 8 6.5C9.1 6.5 10 7.4 10 8.5C10 9.6 9.1 10.5 8 10.5Z" fill="#062C59"/>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 text-gray-500 fs-14 fw-medium">Location</p>
                        <h6 class="fs-6 fw-bold text-primary-900">{{ $event->location }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center my-4">
                    <div class="d-flex">
                        <div class="w-45 h-45 bg-primary-100 rounded-10 d-flex align-items-center justify-content-center">
                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 0.782959C6.55228 0.782959 7 1.23067 7 1.78296V2.78296H11V1.78296C11 1.23067 11.4477 0.782959 12 0.782959C12.5523 0.782959 13 1.23067 13 1.78296V2.78296H16C17.1046 2.78296 18 3.67839 18 4.78296V17.783C18 18.8875 17.1046 19.783 16 19.783H2C0.895431 19.783 0 18.8875 0 17.783V4.78296C0 3.67839 0.895431 2.78296 2 2.78296H5V1.78296C5 1.23067 5.44772 0.782959 6 0.782959ZM5 4.78296H2V7.78296H16V4.78296H13V5.78296C13 6.33524 12.5523 6.78296 12 6.78296C11.4477 6.78296 11 6.33524 11 5.78296V4.78296H7V5.78296C7 6.33524 6.55228 6.78296 6 6.78296C5.44772 6.78296 5 6.33524 5 5.78296V4.78296ZM16 9.78296H2V17.783H16V9.78296Z" fill="#062C59"/>
                            </svg>
                        </div>
                        <div class="ms-2">
                            <p class="mb-0 text-gray-500 fs-14 fw-medium">Date</p>
                            <h6 class="fs-6 fw-bold text-primary-900">{{ date('M d, Y', strtotime($event->date)) }}</h6>
                        </div>
                    </div>
                    <div class="d-flex ms-5">
                        <div class="w-45 h-45 bg-primary-100 rounded-10 d-flex align-items-center justify-content-center">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2.78296C5.58172 2.78296 2 6.36468 2 10.783C2 15.2012 5.58172 18.783 10 18.783C14.4183 18.783 18 15.2012 18 10.783C18 6.36468 14.4183 2.78296 10 2.78296ZM0 10.783C0 5.26011 4.47715 0.782959 10 0.782959C15.5228 0.782959 20 5.26011 20 10.783C20 16.3058 15.5228 20.783 10 20.783C4.47715 20.783 0 16.3058 0 10.783ZM10 4.78296C10.5523 4.78296 11 5.23067 11 5.78296V10.3687L13.7071 13.0759C14.0976 13.4664 14.0976 14.0995 13.7071 14.4901C13.3166 14.8806 12.6834 14.8806 12.2929 14.4901L9.29289 11.4901C9.10536 11.3025 9 11.0482 9 10.783V5.78296C9 5.23067 9.44771 4.78296 10 4.78296Z" fill="#062C59"/>
                            </svg>
                        </div>
                        <div class="ms-2">
                            <p class="mb-0 text-gray-500 fs-14 fw-medium">Time</p>
                            <h6 class="fs-6 fw-bold text-primary-900">{{ date('H:i A', strtotime($event->time)) }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <a href="{{ route('event.booking', $event->slug) }}" class="btn bg-primary-500 py-3 px-5 text-white rounded-10 fw-bold fs-14">Book Now</a>
            </div>

        </div>

    </div>
</x-frontend.section>
<!-- Event Details  Section End -->

<!-- Event Section Start -->
<x-frontend.section class="event-section">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h3 class="fs-3 fw-bold text-primary-900">Happeing Soon</h3>
        </div>
        <x-frontend.carousel-button />
    </div>

    <div class="row">
        <div class="col-12 mt-5">
            <div class="owl-carousel owl-theme">
                @foreach ($events as $event)
                    <x-frontend.event-card :event="$event" />
                @endforeach
            </div>
        </div>
        <div class="col-12 text-center mt-2">
            <a href="#" class="text-primary-500">View All</a>
        </div>
    </div>
</x-frontend.section>
<!-- Event Section End -->

@endsection
