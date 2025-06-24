@props(['title', 'button', 'size' => 'md', 'disabled' => false])

<div class="modal fade" id="form_modal">
    <div class="modal-dialog modal-{{ $size }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form {{ $attributes->merge(['method' => 'post', 'id' => 'submit']) }}>
                @csrf
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @isset($button)
                        <x-staff.submit-button :text="$button" :disabled="$disabled" />
                    @endisset
                </div>
            </form>

        </div>
    </div>
</div>
