@extends('layouts.staff.app')

@section('title', 'Page Details')

@section('content')

    <x-staff.page title="Page Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.page.index')" title="Back to page" icon="back" class="btn-danger me-2" />
            @isset($page)
                @can('edit_page')
                    <x-staff.page-button :href="route('staff.page.edit', $page->id)" title="Edit page" icon="edit" />
                @endcan
            @endisset
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="10%">Name</th>
                    <td>{{ $page->name }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $page->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $page->description !!}</td>
                </tr>
                <tr>
                    <th>Meta Keywords</th>
                    <td>{{ $page->meta_keywords }}</td>
                </tr>
                <tr>
                    <th>Meta Title</th>
                    <td>{{ $page->meta_title }}</td>
                </tr>
                <tr>
                    <th>Meta Description</th>
                    <td>{{ $page->meta_description }}</td>
                </tr>
            </tbody>
        </table>

    </x-staff.page>

@endsection
