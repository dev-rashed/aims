@extends('layouts.frontend.app')

@section('content')

<!-- About Section Start -->
<section class="section" style="background: url('{{ asset('build/assets/frontend/images/about/1.png') }}'), no-repeat; height:216px;">
    <div class="d-flex h-100 justify-content-center alig-items-center fw-bold fs-16">
        <a href="/" class="text-white align-self-center">Home</a>
        <span class="mx-2 align-self-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.195262 9.47139C-0.0650874 9.21104 -0.0650874 8.78893 0.195262 8.52859L3.72386 4.99999L0.195262 1.47139C-0.0650878 1.21104 -0.0650878 0.788935 0.195262 0.528585C0.455611 0.268235 0.877721 0.268235 1.13807 0.528585L5.13807 4.52858C5.39842 4.78893 5.39842 5.21104 5.13807 5.47139L1.13807 9.47139C0.877722 9.73174 0.455612 9.73174 0.195262 9.47139Z" fill="#fff"/>
            </svg>
        </span>
        <a href="{{ route('ethical.index') }}" class="text-white align-self-center">Ethical Standards</a>
    </div>
</section>
<!-- About Section End -->


<!-- Service Section Start -->
<section class="section ethical-section">
    <div class="container">

        {{-- <div class="row mb-5">
            <div class="col-12">
                <h1 class="heading text-primary-500 heading-after mb-0 mt-2">ASSOCIATION OF ISLAMIC MENTAL-HEALTH SPECIALISTS (AIMS)</h1>
                <div class="d-xl-none mt-3 text-center">
                    <a href="{{ asset('build/assets/frontend/ethical-framework.pdf') }}" class="btn btn-primary bg-primary-500 py-2 border-primary-500" download>Download Ethical Framework</a>
                </div>
            </div>
        </div> --}}

        @php
            $titles = [
                "Ethics & code of practice – an islamic perspective",
                "Basis of Islamic Ethics and Code of Practice",
                "Methods of working",
                "Values",
                "Personal qualities",
                "Working ethically",
                "Fundamental premises",
                "Complaints Procedure",
                "Bringing a Complaint",
                "Complaints Process",
                "Formal Procedure",
                "Disciplinary Measures",
                "Appeals"
            ];

        @endphp
        <div class="row">
            {{-- <div class="d-none d-xl-block col-xl-4">
                <ul class="sticky_menu_wrapper">
                    @foreach ($titles as $title)
                        <li>
                            <a href="#{{ str_replace(' ', '_', $title) }}" class="sticky_menu_item">{{ $title }}</a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ asset('build/assets/frontend/ethical-framework.pdf') }}" class="btn btn-primary bg-primary-500 py-2 border-primary-500" download>Download Ethical Framework</a>
                    </li>
                </ul>
            </div> --}}

            <div class="col-xl-10 col-xxl-8 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="{{ asset('build/assets/frontend/ethical-framework.pdf') }}" class="btn btn-primary bg-primary-500 py-2 border-primary-500" download>Download Ethical Framework</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-10 col-xxl-8 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[0]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[0] }}</h2>
                                <div class="text">
                                    <p class="mb-5">The Code is intended as a framework to enable The Association of Islamic Mental Health Specialists members and other Muslim counsellors, therapists, and imams to engage with their clients and service users and community members in the most effective manner, thereby improving the state of Muslim counselling and service providers around the world.</p>

                                    <p class="mb-5">The aim of this version of the ethical standards are designed to cater for practitioners, psychologists, counsellors, psychotherapists, coaches, imams, raqis, and chaplains providing a myriad service within their respective areas.</p>

                                    <p class="mb-5"><strong>The Mission of the Association of Islamic Mental-Health Specialists (AIMS)</strong></p>

                                    <p class="mb-5">The Association of Islamic Mental Health Specialists is dedicated to serving the entire ‘community of care’ within the Umma, including qualified professionals, imams, chaplains, and members of the Muslim community who may lack formal training yet play in an important role in communal wellbeing. In relation to this mission, we intend to ground clinical, pastoral, and community caregivers in the framework of the Qur’an and Sunnah as it pertains to psychospiritual healing, while incorporating contemporary insights that will assist such caregivers in their efforts to aid the ailing members of our community, allowing them to overcome their difficulties and attain higher degrees of mental and spiritual stability.</p>

                                    <p class="mb-5"><strong>A New Code for a Nascent Field</strong></p>

                                    <p class="mb-5">The Code presents a detailed, systematic synthesis of Islamic, ethical, legal, and clinical approaches to mental health that intends to overcome the limitations of contemporary codes of practice, which tend to be vaguely-worded, over-generalised, and limited in content. Such codes fail to provide a framework sufficient to address the complexities of providing counselling to the Anglophone Muslim community of the 21st century, and accordingly, there is a pressing need to present a more comprehensive, behaviour-oriented ethical code to Muslim caregivers owing to:</p>

                                    <ul class="mb-5">
                                        <li class="mb-3">A regrettable corpus of evidence of unprofessional or damaging practices among Muslim caregivers, which results in community harm and distrust towards counsellors;</li>
                                        <li class="mb-3">The legally tenuous status of Muslim counselling as a result of state scrutiny, increasing litigation against Muslim counsellors, and a continuing centralisation of professional ethics; and</li>
                                        <li class="mb-3">The growing relevance and vitality of the field of Muslim counselling – which now includes a number of theories and frameworks – that indicates the need for a universal ethical/legal framework to guide future models of Qur’anic and Islamic counselling.</li>
                                    </ul>

                                    <p class="mb-5"><strong>Islamic Principles for Objective Formulation</strong></p>
                                    <p class="mb-5">While secular counselling aims at achieving individual well-being within the confines of this world, Islam defines well-being from an entirely different viewpoint. A Muslim is directed to seek this wellbeing as stated in the Qur'an: "Our Lord, give us good in this world and good in the hereafter" (2:201).</p>

                                    <p>This is the primary difference in the worldview of Muslims and non-Muslims. The concepts of well-being, satisfaction, salvation, self-realization, and achievement are linked with the belief that an individual's performance in this life determines the ultimate outcome in the hereafter: "What is cultivated in this world is to be harvested in the hereafter" (42:20). This basic assumption determines the fundamental goals of any therapeutic program. These cardinal principles are seen as the cornerstone of any attempt to formulate an Islamic theory:</p>


                                    <ul class="mb-5">
                                        <li class="mb-3">An individual is born with an innate innocence that needs to be preserved and enhanced. It is society's obligation to provide conducive conditions for such an upbringing.</li>
                                        <li class="mb-3">Material and spiritual well-being is achievable through a profound submission to the will of God. Those who fail to submit are in a state of conflict and their personalities begin to disintegrate. According to the Qur’an, a life without faith is a state of spiritual non-being in which one loses touch with his/her true self (49:19). Religion provides guidance and cultivates mental health. Faith is seen as an essential prerequisite for the treatment of mental, emotional, or behavioural disorders. A consensus on the therapeutic value of faith is evident from the writings of Ibn Sina, al-Ghazzali, Ibn Miskawayh, al-Razi, Ibn al-Qayyim, Shah Waliy Allah, and many other Muslim thinkers.</li>
                                        <li class="mb-3">An individual has the ability to reason and the freedom of choice. The right path has been shown by revelation (divine books) granted to individuals of the highest spiritual standing (prophets). These gifts, according to the Qur'an, are to be used to choose the way of life: "We showed him the way: whether he be grateful or ungrateful" (76:3); "And we have shown him the two ways" (90:10); "By the soul and the proportion and order given to it, it has been enlightened to opt for the wrong provided therein or the right revealed to it. Truly he succeeds that purifies it and he fails that corrupts it" (91:7-10).</li>
                                        <p class="my-4">While human beings are free to select their own path(s), there is an associated sense of accountability. As humanity has been declared the vicegerent of God (2:30), it is held accountable for its options, efforts, and behaviour. Every soul is held accountable in pledge for its deeds (74:38), and an individual can only have what he/she strives for (53:39-41).</p>
                                        <li class="mb-3">Islam requites a community that has a social function, for it is not confined to the individual-God relationship, but rather seeks to create a strong, healthy, and well-organized social life. The fabric of social life is the doctrine that Muslim communal brotherhood is a vehicle for social welfare, wider peace, and the attainment of harmony in social bonds. This system of social health must be maintained by establishing the institutions of advice, discipline, and welfare for the benefit of all.</li>
                                    </ul>

                                    <p class="mb-5">
                                        This ummatic concept is based on a system of social relations that seeks to maximize the enjoinment of good on earth within the divine plan: "There may spring from you a community (ummah) who invite to goodness and enjoin good conduct and forbid indecency. Such are they who ate successful" (3:104). This is a trust (ummah) bestowed upon Muslims that needs to be realized as one of the aims of the Shari'ah. In order to integrate the Muslim community, the institution of sincere advice is perceived as a fundamental obligation: "You are the best ummah that has been raised up for mankind. You enjoin right conduct and forbid indecency and you believe in Allah" (3:110).
                                        On the basis of these principles, the ultimate goal of Islamic counselling would be to develop an Islamic personality. This personality needs to be healthy, balanced, and well-integrated and have all of its drives, emotions, and cognitive operations directed towards a pursuit for the pleasure of God.
                                    </p>

                                    <p class="mb-5">This type of personality is successful in overpowering the evil prone self (nafs ul ammarah). Deviant pathological behaviour is corrected by an inducement of the reproaching self (nafs ul lawwamah).</p>

                                    <p class="mb-5">The ultimate target is the attainment of absolute and constant contentment (nafs al mutma’innah), which is possible through a consonance of the human psyche with God. This is the stage of the constant contentment of psyche. If the ultimate objective of Islamic counselling is this contentment, the needed instruments for its realization include the constant remembrance of God (dhikr), truthfulness (sidq), and sincerity (ikhlas).</p>

                                    <p class="mb-5"><strong>The Islamic Shariah (Qur’anic) foundations of the AIMS ethics code</strong></p>

                                    <p class="mb-5">The Divine guidance of Islam (the Sharia) is considered by scholars to return to one principle: that of mercy — which in practice means seeking to avert harm and acquire benefit for as many of God's creation as possible. The classical scholars, upon surveying all of rulings of Islamic law, determined that this 'benefit' returns to five (or six) principles, which form the basis of the rights-paradigm of Islam.</p>

                                    <ul class="mb-5">
                                        <li class="mb-3">The right to know God and nurture the soul (Hifdh al-Din)</li>
                                        <li class="mb-3">The right to life, health, and physical welfare (Hifdh al-nafs)</li>
                                        <li class="mb-3">The right to education and intellectual development (Hifdh al-‘aql)</li>
                                        <li class="mb-3">The right to a family life and social inclusion (Hifdh al-Nasl)</li>
                                        <li class="mb-3">The right to dignity and self esteem (Hifdh al-I’rdh)</li>
                                        <li class="mb-3">The right to material welfare and relief from poverty (Hifdh al-Mal)</li>
                                    </ul>

                                    <p class="mb-5">
                                        This publication represents the Association’s principles for safe, effective practice of professional care (therapy) and related activities driven by the core values of Islam and its beliefs for Muslim Member Practitioners. As such we encourage all members to become fully aware of its content and to practice in compliance with the <strong>Ethics and Practice Guidance</strong> in this publication. The Quran explaining the importance of complying to set agreement states:

                                    </p>

                                    <p class="text-primary-500 mb-5">
                                        <strong>…and those who fulfil their pledge when they pledge… these are those who are truthful, and they are the ones conscious of their Lord. (Quran: 2:177)</strong>
                                    </p>

                                    <p class="mb-5">
                                        <strong>
                                            The aim of the Association is, and will remain, to promote excellence in counselling within the framework of the Islamic faith.
                                            <br/>
                                            <span class="text-primary-500">
                                                …and who can be better in judgement than Allah for a people who believe with certainty
                                                (Quran: 5:50)
                                            </span>
                                        </strong>
                                    </p>
                                </div>

                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[1]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[1] }}</h2>

                                <div class="text">
                                    <ul class="mb-5">
                                        <li class="mb-3">It is not the Association’s purpose to promote all Muslim Members to provide counselling and therapy in a set way. However, we do expect our Member Practitioners to implement Islamic moral teachings as stated in the Quran and Hadith within their practice, when working with Muslim clients. <span class="text-primary-500">The religion is (mostly) a quest for righteousness. (Bukhari)</span></li>
                                        <li class="mb-3">
                                            We expect our Member Practitioners to maintain their Islamic beliefs and teachings during their practice. Their practice should be consistent with:
                                            <ul style="list-style-type: lower-alpha;">
                                                <li class="mb-3">What the Quran and Hadith state about the nature of God and belief pertaining to God – that He is both the creator and judge of human beings. <span class="text-primary-500">Allah is the Creator of everything, and He is the Guardian over everything. (Quran: 39:62) Is Allah not the best judge of the ones who judge? (Quran: 95:8)</span></li>
                                                <li class="mb-3">Prophet Muhammad (peace and salutations upon him) is the final messenger sent to the world. <span class="text-primary-500">Muhammad صلى الله عليه وسلم is not a father of anyone from among your men, rather a messenger of Allah and the Seal of Prophethood… (Quran: 33:40)</span></li>
                                                <li class="mb-3">No one person is better than another, except in rank of piety. <span class="text-primary-500">The most noble of you by Allah is certainly the most conscious of Him… (Quran: 49:13)</span></li>
                                                <li class="mb-3">There will be resurrection after death and all people will be accountable for their deeds on the Final Day. <span class="text-primary-500">And We will place the Scales of Fairness on the day of Standing. A soul will then not be wronged in any way; even though it be a weight of a grain of mustard-seed; We will bring it. And we are sufficient as Ones Reckoning. (Quran: 21:47)</span></li>
                                                <li class="mb-3">Establishing of obligatory worship cannot be excused for Muslims except through specifically sought edicts from those proficient in Islamic jurisprudence.</li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">
                                            In light of the above, we may define counselling in adherence to Islamic Ethics and Code of Practice as: “Activity(ies) which seeks to help people towards constructive change and growth in any or every aspect of their lives through a caring relationship and within agreed relational boundaries, carried out by a counsellor whose practice is consistent with the teachings of the Quran and Hadith in regard to themselves as a Muslim counsellor and in regard to a Muslim client.”
                                            <ul class="list-unstyled">
                                                <li class="mb-3">Statement of Faith - We affirm with verbal testimony the fundamental beliefs of the Islamic faith as expressed in the Quran and Hadith. There is no deity except Allah, and Muhammad صلى الله عليه وسلم is His servant and His messenger. We believe in all sent prophets (salutations upon them all), the existence of angels, all Divine Scriptures, the Final Day, all happenings; good or bad are as decreed by the Lord and that we will be resurrected after death.</li>
                                                <li class="mb-3">
                                                    Islam is to testify that there is no deity except Allah and that Muhammad صلى الله عليه وسلم is the Messenger of Allah, that you establish Salah, distribute Zakāh, observe fast and perform haj if you can way to it…
                                                    <br/>
                                                    Iman is to believe in Allah, His Angels, His Scriptures, His Prophets (peace and salutations upon them), in the Final day and to believe in predestination; its good and its bad… (Muslim)
                                                    Then you will certainly be resurrected on the Day of Standing. (Quran: 23:16)
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">We recognise these truths and specifically the beliefs regarding the God’s attributes and the finality of Prophet Muhammad’s (peace and salutations upon him) prophethood, in all areas of our life and practice.</li>
                                        <li class="mb-3">We acknowledge that there are slight variations in certain Islamic beliefs among the Muslims. However, the aforementioned beliefs are core beliefs with unequivocal consensus upon them among the Muslims.</li>
                                        <li class="mb-3">We acknowledge that some ethical norms may sometimes clash. Members may sometimes need to hold them in tension. Since every situation is different, it is not possible to set out a hierarchy of norms. However, deviance from the aforementioned core beliefs would be deemed unethical and contrary to the basic Islamic ethics and values. Adherence to these core beliefs is essential for a Muslim Practitioner along with empathy, unconditional positive regard, and a non-judgemental approach to all clients, Muslims, and non-Muslims.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[2]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[2] }}</h2>

                                <div class="text">
                                    <p class="mb-5">The methods Muslim Member Practitioners will employ will be consistent with all the ethics and values set out in this Framework. They will conduct themselves with the highest levels of professionalism during all therapeutic interventions. We take this to imply that the Association and its members will:</p>

                                    <ul class="mb-5">
                                        <li class="mb-3">Maintain a high quality of skills and knowledge and apply these well.</li>
                                        <li class="mb-3">Conduct the relationships with clients with the utmost integrity and professionalism.</li>
                                        <li class="mb-3">Respect clients’ rights and their dignity at all times.</li>
                                        <li class="mb-3">Value the quality of relationships between themselves and the client</li>
                                        <li class="mb-3">Practice with the intention of supporting those in need of support.</li>
                                        <li class="mb-3">Practice with the intention of pleasing God through their support for others.</li>
                                        <li class="mb-3">Aim to minimise distress and suffering of the client through their practice.</li>
                                        <li class="mb-3">Encourage clients to understand their situation themselves appropriately and without prejudice.</li>
                                        <li class="mb-3">Allow clients to move towards personal wholeness - mentally, spiritually, and physically.</li>
                                        <li class="mb-3">Be sensitive to the diversity of human experience, values, and culture. They will not be judgmental, prejudicial, or discriminatory.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[3]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[3] }}</h2>

                                <div class="text">
                                    <ul class="mb-5" >
                                        <li class="mb-3">
                                            Muslim Member Practitioners should respect their clients’ right to take decisions for, and to act for, themselves. The practitioner will maintain the client’s integrity by, among other things:

                                            <ol style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Being clear about the service they are offering</li>
                                                <li class="mb-3">Offering a clear verbal or written contract which highlights the period of the work and any pertaining costs</li>
                                                <li class="mb-3">Providing the client, the assurance of confidentiality and privacy within the limits of the Law of the Land</li>
                                                <li class="mb-3">Avoiding manipulation of the client</li>
                                            </ol>
                                        </li>
                                        <li class="mb-3">
                                            Muslim Members should be committed to always securing the client’s best interests. This means, among other things, that Member should:

                                            <ol style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Work within the limits of their competence</li>
                                                <li class="mb-3">Be conscious that the God is All-Watchful</li>
                                                <li class="mb-3">Monitor and review the outcome of their work</li>
                                                <li class="mb-3">Maintain adequate supervision</li>
                                                <li class="mb-3">Continue personal professional development to ensure the high level of competency</li>
                                            </ol>
                                        </li>
                                        <li class="mb-3">
                                            Ensure to be trustworthy. The relationship between the counsellor and the client creates a position of trust for the counsellor which then establishes an element of responsibility for the counsellor. Such as:

                                            <ol style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Maintaining confidentiality</li>
                                                <li class="mb-3">Using information only for the purpose for which the client disclosed it</li>
                                                <li class="mb-3">Maintaining a non-judgemental approach after such a disclosure</li>
                                                <li class="mb-3">Establishing fairness and empathy</li>
                                            </ol>
                                        </li>
                                        <li>Muslim Members should be particularly aware of their responsibility to clients who are unable to take decisions for themselves because of youth, advancing age, illness, distress, lack of understanding or learning disability.</li>
                                        <li>
                                            Members should avoid any action which might cause harm to a client. This means, among other things, that Member Practitioners:
                                            <ol style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Will not take advantage of clients or exploit them in any way; sexually, financially, psychologically, spiritually, or emotionally. The faith element of ‘God being aware of everything’ will be at the forefront of all that is done</li>
                                                <li class="mb-3">Will work only when they are fit (physically, psychologically, and spiritually) without harm to themselves or the client</li>
                                                <li class="mb-3">Will work to minimise any harm they cause to the client unintentionally</li>
                                            </ol>
                                        </li>
                                        <li>
                                            Muslim Member Practitioners should treat all clients fairly. This means, among other things, that Members:
                                            <ol style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Will respect the beliefs, rights, and dignity of every client</li>
                                                <li class="mb-3">Will be aware of their legal responsibilities, according to the Law of the land, in relation to each client</li>
                                            </ol>
                                        </li>
                                        <li>
                                            Muslim Member Practitioners should act in a way that safeguards their own welfare. This means, among other things, that Members:
                                            <ol style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Will work in a way which will enable them to be healthy and safe. This includes keeping a good balance between working time, family time, social time, and fulfilment of spiritual obligations</li>
                                                <li class="mb-3">Will seek counselling or therapy or spiritual advice for personal support</li>
                                                <li class="mb-3">Will protect their own position by obtaining appropriate insurance to cover the counselling work they undertake</li>
                                            </ol>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[4]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[4] }}</h2>

                                <div class="text">
                                    <p class="mb-5">Each Practitioner is unique and has their own blend of gifts, skills, and attributes. These are their personal qualities. However, there are some qualities that Member Practitioners should try to develop to benefit the client. These include:</p>

                                    <ul class="mb-5">
                                        <li class="mb-3">Genuineness: what is said must be coordinated with what is thought</li>
                                        <li class="mb-3">Honesty: being straightforward and avoiding all forms of deception</li>
                                        <li class="mb-3">Spiritual Maturity: be what you preach</li>
                                        <li class="mb-3">Competence: working according to one’s training and experience. Otherwise referring on to appropriate services and personnel</li>
                                        <li class="mb-3">Empathy: appreciating the client’s experience from the client’s perspective and demonstrating understanding of its significance</li>
                                        <li class="mb-3">Steadfastness: being resilient for the client’s concerns without unduly abandoning them</li>
                                        <li class="mb-3">Respect: respect everyone and show compassion to all, irrespective of differences</li>
                                        <li class="mb-3">Humility: being realistic of one’s ability and realistically estimating one’s own strengths and weaknesses</li>
                                        <li class="mb-3">Equity: making fair assessments of people and situations based on the best available information</li>
                                        <li class="mb-3">Courage: not allowing fear or uncertainty to stop one doing what is necessary for the holistic betterment of the client</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[5]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[5] }}</h2>

                                <div class="text">
                                    <p class="mb-5">The Association encourages Muslim Member Practitioners to keep record of all counselling intervention. They should keep this record so they can refer to it if need arises. Some counselling modalities do not require a client to fill in a questionnaire or perform diagnoses prior to the counselling session. Each therapist, depending on the modality they use, should try and ensure relevant steps are taken to protect themselves and the client.</p>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[6]) }}">
                                <h2 class="fs-2 fw-medium text-primary-500 mb-5 text-uppercase">{{ $titles[6] }}</h2>

                                <div class="my-5">
                                    <div class="card bg-primary-500 rounded-4 position-relative">
                                        <div class="position-absolute text-white" style="font-size:80px;top: -12px;right: 10px;">”</div>
                                        <div class="card-body p-4 p-md-5 text-white">
                                            <p class="text mb-0">All clients are entitled to lofty standards of practice and care from Member Counsellors.</p>
                                        </div>
                                    </div>
                                </div>

                                <ul class="mb-5 text">
                                    <li class="mb-3">To achieve the aforementioned, Member Practitioners will need to be professionally competent, have appropriate, constructive relationships with clients and colleagues and adhere to the aforementioned professional ethics.</li>
                                    <li class="mb-3">
                                        <p>Maintain lofty standards of practice and care:</p>
                                        <ol style="list-style-type: lower-alpha;">
                                            <li class="mb-3">Good practice which requires the Practitioners and the client to agree their respective rights and responsibilities at the start of the intervention and then to review what has been agreed as appropriate throughout the relationship</li>
                                            <li class="mb-3">Member Practitioners should communicate to clients the nature and basis of service they offer, including availability, degree of confidentiality offered and any other significant matters</li>
                                            <li class="mb-3">Member Practitioners should exercise great care when entering into an agreement to provide counselling with someone with whom they already have (or have had) a different type of relationship (for example, as a friend, a colleague, or a trainer). It may not be beneficial to provide counselling in these circumstances. It is particularly important in these circumstances to be fully accountable to colleagues and/or a supervisor for any such relationships that occur</li>
                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Member Counsellors should be competent</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <li class="mb-3">As an essential part of maintaining good practice, Member Practitioners should regularly evaluate the work they have done. We recommend that this evaluation should include feedback from colleagues, supervisors, managers, and others as well as client satisfaction feedback. Responding openly and constructively to evaluation helps to maintain and enhance competent practice</li>
                                            <li class="mb-3">Member Practitioners must keep up to date with the latest professional training and techniques (up to a level appropriate for their work). They must respond to changing thinking and ideas. They should carefully consider their own need for always continuing professional development</li>
                                            <li class="mb-3">Member Practitioners need to know any legal requirements that affect their work. They must, then comply with these requirements.“</li>
                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Clients need to expect their Member Counsellors to be trustworthy.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <li class="mb-3">Clients need to have all the information they need to make an informed choice as to whether to use the intervention a practitioner is offering. Clients have a right to terminate the service they are receiving. Member Practitioners should make clients aware of circumstances in which they might terminate the work.</li>
                                            <li class="mb-3">Member Practitioners use clear, culturally appropriate forms of respectful communication with the clients at all times.</li>
                                            <li class="mb-3">Member Practitioners provide services with the client’s explicit consent. For counselling and supervision, this will normally be in writing, but not necessarily the case – depending on the modality of the practitioner employs.</li>
                                            <li class="mb-3">Member Practitioners deal appropriately with situations in which clients pose a risk of causing serious harm to themselves or others. This can be particularly difficult and stressful for members. The overriding objective must be to protect all concerned from harm. As far as possible, member Practitioners should only take potentially contentious decisions after consulting appropriately with colleagues, managers, and supervisors</li>
                                            <li class="mb-3">Member Practitioners working with children and young people are to do so with the consent of someone with parental responsibilities</li>
                                            <li class="mb-3">Member Practitioners should show respect to the client by protecting identifiable and sensitive information from unauthorised and unnecessary disclosure</li>
                                            <li class="mb-3">Member Practitioners should not allow any personal views they may hold about lifestyle, gender, age, disability, race, sexual orientation, beliefs, or culture to prejudice their professional relationships with clients who are of other faith or non-faith</li>
                                            <li class="mb-3">Member Practitioners must not bring the Association or the counselling profession into disrepute, by anything they do or fail to do.</li>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Supervision and support are essential to counselling and related services.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <li class="mb-3">Those who provide supervision and management should have appropriate training, so that they are able to monitor and improve practice for members with the aim of protecting clients from incompetent practice</li>
                                            <li class="mb-3">All counsellors, supervisors, coaches and trainers should receive supervision/consultative support from a qualified Islamic practitioner</li>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Members should only work when fit to do so.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Member Practitioners must make sure that they remain fit to provide an effective professional service. If, for any reason, this is not possible, for example because of health, personal or professional circumstances, they should seek the advice of their supervisor or experienced colleagues and, if necessary, withdraw from practice until they are, once again, fit to practice. They should inform the client at the first instance and make suitable arrangements, if possible, for any clients who are to be affected</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">When mistakes are made, harm should be minimised.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <li class="mb-3">Member Practitioners must respond promptly and appropriately to any complaint they receive from a client</li>
                                            <li class="mb-3">A member Practitioners who has made an error in their practice should seek professionally acceptable ways to minimise its effects</li>
                                            <li class="mb-3">A member Practitioners should discuss with their supervisor, manager, or other experienced practitioner any circumstances in which they may have made errors in their work to ensure that they have taken appropriate steps to minimise any harm and to prevent such errors occurring again</li>
                                            <li class="mb-3">The Association strongly encourages member Practitioners to obtain adequate professional indemnity and liability insurance cover for their work</li>
                                            <li class="mb-3">When requested by the client, member Practitioners should tell clients about the existence of this Association’s Complaints Procedure</li>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Member Counsellors have a role in maintaining professional standards generally.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p>All member Practitioners, when they have good reason to believe that other practitioners are placing clients at risk of harm, have a responsibility to protect those clients.
                                                    Member Practitioners should raise any concerns with the practitioner concerned in the first instance unless it is inappropriate to do so. If they cannot resolve the matter, they should gather the evidence available to them and make it available to the practitioner’s manager, agency, or professional body as soon as possible</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Good working relationships assist safe care of clients.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <li class="mb-3">Member Practitioners should treat all clients and colleagues (whether in their own organisation or another) fairly and with respect</li>
                                            <li class="mb-3">All communications between colleagues about clients should be purposeful, respectful, and consistent with the level of confidentiality agreed with clients</li>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Member Counsellors are sensitive to a multi-faceted, multi-ethnic society.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Member Practitioners are responsible for working in a way that is sensitive and appropriate to the client’s culture, beliefs and understanding.</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Making appropriate referrals assists care of clients.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Member Practitioners must discuss with the client in advance all onward referrals to colleagues and other services. They should obtain the client’s consent both to making the referral and also to disclosing information to accompany it.</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Clients should be well informed about services offered.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Member Practitioners must communicate to the client the nature and basis of the counselling they are offering, including availability, the degree of confidentiality they are offering and any other significant matters.</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Financial arrangements must be clear and open.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Member Practitioners’ financial relationships both with clients and others should be always honest and open.</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">The care of the client should not be compromised by other interests.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p>Member Practitioners should avoid conflicts of interest. If a conflict of interest does occur, the member Practitioners’ first concerns should be to safeguard the client’s interests and to maintain the standing of the helping profession.</p>
                                            </div>

                                            <div class="my-5">
                                                <div class="card bg-primary-500 rounded-4 position-relative">
                                                    <div class="position-absolute text-white" style="font-size:80px;top: 30px;right: 10px;">”</div>
                                                    <div class="card-body p-4 p-md-5 text-white">
                                                        <p class="fs-24 text mb-0">Member Counsellors should seek to maintain their own well-being.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <li class="mb-3">A member Practitioner’s well-being is essential to maintaining good standards of practice.</li>
                                            <li class="mb-3">Member Practitioners should make sure that their work does not have adverse effects on their health, personal relationships or mental or spiritual well-being.</li>
                                        </ol>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[7]) }}">
                                <h2 class="fs-2 fw-bolder text-primary-500 mb-4 text-uppercase">{{ $titles[7] }}</h2>

                                <div class="text">
                                    <ul>
                                        <li class="mb-3">This complaint’s procedure forms an essential part the Association’s commitment to protect members of the public and the reputation of the profession of its members.</li>
                                        <li class="mb-3">The contract that a client has with an individual Practitioners, or an organisation should give information about Complaints Procedures including information on how to access the Association’s complaint procedure if local procedures do not resolve matters.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[8]) }}">
                                <h2 class="fs-2 fw-bolder text-primary-500 mb-4 text-uppercase">{{ $titles[8] }}</h2>

                                <div class="text">
                                    <ul>
                                        <li class="mb-3">
                                            The Association will implement its Complaints Procedure in the following way:
                                            <ul style="list-style-type: lower-alpha;">
                                                <li class="mb-3">The basis for making a complaint is a breach of “Ethics for members of the Association”</li>
                                                <li class="mb-3">
                                                    In order for a complaint against an Association member, it should normally be lodged within two years of the alleged breach occurring. The complainant should give the details of the complaint in writing to the Chair of the Association. The following information should be included:
                                                    <ul style="list-style-type: lower-alpha;">
                                                        <li class="mb-3">The name of the person and/or organisation against whom the complaint is made.</li>
                                                        <li class="mb-3">The date or dates of the alleged breach of professional ethics.</li>
                                                    </ul>
                                                </li>
                                                <li class="mb-3">The place or places in which the alleged breach occurred. And whether the alleged breach took place within a contracted counselling relationship</li>
                                                <li class="mb-3">The name of the organisation (if any) to which the counsellor belongs.</li>
                                                <li class="mb-3">The details of the complaint in writing, signed and dated.</li>
                                                <li class="mb-3">A complaint not satisfying the above conditions will be rejected.</li>

                                            </ul>
                                        </li>
                                        <li class="mb-3">No expenses will be paid by the Association in respect of travel or other expenses incurred either by the complainant or the person complained against.</li>
                                        <li class="mb-3">The protocols followed will be those laid down by the Association.</li>
                                        <li class="mb-3">Before making a complaint, the complainant is expected to have sought to resolve the matter through the individual Practitioner’s or organisational members’ normal complaints procedure.</li>
                                        <li class="mb-3">The Association reserves the right to distribute any findings upheld against a member where it considers it just and right to do so in all the circumstances.</li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[9]) }}">
                                <h2 class="fs-2 fw-bolder text-primary-500 mb-4 text-uppercase">{{ $titles[9] }}</h2>

                                <div class="text">
                                    <ul>
                                        <li class="mb-3">On receiving the complainant’s letter, the Chair of the Association will write to acknowledge it, normally within 7 days, and then begin the process of investigation.</li>
                                        <li class="mb-3">The Chair of the Association may, after consulting with other Directors and/or Officers, suspend a Practitioners from accreditation and/or membership.</li>
                                        <li class="mb-3">The Chair can make this suspension with immediate effect, and it may continue until the investigation is complete and the Disciplinary Committee and the Appeals Panel have made their decisions.</li>
                                        <li class="mb-3">No liability for any loss suffered, or expenses incurred, will attach to the Association for the suspension of membership or rights of membership even where a complaint is not upheld.</li>
                                        <li class="mb-3">The Chair of the Association will write to the person against whom the complaint was made, normally within 14 days. This letter will contain details of the complaint.</li>
                                        <li class="mb-3">Where necessary, the Association will take legal advice to guide it as it investigates the complaint. It will continue to do so throughout the duration of the investigation, as necessary.</li>
                                        <li class="mb-3">The Association will conduct the investigation through correspondence unless it is decided that the relevant parties need to meet with the appointed complaint investigator.</li>
                                        <li class="mb-3">The complaint investigator has the authority to request copies of the counselling contract, advertising material, supervisor’s report, and training certificates.</li>
                                        <li class="mb-3">When the investigator has collated all relevant information, the findings will be submitted to a Pre-hearing Assessment Panel, normally consisting of the Chair, Chief Executive and Director of Professional Standards. This panel will decide whether there is a prima face case to answer and therefore whether to accept the complaint to be dealt with by the Disciplinary Committee of the Board, refer it back for further information/clarification, or reject it. The panel has the discretion to interview the complainant and/or the person(s) complained against if deemed appropriate.</li>
                                        <li class="mb-3">If further information/clarification is requested, upon receipt of same, the complaint will be re-submitted to the Pre-hearing Assessment Panel which will decide whether to accept it to be dealt with at Disciplinary Committee or reject it.</li>
                                        <li class="mb-3">If the complaint is rejected by the panel, the complainant, and the person(s) complained against will be formally notified. The decision of the Pre-hearing Assessment Panel will be final.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[10]) }}">
                                <h2 class="fs-2 fw-bolder text-primary-500 mb-4 text-uppercase">{{ $titles[10] }}</h2>

                                <div class="text">
                                    <ul>
                                        <li class="mb-3">When there is acceptance of a complaint, both parties will be notified in writing that the complaint is proceeding to the Disciplinary Committee of the Board of Directors.</li>
                                        <li class="mb-3">A full copy of the formal complaint will be submitted to the member complained against, who will have 28 days to respond to the complaint. Any response should be sent to the Chief Executive.</li>
                                        <li class="mb-3">All evidence submitted either by the complainant or the person(s) complained against normally shall be available to the parties involved in the complaint. All relevant submissions made will be distributed by the Chief Executive to the parties concerned. Material received by the parties must be treated as strictly confidential and may not be forwarded on elsewhere.</li>
                                        <li class="mb-3">It is the duty of the parties concerned to comply with the protocols of the Association in relation to the Complaints Procedure. Any failure to comply may result in the termination of the procedure and/or termination of membership of the Association.</li>
                                        <li class="mb-3">The Disciplinary Committee of the Board shall consist of at least three members of the Board or Executive who have not been involved in any way in investigating the Complaint. Members have a duty to declare any interest which may affect their impartiality, or be likely to be considered to do so, when approached by the Chair of the Association.</li>
                                        <li class="mb-3">The purpose of the Disciplinary Committee is to examine the complaint and decide whether the complaint is proved or not.</li>
                                        <li class="mb-3">The Disciplinary Committee will receive reports from the complaint investigator and all parties to the complaint may attend and put their case. One person of their choosing may accompany parties attending. The Association will not be responsible for the costs of parties attending. The venue will be at a place of the Association’s choosing.</li>
                                        <li class="mb-3">All written evidence and/or submissions and witness statements, from all parties concerned, must be submitted in advance to the Chief Executive. This must be not less than 28 days prior to the date fixed for the Committee’s hearing.</li>
                                        <li class="mb-3">Parties wishing to call witnesses must notify the Chief Executive, 28 days in advance, giving the name and details of such witnesses. Attendance will only be permitted by the Chair of the Committee if the witness has supplied a statement which requires clarification. The Committee has discretion to refuse attendance by a witness if it reasonably believes that such attendance is not relevant or will not add any weight to the issue(s) under consideration. Witnesses may be questioned by the Committee and either party connected with the case.</li>
                                        <li class="mb-3">
                                            Where either party fails or refuses, without good reason or notice, to attend the Disciplinary Committee, the Chair has the power to decide to:
                                            <ul style="list-style-type: lower-alpha;">
                                                <li class="mb-3">Proceed with the hearing in their absence</li>
                                                <li class="mb-3">Adjourn to another date</li>
                                                <li class="mb-3">Terminate the proceedings</li>
                                                <li class="mb-3">Terminate membership.</li>
                                            </ul>
                                        </li>
                                        <li class="mb-3">The Association will write to the complainant and the person(s) complained against to inform them of the decisions of the Disciplinary Committee within 28 days.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 border-bottom py-4" id="{{ str_replace(' ', '_', $titles[11]) }}">
                                <h2 class="fs-2 fw-bolder text-primary-500 mb-4 text-uppercase">{{ $titles[11] }}</h2>

                                <div class="text">
                                    <p>The Association will conduct any disciplinary measures which the Disciplinary Committee of the Board of Directors decides are appropriate. These may include one or more of the following sanctions. These may be imposed at any given time:</p>
                                    <ul>
                                        <li class="mb-3">A written warning, which may include a request for an apology and an undertaking that there will be no further breach of the Code.</li>
                                        <li class="mb-3">A requirement for the person or organisation complained about to undertake further training or for a supervisor acceptable to the Association Board of Directors to monitor their work.</li>
                                        <li class="mb-3">Suspension of the membership of an individual or of the affiliation of the organisation.</li>
                                        <li class="mb-3">Permanent withdrawal of the membership of an individual or of the affiliation of the organisation.</li>
                                        <li class="mb-3">This list is not exhaustive and disciplinary measures may include such other measures as may be appropriate and fair in the circumstances.</li>
                                        <li class="mb-3">Failure to comply with any sanction will result in the immediate termination of membership.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 py-4" id="{{ str_replace(' ', '_', $titles[12]) }}">
                                <h2 class="fs-2 fw-bolder text-primary-500 mb-4 text-uppercase">{{ $titles[12] }}</h2>

                                <div class="text">
                                    <ul>
                                        <li class="mb-3">The parties to a complaint may appeal against the decisions and any sanctions of the Disciplinary Committee of the Association Board of Directors by writing to the Chair of the Association within 2 weeks from the date on which they are notified of the decision. The letter must state the grounds for appeal.</li>
                                        <li class="mb-3">
                                            An Appeal will be granted unless the Chair of the Association considers:
                                            <ul style="list-style-type: lower-alpha;">
                                                <li class="mb-3">That there is insufficient evidence available, or likely to be available to satisfy the grounds for appeal.</li>
                                                <li class="mb-3">That the Appeal is frivolous or vexatious.</li>
                                            </ul>
                                            <p>This decision will then be final.</p>
                                        </li>
                                        <li class="mb-3">
                                            An appeal will be considered on any of the following grounds:
                                            <ul style="list-style-type: lower-alpha;">
                                                <li class="mb-3">The decision was made against the weight of evidence.</li>
                                                <li class="mb-3">The sanction applied is disproportionate to the findings of the Committee and is unjust in all the circumstances.</li>
                                                <li class="mb-3">There is evidence to suggest that a procedural impropriety may have had a material effect on the finding and the Committee’s decision.</li>
                                                <li class="mb-3">There is new evidence which was not available at the time of the Disciplinary Committee hearing.</li>
                                                <li class="mb-3">When a person appeals, the Chair will appoint an Appeals Panel of experienced persons especially convened for the purpose and will lay the complaint before them. The Panel members will not currently be part of the Association Board, Executive or other significant Committees and will not have had any involvement in the matters to be considered.</li>
                                                <li class="mb-3">There will be no further appeal opportunities beyond the one aforementioned opportunity.</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End -->
@endsection
