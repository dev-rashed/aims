@extends('layouts.user.app')

@section('title', ucfirst($type).' Membership')

@section('content')
    <div>
        <form id="submit" action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data" data-redirect="{{ route('members.index') }}">
            @csrf

            <input type="hidden" name="card" value="{{ isset($data['card']) ? encrypt($data['card']->id) : '' }}">
            <input type="hidden" name="type" id="type" class="form-control" value="{{ $type }}">

            <div class="grid grid-cols-1 gap-6">

                <x-user.form-group label="membership_plan" isType="select" column="col-span-2" :disabled="$type == 'cancel'">
                    <option value="">Select membership plan</option>
                    @foreach ($membershipPlans as $membershipPlan)
                        <option value="{{ $membershipPlan->slug }}" @selected(auth()->user()->therapist?->membership_id == $membershipPlan->id)>
                            {{ $membershipPlan->name }}</option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="membership_type" isType="select" column="col-span-2" :disabled="$type == 'cancel'">
                    @foreach (['monthly', 'yearly'] as $type)
                        <option value="{{ $type }}" @selected(auth()->user()->therapist?->membership_type === $type)> {{ ucfirst($type) }}</option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="note" isType="textarea" :required="false" column="col-span-2" />

                <div class="md:col-span-2">
                    <x-user.submit-button label="Update" />
                </div>
            </div>
        </form>
    </div>
@endsection
