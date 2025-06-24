@props(['text' => 'Submit'])

<div @class(['text-end'])>
    <button {{ $attributes->merge(['class' => 'btn btn-primary px-5', 'id' => '', 'type' => 'submit', 'data-text' => $text]) }}>
        <span class="spinner-border spinner-border-sm d-none" id="submit-spinner" role="status" aria-hidden="true"></span>
        {{ $text }}
    </button>
</div>
