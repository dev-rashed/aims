@props(['event'])
<div class="card shadow-lg rounded-20 border-0 position-relative">
    <div class="date">
        <span class="day">{{ date('d', strtotime($event->date)) }}</span>
        <span class="month">{{ date('M', strtotime($event->date)) }}</span>
    </div>
    <img src="{{ uploadedFile($event->image) }}" alt="{{ $event->title }}" secret="{{ uploadedFile($event->image) }}" />
    <div class="card-body">
        <a href="{{ route('event.details', $event->slug) }}">
            <h6 class="fs-6 fw-bold text-primary-500" style="height: 85px;line-height:27px;">{{ $event->title }}</h6>
        </a>
        <div class="d-flex align-items-center text-gray-600 fs-14">
            <div class="d-flex align-items-center">
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.99984 0.333374C3.0665 0.333374 0.666504 2.73337 0.666504 5.66671C0.666504 9.26671 5.33317 13.3334 5.53317 13.5334C5.6665 13.6 5.8665 13.6667 5.99984 13.6667C6.13317 13.6667 6.33317 13.6 6.4665 13.5334C6.6665 13.3334 11.3332 9.26671 11.3332 5.66671C11.3332 2.73337 8.93317 0.333374 5.99984 0.333374ZM5.99984 12.1334C4.59984 10.8 1.99984 7.93337 1.99984 5.66671C1.99984 3.46671 3.79984 1.66671 5.99984 1.66671C8.19984 1.66671 9.99984 3.46671 9.99984 5.66671C9.99984 7.86671 7.39984 10.8 5.99984 12.1334ZM5.99984 3.00004C4.53317 3.00004 3.33317 4.20004 3.33317 5.66671C3.33317 7.13337 4.53317 8.33337 5.99984 8.33337C7.4665 8.33337 8.6665 7.13337 8.6665 5.66671C8.6665 4.20004 7.4665 3.00004 5.99984 3.00004ZM5.99984 7.00004C5.2665 7.00004 4.6665 6.40004 4.6665 5.66671C4.6665 4.93337 5.2665 4.33337 5.99984 4.33337C6.73317 4.33337 7.33317 4.93337 7.33317 5.66671C7.33317 6.40004 6.73317 7.00004 5.99984 7.00004Z" fill="#7B7B7B"/>
                </svg>
                <p class="mb-0 fw-bold ms-2">{{ $event->location }}</p>
            </div>
            <div class="fw-medium ms-3">{{ date('M d', strtotime($event->date)) }} {{ date('H:i A', strtotime($event->time)) }}</div>
        </div>
    </div>
</div>
