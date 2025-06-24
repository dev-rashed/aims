@php
    $currency = session()->get('currency');
    if (empty($currency)) {
        $currency = \App\Models\Currency::query()->where('id', setting('currency_symbol'))->first();
    }
@endphp
<input type="hidden" name="currency" value='@json($currency)'>
<input type="hidden" name="currency_position" value="{{ setting('currency_position') }}">
<input type="hidden" name="formatDate" value="{{ setting('formatDate') }}">
