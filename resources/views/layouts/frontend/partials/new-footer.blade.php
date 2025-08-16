@if (sectionSetting('subscription_section'))
    <!-- Search Section Start -->
    <section class="section subscribe-section">
        <div class="pattern-layer"></div>
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <div class="icon-box">
                            <svg width="30" height="30" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 0C10.3788 0 10.725 0.214002 10.8944 0.552786L19.8944 18.5528C20.067 18.8978 20.0256 19.3113 19.7882 19.6154C19.5508 19.9195 19.1597 20.0599 18.7831 19.9762L10 18.0244L1.21694 19.9762C0.840351 20.0599 0.449212 19.9195 0.211802 19.6154C-0.0256073 19.3113 -0.0669427 18.8978 0.10558 18.5528L9.10558 0.552786C9.27497 0.214002 9.62124 0 10 0ZM11 16.1978L17.166 17.568L11 5.23607V16.1978ZM9.00001 5.23607L2.83402 17.568L9.00001 16.1978V5.23607Z"
                                    fill="#0D0D0D" />
                            </svg>
                        </div>
                        <h2>Subscribe to Newsletter</h2>
                        <p>and receive new ads in inbox</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <form id="submit" action="{{ route('subscribe') }}" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Input your email address" required>
                            <button type="submit" class="btn">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif

