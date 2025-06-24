@props(['url', 'type', 'id' => true, 'status' => false])

@php
    switch ($type) {
        case 'edit':
            $icon  = 'bxs-edit';
            $class = 'btn-success';
            break;
        case 'show':
            $icon  = 'bxs-show';
            $class = 'btn-info';
            break;
        case 'delete':
            $icon  = 'bxs-trash';
            $class = 'btn-danger';
            break;
        case 'approved':
            $icon  = 'bx-check';
            $class = 'btn-primary';
            break;
        default:
            $icon = strtolower($type);
            break;
    }
@endphp
<a href={{ $url }} id="{{ $id ? "{$type}Btn" : '' }}" @class(['btn', $class]) title="{{ ucfirst($type) }}">
    <i class='bx {{ $icon }}'></i>
</a>