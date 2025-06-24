@extends('layouts.frontend.app')

@section('content')

<!-- Article Section Start -->
<x-frontend.section class="article-section">
    <div class="row">
        <div class="col-lg-8">
            <div class="section-heading">
                <p class="sub-heading mb-0 text-yellow">BROWSE</p>
                <h1 class="heading text-primary-500 heading-after mb-0 mt-2">All our Articles & Blogs</h1>
            </div>
        </div>
    </div>
    <div class="row mt-5 g-5">
        <div class="col-lg-3">
            <div class="card bg-primary-100 border-0 rounded-20 category-card">
                <div class="card-body px-4 py-5">
                    <h3 class="card-title article_insight_cat_title">Categories</h3>
                    <form action="{{ route('article.index') }}" method="get" id="articleForm">
                        @foreach ($data->categories as $category)
                            <div class="form-check mb-2 d-flex align-items-center">
                                <input class="form-check-input" name="categories[]" type="checkbox" value="{{ $category->slug }}" id="{{ $category->slug }}">
                                <label class="form-check-label ms-2 mt-1 text-primary-500" for="{{ $category->slug }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-9" id="articleData">
            @include('frontend.article.data', ['articles' => $articles])
        </div>

    </div>
</x-frontend.section>
<!-- Article Section End -->

@endsection
