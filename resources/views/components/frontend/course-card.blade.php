@props(['course'])

<div class="card shadow-lg rounded-10 border-0">
    <img src="{{ uploadedFile($course->image) }}" class="img-fluid w-100 rounded-t-10 rounded-r-10" alt="{{ $course->title }}" srcset="{{ uploadedFile($course->image) }}" />
    <div class="card-body text-center">
        <p class="fs-20 fw-bold text-gray-800 mb-0">{{ Str::limit($course->title, 50, '...') }}</p>
        <p class="text-gray-600 fs-16 fw-bold my-2">January 11, 2022</p>
        <p class="text-gray-500 fs-16 mb-0">{{ Str::limit($course->short_description, 90, '...') }}</p>
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="me-2">
                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.55868 10.8879C6.82175 10.6964 7.17825 10.6964 7.44132 10.8879L10.0756 12.805C10.6635 13.2329 11.4552 12.6577 11.23 11.9663L10.224 8.87727C10.1224 8.56554 10.2351 8.224 10.5023 8.03393L13.0873 6.19445C13.6823 5.77103 13.3827 4.83337 12.6524 4.83337H9.47964C9.15405 4.83337 8.86564 4.6233 8.76578 4.31339L7.71386 1.04879C7.49046 0.355485 6.50954 0.355484 6.28614 1.04879L5.23422 4.31339C5.13436 4.6233 4.84595 4.83337 4.52036 4.83337H1.34756C0.617251 4.83337 0.317688 5.77103 0.912727 6.19445L3.49775 8.03393C3.76486 8.224 3.87757 8.56554 3.77604 8.87726L2.76997 11.9663C2.5448 12.6577 3.33652 13.2329 3.92443 12.805L6.55868 10.8879Z" fill="#FFCC00"/>
                        </svg>
                    </div>
                @endfor
                <p class="fw-bold mb-0 fs-16">4.5</p>
            </div>
            <p class="fs-22 fw-bold mb-0 text-primary-500">{{ convertAmount($course->price) }}</p>
        </div>
        <a href="{{ route('course.details', $course->slug) }}" class="border-top-1 border-gray-200 d-block text-center text-gray-700 fw-bold fs-14 py-2 mt-2">Start Course</a>
    </div>
</div>
