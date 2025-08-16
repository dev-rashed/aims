@extends('layouts.frontend.app')

@section('meta_keywords', 'Cookie Consent')
@section('meta_description', 'Learn about our cookie consent policy')

@section('title', 'Cookie Consent')

@section('content')

    <!-- About Section Start -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:250px;">
        <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
            <a href="#" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">Cookie Consent</a>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="section service-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fs-1 fw-bold text-primary-500">Cookie Consent: Learn about our cookie consent policy</h1>

                    <div class="my-4">
                        <h5><strong>Cookie Policy and Consent Notice</strong></h5>
                        <p><strong>Last updated: 14 August 2025</strong></p>
                        <p>The Association of Islamic Mental Health Specialists (AIMS) respects your privacy and is
                            committed to being transparent about how we use cookies and similar technologies on our website,
                            <a href="{{ route('home') }}">www.aimsonline.org</a> (the “Website”).
                        </p>
                        <p>This Cookie Policy explains what cookies are, how we use them, the categories of cookies we
                            collect, and how you can manage your preferences. Please also review our Privacy Policy for
                            details about how we handle your personal information, your privacy rights, and the choices
                            available to you</p>

                        <p><strong>1. What are cookies?</strong></p>
                        <p>Cookies are small text files that are placed on your device when you visit a website. They help
                            the site remember your actions and preferences (such as login details or language settings) so
                            you don’t have to re-enter them every time you visit.
                        </p>
                        <p><strong>2. Types of cookies we use</strong></p>
                        <p>We classify cookies based on their function and purpose.</p>
                        <ul>
                            <li>
                                <p><strong>Essential cookies</strong></p>
                                <p>These cookies are necessary for the basic operation of the Website. They enable security
                                    features, user authentication, and help prevent fraudulent activity. Without them, the
                                    Website may not function properly.
                                    Essential cookies are always active.</p>
                                <p><strong>Example:</strong></p>
                                <p>Consent Management Tool</p>
                                <ul>
                                    <li>
                                        <p><strong>Purpose:</strong> Records and stores your cookie preferences to comply
                                            with data protection laws.</p>
                                    </li>
                                    <li>
                                        <p><strong>Provider:</strong> Usercentrics GmbH (Third Party)</p>
                                    </li>
                                    <li>
                                        <p><strong>Duration:</strong> Persistent</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <p><strong>Functional cookies</strong></p>
                                <p>These cookies remember your preferences and customise your experience, such as your
                                    chosen language, page navigation history, or automatic login credentials.</p>
                                <p>These cookies are optional and only set when you give permission.</p>
                                <p><strong>Examples:</strong></p>
                                <ul>
                                    <li>Google AJAX</li>
                                    <ul>
                                        <li><strong>Purpose:</strong> Provides reliable and fast access to open-source
                                            JavaScript libraries.</li>
                                        <li><strong>Provider:</strong> Google Ireland Limited (Third Party)</li>
                                        <li><strong>Duration:</strong> Persistent</li>
                                        <li><strong>Opt-out:</strong> Google Privacy Controls</li>
                                    </ul>
                                    <li>Google Maps</li>
                                    <ul>
                                        <li><strong>Purpose:</strong> Embeds interactive maps into our Website.</li>
                                        <li><strong>Provider:</strong> Google LLC (Third Party)</li>
                                        <li><strong>Duration:</strong> Persistent</li>
                                        <li><strong>Opt-out:</strong> Via provider’s site</li>
                                    </ul>
                                    <li>Google Tag Manager</li>
                                    <ul>
                                        <li><strong>Purpose:</strong> Manages and deploys small code snippets (tags) for
                                            analytics and tracking.</li>
                                        <li><strong>Provider:</strong> Google Ireland Limited (Third Party)</li>
                                        <li><strong>Duration:</strong> Persistent</li>
                                    </ul>
                                    <li>Vimeo</li>
                                    <ul>
                                        <li><strong>Purpose:</strong> Embeds video content from Vimeo.</li>
                                        <li><strong>Provider:</strong> Vimeo.com, Inc. (Third Party)</li>
                                        <li><strong>Duration:</strong> 2 years</li>
                                    </ul>
                                    <li><strong>Opt-out:</strong> Vimeo Cookie Policy</li>
                                    <ul>
                                        <li><strong>Purpose:</strong> Protects the Website from spam and automated abuse.
                                        </li>
                                        <li><strong>Provider:</strong> Google Ireland Limited (Third Party)</li>
                                        <li><strong>Duration:</strong> 6 months</li>
                                    </ul>
                                </ul>
                            </li>
                        </ul>
                        <p><strong>3. Managing your cookie preferences</strong></p>
                        <p>You can adjust your cookie settings at any time using our on-site cookie management tool or
                            through your browser’s privacy controls. Please note that disabling certain cookies may affect
                            how the Website functions.</p>
                        <p><strong>Marketing Cookies</strong></p>
                        <ul>
                            <li>Marketing cookies are used to track online activity so that content, including
                                advertisements,
                                can be made more relevant to your interests, or to limit how often you see certain messages.
                                These cookies are turned off by default and will only be activated if you give us
                                permission.</li>
                            <li>If you agree to their use, this Website may place the following marketing cookie:</li>
                            <li><strong>Google Analytics</strong></li>
                            <ul>
                                <li><strong>Description:</strong> A service that helps measure website usage, understand
                                    visitor behaviour, and
                                    evaluate the effectiveness of online campaigns.</li>
                                <li><strong>Provider:</strong> Google Ireland Limited (Third Party)</li>
                                <li><strong>Purpose:</strong> Marketing and analytics</li>
                                <li><strong>Duration:</strong> 2 years</li>
                            </ul>
                            <li><strong>Opt-out:</strong> Google Analytics Opt-out Tool</li>
                        </ul>
                            <strong>Your Cookie Choices</strong>
                            <p>You are in control of which cookies are stored on your device. You can accept or decline
                                functional and marketing cookies at any time. If you previously gave consent and wish to
                                withdraw it, you can:</p>
                            <ul>
                                <li>Use our on-site cookie settings tool – found on our homepage – to choose which
                                    categories of
                                    cookies you allow or to withdraw consent.</li>
                                <li>Adjust your browser settings – most browsers allow you to delete cookies, refuse
                                    cookies, or set
                                    preferences. Check the “Help,” “Tools,” or “Settings” sections of your browser for
                                    guidance.</li>
                                <li>Visit <a href="https://aboutcookies.org">aboutcookies.org</a> to learn more about
                                    managing or
                                    disabling cookies.</li>
                            </ul>
                        <p><strong>Contact Us</strong></p>
                        <p>If you have any questions about this Cookie Policy, please reach out:</p>
                        <p><strong>Association of Islamic Mental Health Specialists (AIMS)</strong></p>
                        <p><a href="mailto:info@aimsonline.org"><strong>📧 info@aimsonline.org</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

@endsection
