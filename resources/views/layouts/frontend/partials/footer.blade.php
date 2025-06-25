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

<footer class="footer-section">
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
</footer>
