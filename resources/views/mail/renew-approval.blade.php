@extends('mail.layout')

@section('content')
    <div class="">
        <p><strong>Hi {{ $renew->user?->full_name }}</strong>,</p>

        <div class="details">
            <p style="margin-top: 10px">You have request your account for {{ $renew->type }}.</p>
        </div>

        @if ($renew->type !== 'cancel')
            <div class="details">
                <h5 style="font-size: 25px"><strong>Membership Information:</strong></h5>
                <p><strong>Membership Plan</strong>: {{ $renew->membership->name }}({{ $renew->membership_type }})</p>
                <p><strong>Membership Expire</strong>: {{ formatDate($renew->user?->therapist?->membership_expire) }}</p>
            </div>
        @endif

        <div style="margin-top: 10px">
            We look forward to serving you, please don’t hesitate to contact us for any questions or concerns.
        </div>
    </div>
@endsection
