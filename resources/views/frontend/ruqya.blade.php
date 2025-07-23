@extends('layouts.frontend.app')

@section('meta_keywords', 'Ruqya')

@section('title', 'Ruqya')

@section('content')
    <!-- Banner Section -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
        <div class="d-flex h-100 justify-content-center align-items-center fw-bold fs-16">
            <a href="/" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">Ruqya Direction</a>
        </div>
    </section>

    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ruqya Direction</li>
            </ol>
        </nav>

        <!-- Main Content -->
        <div class="row align-items-start">
            <div class="col-lg-12">
                <h2 class="section-heading mt-5">The Importance of Ethical Ruqyah Practice</h2>
                <p>
                    As demand for Ruqyah Shari’ah grows, so does the responsibility on practitioners to act ethically,
                    professionally, and in accordance with Islam. Ruqyah is not just spiritual healing—it is a religious
                    responsibility, and its misuse can cause serious harm, exploitation, or even fitnah in the community.
                </p>
                <p>
                    The following guidelines are issued by AIMS to <strong>set a clear standard</strong> for all individuals
                    and
                    organisations offering Ruqyah. This includes independent practitioners and community centres. AIMS calls
                    for all Ruqyah providers to uphold the <strong>highest standards of Islamic ethics, safeguarding, and
                        professionalism</strong>.
                </p>






                <div class="accordion" id="cpdAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <h5 class="text-muted"><strong> 1. Islamic Foundation and Prohibited Practices</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#cpdAccordion" style="">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Strict adherence to Qur’an and Sunnah:</strong></h6>
                                        <p> All Ruqyah performed must be based on clear guidance from the Qur’an and
                                            authentic Hadith.
                                            Personal
                                            opinions, cultural rituals, or unverifiable methods are not permitted. The use
                                            of fabricated
                                            duas or
                                            unknown invocations is not acceptable.</p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Avoidance of shirk, innovation, and superstition:</strong></h6>
                                        <p>Under no circumstances should a practitioner use amulets (*taweez*), invoke jinn,
                                            communicate
                                            with spirits, or use numerology, magic squares, or divination. These actions
                                            constitute
                                            <strong>major
                                                sin and invalidate the legitimacy of the Ruqyah</strong>.
                                        </p>
                                    </li>


                                    <li class="text-muted">
                                        <h6><strong>Piety and religious conduct:</strong></h6>
                                        <p> Practitioners must be individuals of sound aqeedah (creed), regular in prayer,
                                            and known for
                                            their taqwa, humility, and sincerity. Ruqyah should not be used as a tool for
                                            ego, profit, or
                                            manipulation.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header " id="headingTwo">
                            <button
                                class="accordion-button collapsed fw-semibold d-flex flex-column align-items-start text-start"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <h5 class="text-muted"><strong>2. Gender Interaction and Safeguarding Rules</strong></h5>
                                <small class="text-muted mt-1">Particularly for male practitioners treating female
                                    clients</small>
                            </button>
                        </h2>

                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>No Khalwah (seclusion):</strong></h6>
                                        <p>
                                            A male practitioner must never be alone with a female client in a private or
                                            enclosed space.
                                            A mahram (male guardian) or another adult female should be present at all times.
                                            This protects both parties from suspicion, temptation, and potential harm.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Absolutely no physical contact:</strong></h6>
                                        <p>
                                            Male practitioners <strong>must not touch</strong> female clients during Ruqyah
                                            or any other
                                            spiritual practice, even indirectly. Actions such as placing hands on the head
                                            or shoulders are prohibited.
                                            Healing must be conducted through recitation only, without any form of physical
                                            contact.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Transparent and accountable environment:</strong></h6>
                                        <p>
                                            Sessions should take place in locations with open doors, visible windows, or
                                            some form of supervision.
                                            Using private homes or hidden spaces without witnesses is strongly discouraged.
                                            The setting should reflect the integrity, openness, and trust expected in
                                            Islamic spiritual care.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h5 class="text-muted"><strong>3. Informed Consent and User Awareness</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Clear explanation before treatment:</strong></h6>
                                        <p>The practitioner must explain what Ruqyah involves, including how it will be
                                            conducted, the
                                            expected outcomes, and limitations. Clients must not be pressured or frightened
                                            into accepting
                                            services.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Voluntary participation and right to withdraw:</strong></h6>
                                        <p>The client has the right to stop treatment at any point. Consent must be ongoing,
                                            not one-time.
                                        </p>
                                    </li>


                                    <li class="text-muted">
                                        <h6><strong>Avoid making unrealistic claims:</strong></h6>
                                        <p> Practitioners must not guarantee results such as "cure in three days" or
                                            “complete removal of
                                            jinn." Such promises are not only un-Islamic but also deceptive.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h5 class="text-muted"><strong>4. Ethical Use of Herbal and Complementary Products</strong>
                                </h5>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Halal and safe:</strong></h6>
                                        <p>All herbs, oils, and treatments provided must be halal, sourced ethically, and
                                            free of prohibited
                                            substances. Labelling must be clear and accurate.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Evidence-based and traceable:</strong></h6>
                                        <p>
                                            Practitioners must use products that have proven benefits in traditional Islamic
                                            or natural
                                            medicine. Products must not be sold purely for financial gain.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive">
                                <h5 class="text-muted"><strong>5. Collaboration with Healthcare Providers</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Understand limits of expertise:</strong></h6>
                                        <p>
                                            Ruqyah is not a substitute for medical or psychological care. If symptoms
                                            suggest physical
                                            illness or mental health conditions, the client must be referred to a GP,
                                            psychologist, or
                                            qualified professional.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Maintain referral networks:</strong></h6>
                                        <p>
                                            AIMS encourages all practitioners to maintain a list of trustworthy
                                            professionals and Imams for
                                            multidisciplinary care and collaborative treatment.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                aria-controls="collapseSix">
                                <h5 class="text-muted"><strong>6. Training, Knowledge and Qualification</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Islamic education in Ruqyah:</strong></h6>
                                        <p>
                                            Practitioners must be trained in the jurisprudence (Fiqh) and spiritual
                                            dimensions of Ruqyah. A
                                            sound understanding of Tawheed, shirk, ruqyah texts, and safeguarding are
                                            essential.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Counselling and mental health awareness:</strong></h6>
                                        <p>
                                            Basic training in active listening, trauma-informed care, and mental health is
                                            vital to avoid
                                            harm or misjudging a client’s situation.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Complementary certifications (optional):</strong></h6>
                                        <p>
                                            For those who provide hijamah or herbal medicine, relevant training and
                                            certification must be
                                            completed with safety protocols followed.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                aria-controls="collapseSeven">
                                <h5 class="text-muted"><strong>7. Financial Ethics and Access</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Transparent and fair pricing:</strong></h6>
                                        <p>
                                            Clients must know the cost in advance. Practitioners must never take advantage
                                            of a client's
                                            desperation or spiritual vulnerability to demand high fees.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Free or subsidised services encouraged:</strong></h6>
                                        <p>
                                            Where possible, services should be made available to the financially vulnerable
                                            through
                                            donation, waqf, or zakat models.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>No sale of “blessed” items:</strong></h6>
                                        <p>
                                            Charging extra for “blessed water,” “special oils,” or “prophetic secrets”
                                            without basis in
                                            Qur’an and Sunnah is deceptive and unethical.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 8 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false"
                                aria-controls="collapseEight">
                                <h5 class="text-muted"><strong>8. Accountability and Reporting</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Complaint procedures must be in place:</strong></h6>
                                        <p>
                                            Clients must have a way to report misconduct, and those complaints must be taken
                                            seriously with
                                            transparency.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Self-review and feedback:</strong></h6>
                                        <p>
                                            Practitioners should regularly review their conduct and service through feedback
                                            forms,
                                            consultations, or supervisory audits.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Open to advice and correction:</strong></h6>
                                        <p>
                                            Practitioners should consult scholars, specialists, and ethical bodies like AIMS
                                            if there are
                                            uncertainties or ethical dilemmas.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- Accordion Item 9 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button
                                class="accordion-button collapsed fw-semibold d-flex flex-column align-items-start text-start"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                aria-expanded="false" aria-controls="collapseNine">
                                <h5 class="text-muted"><strong>9. Registration with AIMS (Accreditation and
                                        Oversight)</strong></h5>
                                <small class="text-muted mt-1">
                                    To ensure accountability and professionalism in this growing sector,
                                    <strong>AIMS has introduced a registration and recognition scheme for Ruqyah
                                        providers</strong>, offering:
                                </small>
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Credibility and Community Trust:</strong></h6>
                                        <p>
                                            Registered practitioners are recognised as adhering to AIMS ethical and Islamic
                                            standards,
                                            building community confidence and legitimacy.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Support and Training:</strong></h6>
                                        <p>
                                            AIMS provides access to continued education, specialist training, and CPD
                                            opportunities to raise
                                            practitioner standards.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Referral Network Inclusion:</strong></h6>
                                        <p>
                                            Registered providers may be referred clients by mosques, counsellors, and health
                                            bodies working
                                            with AIMS.
                                        </p>
                                    </li>
                                    <li class="text-muted">
                                        <h6><strong>Complaint Handling and Oversight:</strong></h6>
                                        <p>
                                            AIMS investigates complaints and offers mediation or corrective advice to ensure
                                            practitioners
                                            stay within ethical bounds.
                                        </p>
                                    </li>
                                    <li class="text-muted">
                                        <h6><strong>All Ruqyah providers are strongly encouraged to register with
                                                AIMS</strong> to
                                            demonstrate
                                            their commitment to excellence, transparency, and Islamic integrity</h6>
                                        <p>
                                            To register with AIMS, contact our accreditation team via:
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- Accordion Item 10 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false"
                                aria-controls="collapseTen">
                                <h5 class="text-muted"><strong>10. Community Awareness and User Education</strong></h5>
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#cpdAccordion">
                            <div class="accordion-body">
                                <ul>
                                    <li class="text-muted">
                                        <h6><strong>Educate service users about their rights:</strong></h6>
                                        <p>
                                            Clients must be informed about what Ruqyah is, what to expect, and how to
                                            identify red flags.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Public resources and seminars:</strong></h6>
                                        <p>
                                            AIMS regularly runs workshops, online sessions, and printed materials to educate
                                            the community
                                            and combat harmful or superstitious practices.
                                        </p>
                                    </li>

                                    <li class="text-muted">
                                        <h6><strong>Final Message to Practitioners:</strong></h6>
                                        <p>
                                            Ruqyah is a trust (*amanah*) between you and your client—and ultimately between
                                            you and Allah.
                                            Misusing this trust leads to both worldly and spiritual consequences. AIMS urges
                                            all providers
                                            to constantly renew their intention, act with sincerity, and seek both religious
                                            knowledge and
                                            professional development
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-muted mt-5">
                    <p>The above guidelines are in addition to the AIMS Ethical Framework, which can be found here</p>
                </div>
            </div>

            <!-- Right Card -->
            {{-- <div class="col-lg-4">
                @include('frontend.comon.membership-card')
            </div> --}}
        </div>
    </div>
@endsection

@push('css')
    <style>
        .section-heading {
            color: #307c96;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }

        li.breadcrumb-item {
            font-size: 15px;
            font-weight: 800;
        }

        li.breadcrumb-item a {
            color: #307c96;
        }

        li.breadcrumb-item a:hover {
            color: #307c96 !important;
            text-decoration: underline !important;
        }

        li.breadcrumb-item.active {
            color: #868686;
        }

        @media (max-width: 767.98px) {
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
@endpush
