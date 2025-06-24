@extends('mail.layout')

@section('content')
    <div class="">
        <div class="details">
            <p class="message">Assalamu alaykum,</p>
        </div>

        <div class="details">
            <p class="message">
                @if ($renew->type == 'upgrade')
                    Thank you for requesting an update to your membership. We are currently reviewing your request and will be in touch with you for further information if required. You can expect to hear back from us within 14 days.
                @else
                    Thank you for requesting a renewal of your membership with AIMS. We are currently reviewing your request and will be in touch with you for further information if required. You can expect to hear back from us within 14 days.
                @endif
            </p>
        </div>

        <div class="details">
            <p class="message">
                Should you have any questions or additional comments, please do not hesitate to reach out to us at info@aims.org.uk
            </p>
        </div>
    </div>
@endsection
