@extends('layouts.frontend.app')

@section('meta_keywords', 'LIPC')

@section('title', 'LIPC')

@section('content')

    <!-- About Section Start -->
    <section class="section"
        style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
        <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
            <a href="/" class="text-white align-self-center">Home</a>
            <span class="mx-2 align-self-center">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z"
                        fill="#fff" />
                </svg>
            </span>
            <a href="#" class="text-white align-self-center">LIPC</a>
        </div>
    </section>
    <!-- About Section Start -->
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">LIPC: Islamic Licensing</li>
            </ol>
        </nav>
        <!-- Main Content -->
        <div class="row g-5 align-items-start">
            <!-- Left Content -->
            <div class="col-lg-8">
                <h2 class="section-heading">Ijazah: The Islamic Tradition of Trustworthy Licensing</h2>
                <p>Ijazah, meaning "authorisation" or "permission," is a centuries-old Islamic concept rooted in the
                    transmission of sacred knowledge. It represents more than the completion of academic study-it signifies
                    that a person has not only acquired knowledge, but has been deemed ethically, spiritually, and
                    professionally sound to carry it forward and apply it with integrity.</p>
                <p>Traditionally used in the transmission of Qur’an, Hadith, jurisprudence, and other Islamic sciences, the
                    Ijazah system ensured that knowledge was passed from teacher to student in a chain of authenticity
                    (isnad)- preserving both the content and the character necessary to uphold it.</p>

                <h2 class="section-heading">LIPC: A Modern Revival of Classical Ijazah for Psychospiritual Care</h2>
                <p>The Licensed Islamic Psychospiritual Counsellor or Licensed Islamic Professional Counsellor (LIPC) is not
                    a training programme in itself. Rather, it is a formal Islamic license (Ijazah) conferred upon
                    individuals who have successfully completed a recognised, authentic programme in Islamic psychology and
                    counselling-a programme rooted in both traditional Islamic understanding of the soul and modern
                    therapeutic frameworks.</p>
                <p>This licensure reflects the spiritual authority and professional trust invested in the recipient, much
                    like the way scholars of the past were entrusted with teaching or issuing religious guidance. In this
                    case, the LIPC authorisation signifies the person is equipped to offer Islamically integrated mental
                    health care that addresses the mind, heart, and soul.</p>


                <h2 class="section-heading">How It Works: From Study to License</h2>
                <ol>
                    <li class="text-muted"><strong>Completion of a Recognised Programme</strong><br>
                        The candidate must complete a comprehensive programme in Islamic psychology and counselling. This
                        includes academic coursework, supervised clinical or pastoral training, personal development, and
                        spiritual cultivation rooted in Islamic tradition.</li>
                    <li class="text-muted"><strong>Evaluation and Mentorship</strong><br>
                        Participants are assessed not just for academic excellence, but for spiritual maturity, ethical
                        conduct, and therapeutic readiness. They are mentored and observed by qualified scholars and
                        professionals who themselves are recognized within this tradition.</li>
                    <li class="text-muted"><strong>Awarding the LIPC (Ijazah)</strong><br>
                        Upon successful completion and demonstration of competency, the candidate is granted the Ijazah—the
                        LIPC designation—indicating that they are now authorised to operate as a Licensed Islamic
                        Psychospiritual Counsellor or Licensed Islamic Professional Counsellor. This license is both a
                        spiritual endorsement and a community recognition of trust.</li>
                </ol>


                <h2 class="section-heading">Currently Eligible Programmes</h2>
                <p>Currently, those who complete either of the following two programmes are eligible to apply for the LIPC:
                </p>
                <ul>
                    <li class="text-muted">PICSP: Professional Islamic Certificate in Psychospiritual Counselling</li>
                    <li class="text-muted">M.IPC: Master of Islamic Psychospiritual Counselling</li>
                </ul>
                <p>These programmes combine rigorous academic study, therapeutic training, and Islamic spiritual formation,
                    ensuring graduates are both professionally skilled and spiritually grounded.</p>


                <h2 class="section-heading">Earning the Right to Use “LIPC”</h2>
                <p>Upon successful graduation from the M.IPC, and after meeting all ethical and membership requirements,
                    professionals are awarded the LIPC Ijazah and may formally use the post-nominal title “LIPC” to denote
                    their licensed status.</p>
                <p><strong>Examples:</strong></p>
                <ul>
                    <li class="text-muted">Fatima Ahmed, LIPC</li>
                    <li class="text-muted">Dr. Yusuf Khan, MBBS, M.IPC, LIPC</li>
                    <li class="text-muted">Amina Rahman, PICSP, LIPC</li>
                </ul>
                <p>This designation communicates to the public, employers, and the broader Muslim community that the
                    individual is a Licensed Islamic Psychospiritual Counsellor-a person entrusted to offer mental health
                    and spiritual care in accordance with Islamic ethics and tradition.</p>
                <h2 class="section-heading">AIMS Membership: Ensuring Ongoing Accountability</h2>
                <p>To preserve the authenticity and trust of this Ijazah system, all LIPC holders are required to be
                    registered members of AIMS-the Association of Islamic Mental Health and Sciences.</p>
                <p>AIMS maintains a centralised public registry of all professionals licensed under the LIPC title.</p>
                <p>The public, clients, and community leaders can verify a counsellor’s credentials by checking for the LIPC
                    designation next to their name on AIMS' official platform.</p>
                <p>LIPC professionals are held to strict ethical codes, continuing professional development (CPD)
                    requirements, and regular supervision, ensuring quality and accountability.</p>
                <h2 class="section-heading">Why This Matters for the Muslim Community</h2>
                <p>
                    In an era where mental health is deeply misunderstood or neglected in many communities, the LIPC model:
                </p>
                <ul>
                    <li class="text-muted">
                        <strong>Restores trust:</strong> The Ijazah system has historically provided assurance that the
                        individual is grounded in both knowledge and character.
                    </li>
                    <li class="text-muted">
                        <strong>Bridges the gap:</strong> LIPC ensures counsellors are fluent in both Islamic and
                        psychological languages, able to serve clients holistically.
                    </li>
                    <li class="text-muted">
                        <strong>Protects sacred trust:</strong> The inner realities of the soul require caretakers who are
                        not only trained, but authorised to help others navigate spiritual and emotional distress with
                        wisdom, sensitivity, and accountability.
                    </li>
                </ul>

                <h2 class="section-heading">A Return to Trustworthy Care</h2>
                <p>
                    The LIPC Ijazah revives an essential Islamic principle: that those who engage in the care of the human
                    soul must do so with both knowledge and divine trust. It formalises an Islamic path to psychospiritual
                    counselling that is both academically rigorous and spiritually authentic.
                </p>
                <p>
                    Those who carry the LIPC designation are not simply professionals-they are trust-bearers, spiritually
                    authorised to offer counsel, care, and clarity in a way that reflects the depth of Islamic tradition and
                    the realities of contemporary life.
                </p>

            </div>

            <!-- Right Card -->
            <div class="col-lg-4">
                @include('frontend.comon.pastoral-care-card')
            </div>
        </div>
    </div>
    <!-- About Section End -->


@endsection
@push('css')
    <style>
        .section-heading {
            color: #307c96;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }


        .text-highlight {
            color: #f44336;
        }

        .btn-orange {
            background-color: #ff8000;
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 10px 25px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-orange:hover {
            background-color: #e67300;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
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
