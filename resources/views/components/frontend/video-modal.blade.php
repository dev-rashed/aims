@props(['name', 'title' => null, 'size' => 'xl'])

<div class="modal fade" id="{{ $name }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $name }}Label" aria-hidden="true">
    {{--  modal-dialog-centered --}}
    <div class="modal-dialog modal-{{ $size }} modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
