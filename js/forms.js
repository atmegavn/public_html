$(document).ready(function ($) {
    'use strict';
    /*
    var myDropzone = new Dropzone("#abstractFile", {
        url: "contact.php",
        paramName: "file",
        maxFiles: 2,
        maxFilesize: 5,
        addRemoveLinks: true
    });
    */


    var validation_rules = {
        title: { required: true },
        first: { required: true },
        last: { required: true },
        organization: { required: true },
        city: { required: true },
        country: { required: true },
        email: { required: true, email: true },
        email2: { required: true, equalTo: '[name="email"]' },
        'presentation[]': {
            required: true,
            maxlength: 1
        },
        'agree[]': {
            required: true,
            maxlength: 1
        },
        'reservation[]': {
            required: false,
            maxlength: 1
        },
        participant: { required: true },
        file: {
            required: function () {
                return $('input[name="presentation[]"]:first').is(':checked');
            },

            extension: "pdf,doc,docx",
            filesize: 5
        },
        ptitle: {
            required: function () {
                return $('input[name="presentation[]"]:first').is(':checked');
            }
        },
        pauthor: {
            required: function () {
                return $('input[name="presentation[]"]:first').is(':checked');
            }

        },
        ptype: {
            required: function () {
                return $('input[name="presentation[]"]:first').is(':checked');
            }

        },
        awards: {
            required: function () {
                return $('input[name="presentation[]"]:first').is(':checked');
            }

        },
        checkin: {
            required: function () {
                return $('input[name="reservation[]"]:first,input[name="reservation[]"]:last');
            }

        },
        checkout: {
            required: function () {
                return $('input[name="reservation[]"]:first,input[name="reservation[]"]:last');
            }

        },
        sharewith: {
            required: function () {
                return $('input[name="reservation[]"]:nth(1)');
            }

        }
    };

    var validation_messages = {
        'presentation[]': {

            maxlength: 'You can chcek only one checkbox'
        },
        'agree[]': {
            maxlength: 'You can chcek only one checkbox'
        },
        'reservation[]': {
            required: false,
            maxlength: 'You can chcek only one checkbox'
        }

    };



    /*
    $('#regForm').validate({
        errorElement: 'small',
        errorClass: 'mme-see-errors',
        errorPlacement: function (error, element) {
            if (element.attr("type") == "checkbox" || element.attr("type") == "radio") {
                error.appendTo(element.parent('li').next('li'));
            } else {
                error.insertAfter($(element));
            }
        },

        rules: validation_rules,
        messages: validation_messages,
        submitHandler: function (form) {
            var formData = new FormData(form);
            for (var i = 0; i < myDropzone.files.length; i++) {
                formData.append('file[]', myDropzone.files[i]);
            }

            $.ajax({
                url: './../registration.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $("#formResponse").html(response.message);
                    } else {
                        $("#errorResponse").html(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    $("#errorResponse").html('An error occurred while sending your message. Please try again later.');
                }
            });

        }

    })

    */


    $('input[name="reservation"]:first,input[name="reservation"]:last').click(function () {
        if ($(this).is(':checked')) {
            $('.date-checkinout').css('display', 'block')
        } else {
            $('.date-checkinout').css('display', 'none')

        }
    });
    $('input[name="reservation"]:nth(1)').click(function () {
        if ($(this).is(':checked')) {
            $('.date-checkinout,.share-with').css('display', 'block');
        } else {
            $('.date-checkinout,.share-with').css('display', 'none');

        }
    });


    $('input[name="presentation"]:first').click(function () {
        if ($(this).is(':checked') == true) {
            $('.with-presentation').css('display', 'block');
        }

        else {

            $('.with-presentation').css('display', 'none');
        }
    });



    $('input[name="checkin"]').flatpickr({ minDate: "today" });
    $('input[name="checkout"]').flatpickr({ minDate: "today" });




});

function onClick(e) {
    e.preventDefault();
    /*grecaptcha.ready(function () {
        grecaptcha.execute('6LdVjyciAAAAAJ7oD19ZcoO5psT5WxcWsN4fn-GD', { action: 'submit' }).then(function (token) {
            // Add your logic to submit to your backend server here.
        });
    });*/
}






