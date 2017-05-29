$(document).ready(function () {
    VerifyUser();
    VerifyAddress();
    validatePasswordSignup();
    validatePasswordEditAccount();
    verifyBirthdate();
});

function validatePasswordSignup() {

    $("form[name='signup'] input[name ='confirmPassword']").focusout(function () {

        var password = document.forms["signup"].elements["password"].value;
        var confirmPassword = document.forms["signup"].elements["confirmPassword"].value; // document.forms['id'].elements['name']
        if (password != confirmPassword) {

            if ($("#confirmation_invalid").length == 0) {
                $("form[name='signup'] #form-group-ConfirmPassword").append(function () {
                    return $('<div id="confirmation_invalid">')
                        .append('<div class="row"><p></p></div><div class="panel panel-danger">' +
                            '<div class="panel-heading">Passwords must match</div>' +
                            '</div>')
                });
            }
            $(":button[name='submit']").prop("disabled", true);
        }
        else {
            $("#confirmation_invalid").remove();
            $(":button[name='submit']").prop("disabled", false);
        }
    });
}

function validatePasswordEditAccount() {


    $("form[name='editaccount'] input[name ='password']").focusout(function () {
        var password = document.forms["editaccount"].elements["password"].value;
        var confirmPassword = document.forms["editaccount"].elements["confirmPassword"].value;

        console.log(password);
        console.log(confirmPassword);
        if (!password) {//if o campo esta vazio
            if (!confirmPassword) {
                $("#confirmation_invalid").remove();
                $(":input[name='edit']").prop("disabled", false);
            }
        }
    });

    $("form[name='editaccount'] input[name ='confirmPassword']").focusout(function () {

        var password = document.forms["editaccount"].elements["password"].value;
        var confirmPassword = document.forms["editaccount"].elements["confirmPassword"].value; // document.forms['id'].elements['name']

        if (password != confirmPassword) {

            if ($("#confirmation_invalid").length == 0) {
                $("form[name='editaccount'] #form-group-ConfirmPassword").append(function () {
                    return $('<div id="confirmation_invalid">')
                        .append('<div class="row"><p></p></div><div class="panel panel-danger">' +
                            '<div class="panel-heading">Passwords must match</div>' +
                            '</div>')
                });
            }
            $(":input[name='edit']").prop("disabled", true);
        }
        else {
            $("#confirmation_invalid").remove();
            $(":input[name='edit']").prop("disabled", false);
        }
    });
}

function VerifyUser() {

    $("form[name='signup'] input[name ='username']").focusout(function () {

        var username = $("form[name='signup'] input[name ='username']").val();

        $.ajax({
            type: 'get',
            url: '../../api/authentication/verifyUser.php',
            data: {"username": username},
            success: function (data) {
                data = JSON.parse(data);

                if (data.hasUsername) {
                    if ($("#username_used").length == 0) {
                        $("form[name='signup'] #form-group-Username").append(function () {
                            return $('<div id="username_used">')
                                .append('<div  class="row"><p></p></div><div class="panel panel-danger">' +
                                    '<div class="panel-heading">Username already used</div>' +
                                    '</div>')
                        });
                    }
                    $(":button[name='submit']").prop("disabled", true);
                }
                else {
                    $("#username_used").remove();
                    $(":button[name='submit']").prop("disabled", false);
                }
            }
        });
    });
};

function VerifyAddress() {

    $("form[name='signup'] input[name ='address']").focusout(function () {
        var address = $("form[name='signup'] input[name ='address']").val();

        $.ajax({
            type: 'get',
            url: '../../api/authentication/verifyAddress.php',
            data: {"address": address},
            success: function (data) {
                data = JSON.parse(data);

                if (data.hasUser) {
                    if ($("#address_used").length == 0) {
                        $("form[name='signup'] #form-group-Address").append(function () {
                            return $('<div  id="address_used">')
                                .append('<div class="row"><p></p></div><div class="panel panel-danger">' +
                                    '<div class="panel-heading">Address already used</div>' +
                                    '</div>')
                        });
                    }
                    $(":button[name='submit']").prop("disabled", true);
                }
                else {
                    $("#address_used").remove();
                    $(":button[name='submit']").prop("disabled", false);

                }
            }
        });
    });
};



function verifyBirthdate() {

    $("form[name='signup'] input[name ='birthDate']").focusout(function () {
        var date = $("form[name='signup'] input[name ='birthDate']").val();
        date = new Date(date);
        var today = new Date();
        var years = today.getFullYear() - date.getFullYear();
        if (years < 18 || Number(years)!=years) {
            $("form[name='signup'] #form-group-Birthdate").append(function () {
                $("#birthdate_used").remove();
                return $('<div  id="birthdate_used">')
                    .append('<div class="row"><p></p></div><div class="panel panel-danger">' +
                        '<div class="panel-heading">You must be at least 18 years old to register.</div>' +
                        '</div>')
            });

            $(":button[name='submit']").prop("disabled", true);
        }
        else {
            $("#birthdate_used").remove();
            $(":button[name='submit']").prop("disabled", false);

        }
    });
}