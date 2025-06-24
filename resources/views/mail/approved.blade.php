@extends('mail.layout')

@section('regarding', $therapist->status == 'approved' ? 'Kind regards,' : 'Thank you,')

@section('content')
    <div class="">
        <div class="details">
            @if ($therapist->status == 'approved')
                <p class="message">Assalamu alaykum,</p>
                <p class="message">
                    Thank you for applying for membership with AIMS. Your application as {{ $therapist->membershipPlan?->name }} has been accepted. Please find your membership certificate attached and <a href="{{ route('directory.profile.index') }}">click here</a> to update your profile on our directory.
                </p>
                <p class="message">You can share your profile publicly using this link: <a href="{{ route('neurologist.details', $therapist->user?->username) }}">{{ route('neurologist.details', $therapist->user?->username) }}</a></p>
            @elseif ($therapist->status == 'rejected')
                <p class="message">Assalamu alaykum,</p>
                <p class="message">Thank you for applying for membership with AIMS, we appreciate your interest in upholding ethical standards in the mental health field.</p>
                <p class="message">Unfortunately, with the information provided we have been unable to approve your membership based on our criteria which can be found here <a href="{{ route('ethical.index') }}">{{ route('ethical.index') }}</a></p>
                <p class="message">You are welcome to reapply or reach out to us with further information to support your application if you would like us to reconsider.</p>
            @else
                <p class="message">Assalamu alaykum, thank you for applying for {{ $therapist->membershipPlan?->name }} membership with AIMS. We will now review your application and reach out should we require any further information. You can expect to hear back from us within 14 days of your application regarding next steps.</p>
                <p class="message">Should you have any questions or comments in addition to your application, please send us an email at info@aims.org.uk</p>
            @endif

            @if ($therapist->status != 'rejected')
                <p><strong>Your <a href="{{ route('login', ['email' => $therapist->user?->email]) }}">login</a> credentials:</strong></p>
                <p style="margin: 0">email: {{ $therapist->user?->email }}</p>
                <p style="margin: 0">password: ********</p>
            @endif
        </div>
    </div>
@endsection
