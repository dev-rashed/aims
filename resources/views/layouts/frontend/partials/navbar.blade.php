<nav class="navbar navbar-expand-lg {{ request()->is('/') ? 'fixed-top' : 'sticky-top scrolling' }}">
    <div class="container">
        <div class="main-nav">

            <a class="navbar-brand" href="/">
                <img src="{{ uploadedFile(setting('footer_logo')) }}" id="logo" alt="" srcset="">
            </a>

            <div class="d-none d-lg-block" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    {{-- <x-frontend.nav-link name="Directory" @class(['active' => Request::is('directory*')])
                        href="{{ route('directory.index') }}" />

                    @guest
                        <x-frontend.nav-link name="Membership" @class(['active' => Request::is('membership*')])
                            href="{{ route('membership.index') }}" />
                    @endguest --}}
                    {{-- <x-frontend.nav-link
                        name="Education"
                        @class(['active' => Request::is('course*')])
                        href="javascript:void(0)"
                        :submenu="true"
                    >
                        <ul class="dropdown-menu ">
                            <li><a href="{{ route('course.index') }}?type=online" class="nav-link">Learning Hub</a></li>
                            <li><a href="{{ route('course.index') }}?type=advanced" class="nav-link">Professional Courses</a></li>
                        </ul>
                    </x-frontend.nav-link> --}}
                    {{-- <x-frontend.nav-link name="Insights" @class(['active' => Request::is('insight*')])
                        href="{{ route('article.index') }}" />
                    <x-frontend.nav-link name="About Us" @class(['active' => Request::is('about*')])
                        href="{{ route('about.index') }}" />
                    <x-frontend.nav-link name="Events" @class(['active' => Request::is('event*')])
                        href="{{ route('event.index') }}" />
                    @auth
                        <x-frontend.nav-link name="Profile" href="{{ route('dashboard') }}" />
                    @endauth --}}
                </ul>
            </div>
            <div class="d-flex align-items-center">
                {{-- <div class="dropdown me-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="currencyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        @php($currency = session()->get('currency'))
                        {{ $currency?->code ?? 'GBP' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                        @foreach (DB::table('currencies')->get() as $currency)
                            <li><a class="dropdown-item" href="{{ route('currency.index', $currency->id) }}">{{ $currency->name }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}

                <a href="{{ route('neurologist.bookmark.data') }}" class="bookmark" data-count="5">
                    <span class="data-count">5</span>
                    <svg width="24" height="49" viewBox="0 0 16 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 2C0 0.895432 0.89543 0 2 0H14C15.1046 0 16 0.89543 16 2V19C16 19.3746 15.7907 19.7178 15.4576 19.8892C15.1245 20.0606 14.7236 20.0315 14.4188 19.8137L8 15.2289L1.58124 19.8137C1.27642 20.0315 0.875489 20.0606 0.542418 19.8892C0.209347 19.7178 0 19.3746 0 19V2ZM14 2L2 2V17.0568L7.41876 13.1863C7.76646 12.9379 8.23354 12.9379 8.58124 13.1863L14 17.0568V2Z"
                            fill="#0D0D0D" />
                    </svg>
                </a>
                @guest
                    <a href="{{ route('login') }}" class="btn nav-btn d-none d-lg-block ms-3 me-3">
                        <svg width="14" height="14" viewBox="0 0 16 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 2.84849C6.52724 2.84849 5.33333 4.0424 5.33333 5.51516C5.33333 6.98792 6.52724 8.18183 8 8.18183C9.47276 8.18183 10.6667 6.98792 10.6667 5.51516C10.6667 4.0424 9.47276 2.84849 8 2.84849ZM4 5.51516C4 3.30602 5.79086 1.51516 8 1.51516C10.2091 1.51516 12 3.30602 12 5.51516C12 7.7243 10.2091 9.51516 8 9.51516C5.79086 9.51516 4 7.7243 4 5.51516ZM5.33333 12.1818C4.22876 12.1818 3.33333 13.0773 3.33333 14.1818C3.33333 14.55 3.03486 14.8485 2.66667 14.8485C2.29848 14.8485 2 14.55 2 14.1818C2 12.3409 3.49239 10.8485 5.33333 10.8485H10.6667C12.5076 10.8485 14 12.3409 14 14.1818C14 14.55 13.7015 14.8485 13.3333 14.8485C12.9651 14.8485 12.6667 14.55 12.6667 14.1818C12.6667 13.0773 11.7712 12.1818 10.6667 12.1818H5.33333Z"
                                fill="#000" />
                        </svg>
                        <span class="fs-14 fw-bold">Login</span>
                    </a>
                @else
                    <a href="{{ route('logout') }}" class="btn nav-btn d-none d-lg-block ms-3" id="logout">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11 20C11 19.4477 10.5523 19 10 19H5V5H10C10.5523 5 11 4.55228 11 4C11 3.44771 10.5523 3 10 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H10C10.5523 21 11 20.5523 11 20Z"
                                fill="#ffffff" />
                            <path
                                d="M21.7136 12.7005C21.8063 12.6062 21.8764 12.498 21.9241 12.3828C21.9727 12.2657 21.9996 12.1375 22 12.003L22 12L22 11.997C21.9992 11.7421 21.9016 11.4874 21.7071 11.2929L17.7071 7.29289C17.3166 6.90237 16.6834 6.90237 16.2929 7.29289C15.9024 7.68342 15.9024 8.31658 16.2929 8.70711L18.5858 11H9C8.44771 11 8 11.4477 8 12C8 12.5523 8.44771 13 9 13H18.5858L16.2929 15.2929C15.9024 15.6834 15.9024 16.3166 16.2929 16.7071C16.6834 17.0976 17.3166 17.0976 17.7071 16.7071L21.7064 12.7078L21.7136 12.7005Z"
                                fill="#ffffff" />
                        </svg>
                        Logout
                    </a>
                @endguest
                <a href="{{ route('membership.index') }}" class="join-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Join Aims
                </a>
                <div class="humbarger-icon ms-4" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    style="cursor: pointer;">
                    <svg version="1.1" width="15px" height="11px" viewBox="0 0 15.0 11.0"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <filter id="0561151051081004810551100" x="-4.72972973%" y="-36.3636364%"
                                filterUnits="userSpaceOnUse" width="106.756757%" height="160.606061%">
                                <feGaussianBlur stdDeviation="10" in="SourceAlpha" result="10954971181101034848104101">
                                </feGaussianBlur>
                                <feOffset dx="0" dy="10" in="10954971181101034848104101"
                                    result="1151191039910157113104120100"></feOffset>
                                <feColorMatrix values="0 0 0 0.0 0 0 0 0 0.0 0 0 0 0 0.0 0 0 0 0 0.1 0" type="matrix"
                                    in="1151191039910157113104120100"></feColorMatrix>
                            </filter>
                            <clipPath id="1191025112110248103575555">
                                <path d="M1440,0 L1440,125 L0,125 L0,0 L1440,0 Z"></path>
                            </clipPath>
                            <clipPath id="10745105111109541211064545">
                                <path
                                    d="M97.5,0 C109.926407,-2.28269391e-15 120,10.0735931 120,22.5 C120,34.9264069 109.926407,45 97.5,45 L22.5,45 C10.0735931,45 1.52179594e-15,34.9264069 0,22.5 C-1.52179594e-15,10.0735931 10.0735931,2.28269391e-15 22.5,0 L97.5,0 Z">
                                </path>
                            </clipPath>
                        </defs>
                        <g transform="translate(-1271.0 -125.0)">
                            <g transform="translate(0.0 70.0)">
                                <g clip-path="url(#1191025112110248103575555)"></g>
                            </g>
                            <g transform="translate(1251.0 109.0)">
                                <g clip-path="url(#10745105111109541211064545)"></g>
                                <g transform="translate(31.153846153845947 11.0)"><text
                                        transform="translate(23.23907692307692 16.0)"
                                        font-family="Montserrat, sans-serif" font-size="16.0" font-weight="600"
                                        fill="#33637E" text-anchor="center"> Menu </text></g>
                                <g transform="translate(20.0 16.0)">
                                    <path id="menu-line-1" d="M0.5,0.5 L14.5,0.5" stroke="currentColor" stroke-width="1"
                                        fill="none" stroke-linecap="round" stroke-miterlimit="10"></path>
                                    <g transform="translate(0.0 5.0)">
                                        <path id="close-x-1" d="M0.5,0.5 L14.5,0.5" stroke="currentColor"
                                            stroke-width="1" fill="none" stroke-linecap="round"
                                            stroke-miterlimit="10"></path>
                                        <path id="close-x-2" d="M0.5,0.5 L14.5,0.5" stroke="currentColor"
                                            stroke-width="1" fill="none" stroke-linecap="round"
                                            stroke-miterlimit="10"></path>
                                    </g>
                                    <g transform="translate(0.5 10.0)">
                                        <path id="menu-line-2" d="M0,0.5 L7,0.5" stroke="currentColor"
                                            stroke-width="1" fill="none" stroke-linecap="round"
                                            stroke-miterlimit="10"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="humbarger-text">Menu</span>
                </div>

            </div>
        </div>
    </div>
</nav>
<style>
    .join-btn {
        background: #ff9015;
        border-radius: 23px;
        color: #fff;
        padding: 10px 25px;
        border: 2px solid #ff9015;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .join-btn:hover {
        background: #fff;
        border-radius: 23px;
        color: #ff9015;
        padding: 10px 25px;
        border: 2px solid #ff9015;
        transition: all .3s ease-in-out;
    }

    .join-btn svg {
        width: 20px;
        height: 20px;
        /* fill: #fff; */
    }

    .humbarger-icon {
        background: #f7f7f7;
        padding: 10px 25px;
        border-radius: 23px;
    }

    .humbarger-icon svg {
        /* width: 20px;
        height: 20px; */
        fill: #33637e;
        font-weight: 700;
    }

    .humbarger-icon .humbarger-text {
        margin-left: 6px;
        font-weight: 600;
        color: #33637e;
    }

    .mobile-menu-wrapper {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 40px;
        margin: 30px 0;
        align-items: start;
        justify-content: space-between;
        align-content: start;
    }

    .mobile-menu-wrapper .menu-title {
        font-weight: 600;
        color: #33637e;
        margin-bottom: 20px;
        font-size: 18px;
        line-height: 18px;
    }

    .mobile-menu-wrapper .mobile-navbar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-menu-wrapper .mobile-navbar-menu li {
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #9b9b9b;
    }

    .mobile-menu-wrapper .mobile-navbar-menu li a {
        color: #00abc8;
        text-decoration: none;
        font-size: 16px;
        line-height: 24px;
        margin-bottom: 0;
    }
</style>
<div class="collapse navbar-collapse mobile-navbar" id="navbarSupportedContent">
    <section class="mobile-menu-wrapper container mx-auto">
        <div class="mobile-single-menu-wrapper">
            <h4 class="menu-title">Find professional support</h4>
            <ul class="mobile-navbar-menu">
                <li>
                    <a href="">Find a counsellor</a>
                </li>
                <li>
                    <a href="">How can counselling help</a>
                </li>
                <li>
                    <a href="">What is pastoral care</a>
                </li>
                <li>
                    <a href="">Helpful resources</a>
                </li>
                <li>
                    <a href="">Find support FAQs</a>
                </li>
                <li>
                    <a href="">How to make a complaint</a>
                </li>
            </ul>
        </div>
        <div class="mobile-single-menu-wrapper">
            <h4 class="menu-title">Professional training</h4>
            <ul class="mobile-navbar-menu">
                <li>
                    <a href="">Counselling training</a>
                </li>
                <li>
                    <a href="">Pastoral care training</a>
                </li>
                <li>
                    <a href="">Find a training course</a>
                </li>
                <li>
                    <a href="">Find a placement</a>
                </li>
            </ul>
        </div>
        <div class="mobile-single-menu-wrapper">
            <h4 class="menu-title">Join Aims</h4>
            <ul class="mobile-navbar-menu">
                <li>
                    <a href="">Counselling membership</a>
                </li>
                <li>
                    <a href="">Pastoral care membership</a>
                </li>
                <li>
                    <a href="">Become a friend</a>
                </li>
                <li>
                    <a href="">Membership fees</a>
                </li>
                <li>
                    <a href="">Membership FAQs</a>
                </li>
            </ul>
        </div>
        <div class="mobile-single-menu-wrapper">
            <h4 class="menu-title">Find professional support</h4>
            <ul class="mobile-navbar-menu">
                <li>
                    <a href="">Find a counsellor</a>
                </li>
                <li>
                    <a href="">How can counselling help</a>
                </li>
                <li>
                    <a href="">What is pastoral care</a>
                </li>
                <li>
                    <a href="">Helpful resources</a>
                </li>
                <li>
                    <a href="">Find support FAQs</a>
                </li>
                <li>
                    <a href="">How to make a complaint</a>
                </li>
            </ul>
        </div>

    </section>
    {{-- <ul class="accordion list-unstyled" id="accordionExample">
        <x-frontend.nav-link name="Directory" @class(['active' => Request::is('directory*')]) href="{{ route('directory.index') }}" />

        @guest
            <x-frontend.nav-link name="Membership" @class(['active' => Request::is('membership*')]) href="{{ route('membership.index') }}" />
        @endguest
        <x-frontend.nav-link name="Insights" @class(['active' => Request::is('insight*')]) href="{{ route('article.index') }}" />
        <x-frontend.nav-link name="About Us" @class(['active' => Request::is('about*')]) href="{{ route('about.index') }}" />
        <x-frontend.nav-link name="Events" @class(['active' => Request::is('event*')]) href="{{ route('event.index') }}" />
        @auth
            <x-frontend.nav-link name="Profile" href="{{ route('dashboard') }}" />
        @else
            <x-frontend.nav-link name="Login" href="{{ route('login') }}" />
        @endauth
    </ul> --}}
</div>
