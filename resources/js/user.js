import { Notyf } from "notyf";
import Alpine from "alpinejs";
import intlTelInput from 'intl-tel-input';

function dropdown() {
    return {
        options: [],
        selected: [],
        show: false,
        open() {
            this.show = true;
        },
        close() {
            this.show = false;
        },
        isOpen() {
            return this.show === true;
        },
        select(index, event) {
            if (!this.options[index].selected) {
                this.options[index].selected = true;
                this.options[index].element = event.target;
                this.selected.push(index);
            } else {
                this.selected.splice(this.selected.lastIndexOf(index), 1);
                this.options[index].selected = false;
            }
        },
        remove(index, option) {
            this.options[option].selected = false;
            this.selected.splice(index, 1);
        },
        loadOptions() {
            const options = document.getElementById("select").options;
            for (let i = 0; i < options.length; i++) {
                this.options.push({
                    value: options[i].value,
                    text: options[i].innerText,
                    selected:
                        options[i].getAttribute("selected") != null
                            ? options[i].getAttribute("selected")
                            : false,
                });
            }
        },
        selectedValues() {
            return this.selected.map((option) => {
                return this.options[option].value;
            });
        },
    };
}

window.dropdown = dropdown;

document.addEventListener("livewire:init", () => {
    Livewire.on("alert", (e) =>
        toastNotyf(e[0], typeof e[1] !== "undefined" ? e[1] : "success")
    );

    if (typeof alertNotyf !== "undefined") toastNotyf(alertNotyf);
});

window.Alpine = Alpine;

Alpine.start();

const toastNotyf = (message, type = "success") => {
    const notyf = new Notyf({
        position: { x: "right", y: "top" },
    });
    if (type == "success") {
        notyf.success(message);
    } else {
        notyf.error(message);
    }
};

