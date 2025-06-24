$(document).ready(function () {

    const csrf_token = $('meta[name="csrf-token"').attr('content');
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': csrf_token }
    });

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


    /* Submit authentication post request in server */
    $(document).on('submit', 'form#submit', function(e) {
        e.preventDefault();

        const data     = $(this).serialize();
        const url      = $(this).attr('action');
        const btn      = $('form#submit button');
        const spinner  = $('#submit-spinner');

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'JSON',
            beforeSend: function () {
                $(btn).addClass('disabled');
                $(spinner).removeClass('d-none');
            },
            success: function (response) {
                console.log(response);
                handleSuccess(response.message, response.redirect);
            },
            complete: function () {
                $(btn).removeClass('disabled');
                $(spinner).addClass('d-none');
            },
            error: function (err) {
                handleError(err);
            },
        });

    });

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

    /* Send post request in server */
    function submitForm(url, data, btn, spinner, redirect, isFile = false) {
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
                async: false,
                cache: false,
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
    };

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
                        handleSuccess(response.message);
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
            $('#modal').modal('hide');

            if(typeof table !== 'undefined') {
                table.ajax.reload();
            }
        }
    }


    /* Handle error request response */
    function handleError(e){

        let msg;
        if (e.status === 0) msg = 'Not connected Please verify your network connection.';
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
            msg = 'Please fill up all required field';
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
