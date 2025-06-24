@extends('layouts.frontend.app')

@section('content')

@if ($event)
    <!-- Whatson Details Section Start -->
    <x-frontend.section class="whatson-details">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ uploadedFile($event->image) }}" class="w-100 h-100 rounded-20" alt="" />
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="card shadow-sm rounded-20 border-0 h-100">
                    <div class="card-body">
                        <span class="bg-primary-200 bounded-4 px-2 py-1">Happening Now</span>
                        <a href="{{ route('event.details', $event->slug) }}">
                            <h2 class="fs-2 fw-bold text-primary-900 mt-4">{{ $event->title }}</h2>
                        </a>
                        <p class="text-gray-700 fs-16">{{ $event->short_description }}</p>
                        <div>
                            <p class="fs-16 text-gray-700 mb-0">{{ $event->location }}</p>
                            <h6 class="fs-6 text-primary-500">{{ date('M d', strtotime($event->date)) }} {{ date('H:i A', strtotime($event->time)) }}</h6>
                        </div>
                        <div>
                            <p class="fs-14 fw-bold text-gray-700 mb-0">
                                {{ $event->counsellor?->title }}
                                @if(!empty($event->counsellor?->title))
                                    <span class="mx-2 fw-medium">|</span>
                                @endif
                                <span class="fw-medium">{{ $event->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-frontend.section>
    <!-- Whatson Details  Section End -->
@endif


<!-- Event Section Start -->
<x-frontend.section class="event-section">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h3 class="fs-3 fw-bold text-primary-900">Happening Soon</h3>
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
    </div>
</x-frontend.section>
<!-- Event Section End -->

@endsection
