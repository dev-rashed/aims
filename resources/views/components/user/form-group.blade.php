@props([
    'label',
    'islabel'  => true,
    'for'      => null,
    'required' => true,
    'isType'   => 'input',
    'column'   => null,
    'question' => null
])

@php
    $htmlFor = $for != null ? $for : $label;
    $attr    = $attributes->class([
                            'form-control' => $attributes->get('type') !== 'file',
                            'is-invalid' => $errors->has($htmlFor),
                            'form-file' => $attributes->get('type') == 'file',
                        ])
                        ->merge([
                            'type'  => 'text',
                            'name'  => $htmlFor,
                            'id'    => $htmlFor,
                            'value' => $attributes->get('value') ?? old($htmlFor)
                        ]);
@endphp

<div @class([$column => $column != null])>
    @if ($islabel)
        <label for="{{ $htmlFor }}" class="block font-medium mb-2">
            {{ ucfirst(str_replace('_', ' ', $label)) }}
            @if ($required)
                <span class="text-warning">*</span>
            @endif
            @if ($question != null)
                <span class="text-warning">{{ $question }}</span>
            @endif
        </label>
    @endif
    @if ($isType == 'input')
        <input {{ $attr }} @required($required ? true : false) />
    @elseif($isType == 'textarea')
        <textarea {{ $attr }} @required($required ? true : false)>{{ $slot }}</textarea>
    @elseif($isType == 'select')
        <select {{ $attr }} @required($required ? true : false)>
            {{ $slot }}
        </select>
    @else
        {{ $slot }}
    @endif
    <small @class(['invalid-feedback text-warning', 'hidden' => !$errors->has($htmlFor)]) id="invalid_{{ $htmlFor }}">@error($htmlFor) {{ $message }} @enderror</small>
</div>
