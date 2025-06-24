@extends('layouts.staff.app')

@section('title', isset($courseModule) ? 'Update course module':'Add New course module')

@push('css')
    <style>
        .vimeo-container {
            background-color: #fff;
            position: absolute!important;
            z-index: 1000;
            border-radius: 2px;
            border-top: 1px solid #d9d9d9;
            font-family: Arial,sans-serif;
            box-shadow: 0 2px 6px rgb(0 0 0 / 30%);
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden auto;
            width: 100%;
            max-height: 300px;
            transition: 0.3s;
            display: none
        }
        .vimeo-item {
            cursor: pointer;
            padding: 0 4px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            line-height: 30px;
            text-align: left;
            border-top: 1px solid #e6e6e6;
            font-size: 11px;
            color: #515151;
        }
        .vimeo-item:hover {
            background-color: #fafafa;
        }
    </style>
@endpush

@section('content')

    <x-staff.page :title="isset($courseModule) ? 'Update course module':'Add New course module'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.course-module.index')" title="Back to course" icon="back" class="btn-danger me-2" />
            @isset($courseModule)
                @can('show_course')
                    <x-staff.page-button :href="route('staff.course-module.show', $courseModule->id)" title="course Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{isset($courseModule) ? route('staff.course-module.update', $courseModule->id) : route('staff.course-module.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.course-module.index') }}" enctype="multipart/form-data">
            @csrf
            @isset($courseModule)
                @method('PUT')
            @endisset

            <x-staff.form-group label="course" :isInput="false">
                <select name="course" id="course" class="form-control single-select">
                    <option value="">Select course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @isset($courseModule) @selected($courseModule->course_id == $course->id) @endisset>{{ $course->title }}</option>
                    @endforeach
                </select>
            </x-staff.form-group>

            <div>
                @if (!isset($courseModule))
                    <div class="text-end mb-1">
                        <x-staff.page-button href="#" title="Add course module" icon="add" id="addModule" data-element="{{ view('staff.course-module.module', ['courseModule' => $courseModule ?? null])->render() }}" />
                    </div>
                @endif

                <div id="modules">
                    @include('staff.course-module.module', ['courseModule' => $courseModule ?? null])
                </div>

            </div>

            <x-staff.submit-button :text="isset($courseModule) ? 'Update':'Submit'" />

        </form>

    </x-staff.page>

@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $(document).on('click', '#addModule', function(e) {
                e.preventDefault();
                const element = $(this).data('element');
                $('#modules').append(element)
                updateProductItemKey()
            });

            $(document).on('click', '#addLecture', function(e) {
                e.preventDefault();

                const element = $(this).data('element');
                $(this).parents('#lectures').find('table tbody').append(element)
                updateProductItemKey()
            });

            const updateProductItemKey = (element = 'modules') => {
                const keys = ['title','video_id','duration','status']
                // const itemEl = element == 'items' ? 'colors' : 'carriages';
                const itemEl = 'lectures';

                $(`#modules fieldset[data-module]`).each(function(i) {
                    $(this).find(`.form-control.${element}__title`).siblings('label').attr('for', `${element}[${i}][title]`)
                    $(this).find(`.form-control.${element}__title`).attr('name', `${element}[${i}][title]`).attr('id', `${element}[${i}][title]`)
                    $(this).find(`.form-control.${element}__title`).siblings('.invalid-feedback').attr('id', `${element}[${i}][title]`)

                    $(this).find('tbody tr').each(function(index) {
                        $(this).find('#index_number').text(index + 1)
                        const el = $(this);
                        keys.forEach(key => {
                            el.find(`input.${itemEl}__${key}`).siblings('label').attr('for', `${element}[${i}][${itemEl}][${index}][${key}]`)
                            el.find(`input.${itemEl}__${key}`).attr('name', `${element}[${i}][${itemEl}][${index}][${key}]`).attr('id', `${element}[${i}][${itemEl}][${index}][${key}]`)
                            el.find(`input.${itemEl}__${key}`).siblings('.invalid-feedback').attr('id', `${element}[${i}][${itemEl}][${index}][${key}]`)
                        });
                    });
                })
            }

            $(document).on('click', '#removeLecture, #removeModule', function(e) {
                e.preventDefault();

                $(this).parent().parent().remove()

                updateProductItemKey()
            });
        });
    </script>
@endpush
