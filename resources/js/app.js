import './bootstrap';
import './design';
import './helper';

import intlTelInput from 'intl-tel-input';

$(function () {

    const csrf_token = $('meta[name="csrf-token"').attr('content');
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': csrf_token }
    });

    const intlTelInputInit = () => {
        const inputs = document.querySelectorAll("input#phone");
        if(inputs) {
            inputs.forEach(input => {
                intlTelInput(input, {
                    separateDialCode: true,
                    preferredCountries:["uk",'gb'],
                    hiddenInput: "phone",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                });
            });

        }
    }
    intlTelInputInit()

    // Logout
    $(document).on('click', '#logout', function(e) {
        e.preventDefault();

        let btn = $(this);
        let url = $(this).attr('href');
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: csrf_token
            },
            dataType: 'JSON',
            beforeSend: () => $(btn).addClass('disabled'),
            success: (response) => location.replace('/'),
            complete: () => $(btn).addClass('disabled'),
            error: (err) => handleError(err)
        });
    });

    // Currency switching
    $(document).on('change', '#currencySwitch', function(e) {
        e.preventDefault();

        location.href = `/currency/${e.target.value}`
    });

    /* Submit post request in server without file upload */
    $(document).on('submit', 'form#submit', async function (e) {
        e.preventDefault();

        const form     = $(this);
        const method   = form.attr('method');
        const url      = form.attr('action');
        const file     = form.attr('enctype');
        const redirect = form.data('redirect');
        const btn      = form.find('button[type="submit"]');
        const btnTxt   = btn.text();

        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');

        const options = {
            type: method || 'POST',
            url: url,
            dataType: 'JSON'
        }

        if (typeof file == 'undefined') {
            options.data = form.serialize();
        }
        else {
            options.data = new FormData(form[0]);
            options.contentType = false;
            options.enctype = file;
            options.processData = false;

            if (card) {
                const { token, error } = await stripe.createToken(card);
                if (typeof error !== "undefined") {
                    Lobibox.notify('error', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Please provide valid card information!'
                    });
                    return;
                }
                options.data.append("stripe_token", JSON.stringify(token));
            }
        }

        $.ajax({
            ...options,
            beforeSend: () => {
                btn.addClass('disabled')
                btn.text('Please wait...')
            },
            success: (response) => {
                form.trigger('reset');
                handleSuccess(response, redirect)
            },
            complete: () => {
                btn.removeClass('disabled')
                btn.text(btnTxt)
            },
            error: (e) => handleError(e)
        });
    });

    $(document).on('click', '.filter-area input[type=checkbox]', function() {
        if (window.innerWidth >= 1200) {
            callGetTherapists()
        }
    });

    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        getTherapists(url)
    });

    $(document).on('submit', 'form#filterTherapist', function (e) {
        e.preventDefault();
        const formData = $(this).serialize();
        const url      = $(this).attr('action');
        getTherapists(url, formData)
    });

    // $(':input[name="distance"]').bind('keyup mouseup', function () {
    //     callGetTherapists()
    // });

    const callGetTherapists = () => {
        const form     = $('form#filterTherapist');
        const formData = form.serialize();
        const url      = form.attr('action');
        getTherapists(url, formData)
    }

    // Get therapist data
    const getTherapists = (url, formData = {}) => {
        $.ajax({
            type: 'get',
            url: url,
            data: formData,
            dataType: 'HTML',
            success: (response) => {
                $('#therapists').html(response);
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;

                if (window.innerWidth < 1200) {
                    $('.filters-area').css('display', 'none');
                }
            },
            error: (e) => handleError(e)
        });
        // window.history.pushState("data", "Title", formData != null ? `${location.href}?${formData}` : url);
    }

    if (location.pathname == '/directory') {

        $('#distance-slider').slider({
            orientation: 'horizontal',
            min: 5,
            max: 5000,
            slide: function (event, ui) {
                $('input#distance').val(ui.value)
                if ($('input[name="location"]').val() != '') {
                    callGetTherapists()
                }
            }
        });

        $('#price-slider').slider({
            range: true,
            orientation: 'horizontal',
            min: 1,
            max: 500,
            values: [1, 500],
            slide: function(event, ui) {
                $('#min_price').val(ui.values[0]);
                $('#max_price').val(ui.values[1]);
                // if (window.innerWidth < 1200) {
                //     callGetTherapists()
                // }
            }
        });

        $('#min_price').val($('#price-slider').slider('values', 0));
        $('#max_price').val($('#price-slider').slider('values', 1));
    }

    // After change article category then filter articles
    $(document).on('change', 'input[name="categories[]"]', function() {
        const url = $('form#articleForm').attr('action');
        const data = $('form#articleForm').serialize();

        $.ajax({
            type: 'GET',
            url: url,
            data: data,
            dataType: 'HTML',
            success: function (response) {
                $('#articleData').html(response);
            }
        });
    });

    // After click pagination link then get the next article data
    $(document).on('click', '#paginate', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: e.target.href,
            dataType: 'HTML',
            success: function (response) {
                $('#articleData').html(response);
            }
        });
    });

    // Apply coupon code for checkout membership plan
    $(document).on('click', 'button#applyCheckoutCoupon', function (e) {
        e.preventDefault();

        const btn  = $(this);
        const url  = $(this).data('url');
        const from = $(this).data('from');

        const formData = {
            _token: csrf_token,
            from: from,
            code: $('input#code').val(),
            [from]: $(`input[name="${from}"]`).val(),
        };

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'JSON',
            beforeSend: () => $(btn).addClass('disabled'),
            success: (response) => {

                const { code, discount } = response.coupon;

                $('#applied_coupon_code').text(`(${code})`)
                $('#coupon_discount_amount').text(`-${convertAmount(discount)}`)
                const total_amount = $('input[name="total_amount"]').val();
                $('p#total_amount').text(convertAmount(total_amount - discount));

                handleSuccess(response);
                $('input#code').attr('readonly', true);
            },
            error: (err) => {
                $(btn).removeClass('disabled')
                handleError(err)
            }
        });
    });

    // Saved bookmark
    $(document).on('click', '#save-bookmark', function(e) {
        e.preventDefault();

        const btn    = $(this);
        const url    = btn.attr('href');
        const btnTxt = btn.find('span');

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            beforeSend: () => btn.addClass('disabled'),
            success: (response) => {
                if(!response.added) {
                    btnTxt.text('Save Profile');
                    if (location.pathname == '/neurologist/bookmark') {
                        btn.parents('div[data-therapist]').remove();
                    }
                }
                else {
                    btnTxt.text('Saved');
                    btn.attr('data-saved', 1);
                }
                localStorage.setItem('bookmarks', JSON.stringify(response.bookmarks));
                countBookmark()

            },
            complete: () => btn.removeClass('disabled'),
            error: (err) => handleError(err)
        });
    });

    const countBookmark = () => {
        const bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
        $('span.data-count').text(bookmarks != null ? bookmarks.length : 0);

        $.ajax({
            type: 'POST',
            url: '/neurologist/bookmark',
            data: {
                bookmarks: JSON.stringify(bookmarks)
            },
            dataType: 'JSON',
            success: (response) => console.log(response.message)
        });
    }
    countBookmark();

    /* Membership Checkout Start */

    const steps     = document.querySelectorAll('.stepper-item');
    const MAX_STEPS = steps.length;
    let currentStep = 1;

    $(document).on('click', '#nextBtn', function (e) {
        e.preventDefault();

        let next = checkInputValidation();
        if(next) {
            $(steps[currentStep - 1]).addClass('completed').removeClass('active');
            $(steps[currentStep]).addClass('active');

            currentStep += 1;

            $('.tab-pane').removeClass('active show');
            $(`#pills-${currentStep}`).addClass('active show');

            if(currentStep === MAX_STEPS) {
                $(this).attr('type', 'submit').attr('id', 'continue-btn').text('Submit');
            }

            $('#previousBtn').removeClass('disabled');

            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            checkInputValidation();
        }
    });

    $(document).on('click', '#previousBtn', function (e) {
        e.preventDefault();

        if(currentStep > 1) {
            $(steps[currentStep - 1]).removeClass('active');
            $(steps[currentStep - 2]).removeClass('completed').addClass('active');

            currentStep -= 1;

            $('#continue-btn').attr('type', 'submit').attr('id', 'nextBtn').text('Continue');

            $('.tab-pane').removeClass('active show');
            $(`#pills-${currentStep}`).addClass('active show');

            if (currentStep === 1)  {
                $(this).addClass('disabled');
            }

            checkInputValidation();

            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    });


    $(document).on('keyup change', '.tab-pane input, .tab-pane textarea, .tab-pane select', function(e) {
        checkInputValidation(e);
    });

    if (location.pathname === `/membership/${$('input[name="membership_plan"]').val()}`) {
        $(document).on('blur', 'input[name="email"], input[name="phone"], input[name="location"]', function(e) {
            let value = e.target.value;
            if (e.target.value !== '') {
                const name = e.target.name;

                if (name === 'location') {
                    setTimeout(() => sendCheckRequest(name, $(this).val()), 100);
                }
                else {
                    const dial_code = $('input[name="dial_code"]').val();
                    value = name !== 'phone' ? value : `+${dial_code} ${value}`;
                    sendCheckRequest(name, value)
                }
            }
        });
    }

    const checkInputValidation = () => {
        if(currentStep === 1) {
            const first_name       = $('input[name="first_name"]').val();
            const last_name        = $('input[name="last_name"]').val();
            const email            = $('input[name="email"]');
            const phone            = $('input[name="phone"]');
            const location         = $('input[name="location"]');
            const password         = $('input[name="password"]').val();
            const confirm_password = $('input[name="password_confirmation"]').val();

            if(first_name === '' || last_name === '' || email.val() === '' || phone.val() === '' || location.val() === '' || password === '' || confirm_password === '') {
                submitActionButton(false);
            }
            else {
                submitActionButton();
            }

            if (password && confirm_password) {
                if(password !== '' && confirm_password !== '') {
                    if(password !== confirm_password) {
                        $("#password").addClass("is-invalid");
                        $("#invalid_password").text('Password does not match');
                        submitActionButton(false);
                    }
                    else if(password.length < 8) {
                        $("#password").addClass("is-invalid");
                        $("#invalid_password").text('Password must be greater than 8 characters');
                        submitActionButton(false);
                    }
                    else {
                        $("#password").removeClass("is-invalid");
                        $("#invalid_password").text('');
                        submitActionButton();
                    }
                }
                else {
                    $("#password").removeClass("is-invalid");
                    $("#invalid_password").text('');
                }
            }
        }
        else if(currentStep === 2) {
            const membership_plan = $('input#membership_plan').val();
            const services      = $('select#services').val();
            const method        = $('select#method').val();
            const languages     = $('select#languages').val();
            const concessions   = $('select#concessions').val();
            const formats       = $('select#formats').val();
            const description   = $('textarea#description').val();
            const qualification = $('input#qualification').val();
            const documents     = $('input[name="documents[]"]').prop('files');
            const image         = $('input#image').prop('files');
            const socials       = $('select[name="socials[]"]');
            const urls          = $('input[name="urls[]"]');
            const agree         = $('input#agree').is(':checked');

            if(membership_plan == 'student-member') {
                if(services?.length <= 0 || method?.length <= 0 || languages?.length <= 0 || qualification === '' || agree == false) {
                    submitActionButton(false);
                }
                else {
                    submitActionButton();
                }
            }
            else if(services?.length <= 0 || method?.length <= 0 || languages?.length <= 0 || concessions?.length <= 0 || formats?.length <= 0 || description === '' || qualification === '' || documents?.length <= 0 || image?.length <= 0 || agree == false) {
                submitActionButton(false);
            }
            else {
                submitActionButton();
            }

            if(documents?.length > 0) {
                $.each(documents, function (index, file) {
                    const size = (file.size / 1024 / 1024).toFixed(2);
                    if (size > 6) {
                        $('input[name="documents[]"]').val('');
                        submitActionButton(false);
                        alert('File upload size maximum 6 MB / per file')
                    }
                });
            }

            if(image?.length > 0) {
                const imageSize = (image[0].size / 1024 / 1024).toFixed(2);
                if (imageSize > 4) {
                    $('input#image').val('');
                    submitActionButton(false);
                    alert('Image upload size maximum 4 MB')
                }
            }
            if(socials?.length > 0) {
                $.each(socials, function (indexInArray, social) {
                    if($(social).val() === '') {
                        submitActionButton(false);
                    }
                });
            }
            if(urls?.length > 0) {
                $.each(urls, function (indexInArray, url) {
                    if($(url).val() === '') {
                        submitActionButton(false);
                    }
                });
            }

            if(!membership_plan) {
                submitActionButton();
            }
        }
        return true;
    }

    // Submit button conditionally disabled/active
    const submitActionButton = (next = true) => {
        if(!next) {
            $('#nextBtn, #continue-btn').addClass('disabled');
        }
        else {
            $('#nextBtn, #continue-btn').removeClass('disabled');
        }
    }

    // Check to server this value is valid or not
    const sendCheckRequest = (name, value) => {

        $.ajax({
            type: 'GET',
            url: '/membership/check',
            data: {
                key: name,
                value: value,
            },
            dataType: 'JSON',
            success: (res) => {
                $("#invalid_" + name).text('');
                $("#" + name).removeClass("is-invalid");
            },
            error: (e) => {
                $("#invalid_" + name).text(e.responseJSON.message);
                $("#" + name).addClass("is-invalid");
                submitActionButton(false);
            }
        });
        return true;
    }

    //
    $(document).on('click', '#choiceMembership', function(){
        const url = $(this).data('url');

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            success: (response) => applyCoupon(response),
            error: (err) => handleError(err)
        });

        $('#membersip_type').text($(this).text())
        $('input#membership_plan').val($(this).data('slug'))
        $('.membership-plan').removeClass('active')
        $(this).addClass('active');

        checkInputValidation();
    });

    // Add social media
    $(document).on('click', '#addPlatform', function() {
        const url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            success: function(response) {
                let html = `<tr>
                                    <td>
                                        <select name="socials[]" id="socials" class="form-control" required>
                                            <option value="">Select online platform</option>`;
                $.each(response, function(key, value) {
                    html +=
                        `<option value="${value.id}">${value.name}</option>`;
                });

                html += `</select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="urls[]" id="urls" placeholder="Enter URL" required />
                                    </td>
                                    <td>
                                        <button type="button" class="btn bg-primary-500 py-1 px-3 text-white" id="removePlatform">
                                            <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 2C5 0.89543 5.89543 0 7 0H13C14.1046 0 15 0.895431 15 2V4H16.9897C16.9959 3.99994 17.0021 3.99994 17.0083 4H19C19.5523 4 20 4.44772 20 5C20 5.55228 19.5523 6 19 6H17.9311L17.0638 18.1425C16.989 19.1891 16.1182 20 15.0689 20H4.93112C3.88184 20 3.01096 19.1891 2.9362 18.1425L2.06888 6H1C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4H2.99174C2.99795 3.99994 3.00414 3.99994 3.01032 4H5V2ZM7 4H13V2H7V4ZM4.07398 6L4.93112 18H15.0689L15.926 6H4.07398ZM8 8C8.55228 8 9 8.44772 9 9V15C9 15.5523 8.55228 16 8 16C7.44772 16 7 15.5523 7 15V9C7 8.44772 7.44772 8 8 8ZM12 8C12.5523 8 13 8.44772 13 9V15C13 15.5523 12.5523 16 12 16C11.4477 16 11 15.5523 11 15V9C11 8.44772 11.4477 8 12 8Z" fill="#fff"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>`;
                $('table#socials tbody').append(html);
                checkInputValidation();
            }
        });
    });

    // Remove social media inputs
    $(document).on('click', '#removePlatform', function() {
        $(this).parent().parent().remove();
        checkInputValidation();
    });

    // Apply Coupon Code
    $(document).on('click', 'button#applyCoupon', function(e) {
        e.preventDefault();

        const btn  = $(this);
        const url  = $(this).data('url');
        const code = $('input#code').val();
        const membership_plan = $('input#membership_plan').val();
        const membership_type = $('input#membership_type').val();

        if(code != '' && membership_plan != '') {
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: csrf_token,
                    'from': 'membership',
                    code: code,
                    membership_plan: membership_plan,
                    membership_type: membership_type,
                },
                dataType: 'JSON',
                beforeSend: () => $(btn).addClass('disabled'),
                success: function (response) {
                    applyCoupon(response);
                },
                error: (err) => {
                    $(btn).removeClass('disabled')
                    handleError(err)
                }
            });
        }
    });

    const applyCoupon = (response) => {
        const { price, code, discount } = response.coupon;
        $('#membership_price').text(convertAmount(price))
        $('#subtotal_price').text(convertAmount(price))
        $('#coupon_discount_amount').text(`-${convertAmount(discount || 0)}`)
        $('p#total_amount').text(convertAmount(price - discount || 0));

        if(code != null) {
            $('#applied_coupon_code').text(`(${code})`)
            $('input#code').val('').attr('readonly', true);

            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                icon: 'bx bx-check-circle',
                delayIndicator: false,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: response.message
            });
        }
    }



    $('.course-details-section').on('click', '#previewLecture', function() {
        const videoId = $(this).data('id');

        $('#previewModal iframe').attr('src', `https://player.vimeo.com/video/${videoId}`)
        $('#previewModal').modal('show')
    })

    // let cards;
    let card;
    let stripe;
    // Stripe API
    const initilizeCard = () => {
        stripe = Stripe($('#card_element').data('key'));
        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                padding: '16px',
                "::placeholder": {
                    color: "#aab7c4",
                },
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a",
            },
        };
        card = elements.create("card", { hidePostalCode: true, style: style });
        return card;
    };

    function waitForElm() {
        const element = document.querySelector('#card_element')
        return new Promise((resolve) => {
            if (element) {
                return resolve(element);
            }
            const observer = new MutationObserver((mutations) => {
                if (element) {
                    observer.disconnect();
                    resolve(element);
                }
            });
            observer.observe(document.body, {
                childList: true,
                subtree: true,
            });
        });
    }

    const renderStripeElement = () => {
        waitForElm().then((elm) => {
            let cardElement = document.getElementById('card_element');
            card = initilizeCard();
            card.mount(cardElement);
        });
    }

    if($('#card_element').length && MAX_STEPS >= 2) {
        renderStripeElement()
    }

    /* Membership Checkout End */

    /* Handle success request response */
    const handleSuccess = (response, redirect) => {
        if(typeof response.message !== 'undefined') {
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                icon: 'bx bx-check-circle',
                delayIndicator: false,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: response.message
            });
        }

        if ((typeof redirect !== "undefined" && redirect !== null) || (typeof response.redirect !== "undefined" && response.redirect !== null)) {
            location.replace(redirect || response.redirect);
        }
        else {
            $('#modal, .modal').modal('hide');
            $('form').trigger('reset');
        }
    }


    /* Handle error request response */
    const handleError = (e) => {

        let msg;
        if (e.status === 0) msg = 'Not connected Please verify your network connection.';
        else if (e.status === 404) msg = 'The requested data not found.';
        else if (e.status === 403) msg = 'You are not allowed this action.';
        else if (e.status === 500) msg = e.responseJSON?.message || 'Internal Server Error, Please try again letter.';
        else if (e === 'parsererror') msg = 'Requested JSON parse failed.';
        else if (e === 'timeout') msg = 'Requested Time out.';
        else if (e === 'abort') msg = 'Request aborted.';
        else if ([300, 301, 302, 401].includes(e.status)) msg = e.responseJSON.message;
        else if (e.status === 422) {
            $.each(e.responseJSON.errors, function (index, error) {
                $("#invalid_" + index).text(error[0]);
                $("#" + index).addClass("is-invalid");
            });
            msg = e.responseJSON.message;
        }
        else msg = e.statusText;

        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            delayIndicator: false,
            icon: 'bx bx-x-circle',
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: msg
        });

        return true;
    }

});

