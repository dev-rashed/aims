@props(['icon' => null, 'title'])

@php
    if($icon == 'add') $disIcon = 'bx-plus-circle';
    elseif($icon == 'upload') $disIcon = 'fa-upload';
    elseif($icon == 'download') $disIcon = 'fa-download';
    elseif($icon == 'back') $disIcon = 'bx-arrow-back';
    elseif($icon == 'edit') $disIcon = 'bxs-edit';
    elseif($icon == 'show') $disIcon = 'bx-show';
    elseif($icon == 'delete') $disIcon = 'bx-trash';
    elseif($icon == 'reload') $disIcon = 'fa-rotate';
    elseif($icon == 'print') $disIcon = 'fa-print';
    else $disIcon = '';
@endphp

<a {{ $attributes->merge(['class' => 'btn btn-primary text-capitalize', ]) }}>
    @if ($icon != null) <i class="bx {{ $disIcon }}"></i> @endif
    {{ $title }}
</a>