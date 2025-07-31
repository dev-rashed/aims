@extends('layouts.frontend.app')

@section('meta_keywords', $article->keywords)
@section('meta_description', $article->short_description)

@section('title', $article->title)

@section('content')
    <!-- Article Details Section Start -->
    <x-frontend.section class="article-details-section">
        <div class="row gy-5">
            <div class="col-12">
                <div class="card border-0 rounded-20 bg-primary-100">
                    <div class="card-body p-5">
                        <div class="row align-items-end">
                            <div class="col-lg-6 mb-4">
                                <h1 class="fs-1 text-primary-500">{{ $article->title }}</h1>
                                <div class="details-info">
                                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('build/assets/frontend/images/pen.png') }}"
                                                alt="Writen By" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0 text-yellow">Writen By</p>
                                            <p class="mb-0">{{ $article->counsellor?->full_name }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('build/assets/frontend/images/globe.png') }}"
                                                alt="Posted" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0 text-yellow">Posted</p>
                                            <p class="mb-0">{{ $article->created_at->format('dS F Y') }}</p>
                                        </div>
                                    </div>
                                    @if ($article->read_time !== null)
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('build/assets/frontend/images/book.png') }}"
                                                    alt="Read Time" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="mb-0 text-yellow">Read Time</p>
                                                <p class="mb-0">{{ $article->read_time }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="">
                                    {!! $article->short_description !!}
                                </div>
                            </div>
                            <div class="col-lg-5 ms-lg-auto">
                                <img src="{{ uploadedFile($article->image) }}" class="details-image rounded-20"
                                    alt="{{ $article->counsellor?->full_name }}"
                                    srcset="{{ uploadedFile($article->image) }}">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                {!! $article->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border-0 rounded-20 bg-primary-100">
                    <div class="card-body p-5">
                        <div class="row gy-4">
                            <div class="col-sm-6 col-xl-3 align-self-end">
                                <div class="section-heading">
                                    <h1 class="fs-1 heading text-primary-500 heading-after mb-0 mt-2">
                                        <span class="d-xl-block">Read</span>
                                        <span class="text-yellow">More</span>
                                    </h1>
                                </div>
                            </div>
                            @foreach ($articles as $article)
                                <div class="col-sm-6 col-xl-3">
                                    <a href="{{ route('article.details', $article->slug) }}">
                                        <div class="card border-0 rounded-20 bg-gray-100 h-100">
                                            <img src="{{ uploadedFile($article->image) }}" alt="{{ $article->title }}"
                                                class="article-img" srcset="{{ uploadedFile($article->image) }}" />
                                            <div class="card-body px-4">
                                                <h5 class="fw-medium card-title text-primary-700">{{ $article->title }}
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.section>
    <!-- Article Details Section End -->

@endsection
@push('css')
    <style>
        ul li {
            margin-bottom: 8px;
            color: #000000 !important;
        }

        .article-details-section .details-image Specificity: (0, 2, 0) {
            width: 100%;
            height: 321px;
            -o-object-fit: cover;
            object-fit: fill;
        }
    </style>
@endpush
