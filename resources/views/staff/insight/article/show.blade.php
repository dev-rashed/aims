@extends('layouts.staff.app')

@section('title', 'Insights Details')

@section('content')

    <x-staff.page title="insights Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.article.index')" title="Back to insights" icon="back" class="btn-danger me-2" />
            @isset($article)
                @can('edit_article')
                    <x-staff.page-button :href="route('staff.article.edit', $article->id)" title="Edit insights" icon="edit" />
                @endcan
            @endisset
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="10%">Contributor</th>
                    <td>{{ $article->counsellor?->full_name }}</td>
                </tr>
                <tr>
                    <th>Categories</th>
                    <td>
                        <ul>
                            @foreach ($article->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $article->title }}</td>
                </tr>
                <tr>
                    <th>Tags</th>
                    <td>{{ $article->tags }}</td>
                </tr>
                <tr>
                    <th>Read Time</th>
                    <td>{{ $article->read_time }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ uploadedFile($article->image) }}" class="img-fluid" alt="{{ $article->title }}" srcset="{{ uploadedFile($article->image) }}" />
                    </td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{!! $article->short_description !!}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $article->description !!}</td>
                </tr>
            </tbody>
        </table>

    </x-staff.page>

@endsection
