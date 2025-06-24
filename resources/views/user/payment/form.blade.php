@extends('layouts.user.app')

@section('title', 'Payment')

@section('content')
    <div>
        <form id="submit" action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data" data-redirect="{{ route('payment.index') }}">
            @csrf

            <input type="hidden" name="card" value="{{ isset($data['card']) ? encrypt($data['card']->id) : '' }}">

            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-2">
                    Amount:
                    {{ convertAmount(paymentAmount()) }}
                </div>
                <div class="col-span-2">
                    <div class="border px-2 rounded">
                        <div id="card_element" class="py-4 px-2" data-key="{{ config('services.stripe.key') }}"></div>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <x-user.submit-button label="Pay Now" />
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
