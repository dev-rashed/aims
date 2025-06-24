@extends('layouts.frontend.app')

@section('meta_keywords', $course->keywords)
@section('meta_description', $course->short_description)

@section('title', $course->title)

@section('content')

<!-- Course Details Section Start -->
<x-frontend.section class="course-details-section">
    <div class="row">
        <div class="col-lg-8">
            <div>
                <span class="fw-bold bg-primary-100 rounded-10 px-4 py-2">{{ $course->type }} Course</span>
            </div>
            <div class="my-4">
                <h1 class="fs-1 fw-bold text-gray-800 line-h-60">{{ $course->title }}</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-6 col-xl-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="{{ uploadedFile($course->counsellor->image) }}" class="w-60 h-60 rounded-100" alt="{{ $course->counsellor?->full_name }}" srcset="{{ uploadedFile($course->counsellor?->image) }}" />
                        </div>
                        <div class="ms-2">
                            <p class="fw-medium fs-14 text-gray-500 mb-0">Created by</p>
                            <p class="fw-bold fs-16 text-primary-700 mb-0">{{ $course->counsellor?->full_name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-xl-2 mb-3">
                    <p class="fw-medium fs-14 text-gray-500 mb-0">Last Updated</p>
                    <p class="fw-bold fs-16 text-primary-800 mb-0">{{ date('M d, Y', strtotime($course->updated_at)) }}</p>
                </div>
                <div class="col-6 col-xl-3 mb-3">
                    <p class="fw-medium fs-14 text-gray-500 mb-0">Review</p>
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
                </div>
                <div class="col-6 col-xl-3 mb-3">
                    <p class="fw-bold fs-16 text-gray-800 mb-0">
                        AIMS accredited
                        <br />
                        since October 2017
                    </p>
                </div>
            </div>

            <div class="mt-3">
                <img src="{{ uploadedFile($course->image) }}" class="w-100 rounded-20" alt="Course" srcset="{{ uploadedFile($course->image) }}" style="height: 400px" />
            </div>
        </div>
        <div class="col-lg-4 col-xxl-3 ms-xxl-auto mt-4 mt-lg-0">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body py-4 px-3 text-center">
                    <p class="fw-bold fs-22 text-primary-900">Course Details</p>
                    <p class="text-gray-700 fs-16">{{ $course->short_description }}</p>
                    <div class="row mt-5">
                        <div class="col-6 mb-4">
                            <div class="mx-auto w-40 h-40 rounded-10 bg-primary-100 d-flex align-items-center justify-content-center p-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2ZM0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10ZM10 4C10.5523 4 11 4.44772 11 5V9.58579L13.7071 12.2929C14.0976 12.6834 14.0976 13.3166 13.7071 13.7071C13.3166 14.0976 12.6834 14.0976 12.2929 13.7071L9.29289 10.7071C9.10536 10.5196 9 10.2652 9 10V5C9 4.44772 9.44771 4 10 4Z" fill="#062C59"/>
                                </svg>
                            </div>
                            <span class="fs-14 fw-medium text-gray-500 my-2">Duration</span>
                            <h6 class="fs-6 text-gray-800 fw-bold">{{ $course->duration }}</h6>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="mx-auto w-40 h-40 rounded-10 bg-primary-100 d-flex align-items-center justify-content-center p-2">
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 2C0 0.895432 0.89543 0 2 0H10C10.2652 0 10.5196 0.105357 10.7071 0.292893L15.7071 5.29289C15.8946 5.48043 16 5.73478 16 6V18C16 19.1046 15.1046 20 14 20H2C0.895432 20 0 19.1046 0 18V2ZM13.5858 6L10 2.41421V6H13.5858ZM8 2L2 2V18H14V8H9C8.44772 8 8 7.55228 8 7V2ZM11.7071 10.2929C12.0976 10.6834 12.0976 11.3166 11.7071 11.7071L7.70711 15.7071C7.31658 16.0976 6.68342 16.0976 6.29289 15.7071L4.29289 13.7071C3.90237 13.3166 3.90237 12.6834 4.29289 12.2929C4.68342 11.9024 5.31658 11.9024 5.70711 12.2929L7 13.5858L10.2929 10.2929C10.6834 9.90237 11.3166 9.90237 11.7071 10.2929Z" fill="#062C59"/>
                                </svg>
                            </div>
                            <span class="fs-14 fw-medium text-gray-500 my-2">Enrolled</span>
                            <h6 class="fs-6 text-gray-800 fw-bold">{{ $course->enrolls_count }}</h6>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="mx-auto w-40 h-40 rounded-10 bg-primary-100 d-flex align-items-center justify-content-center p-2">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 2.6335C2.13986 2.57696 2.308 2.51452 2.50288 2.45153C3.19213 2.22874 4.21301 2 5.5 2C6.78699 2 7.80787 2.22874 8.49712 2.45153C8.692 2.51452 8.86014 2.57696 9 2.6335V13.5129C8.14878 13.2485 6.96016 13 5.5 13C4.03984 13 2.85122 13.2485 2 13.5129V2.6335ZM10 0.885279C9.77428 0.78519 9.47653 0.666219 9.11225 0.548473C8.25463 0.271262 7.02551 0 5.5 0C3.97449 0 2.74537 0.271262 1.88775 0.548473C1.45896 0.68707 1.12235 0.827363 0.886892 0.936562C0.769109 0.991186 0.676448 1.03812 0.610019 1.07329C0.576798 1.09089 0.550113 1.10555 0.530103 1.11679L0.505102 1.131L0.496382 1.13607L0.492972 1.13807L0.491505 1.13893C0.489539 1.1401 0.245103 1.28495 0.490198 1.13971C0.186333 1.31978 0 1.64679 0 2V15C0 15.3593 0.192752 15.691 0.504925 15.8689C0.816899 16.0466 1.20021 16.0435 1.50921 15.8606C1.50648 15.8622 1.50477 15.8632 1.50477 15.8632L1.50609 15.8625L1.50765 15.8616L1.50921 15.8606C1.51529 15.8572 1.52757 15.8505 1.54599 15.8408C1.58283 15.8213 1.64398 15.7901 1.72834 15.7509C1.89718 15.6726 2.15822 15.5629 2.50288 15.4515C3.19213 15.2287 4.21301 15 5.5 15C6.78699 15 7.80787 15.2287 8.49712 15.4515C8.84178 15.5629 9.10282 15.6726 9.27166 15.7509C9.35602 15.7901 9.41717 15.8213 9.45401 15.8408C9.47243 15.8505 9.48474 15.8573 9.49083 15.8608C9.49357 15.8623 9.49523 15.8632 9.49523 15.8632M9.49523 15.8632L9.49391 15.8625L9.49235 15.8616L9.49083 15.8608C9.80477 16.0462 10.1954 16.0463 10.5092 15.8606C10.5153 15.8572 10.5276 15.8505 10.546 15.8408C10.5828 15.8213 10.644 15.7901 10.7283 15.7509C10.8972 15.6726 11.1582 15.5629 11.5029 15.4515C12.1921 15.2287 13.213 15 14.5 15C15.787 15 16.8079 15.2287 17.4971 15.4515C17.8418 15.5629 18.1028 15.6726 18.2717 15.7509C18.356 15.7901 18.4172 15.8213 18.454 15.8408C18.4724 15.8505 18.4847 15.8573 18.4908 15.8608L18.4919 15.8613C18.8007 16.0435 19.1835 16.0464 19.4951 15.8689C19.8072 15.691 20 15.3593 20 15V2C20 1.64679 19.8137 1.31978 19.5098 1.13971L19.5085 1.13893L19.507 1.13807L19.5036 1.13607L19.4949 1.131L19.4699 1.11679C19.4499 1.10555 19.4232 1.09089 19.39 1.07329C19.3236 1.03812 19.2309 0.991186 19.1131 0.936562C18.8776 0.827363 18.541 0.68707 18.1123 0.548473C17.2546 0.271262 16.0255 0 14.5 0C12.9745 0 11.7454 0.271262 10.8877 0.548473C10.5235 0.666219 10.2257 0.78519 10 0.885279M18 2.6335V13.5129C17.1488 13.2485 15.9602 13 14.5 13C13.0398 13 11.8512 13.2485 11 13.5129V2.6335C11.1399 2.57696 11.308 2.51452 11.5029 2.45153C12.1921 2.22874 13.213 2 14.5 2C15.787 2 16.8079 2.22874 17.4971 2.45153C17.692 2.51452 17.8601 2.57696 18 2.6335ZM18.4908 2.86075C18.4935 2.86228 18.4952 2.86325 18.4952 2.86325L18.4939 2.86248L18.4908 2.86075ZM18.4908 15.8608L18.4941 15.8626L18.4919 15.8613" fill="#062C59"/>
                                </svg>
                            </div>
                            <span class="fs-14 fw-medium text-gray-500 my-2">Language</span>
                            <h6 class="fs-6 text-gray-800 fw-bold">{{ $course->language->name }}</h6>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="mx-auto w-40 h-40 rounded-10 bg-primary-100 d-flex align-items-center justify-content-center p-2">
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5 1.1C19.2 0.9 18.8 0.9 18.5 1.1L14.1 4.1V2C14.1 0.9 13.2 0 12.1 0H2C0.9 0 0 0.9 0 2V12C0 13.1 0.9 14 2 14H12C13.1 14 14 13.1 14 12V9.9L18.4 12.9C18.6 13 18.8 13.1 19 13.1C19.2 13.1 19.3 13.1 19.5 13C19.8 12.8 20 12.5 20 12.1V2C20 1.6 19.8 1.3 19.5 1.1ZM12 12H2V2H12V6V8V12ZM18 10.1L14 7.4V6.5L18 3.8V10.1Z" fill="#062C59"/>
                                </svg>
                            </div>
                            <span class="fs-14 fw-medium text-gray-500 my-2">Classes</span>
                            <h6 class="fs-6 text-gray-800 fw-bold">{{ $course->total_class }}</h6>
                        </div>
                    </div>
                    <h2 class="fs-2 fw-bold text-primary-500">{{ convertAmount($course->price) }}</h2>
                    <a href="{{ route('course.enroll', $course->slug) }}" class="btn bg-primary-500 rounded-10 px-5 py-2 text-white mt-5">Enroll Now</a>
                </div>
            </div>
        </div>

        @if ($course->type === 'Online')
            <!-- Course Overview Start -->
            <div class="col-lg-8 mt-5">
                <div class="mb-4">
                    <h3 class="fs-3 fw-bold text-primary-900">Course content</h3>
                    <p class="fs-16 text-gray-800 mb-0">{{ $course->modules->count() }} sections • {{ course_lecture_count($course->modules)}} lectures • {{ course_lecture_length($course->modules) }} total length</p>
                </div>
                <div class="accordion" id="accordionExample">
                    @foreach ($course->modules as $key => $module)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="module{{ $key }}">
                                <button @class(['accordion-button text-primary-900 fw-bold', 'collapsed' => $key !== 0]) type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                    {{ $module->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $key }}" @class(['accordion-collapse collapse', 'show' => $key == 0]) aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @foreach (json_decode($module->lectures) as $lecture)
                                        <div @class(['d-flex justify-content-between align-items-center', 'mb-3' => !$loop->last])>
                                            <div class="">
                                                <p class="fs-16 mb-0 text-gray-800">{{ $lecture?->title }}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="fs-16 mb-0 text-gray-500">{{ gmdate('i:s', $lecture?->duration) }}</p>
                                                @if ($lecture->status)
                                                    <svg data-id="{{ $lecture?->video_id }}" id="previewLecture" style="cursor: pointer;" class="ms-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.80952 5.51713C7.6512 5.55547 7.44708 5.66865 7.32483 5.78593C7.18754 5.91762 7.06039 6.13653 7.02424 6.30352C7.00685 6.38384 6.99976 7.38956 7.00001 9.74937C7.00036 13.3914 6.99469 13.2263 7.12755 13.4643C7.38322 13.9224 8.01735 14.1299 8.50423 13.9148C8.73982 13.8107 14.0394 10.6258 14.1714 10.509C14.3997 10.3069 14.5172 10.0203 14.498 9.71204C14.4785 9.39973 14.3467 9.15319 14.0939 8.95618C14.021 8.8994 13.0699 8.31709 11.9802 7.66219C10.8906 7.00726 9.67468 6.27625 9.27819 6.03772C8.88171 5.79916 8.50319 5.58295 8.43702 5.55724C8.29976 5.50389 7.95526 5.48186 7.80952 5.51713Z" fill="#1973A0"/>
                                                        <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#53BCD6"/>
                                                    </svg>
                                                @else
                                                    <svg class="ms-3" width="16" height="16" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 2C9.64772 2 11 3.35228 11 5V8H5V5C5 3.35228 6.35228 2 8 2ZM13 8V5C13 2.24772 10.7523 0 8 0C5.24771 0 3 2.24772 3 5V8H2C0.895431 8 0 8.89543 0 10V18C0 19.1046 0.895432 20 2 20H14C15.1046 20 16 19.1046 16 18V10C16 8.89543 15.1046 8 14 8H13ZM2 10H14V18H2V10Z" fill="#1973A0"/>
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Course Overview End -->

            <x-frontend.video-modal name="previewModal" size="md">
                <iframe src="" width="100%" height="400" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </x-frontend.video-modal>
        @endif

    </div>
</x-frontend.section>
<!-- Course Details Section End -->

<!-- Related Course Section Start -->
<x-frontend.section class="course-section" id="advanced-course">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h3 class="fs-3 fw-bold text-primary-900">Related Course</h3>
        </div>
        <x-frontend.carousel-button />
    </div>
    <div class="row align-items-center">

        <div class="col-12 mt-4">
            <div class="owl-carousel owl-theme">
                @foreach ($courses as $course)
                    <x-frontend.course-card :course="$course" />
                @endforeach
            </div>
        </div>

    </div>
</x-frontend.section>
<!-- Related Course Section End -->

@endsection
