@extends('layouts.staff.app')

@section('title', 'Profile')

@section('content')
<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ uploadedFile(auth('staff')->user()->image) }}" alt="{{ auth('staff')->user()->name }}" class="rounded-circle p-1 bg-primary" width="110" id="profile-picture">
                    <div class="mt-3">
                        <h4>{{ auth('staff')->user()->name }}</h4>
                        <p class="text-secondary mb-1">{{ auth('staff')->user()->role->name }}</p>
                        <p class="text-secondary mb-1">{{ auth('staff')->user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <form id="fileForm" action="{{ route('staff.profile.update') }}" method="post">
                    @csrf
                    @method('PUT')

                    <x-staff.form-group
                        label="name"
                        placeholder="Enter name"
                        :value="auth('staff')->user()->name"
                    />
                    <x-staff.form-group
                        label="email"
                        placeholder="Enter email"
                        :value="auth('staff')->user()->email"
                    />
                    <x-staff.form-group
                        label="phone"
                        placeholder="Enter phone"
                        :value="auth('staff')->user()->phone"
                    />
                    <x-staff.form-group label="address" :isInput="false">
                        <textarea name="address" id="address" cols="5" class="form-control">{{ auth('staff')->user()->address }}</textarea>
                    </x-staff.form-group>

                    <x-staff.form-group label="image" :isInput="false" :required="false">
                        <input type="file" name="image" id="image" class="form-control" data-show-image="profile-picture" />
                    </x-staff.form-group>

                    <x-staff.submit-button text="Save Changes" />

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
