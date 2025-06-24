@extends('mail.layout')

@section('content')
    <div class="">
        @if (!$isAdmin)
            <p><strong>Hi {{ $user?->full_name }}</strong>,</p>
        @endif

        <div class="details">
            <p style="margin-top: 10px">
                @if (!$isAdmin)
                    {{ auth()->user()->full_name }} send you contact mail.
                @else
                    {{ auth()->user()->full_name }} send a contact mail to {{ $user?->full_name}}.
                @endif
            </p>
            <p style="margin-top: 10px">
                <strong>Message:</strong> {{ $request->message }}
            </p>
        </div>

        <div style="margin-top: 10px">
            We look forward to serving you, please don’t hesitate to contact us for any questions or concerns.
        </div>
    </div>
@endsection
