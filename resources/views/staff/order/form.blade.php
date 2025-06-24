@extends('layouts.staff.app')

@section('title', isset($page) ? 'Update page':'Add New page')

@push('css')
    <link href="{{ asset('build/assets/staff') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endpush

@section('content')

    <x-staff.page :title="isset($page) ? 'Update page':'Add New page'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.page.index')" title="Back to page" icon="back" class="btn-danger me-2" />
            @isset($page)
                @can('show_page')
                    <x-staff.page-button :href="route('staff.page.show', $page->id)" title="page Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="submit" action="{{isset($page) ? route('staff.page.update', $page->id) : route('staff.page.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.page.index') }}">
            @csrf
            @isset($page)
                @method('PUT')
            @endisset

            <x-staff.form-group
                label="name"
                placeholder="Enter page name"
                :value="$page->name ?? ''"
            />

            <x-staff.form-group
                label="title"
                placeholder="Enter page title"
                :value="$page->title ?? ''"
            />

            <x-staff.form-group label="description" :isInput="false">
                <textarea name="description" id="description" cols="5" class="form-control text-editor">{{ $page->description ?? '' }}</textarea>
            </x-staff.form-group>

            <x-staff.form-group
                label="meta_keywords"
                placeholder="Enter page meta keywords"
                data-role="tagsinput"
                :value="$page->meta_keywords ?? ''"
            />

            <x-staff.form-group
                label="meta_title"
                placeholder="Enter page meta title"
                :value="$page->meta_title ?? ''"
            />

            <x-staff.form-group label="meta_description" :isInput="false">
                <textarea name="meta_description" id="meta_description" cols="5" class="form-control">{{ $page->meta_description ?? '' }}</textarea>
            </x-staff.form-group>


            <x-staff.submit-button :text="isset($page) ? 'Update':'Submit'" />

        </form>

    </x-staff.page>

@endsection

@push('js')
    <script src="{{ asset('build/assets/staff') }}/plugins/input-tags/js/tagsinput.js"></script>
@endpush
