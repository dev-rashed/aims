@extends('layouts.frontend.app')

@section('meta_keywords', 'Aims membership')

@section('title', 'Aims membership')

@section('content')
    <style>#invalid_phone {display: block}</style>
    <section class="section section-checkout" style="background-image: url('{{ asset('build/assets/frontend/images/membership/bg.png') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-lg-auto">
                    <div class="card rounded-20 border-0 shadow-lg">
                        <div class="card-body py-5">
                            <form id="submit" action="{{ route('membership.store') }}" method="post" enctype="multipart/form-data" data-redirect="{{ route('checkout.confirmation') }}">
                                @csrf
                                <input type="hidden" name="membership_plan" id="membership_plan" value="{{ $membershipPlan->slug }}" />
                                <input type="hidden" name="membership_type" id="membership_type" value="{{ request()->get('type') }}" />
                                <h1 class="fs-1 fw-bold text-primary-500 text-center">Apply for Membership</h1>
                                @php
                                    $stripeEnable = config('services.stripe.enable');
                                    $length = $stripeEnable ? 3 : 2;
                                @endphp
                                <div class="stepper-wrapper">
                                    @for ($i = 1; $i <= $length; $i++)
                                        <div @class(['stepper-item', 'active' => $i == 1])>
                                            <div class="step-counter">{{ $i }}</div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-1">
                                        <h5 class="fs-22 fw-bold text-primary-900 text-center">Personal Information</h5>
                                        <div class="row mt-5">

                                            <x-frontend.input-group
                                                label="first_name"
                                                placeholder="First Name"
                                                column="col-md-6"
                                                :value="auth()->user()->first_name ?? ''"
                                                :readonly="auth()->check()"
                                            />
                                            <x-frontend.input-group
                                                label="last_name"
                                                placeholder="Last Name"
                                                column="col-md-6"
                                                :value="auth()->user()->last_name ?? ''"
                                                :readonly="auth()->check()"
                                            />
                                            <x-frontend.input-group
                                                label="email_address"
                                                for="type"
                                                for="email"
                                                placeholder="Email address"
                                                column="col-md-6"
                                                :value="auth()->user()->email ?? ''"
                                                :readonly="auth()->check()"
                                                question="This email address will be used to log in your Members Area, and to communicate with you. To improve deliverability, please avoid using forwarding addresses if possible."
                                            />

                                            <x-frontend.input-group label="phone_number" type="tel" for="phone" column="col-lg-6" />

                                            <x-frontend.input-group
                                                label="location"
                                                placeholder="Please type your location"
                                                column="col-12"
                                                :value="auth()->user()->location ?? ''"
                                                :readonly="auth()->check()"
                                                question="Please type your location, we will be suggest your location. To improve deliverability, please avoid using forwarding addresses if possible."
                                            />
                                            @guest
                                                <x-frontend.input-group
                                                    label="password"
                                                    type="password"
                                                    placeholder="Password"
                                                    column="col-md-6"
                                                    question="Your password should:
                                                    <br/>- Be at least 8 characters long
                                                    <br/>- contain a mixture of lower and upper case letters, numbers and special characters (!,& etc)
                                                    <br/>- avoid using dictionary words or names
                                                    <br/>- instead, try using made-up, multiple or adapted words (i.e. replacing letters with numbers or symbols)."
                                                    min="8"
                                                />
                                                <x-frontend.input-group
                                                    label="confirm_password"
                                                    type="password"
                                                    label="password_confirmation"
                                                    placeholder="Confirm password"
                                                    column="col-md-6"
                                                />
                                            @endguest
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-2">
                                        <h5 class="fs-22 fw-bold text-primary-900 text-center">Service Information</h5>
                                        <div class="row mt-5">

                                            <x-frontend.input-group
                                                label="Discipline/Type of service"
                                                for="services[]"
                                                column="col-12"
                                                :isInput="false"
                                                question="This service will be used to log in your Members Area, and to communicate with you."
                                            >
                                                <select name="services[]" id="services" class="select2-select" multiple="multiple" data-placeholder="Select services">
                                                    @foreach ($data->professions as $profession)
                                                        <option value="{{ $profession->slug }}">{{ $profession->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-frontend.input-group>

                                            <x-frontend.input-group
                                                label="Method (you can choose more than one)"
                                                for="method[]"
                                                column="col-12"
                                                :isInput="false"
                                                question="This method will be used to log in your Members Area, and to communicate with you."
                                            >
                                                <select name="method[]" id="method" class="select2-select" multiple="multiple" data-placeholder="Select methods">
                                                    @foreach ($data->sessions as $session)
                                                        <option value="{{ $session->slug }}">{{ $session->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-frontend.input-group>

                                            <x-frontend.input-group
                                                label="language (you can choose more than one)"
                                                for="languages[]"
                                                column="col-12"
                                                :isInput="false"
                                                question="This language will be used to log in your Members Area, and to communicate with you."
                                            >
                                                <select name="languages[]" id="languages" class="select2-select" multiple="multiple" data-placeholder="Select languages">
                                                    @foreach ($data->languages as $language)
                                                        <option value="{{ $language->slug }}">{{ $language->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-frontend.input-group>

                                            <x-frontend.input-group
                                                label="concession"
                                                for="concessions[]"
                                                column="col-12"
                                                :isInput="false"
                                                question="This concession will be used to log in your Members Area, and to communicate with you."
                                                :required="$membershipPlan->slug != 'student-member'"
                                            >
                                                <select name="concessions[]" id="concessions" class="select2-select" multiple="multiple" data-placeholder="Select concessions" @required($membershipPlan->slug != 'student-member')>
                                                    @foreach ($data->concessions as $concession)
                                                        <option value="{{ $concession->slug }}">{{ $concession->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-frontend.input-group>

                                            <x-frontend.input-group
                                                label="format"
                                                for="formats[]"
                                                column="col-12"
                                                :isInput="false"
                                                question="This format will be used to log in your Members Area, and to communicate with you."
                                                :required="$membershipPlan->slug != 'student-member'"
                                            >
                                                <select name="formats[]" id="formats" class="select2-select" multiple="multiple" data-placeholder="Select formats" @required($membershipPlan->slug != 'student-member')>
                                                    @foreach ($data->formats as $format)
                                                        <option value="{{ $format->slug }}">{{ $format->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-frontend.input-group>

                                            <x-frontend.input-group
                                                label="Description of services"
                                                for="description"
                                                column="col-12"
                                                :isInput="false"
                                                question="This description of service will be used to log in your Members Area, and to communicate with you. To improve deliverability, please avoid using forwarding addresses if possible."
                                                :required="$membershipPlan->slug != 'student-member'"
                                            >
                                                <textarea name="description" id="description" cols="5" class="form-control border-primary-300" placeholder="Write description of services" @required($membershipPlan->slug != 'student-member')></textarea>
                                            </x-frontend.input-group>

                                            <x-frontend.input-group
                                                :label="$membershipPlan->slug == 'student-member' ? 'Qualification being worked towards' : 'Level of qualification/accreditation'"
                                                for="qualification"
                                                :placeholder="$membershipPlan->slug == 'student-member' ? 'Enter Qualification being worked towards' : 'Enter Level of qualification/accreditation'"
                                                column="col-12"
                                                question="This Level of qualification/accreditation will be used to log in your Members Area, and to communicate with you. To improve deliverability, please avoid using forwarding addresses if possible."
                                            />

                                            <x-frontend.input-group
                                                label="Upload qualification/supporting documents"
                                                for="documents[]"
                                                type="file"
                                                column="col-md-6"
                                                accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps"
                                                multiple
                                                question="This qualification/supporting documents will be used to log in your Members Area, and to communicate with you. Please upload each file upto 6mb."
                                                :required="$membershipPlan->slug != 'student-member'"
                                            />
                                            <x-frontend.input-group
                                                label="image"
                                                type="file"
                                                column="col-md-6"
                                                accept="image/*"
                                                question="This image will be used to log in your Members Area, and to communicate with you. Please upload your image upto 4mb. Image size will be 270x270."
                                                :required="$membershipPlan->slug != 'student-member'"
                                            />

                                            <x-frontend.input-group
                                                label="Links to website"
                                                for="website"
                                                placeholder="Enter Links to website"
                                                column="col-12"
                                                question="This website link will be used to log in your Members Area, and to communicate with you. To improve deliverability, please avoid using forwarding addresses if possible."
                                                :required="false"
                                            />
                                            <x-frontend.input-group
                                                label="Have you been referred by a member if so type their ref number here"
                                                for="referred_by"
                                                placeholder="Enter referred by"
                                                column="col-12"
                                                :required="false"
                                            />

                                            <div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h6 class="mb-0">Website & Social Media</h6>
                                                    <button type="button" class="btn bg-primary-500 px-4 py-2 text-white" id="addPlatform" data-url="{{ route('staff.therapist.social') }}">Add Platform</button>
                                                </div>
                                                <table class="table table-bordered" id="socials">
                                                    <thead>
                                                        <tr>
                                                            <th>Platform</th>
                                                            <th>URL</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="agree" required />
                                                    <label class="form-check-label" for="agree">
                                                        I agree to AIMS Online <a href="{{ route('ethical.index') }}" class="text-primary-500">ethical framework</a> and terms and condition
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @if ($stripeEnable)
                                        <div class="tab-pane fade" id="pills-3">
                                            <h5 class="fs-22 fw-bold text-primary-900 text-center">Your Plan(s)</h5>
                                            <div class="row mt-5">
                                                <div class="col-xl-5 order-xl-2 xl-auto">
                                                    <div class="text-gray-600 fs-16 fw-medium">
                                                        <div class="border-bottom-1 border-gray-300 mb-2 pb-3">
                                                            <div class="d-flex justify-content-between text-primary-900 fs-18 fw-bold mb-2">
                                                                <p class="mb-0">Product</p>
                                                                <p class="mb-0">Subtotal</p>
                                                            </div>
                                                            @php($price = request()->get('type') == 'monthly' ? $membershipPlan->monthly_price : $membershipPlan->yearly_price)
                                                            <div class="d-flex justify-content-between">
                                                                <p class="mb-0" id="membersip_type">{{ $membershipPlan->name }}({{ request()->get('type') }})</p>
                                                                <p class="mb-0" id="membership_price">{{ convertAmount($price) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-0">Subtotal</p>
                                                            <p class="mb-0" id="subtotal_price">{{ convertAmount($price) }}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-0">Discount<span id="applied_coupon_code"></span></p>
                                                            <p class="mb-0" id="coupon_discount_amount">-{{ convertAmount(0) }}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-0">Total</p>
                                                            <p class="mb-0" id="total_amount">{{ convertAmount($price) }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3">
                                                        <p class="fs-16 fw-medium text-gray-600 mb-0">
                                                            Your personal data will be used to process your
                                                            order, support your experience throughout this website,
                                                            and for other purposes described in our <a href="{{ route('page.details', 'privacy-policy') }}">privacy policy</a>.
                                                        </p>
                                                    </div>

                                                </div>

                                                <div class="col-xl-6 order-xl-1">
                                                    <div class="row h-100 gy-5">

                                                        <div class="col-12">
                                                            <p class="fs-18 fw-bold text-primary-900">If you have a promo code, please apply it below.</p>
                                                            <div class="d-flex position-relative">
                                                                <label for="coupon" class="input-icon">
                                                                    <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.3022 5.59557C10.2659 5.36775 10.2487 5.14588 10.2506 4.92963C10.2525 4.71963 10.2725 4.51713 10.3103 4.32338L8.79656 3.579C8.5625 3.47025 8.31031 3.509 8.19344 3.75963C8.15687 3.83775 8.13344 3.93619 8.12781 4.05432L8.1275 5.85119C8.12875 6.17557 8.22656 6.50338 8.62438 6.35807L10.3022 5.59557ZM1.9075 6.94807C1.97795 6.94807 2.04551 6.97605 2.09533 7.02587C2.14514 7.07568 2.17313 7.14324 2.17313 7.21369C2.17313 7.36057 2.05437 7.47963 1.9075 7.47963H1.86125C1.71469 7.47963 1.59563 7.36057 1.59563 7.21369C1.59563 7.06713 1.71469 6.94807 1.86125 6.94807H1.9075ZM5.47844 8.53307C5.54889 8.53307 5.61645 8.56105 5.66626 8.61087C5.71608 8.66068 5.74406 8.72824 5.74406 8.79869C5.74406 8.86914 5.71608 8.9367 5.66626 8.98652C5.61645 9.03633 5.54889 9.06432 5.47844 9.06432H2.79625C2.7258 9.06432 2.65824 9.03633 2.60842 8.98652C2.55861 8.9367 2.53063 8.86914 2.53063 8.79869C2.53063 8.72824 2.55861 8.66068 2.60842 8.61087C2.65824 8.56105 2.7258 8.53307 2.79625 8.53307H5.47844ZM1.89156 8.53307C2.03844 8.53307 2.15719 8.65182 2.15719 8.79869C2.15719 8.86914 2.1292 8.9367 2.07939 8.98652C2.02957 9.03633 1.96201 9.06432 1.89156 9.06432H1.86125C1.7908 9.06432 1.72324 9.03633 1.67342 8.98652C1.62361 8.9367 1.59563 8.86914 1.59563 8.79869C1.59563 8.72824 1.62361 8.66068 1.67342 8.61087C1.72324 8.56105 1.7908 8.53307 1.86125 8.53307H1.89156ZM6.74344 6.94807C6.89 6.94807 7.00906 7.06713 7.00906 7.21369C7.00906 7.36057 6.89 7.47963 6.74344 7.47963H2.79625C2.64969 7.47963 2.53063 7.36057 2.53063 7.21369C2.53063 7.06713 2.64969 6.94807 2.79625 6.94807H6.74344ZM1.365 0.666504H14.635C15.3841 0.666504 16 1.28213 16 2.0315V9.55588C16 10.3056 15.3847 10.9209 14.635 10.9209H1.365C0.615313 10.9209 0 10.3053 0 9.55588V2.0315C0 1.28057 0.614062 0.666504 1.365 0.666504ZM7.69156 5.52088H0.53125V9.55588C0.53125 10.0137 0.906563 10.3896 1.365 10.3896H10.6369V6.43369L9.43969 8.584C9.40406 8.64775 9.32344 8.67088 9.25969 8.63525C9.22941 8.61849 9.20687 8.59057 9.19687 8.55744L8.95125 7.73494L8.06875 8.05807C8 8.08338 7.92375 8.04775 7.89844 7.97932C7.88281 7.93682 7.89062 7.8915 7.91469 7.85713L8.66594 6.789C8.58281 6.81057 8.50469 6.82057 8.43125 6.81994C7.895 6.81525 7.70531 6.29994 7.70406 5.85025C7.69969 5.76057 7.69531 5.64744 7.69156 5.52088ZM0.53125 4.98963H7.68094C7.67719 4.62557 7.68156 4.25775 7.70406 4.04619C7.71125 3.86588 7.74906 3.71025 7.80969 3.58025C8.0275 3.11432 8.52875 2.9865 8.97719 3.19619L10.5947 3.9915C10.6084 3.98057 10.6225 3.97025 10.6369 3.96025V1.19775H1.365C0.906563 1.19775 0.53125 1.57307 0.53125 2.0315V4.98963ZM11.1681 1.19775V3.81244C11.3438 3.82338 11.5047 3.88869 11.635 3.9915L13.2525 3.19619C13.915 2.8865 14.4972 3.32713 14.5256 4.04619C14.5344 4.6165 14.5522 5.28682 14.5256 5.85025C14.5238 6.48307 14.1581 7.01807 13.4481 6.75213L13.11 6.59838L13.99 8.06494C14.0119 8.09869 14.0178 8.1415 14.0031 8.18213C13.9778 8.25057 13.9016 8.28619 13.8328 8.26088L12.9506 7.93775L12.705 8.76025C12.6951 8.79336 12.6727 8.82128 12.6425 8.83807C12.6273 8.8466 12.6106 8.85206 12.5934 8.85413C12.5761 8.8562 12.5586 8.85485 12.5418 8.85014C12.5251 8.84544 12.5094 8.83748 12.4958 8.82673C12.4821 8.81597 12.4707 8.80262 12.4622 8.78744L11.1681 6.48213V10.3896H14.635C15.0919 10.3896 15.4688 10.0128 15.4688 9.55588V2.0315C15.4688 1.57369 15.0928 1.19775 14.635 1.19775H11.1681ZM11.9381 4.47713C11.95 4.53369 11.9566 4.59244 11.9566 4.65244V4.65432C11.9644 4.75369 11.9688 4.854 11.9691 4.95463C11.97 5.16807 11.9547 5.38119 11.9247 5.59432L13.6053 6.35807C14.0034 6.50338 14.1009 6.17557 14.1022 5.85119L14.1016 4.05432C14.0966 3.93619 14.0728 3.83775 14.0366 3.75963C13.9188 3.50775 13.6641 3.4715 13.4331 3.579L11.9153 4.32525C11.9241 4.37557 11.9316 4.42619 11.9381 4.47713ZM11.5212 5.4015C11.5584 5.06619 11.5547 4.73213 11.4972 4.399C11.4803 4.37338 11.4606 4.34963 11.4391 4.32807C11.3559 4.24494 11.2413 4.19307 11.115 4.19307C10.9887 4.19307 10.8737 4.24494 10.7906 4.32807C10.7662 4.35213 10.745 4.37932 10.7266 4.40838C10.6634 4.73307 10.6606 5.05932 10.7013 5.38682C10.7238 5.43369 10.7541 5.47619 10.7906 5.51275C10.8737 5.59588 10.9888 5.64775 11.1147 5.64775C11.2409 5.64775 11.3559 5.59588 11.4391 5.51275C11.4719 5.47994 11.4994 5.44275 11.5212 5.4015Z" fill="#555555"/>
                                                                    </svg>
                                                                </label>
                                                                <input type="text" id="code" class="form-control border-primary-500 padding-right" placeholder="Promo code" />
                                                                <button type="button" class="btn bg-primary-500 rounded-10 px-5 py-2 text-white ms-2" id="applyCoupon" data-url="{{ route('coupon.store') }}">Apply</button>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 align-self-end">
                                                            <p class="fs-18 fw-bold text-primary-900">Give your card info & Pay now.</p>
                                                            <div class="text-gray-600 fs-16 fw-medium">
                                                                <div>
                                                                    <div class="border px-2 rounded">
                                                                        <div id="card_element" class="py-3 px-1" data-key="{{ config('services.stripe.key') }}"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-5">
                                    <a href="javascript:void(0)" id="previousBtn" class="fs-14 fw-bold text-gray-600">Go Back</a>
                                    <button type="button" id="nextBtn" class="btn bg-primary-500 text-white rounded-10 px-5 disabled">Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@if ($stripeEnable)
    @push('js')
        <script src="https://js.stripe.com/v3/"></script>
    @endpush
@endif
