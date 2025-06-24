function showUploadedFile(avatar) {
    return avatar != null ? `${location.origin}/storage/${avatar}` : 'https://picsum.photos/seed/picsum/200/300';
}
window.showUploadedFile = showUploadedFile

function convertAmount(number, decimals = 2, dec_point = '.', thousands_sep = ',') {
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    toFixedFix = function (n, prec) {
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        var k = Math.pow(10, prec);
        return Math.round(n * k) / k;
    },
    s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    const currency_position = $('input[name="currency_position"]').val();
    const currency   = JSON.parse($('input[name="currency"]').val());

    if(currency_position == 'Before Amount') {
        return currency.symbol+s.join(dec);
    }

    return s.join(dec)+currency.symbol;
}
window.convertAmount = convertAmount;


$(document).ready(function () {
    const csrf_token = $('meta[name="csrf-token"').attr("content");
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': csrf_token }
    });

    $(document).on('change', 'input[type="file"]', function (e) {
        let show = $(this).data('show-image');
        showImage(e, show);
    });

    const showImage = (event, show) => {
        let file = event.target.files[0];

        let reader = new FileReader();
        reader.onload = (e) => {
            $(`#${show}`).attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }

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
            beforeSend: function () {
                $(btn).addClass('disabled');
            },
            success: function (response) {
                // handleSuccess(response);
                location.reload();
            },
            complete: function () {
                $(btn).addClass('disabled');
            },
            error: function (err) {
                handleError(err);
            }
        });
    });

    // Add modal show
    $(document).on('click', '#addBtn, #editBtn, #showBtn, #approvedBtn', function(e) {
        e.preventDefault();
        const btn = $(this);
        const url = $(this).attr("href");

        sendGetRequest(url, btn)
    });

    // Show modal
    // $(document).on("click", "#approvedBtn", function (e) {
    //     e.preventDefault();
    //     const btn  = $(this);
    //     const url  = $(this).attr("href");
    //     const data = {_method: 'PUT'}
    //     // sendGetRequest(url, btn)
    //     submitForm(url, data, btn);
    // });

    /* Send a GET request in the server */
    function sendGetRequest(url, btn) {
        $('#form_modal').remove();
        $.ajax({
            type: "GET",
            url: url,
            dataType: "HTML",
            beforeSend: function () {
                $(btn).addClass("disabled");
            },
            success: function (response) {
                $('.page-content').append(response);
                $("#form_modal").modal("show");

                const select2 = $('.single-select');
                if (select2.length) {
                    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
                    select2.each(function () {
                        $(this).select2({
                            theme: 'bootstrap4',
                            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                            placeholder: 'Select data',
                            dropdownParent: $(this).parent()
                        })
                    });
                }
                intlTelInputInit()
            },
            complete: function () {
                $(btn).removeClass("disabled");
            },
            error: function (e) {
                handleError(e)
            }
        });
    }

    /* Submit post request in server without file upload */
    $(document).on("submit", "form#submit", function (e) {
        e.preventDefault();

        const url      = $(this).attr("action");
        const redirect = $(this).data('redirect');
        const btn      = $(this).find('button[type="submit"]')[0];
        const spinner  = $(btn).find('#submit-spinner')[0];
        const data     = $(this).serialize();

        submitForm(url, data, btn, spinner, redirect);
    });

    /* Submit post request in server with file upload */
    $(document).on("submit", "#fileForm", function (e) {
        e.preventDefault();

        const url      = $(this).attr("action");
        const redirect = $(this).data('redirect');
        const data     = new FormData($(this)[0]);
        const btn      = $(this).find('button[type="submit"]')[0];
        const spinner  = $(btn).find('#submit-spinner')[0];

        submitForm(url, data, btn, spinner, redirect, true);
    });

    $(document).on('input', 'input.lectures__video_id', function(e) {
        let vimeoElement  = $(this).siblings('.vimeo-container')
        let itemsElement  = vimeoElement.find('#items')
        let loaderElement = vimeoElement.find('#loader')
        let url = $(this).data('url')

        console.log(e.target.value);

        if(e.target.value !== '') {
            $(vimeoElement).css('display', 'block');
            $.ajax({
                type: 'GET',
                url: `${url}?keyword=${e.target.value}`,
                dataType: 'JSON',
                beforeSend: function() {
                    $(loaderElement).removeClass('d-none')
                },
                success: function (response) {
                    let items = ''
                    if(response.length > 0) {
                        $.each(response, function (index, val) {
                            items += `<div class="vimeo-item" id="vimeo-item" data-uri="${val.uri}" data-duration="${val.duration}">${val.name}</div>`
                        });
                    }
                    else {
                        items += `<div class="vimeo-item text-center text-danger">Data not found</div>`
                    }

                    $(itemsElement).html(items)
                },
                complete: function() {
                    $(loaderElement).addClass('d-none')
                },
                error: function(err) {
                    handleError(err)
                }
            });
        }
        else {
            $(vimeoElement).css('display', 'none')
            $(itemsElement).empty()
        }
    });

    $(document).on('click', '#vimeo-item', function(e) {
        e.stopPropagation();
        let vimeoElement = $(this).parent().parent('.vimeo-container')
        let videoId      = vimeoElement.siblings('input.lectures__video_id')
        let duration     = vimeoElement.siblings('input.lectures__duration')
        let vimeoTitle   = vimeoElement.parent().parent().siblings('td').find('input.lectures__title')

        let uri = $(this).data('uri');
        $(videoId).val(uri.replace("/videos/", ""))
        $(duration).val($(this).data('duration'))
        $(vimeoTitle).val($(this).text())
        $(vimeoElement).css('display', 'none')
    });

    $(document).click(function(){
        $('.vimeo-container').css('display', 'none');
    });

    // Display/Hide therapist
    $(document).on('change', 'input#inActiveSwitch', function(e) {
        let type = $(this).data('type');
        $.ajax({
            type: 'POST',
            url: '/admin/neurologist/therapist/hide-profile',
            data: {
                _token: csrf_token,
                _method: 'PUT',
                id: e.target.value,
                type,
                value: type == 'hide_profile' ? (e.target.checked ? 0 : 1) : (e.target.checked ? 1 : 0)
            },
            dataType: 'JSON',
            success: (response) => {
                table.ajax.reload();
            },
            error: (err) => handleError(err)
        });
    });

    /* Send post request in server */
    function submitForm(url, data, btn = null, spinner = null, redirect = null, isFile = false) {
        $(".form-control").removeClass("is-invalid");
        $(".invalid-feedback").text("");

        if (isFile == false) {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: "JSON",
                beforeSend: function () {
                    $(btn).addClass("disabled");
                    $(spinner).removeClass("d-none");
                },
                success: function (response) {
                    handleSuccess(response, redirect)
                },
                complete: function () {
                    $(btn).removeClass("disabled");
                    $(spinner).addClass("d-none");
                },
                error: function (err) {
                    handleError(err);
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: "JSON",
                // async: false,
                // cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                beforeSend: function () {
                    $(btn).addClass("disabled");
                    $(spinner).removeClass("d-none");
                },
                success: function (response) {
                    handleSuccess(response, redirect)
                },
                complete: function () {
                    $(btn).removeClass("disabled");
                    $(spinner).addClass("d-none");
                },
                error: function (e) {
                    handleError(e)
                }
            });
        }
    }

    /* Send post request in server */
    $(document).on('click', '#addItem', function (e) {
        e.preventDefault();

        let item = $('#items').data('item');
        $('#items').append(item);

        updateItemKey()
    });

    $(document).on('click', '#removeItem', function (e) {
        e.preventDefault();

        $(this).parent().parent().remove();
    });

    function updateItemKey() {
        $('#items #item').each(function(key) {
            $(this).find('input.name').attr('name', `items[${key}][name]`).attr('id', `items[${key}][name]`)
            $(this).find('input.image').attr('name', `items[${key}][image]`).attr('id', `items[${key}][image]`)
            $(this).find('textarea.description').attr('name', `items[${key}][description]`).attr('id', `items[${key}][description]`)
        })

        tinymce.init({
            selector: '.text-editor'
        });
    }

    // Delete Data
    $(document).on("click", "#deleteBtn", function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        deleteData($(this), url);
    });

    /* Send delete request in server */
    function deleteData(btn, url, removeElement = null) {
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "error",
            showCancelButton: true,
            confirmButtonText: "Delete",
            padding: "2em",
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        _method: "DELETE",
                        _token: csrf_token
                    },
                    dataType: "JSON",
                    beforeSend: function () {
                        $(btn).addClass("disabled");
                    },
                    success: function (response) {
                        handleSuccess(response);
                        if(removeElement != null) {
                            $(removeElement).remove();
                        }
                        // swal("Deleted!", "Your file has been deleted.", "success");
                    },
                    complete: function () {
                        $(btn).removeClass("disabled");
                    },
                    error: function (e) {
                        handleError(e);
                    },
                });

                return true;
            }
            else return false;
        });
    };


    /* Handle success request response */
    function handleSuccess(response, redirect = null) {

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

        if (typeof redirect !== "undefined" && redirect !== null) {
            window.location.replace(redirect);
        }
        else {
            $('.modal').modal('hide');

            if(typeof table !== 'undefined') {
                table.ajax.reload();
            }
        }
    }


    /* Handle error request response */
    function handleError(e){
        console.log(e)
        let msg;
        if (e.status === 0) msg = 'Not connected Please verify your network connection.';
        else if (e.status === 401) msg = e.responseJSON.message || e.statusText;
        else if (e.status === 404) msg = 'The requested data not found.';
        else if (e.status === 403) msg = 'You are not allowed this action.';
        else if (e.status === 500) msg = 'Internal Server Error.';
        else if (e === 'parsererror') msg = 'Requested JSON parse failed.';
        else if (e === 'timeout') msg = 'Requested Time out.';
        else if (e === 'abort') msg = 'Request aborted.';
        else if ([300, 301, 302].includes(e.status)) msg = e.responseJSON.message;
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