$(function () {
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

    if ($(".select2").length) {
        $(".select2").select2({
            placeholder: "Select option",
        });
    }

    if ($(".text-editor").length) {
        tinymce.init({
            selector: ".text-editor",
            height: '250px'
        });
    }

    const csrf_token = $('meta[name="csrf-token"').attr("content");
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": csrf_token },
    });

    $(document).on("change", 'input[type="file"]', function (e) {
        let show = $(this).data("show-image");
        showImage(e, show);
    });

    const showImage = (event, show) => {
        let file = event.target.files[0];

        let reader = new FileReader();
        reader.onload = (e) => {
            $(`#${show}`).attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    };

    // Logout
    $(document).on("click", "#logout", function (e) {
        e.preventDefault();

        let btn = $(this);
        let url = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: csrf_token,
            },
            dataType: "JSON",
            beforeSend: function () {
                $(btn).addClass("disabled");
            },
            success: function (response) {
                // handleSuccess(response);
                location.reload();
            },
            complete: function () {
                $(btn).addClass("disabled");
            },
            error: function (err) {
                handleError(err);
            },
        });
    });

    /* Submit post request in server without file upload */
    $(document).on("submit", "form#submit", async function (e) {
        e.preventDefault();
        const url = $(this).attr("action");
        const file = $(this).attr("enctype");
        const redirect = $(this).data("redirect");
        const btn = $(this).find('button[type="submit"]');
        const spinner = $(btn).find("svg.animate-spin")[0];
        const loadingText = $(btn).find(".loading-text");
        const mainText = $(btn).find(".main-text");

        $(".form-control").removeClass("is-invalid");
        $(".invalid-feedback").addClass("hidden").text("");

        const options = {
            type: "POST",
            url: url,
            dataType: "JSON",
        };

        if (typeof file === "undefined") {
            options.data = $(this).serialize();
        } else {
            options.data = new FormData($(this)[0]);
            if (card) {
                const { token, error } = await stripe.createToken(card);
                if (typeof error !== "undefined") {
                    toastr.error("Please provide valid card information!", "Something Wrong!");
                    return;
                }
                options.data.append("stripe_token", JSON.stringify(token));
            }
            options.contentType = false;
            options.enctype = file;
            options.processData = false;
        }

        $.ajax({
            ...options,
            beforeSend: () => {
                $(spinner).removeClass("hidden");
                $(btn).attr("disabled", true);
                $(loadingText).removeClass("hidden");
                $(mainText).addClass("hidden");
            },
            success: (response) => handleSuccess(response, redirect),
            complete: () => {
                $(spinner).addClass("hidden");
                $(btn).attr("disabled", false);
                $(loadingText).addClass("hidden");
                $(mainText).removeClass("hidden");
            },
            error: (e) => handleError(e, redirect),
        });
    });

    //
    $(document).on("click", "#addPlatform", function () {
        $.ajax({
            type: "GET",
            url: "/admin/therapist/social",
            dataType: "JSON",
            success: function (response) {
                let html = `<tr class="bg-white border-b hover:bg-gray-50">
                                    <td>
                                        <select name="online_platforms[]" id="online_platforms" class="form-control">
                                            <option id="">Select online platform</option>`;
                $.each(response, function (key, value) {
                    html += `<option value="${value.id}">${value.name}</option>`;
                });

                html += `</select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="urls[]" id="urls" placeholder="Enter URL" />
                                    </td>
                                    <td>
                                        <button type="button" class="btn" id="removePlatform">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                                    stroke="#141B34" stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                                    stroke="#141B34" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.5 16.5L9.5 10.5" stroke="#141B34" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M14.5 16.5L14.5 10.5" stroke="#141B34" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>`;
                $("table tbody").append(html);
            },
        });
    });

    $(document).on("click", "#removePlatform", function () {
        $(this).parent().parent().remove();
    });

    $(document).on("change", "input#auto_renew", function (e) {
        const url = $(this).data('url')

        if (e.target.checked) {
            $('#auto').addClass('text-primary');
            $('#manual').removeClass('text-primary');
        }
        else {
            $('#auto').removeClass('text-primary');
            $('#manual').addClass('text-primary');
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: csrf_token,
                auto_renew: e.target.checked ? 1 : 0,
                _method: 'PUT',
            },
            dataType: 'JSON',
            success: function (response) {
                handleSuccess(response)
            },
            error: function (err) {
                handleError(err)
            },
        });
    });

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

    if($('#card_element').length) {
        renderStripeElement()
    }


    /* Handle success request response */
    const handleSuccess = (response, redirect = null) => {
        const errMsg = $("#err-msg");

        if (typeof response.message !== "undefined" || typeof response.status !== "undefined") {
            if (errMsg.length > 0) {
                $(errMsg).removeClass("hidden").text(response.message || response.status);

                setTimeout(() => $(errMsg).addClass("hidden"), 3000);
            } else {
                toastNotyf(response.message);
            }
        }
        if (typeof response.redirect !== "undefined" || redirect !== null) {
            location.replace(redirect || response.redirect);
        } else {
            if (typeof table !== "undefined") {
                table.ajax.reload();
            }
        }
    };

    /* Handle error request response */
    const handleError = (e, redirect = null) => {
        let message;
        if (e.status === 0) {
            message = "Not connected Please verify your network connection.";
        } else if (e.status === 200 && typeof redirect !== "undefined") {
            location.replace(redirect);
            return;
        } else if (e.status === 404) {
            message = "The requested data not found.";
        } else if (e.status === 403) {
            message = "You are not allowed this action.";
        } else if (e.status === 419) {
            message = "CSRF token mismatch.";
        } else if (e.status === 500) {
            message = e.responseJSON?.message || 'Internal Server Error, Please try again letter.';
        } else if (e === "parsererror") {
            message = "Requested JSON parse failed.";
        } else if (e === "timeout") {
            message = "Requested Time out.";
        } else if (e === "abort") {
            message = "Request aborted.";
        } else if (e.status === 422) {
            $.each(e.responseJSON.errors, function (index, error) {
                $("#invalid_" + index).removeClass("hidden").text(error[0]);
                $("#" + index).addClass("is-invalid");
            });
            message = "Please fill up all required field.";
        } else if ([300, 301, 302, 401].includes(e.status)) {
            message = e.responseJSON.message;
        } else {
            message = e.statusText;
        }

        toastNotyf(message, "error");

        return true;
    };
});
