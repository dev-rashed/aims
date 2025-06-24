@extends('layouts.staff.app')

@section('title', 'Course module Details')

@section('content')
    <x-staff.page title="Course module Details">
        <x-slot name="header">
            <x-staff.page-button :href="route('staff.course-module.index')" title="Back to Course module" icon="back" class="btn-danger me-2" />
            @isset($courseModule)
                @can('edit_course')
                    <x-staff.page-button :href="route('staff.course-module.edit', $courseModule->id)" title="Edit Course module" icon="edit" />
                @endcan
            @endisset
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="10%">Course Title</th>
                    <td>{{ $courseModule->course->title }}</td>
                </tr>
                <tr>
                    <th>Module Title</th>
                    <td>{{ $courseModule->title }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Video</th>
                    <th>Duration</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($courseModule->lectures) as $lecture)
                    <tr>
                        <td>{{ $lecture?->title }}</td>
                        <td>
                            <a href="https://player.vimeo.com/video/{{ $lecture?->video_id }}" id="playVideo">Play Video</a>    
                        </td>
                        <td>{{ gmdate('H:i:s', $lecture?->duration) }}</td>
                        <td>{{ $lecture?->status ? 'Public':'Private' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-staff.page>

    <x-staff.form-modal title="Vimeo Video" size="xl">
        <iframe src="" width="100%" height="500" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </x-staff.form-modal>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#playVideo', function(e) {
                e.preventDefault();

                $('#form_modal iframe').attr('src', $(this).attr('href'))
                $('#form_modal').modal('show')

            });
        });
    </script>
@endpush
