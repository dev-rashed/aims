@extends('layouts.staff.app')

@section('title', isset($article) ? 'Update insights':'Add New insights')

@push('css')
    <link href="{{ asset('build/assets/staff') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endpush

@section('content')

    <x-staff.page :title="isset($article) ? 'Update insights':'Add New insights'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.article.index')" title="Back to insights" icon="back" class="btn-danger me-2" />
            @isset($article)
                @can('show_article')
                    <x-staff.page-button :href="route('staff.article.show', $article->id)" title="insights Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{isset($article) ? route('staff.article.update', $article->id) : route('staff.article.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.article.index') }}">
            @csrf
            @isset($article)
                @method('PUT')
            @endisset

            <div class="row">

                <x-staff.form-group label="contributor" for="counsellor" :isInput="false" column="col-lg-6" :required="false">
                    <select name="counsellor" id="counsellor" class="form-control single-select">
                        <option value="">Select contributor</option>
                        @foreach ($data['counsellors'] as $counsellor)
                            <option value="{{ $counsellor->id }}" @isset($article) @selected($article->counsellor_id == $counsellor->id) @endisset>{{ $counsellor->full_name }}</option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="categories" :isInput="false" column="col-lg-6">
                    <select name="categories[]" id="categories" class="form-control multiple-select" multiple="multiple">
                        <option value="">Select categories</option>
                        @foreach ($data['categories'] as $category)
                            <option value="{{ $category->id }}"
                                @isset($article)
                                    @foreach ($article->categories as $articleCategory)
                                        @selected($category->id == $articleCategory->id)
                                    @endforeach
                                @endisset
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group
                    label="title"
                    placeholder="Enter article title"
                    :value="$article->title ?? ''"
                    column="col-lg-6"
                />

                <x-staff.form-group
                    label="read_time"
                    placeholder="Enter article read time"
                    :value="$article->read_time ?? ''"
                    :required="false"
                    column="col-lg-6"
                />

                <x-staff.form-group label="short_description" :isInput="false" column="col-12">
                    <textarea name="short_description" id="short_description" cols="5" class="form-control text-editor" placeholder="Article short description">{{ $article->short_description ?? '' }}</textarea>
                </x-staff.form-group>


                <x-staff.form-group label="description" :isInput="false" column="col-12">
                    <textarea name="description" id="description" cols="5" class="form-control text-editor">{{ $article->description ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group
                    label="tags"
                    placeholder="Enter article tags"
                    :value="$article->tags ?? ''"
                    data-role="tagsinput"
                    column="col-12"
                />

                <x-staff.form-group
                    label="image"
                    type="file"
                    column="col-12"
                    data-show-image="show_article_image"
                    :required="isset($article) ? false : true"
                />

                <div class="mb-4" column="col-12">
                    <img src="{{ isset($article) ? uploadedFile($article->image) : '' }}" id="show_article_image" class="img-fluid" />
                </div>
            </div>

            <x-staff.submit-button :text="isset($article) ? 'Update':'Submit'" />

        </form>

    </x-staff.page>

@endsection

@push('js')
    <script src="{{ asset('build/assets/staff') }}/plugins/input-tags/js/tagsinput.js"></script>
@endpush
