@extends('layouts.staff.app')

@section('title', 'Aims Team')

@section('content')

    <x-staff.page title="Aims Team" column="col-md-10 mx-auto">

        <form class="mt-2" id="fileForm" action="{{ route('staff.team.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="mt-3">
                <x-staff.form-group label="title" :value="setting('team_title')" />
            </div>

            <div class="mt-3">
                <x-staff.form-group label="description" :isInput="false">
                    <textarea name="description" id="description" cols="5" class="form-control text-editor">{{ setting('team_description') }}</textarea>
                </x-staff.form-group>
            </div>

            <div class="col-12 mb-3">
                <x-staff.page-button href="javascript:void(0)" title="Add more" icon="add" id="addItem" />
            </div>

            <div id="items" data-item='@include('staff.frontend.team.item')'>
                @if (!empty(setting('team_items')))
                    @foreach (json_decode(setting('team_items')) as $key => $item)
                        @include('staff.frontend.team.item')
                    @endforeach
                @endif
            </div>

            <x-staff.submit-button text="Update" />
        </form>
    </x-staff.page>
@endsection
