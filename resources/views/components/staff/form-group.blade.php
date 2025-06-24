@props([
    'label',
    'for' => null,
    'required' => true,
    'isInput' => true,
    'column' => null,
    'question' => null,
])

@php $htmlFor = $for != null ? $for : $label; @endphp

<div @class(['mb-3', $column => $column != null])>
    <label for="{{ $htmlFor }}" class="form-label text-capitalize">
        {{ str_replace('_', ' ', $label) }}
        @if ($required)
            <span class="text-primary">*</span>
        @endif
        @if ($question !== null)
            (<span class="text-danger">{{ $question }}</span>)
        @endif
    </label>
    @if ($isInput)
        <input {{ $attributes->merge(['type' => 'text', 'class' => 'form-control', 'value' => '', 'name' => $htmlFor, 'id' => $htmlFor]) }} @required($required ? true : false) />
    @else
        {{ $slot }}
    @endif
    <div class="invalid-feedback" id="invalid_{{ $htmlFor }}"></div>
</div>
