@extends('layouts.staff.app')

@section('title', 'Aims Advisors')

@section('content')

    <x-staff.page title="Aims Advisors" column="col-md-10 mx-auto">

        <form class="mt-2" id="fileForm" action="{{ route('staff.advisor.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="mt-3">
                <x-staff.form-group label="title" :value="setting('advisor_title')" />
            </div>

            <div class="mt-3">
                <x-staff.form-group label="description" :isInput="false">
                    <textarea name="description" id="description" cols="5" class="form-control text-editor">{{ setting('advisor_description') }}</textarea>
                </x-staff.form-group>
            </div>

            <div class="col-12 mb-3">
                <x-staff.page-button href="javascript:void(0)" title="Add more" icon="add" id="addItem" />
            </div>

            <div id="items" data-item='@include('staff.frontend.advisor.item')'>
                @if (!empty(setting('advisor_items')))
                    @foreach (json_decode(setting('advisor_items')) as $key => $item)
                        @include('staff.frontend.advisor.item')
                    @endforeach
                @endif
            </div>

            <x-staff.submit-button text="Update" />
        </form>
    </x-staff.page>
@endsection