{{-- <footer class="footer-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 mb-4">
                <div class="me-lg-2">
                    <a href="/">
                        <img src="{{ uploadedFile(setting('footer_logo')) }}" class="img-fluid" alt="Footer Logo" />
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 mb-4">
                <h6 class="fs-6 fw-bold text-gray-700 mb-3">Contact us</h6>
                <ul class="list-unstyled">
                    @if (setting('socials') != null)
                        @foreach (json_decode(setting('socials')) as $social)
                            @if (!empty($social->name))
                                <li class="mt-2">
                                    <a href="{{ $social->url }}"
                                        class="text-primary-500 fs-16 d-flex align-items-center" target="_blank">
                                        <img class="me-2"
                                            src="{{ asset('build/assets/frontend/images/icons/chevron-right.png') }}"
                                            alt="right" />
                                        {{ $social->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 mb-4">
                <h6 class="fs-6 fw-bold text-gray-700 mb-3">About</h6>

                <ul class="list-unstyled">
                    @php
                        $pages = [
                            ['url' => route('about.index'), 'name' => 'About Us'],
                            ['url' => route('ethical.index'), 'name' => 'Ethical Standards'],
                            ['url' => route('event.index'), 'name' => "What's On"],
                            ['url' => route('career.index'), 'name' => 'Career'],
                            ['url' => route('contact.index'), 'name' => 'Contact Us'],
                        ];
                    @endphp
                    @foreach ($pages as $page)
                        <li class="mt-2">
                            <a href="{{ $page['url'] }}" class="text-primary-500">
                                <img class="me-2"
                                    src="{{ asset('build/assets/frontend/images/icons/chevron-right.png') }}"
                                    alt="{{ $page['name'] }}" />
                                {{ $page['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mb-4">
                <h6 class="fs-6 fw-bold text-gray-700 mb-3">Legal</h6>

                <ul class="list-unstyled">
                    @php $pages = DB::table('pages')->where('status', true)->get(); @endphp
                    @foreach ($pages as $page)
                        <li class="mt-2">
                            <a href="{{ route('page.details', $page->slug) }}" class="text-primary-500">
                                <img class="me-2"
                                    src="{{ asset('build/assets/frontend/images/icons/chevron-right.png') }}"
                                    alt="{{ $page->name }}" />
                                {{ $page->name }}
                            </a>
                        </li>
                    @endforeach
                    <li class="mt-2">
                        <a href="{{ route('advisors') }}" class="text-primary-500">
                            <img class="me-2"
                                src="{{ asset('build/assets/frontend/images/icons/chevron-right.png') }}"
                                alt="AIMS Advisors" />
                            AIMS Advisors
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('ambassadors') }}" class="text-primary-500">
                            <img class="me-2"
                                src="{{ asset('build/assets/frontend/images/icons/chevron-right.png') }}"
                                alt="AIMS Ambassadors" />
                            AIMS Ambassadors
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="fs-6 fw-bold text-gray-700 mb-3">News Letter</h6>

                <form id="submit" action="{{ route('subscribe') }}" method="post">
                    @csrf
                    <div class="footer-form-group">
                        <img src="{{ asset('build/assets/frontend/images/footer/1.svg') }}" alt="name" />
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
                            required />
                    </div>
                    <div class="footer-form-group">
                        <img src="{{ asset('build/assets/frontend/images/footer/2.svg') }}" style="top:24px"
                            alt="email" />
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Your Email" required />
                    </div>

                    <div class="footer-form-group">
                        <button type="submit" class="btn">Subscribe</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-12 text-center copyright">
                <p class="text-gray-500 mb-0 fw-medium">{{ setting('copyright') }}</p>
            </div>
        </div>
    </div>
</footer> --}}

<footer class="footer bg-white  mt-5 pt-5">
    <div class="container pt-5" style="border-top: 2px dashed #b2b2b2">
        <!-- Top Row -->
        <div class="row gy-5 mb-5 align-items-start">
            <!-- Logo -->
            <div class="col-lg-2">
                <a href="/" class="footer__logo-link">
                    <img src="https://new.aimsonline.org//storage/setting/9MOmfPHu7uSLbOKS.svg" alt="ACC logo"
                        class="footer__logo">
                </a>
            </div>

            <!-- Footer Content -->
            <div class="col-lg-10">
                <div class="row gy-4">
                    <!-- Contact Info -->
                    <div class="col-md-6 col-lg-3">
                        <h5 class="footer__title">Contact us</h5>
                        {{-- <p class="footer__contact">
                            <a href="tel:02476449694" class="footer__link footer__link--highlight">t: 024 7644 9694</a>
                        </p> --}}
                        <p class="footer__contact">
                            <a href="mailto:office@acc-uk.org" class="footer__link footer__link--highlight">e:
                                info@aimsonline.org</a>
                        </p>
                        <p class="footer__text">Unit F2, The Whitechapel Centre, 85 Myrdle Street, London, E1 1HL</p>
                    </div>

                    <!-- ACC Members -->
                    <div class="col-md-6 col-lg-3">
                        <h5 class="footer__title">AIMS members</h5>
                        <ul class="footer__list">
                            <li><a href="{{ route('login') }}" class="footer__link">My account</a></li>
                            <li><a href="{{ route('event.index') }}" class="footer__link">Upcoming events</a></li>
                            <li><a href="{{ route('membership.index') }}" class="footer__link">Membership</a></li>
                        </ul>
                    </div>

                    <!-- Information -->
                    <div class="col-md-6 col-lg-2">
                        <h5 class="footer__title">Information</h5>
                        <ul class="footer__list">
                            <li><a href="{{ route('about.index') }}" class="footer__link">About us</a></li>
                            <li><a href="/aims-ambassadors" class="footer__link">
                                    Become an Ambassador</a>
                            </li>
                            <li><a href="{{ route('ethical.index') }}" class="footer__link">Ethical Framework</a></li>
                        </ul>
                    </div>

                    <!-- Policies -->
                    <div class="col-md-6 col-lg-2">
                        <h5 class="footer__title">Policies</h5>
                        <ul class="footer__list">
                            <li><a href="{{ route('page.details', 'privacy-policy') }}" class="footer__link">Privacy
                                    policy</a></li>
                            <li><a href="{{ route('data-retention-policy') }}" class="footer__link">Data retention policy</a></li>
                            <li><a href="{{ route('cookie-consent') }}" class="footer__link">Cookie consent</a></li>
                            <li><a href="{{ route('copyright-notice') }}" class="footer__link">Copyright</a></li>
                        </ul>
                    </div>

                    <!-- Social -->
                    <div class="col-md-6 col-lg-2">
                        <h5 class="footer__title">Follow us on:</h5>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/aimsonlinedirectory" target="_blank"><img
                                    src="{{ asset('icon/facebook.svg') }}"
                                    alt="Facebook" class="footer__social-icon"></a>
                            <a href="#" target="_blank"><img
                                    src="{{ asset('icon/x-icon.svg') }}" alt="X"
                                    class="footer__social-icon"></a>
                            <a href="https://www.instagram.com/aimsdirectory/" target="_blank"><img
                                    src="{{ asset('icon/instagram.svg') }}"
                                    alt="Instagram" class="footer__social-icon"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    {{-- <div class="footer__bottom bg-light py-3">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-between align-items-center text-muted small text-center text-lg-start">
            <div class="mb-2 mb-lg-0">{{ setting('copyright') }}</div>
            <div class="mb-2 mb-lg-0">Icons created by Sarah Palmer</div>
        </div>
    </div> --}}
    <footer class="footer-section py-3 bg-light border-top">
        <div class="container">
            <div class="row justify-content-between align-items-center text-center text-md-start">
                <div class="col-md-9">
                    <p class="mb-1 text-muted">
                        ©️ 2025 AIMS | Registered CIC, 16031775
                    </p>
                    {{-- <p class="mb-0 text-muted">Icons created by Sarah Palmer</p> --}}
                </div>
                <div class="col-md-3 text-md-end mt-3 mt-md-0">
                    <p class="mb-0 text-muted">Website by <strong>AIMS ONLINE</strong></p>
                </div>
            </div>
        </div>
    </footer>

</footer>

<style>
    footer {
        font-family: "Helvetica Neue", sans-serif;
    }

    footer * {
        line-height: 1.3;
    }

    footer ul li {
        margin-bottom: 8px;
        color: #fff;
    }

    .footer__logo {
        width: 114px;
        height: auto;
        display: block;
        margin-bottom: 1rem;
    }

    .footer__title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #000;
    }

    .footer__text {
        font-size: 1rem;
        color: #6c757d;
    }

    .footer__contact {
        margin-bottom: 0.5rem;
    }

    .footer__list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer__link {
        font-weight: 600;
        color: #307c96;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 0.4rem;
        transition: color 0.2s ease;
        font-size: 1rem;
    }

    .footer__link:hover {
        color: #1a5e76;
        text-decoration: underline;
    }

    .footer__link--highlight {
        color: #ff9015;
    }

    .footer__link--highlight:hover {
        color: #e57f00 !important;
        text-decoration: underline !important;
    }

    .footer__social-icon {
        width: 45px;
        height: 45px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .footer__social-icon {
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .footer__social-icon:hover {
        animation: bounce-up 0.5s;
    }

    @keyframes bounce-up {
        0% {
            transform: translateY(0);
        }

        30% {
            transform: translateY(-8px);
        }

        50% {
            transform: translateY(0);
        }

        70% {
            transform: translateY(-4px);
        }

        100% {
            transform: translateY(0);
        }
    }


    .footer__bottom {
        border-top: 1px dashed #ccc;
    }

    .footer-section {
        font-family: 'Inter', sans-serif;
        /* Optional: match font style */
        font-size: 0.95rem;
        background-color: #f8f9fa;
        /* Light gray background */
    }

    .footer-section p {
        margin-bottom: 0.2rem !important;
        color: #444 !important;
        font-size: 1rem !important;
        /* Slightly darker text */
    }
</style>
