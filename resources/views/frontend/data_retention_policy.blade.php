@extends('layouts.frontend.app')

@section('meta_keywords', 'Data Retention Policy')
@section('meta_description', 'Learn about our data retention policy')

@section('title', 'Data Retention Policy')

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
            <a href="#" class="text-white align-self-center">Data Retention Policy</a>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="section service-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fs-1 fw-bold text-primary-500">Data Retention Policy</h1>

                    <div class="my-4">
                        <p>The Association of Islamic Mental Health Specialists (AIMS) manages all personal information in
                            accordance with the UK GDPR and relevant UK data protection laws. We only keep personal data for
                            as long as necessary to fulfil the purpose for which it was collected, whether stored
                            electronically, on paper, or in other secure formats.</p>
                        <p>Right to Erasure and Exceptions</p>

                        <p>Under the UK GDPR, individuals can request the deletion of their personal data (“right to erasure”).
                        We will remove such data promptly unless we have a lawful reason to refuse.</p>

                        <p>Situations where deletion may be refused include:</p>
                        <ul>
                            <li>Compliance with a legal obligation or the performance of a task carried out in the public interest.</li>
                            <li>Public health purposes in the public interest.</li>
                            <li>Archiving for public interest, research, or statistical purposes.</li>
                            <li>The establishment, exercise, or defence of legal claims.</li>
                        </ul>

                        <p>We may also refuse deletion requests for current or former members where there are ongoing or
                        historical professional conduct investigations (managed by AIMS or another relevant body such as a
                        training institution or another membership organisation).</p>

                        <p><strong>Retention Guidelines by Category</strong></p>
                        <p><strong>a) Website Visitors</strong></p>
                        <ul>
                            <li>Data is processed and stored in the UK.</li>
                            <li>Information collected by third parties (e.g., browsers, analytics tools) is held according to their
                        own policies.</li>
                            <li>Personal data is retained only for as long as needed to fulfil the purpose for which it was
                        collected and to comply with legal, accounting, or reporting obligations.</li>
                            <li>For example, purchase-related records may be retained for 6 years after the transaction.</li>
                        </ul>
                        <p><strong>b) Enquiries</strong></p>
                        <ul>
                            <li>Enquiries linked to AIMS membership, register listings, or pastoral support are kept for as long as
                            necessary to address the query.</li>
                            <li>General public enquiries (e.g., finding a mental health specialist) are deleted once resolved.</li>
                        </ul>

                        <p><strong>c) Purchasers</strong></p>
                        <ul>
                            <li>Data related to purchases of services, training, or events is retained for 6 years after the
                            purchase or event completion (whichever is later).</li>
                            <li>After this period, data may be kept in our marketing contact database only if explicit consent has
                            been given.</li>
                        </ul>

                        <p><strong>d) Members and Organisational Contacts</strong></p>
                        <ul>
                            <li>Memberships with no complaint jurisdiction</li>
                            <li>Upon membership termination, personal data is kept for 6 years to address any administrative or
                            accounting needs.</li>
                            <li>After 6 years, records are deleted unless linked to another active membership.</li>
                            <li>Memberships subject to complaints procedures</li>
                            <li>For members in categories where professional complaints may be heard, records are retained indefinitely.</li>
                            <li>This includes any related referee, supervisor, or sponsor details, as well as documentation from
                        practice reviews and accreditation processes.</li>
                        </ul>


                        <p><strong>e) Complaints</strong></p>
                        <ul>
                            <li>Records follow our complaints policy, which specifies:</li>
                            <li>Short-term retention of all investigation records for 2 years after case closure.</li>
                            <li>Indefinite retention of a summary of the complaint and panel decision.</li>
                            <li>Sanctions may be published and shared with relevant bodies.</li>
                            <li>Complaint files are kept separately from membership records, but sanction details are recorded electronically.</li>
                        </ul>

                        <p><strong>f) Shared Sanctions</strong></p>

                        <ul>
                            <li>In line with protocols between PSA-accredited registers, certain sanctions are shared with other
                        register holders and kept indefinitely unless advised otherwise by the originating organisation.</li>
                        </ul>

                        <p><strong>g) Personnel and Service Providers</strong></p>

                        <ul>
                            <li>Employee records are kept for 12 months after employment ends, with limited details (e.g., name,
                            dates, role, salary, disciplinary actions) retained for 6 years.</li>
                            <li>Dispute-related records are kept for 2 years after resolution.</li>
                            <li>Recruitment records for unsuccessful applicants are retained for 1 year.</li>
                            <li>Service provider data is retained for 6 years after the last service was delivered.</li>
                        </ul>

                        <p><strong>h) Marketing Contacts</strong></p>

                        <ul>
                            <li>Contacts can opt out at any time; removal occurs within 10 working days.</li>
                            <li>If no opt-out is received, data is retained indefinitely unless another retention rule applies.</li>
                        </ul>

                        <p><strong>i) Financial Records</strong></p>

                        <ul>
                            <li>Transaction records are kept for 6 complete financial years after the financial year in which they
                            occurred, in line with HMRC requirements.</li>
                            <li>Gift Aid records are kept for 6 years after the last donation.</li>
                        </ul>

                        <p><strong>j) Offsite Data Storage by Third Parties</strong></p>
                        <ul>
                            <li>Any AIMS-related personal data stored by contracted individuals (e.g., assessors, investigators)
                        must be secure, accurate, and used solely for the agreed service.</li>
                            <li>Once the service ends, all data must be securely deleted from personal devices and transferred to
                        AIMS systems if retention is required.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

@endsection
