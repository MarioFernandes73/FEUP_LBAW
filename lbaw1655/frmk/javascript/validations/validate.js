<<<<<<< HEAD
$(document).ready(function () {
    VerifyUser();
    VerifyAddress();
    validatePasswordSignup();
    validatePasswordEditAccount();
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

        if (!password) {//if o campo esta vazio
            if (!confirmPassword) {
                $("#confirmation_invalid").remove();
                $(":input[name='acao']").prop("disabled", false);
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
            $(":input[name='acao']").prop("disabled", true);
        }
        else {
            $("#confirmation_invalid").remove();
            $(":input[name='acao']").prop("disabled", false);
        }
    });
=======
$(document).ready(function() {
    VerifyUser();
    VerifyAddress();
});


function validatePassword() {
    var password = document.forms["signup"]["password"].value;
    var confirmPassword = document.forms["signup"]["confirPassword"].value;
    if (password == confirmPassword) {
        return true;
    } else {
        alert("Confirm the password again");
        return false;
    }

>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
}

function VerifyUser() {

<<<<<<< HEAD
    $("form[name='signup'] input[name ='username']").focusout(function () {
=======
    $("form[name='signup'] input[name ='username']").focusout(function() {
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692

        var username = $("form[name='signup'] input[name ='username']").val();

        $.ajax({
            type: 'get',
            url: '../../api/authentication/verifyUser.php',
<<<<<<< HEAD
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
=======
            data: { "username": username },
            success: function(data) {
                    if(data=="true") {//hasUser=true
                       if ($("#username_used").length==0) {
                            $("form[name='signup'] #form-group-Username").append(function () {
                                return $("<div>")
                                .attr("id", "username_used")
                                .attr("role", "alert")
                                .addClass("alert alert-danger")
                                .append($("<strong>").html("Username used"))
                            });
                        }
                        $(":button[name='submit']").prop("disabled",true);

                   }
                    else{//hasUser=false
                        $("#username_used").remove();
                        $(":submit").attr("disabled", false);

                    }
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
            }
        });
    });
};

function VerifyAddress() {

<<<<<<< HEAD
    $("form[name='signup'] input[name ='address']").focusout(function () {
=======
    $("form[name='signup'] input[name ='address']").focusout(function() {
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
        var address = $("form[name='signup'] input[name ='address']").val();

        $.ajax({
            type: 'get',
            url: '../../api/authentication/verifyAddress.php',
<<<<<<< HEAD
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
=======
            data: { "address": address },
            success: function(data) {

                if (data == "true") {//hasUser=true

                    if ($("#address_used").length == 0) {
                        $("form[name='signup'] #form-group-Address").append(function () {
                            return $("<div>")
                                .attr("id", "address_used")
                                .attr("role", "alert")
                                .addClass("alert alert-danger")
                                .append($("<strong>").html("Address used"))
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                        });
                    }
                    $(":button[name='submit']").prop("disabled", true);
                }
<<<<<<< HEAD
                else {
                    $("#address_used").remove();
                    $(":button[name='submit']").prop("disabled", false);

                }
            }
        });
=======
                else {//hasUser=false

                    $("#address_used").remove();
                    $(":submit").attr("disabled", false);

                }
            }

             });
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    });
};