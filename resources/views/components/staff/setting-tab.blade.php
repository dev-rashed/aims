@props(['name', 'icon', 'active' => false])

<li class="nav-item" role="presentation">
    <a @class(['nav-link', 'active' => $active]) data-bs-toggle="pill" href="#primary-pills-{{ $name }}" role="tab" aria-selected="false">
        <div class="d-flex align-items-center">
            <div class="tab-icon">
                <i class='bx {{ $icon }} font-18 me-1'></i>
            </div>
            <div class="tab-title text-capitalize">{{ str_replace('_', ' ', $name) }}</div>
        </div>
    </a>
</li>
