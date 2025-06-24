@props(['review'])
<div class="card shadow-sm rounded-10 border-0 h-100 bg-white">
    <div class="card-body">
        <div class="d-flex flex-column flex-xl-row align-items-xl-center">
            <div class="flex-shrink-0 mb-4">
                <div class="d-flex align-items-center">
                    <img src="{{ uploadedFile($review->image)}}" class="bg-primary-100 w-60 h-60 rounded-100" alt="{{ $review->name }}" secret="{{ uploadedFile($review->image)}}" />
                    <div class="px-3">
                        <h6 class="fs-6 text-gray-900 fw-bold mb-0">{{ $review->name }}</h6>
                        <div class="d-flex align-items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="me-1">
                                    <svg width="10" height="9" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.55868 10.8879C6.82175 10.6964 7.17825 10.6964 7.44132 10.8879L10.0756 12.805C10.6635 13.2329 11.4552 12.6577 11.23 11.9663L10.224 8.87727C10.1224 8.56554 10.2351 8.224 10.5023 8.03393L13.0873 6.19445C13.6823 5.77103 13.3827 4.83337 12.6524 4.83337H9.47964C9.15405 4.83337 8.86564 4.6233 8.76578 4.31339L7.71386 1.04879C7.49046 0.355485 6.50954 0.355484 6.28614 1.04879L5.23422 4.31339C5.13436 4.6233 4.84595 4.83337 4.52036 4.83337H1.34756C0.617251 4.83337 0.317688 5.77103 0.912727 6.19445L3.49775 8.03393C3.76486 8.224 3.87757 8.56554 3.77604 8.87726L2.76997 11.9663C2.5448 12.6577 3.33652 13.2329 3.92443 12.805L6.55868 10.8879Z" fill="{{ $review->rating >= $i ? '#2393BB' : '#333333' }}"/>
                                    </svg>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="ps-3 tes-text">
                    <p class="mb-0 text-gray-900 fw-bold fs-16">{{ $review->title }}</p>
                    <p class="mb-0 text-gray-600 fw-medium fs-14">{{ $review->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
