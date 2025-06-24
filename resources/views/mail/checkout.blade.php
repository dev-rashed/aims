@extends('mail.layout')

@section('content')
    <div class="">
        @if (!$isAdmin && $for != \App\Models\Payment::FOR_ORDER)
            <p><strong>Hi {{ $model->user?->full_name }}</strong>,</p>
        @endif

        @if ($for == \App\Models\Payment::FOR_ORDER)
            <div class="details">
                @if ($isAdmin)
                    <p class="message">Assalamu alaykum,</p>
                    <p class="message">A new membership application has come through from {{ $model->user?->full_name }}, please review by visiting <a href="{{ route('staff.application.show', $model->user?->id) }}">{{ route('staff.application.show', $model->user?->id) }}</a>.</p>
                @else
                    <p class="message">
                        Assalamu alaykum, thank you for applying for {{ $model->membershipPlan->name }} membership with AIMS. We will now review your application and reach out should we require any further information. You can expect to hear back from us within 14 days of your application regarding next steps.
                    </p>
                    <p class="message">
                        Should you have any questions or comments in addition to your application, please send us an email at info@aims.org.uk
                    </p>
                    <p><strong>Your <a href="{{ route('login', ['email' => $model->user?->email]) }}">login</a> credentials:</strong></p>
                    <p style="margin: 0">email: {{ $model->user?->email }}</p>
                    <p style="margin: 0">password: ********</p>
                @endif
            </div>
        @elseif($for == \App\Models\Payment::FOR_ENROLL)
            <p class="message">You have purchase a new course </p>
            <div class="details">
                <h5 style="font-size: 25px"><strong>Enroll Information:</strong></h5>
                <p><strong>Course Title</strong>: {{ $model->course->title }}</p>
                <p><strong>Subtotal</strong>: {{ convertAmount($model->subtotal) }}</p>
                <p><strong>Discount</strong>: {{ convertAmount($model->discount) }}</p>
                <p><strong>Total</strong>: {{ convertAmount($model->total) }}</p>
                <p><strong>Address </strong>: {{ $model->address }}</p>
            </div>
        @elseif($for == \App\Models\Payment::FOR_BOOKING)
            <p class="message">You have booking a new event </p>
            <div class="details">
                <h5 style="font-size: 25px"><strong>Event Information:</strong></h5>
                <p><strong>Event Title</strong>: {{ $model->event->title }}</p>
                <p><strong>Subtotal</strong>: {{ convertAmount($model->subtotal) }}</p>
                <p><strong>Discount</strong>: {{ convertAmount($model->discount) }}</p>
                <p><strong>Total</strong>: {{ convertAmount($model->total) }}</p>
                <p><strong>Location </strong>: {{ $model->event->location }}</p>
                <p><strong>Date </strong>: {{ formatDate($model->event->date) }}</p>
                <p><strong>Time </strong>: {{ $model->event->time }}</p>
            </div>
        @endif

        @if ($for != \App\Models\Payment::FOR_ORDER)
            <div>
                We look forward to serving you, please don’t hesitate to contact us for any questions or concerns.
            </div>
        @endif
    </div>
@endsection
