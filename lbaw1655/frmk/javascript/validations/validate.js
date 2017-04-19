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

}

function VerifyUser() {

    $("form[name='signup'] input[name ='username']").focusout(function() {

        var username = $("form[name='signup'] input[name ='username']").val();

        $.ajax({
            type: 'get',
            url: '../../api/authentication/verifyUser.php',
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
            }
        });
    });
};

function VerifyAddress() {

    $("form[name='signup'] input[name ='address']").focusout(function() {
        var address = $("form[name='signup'] input[name ='address']").val();

        $.ajax({
            type: 'get',
            url: '../../api/authentication/verifyAddress.php',
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
                        });
                    }
                    $(":button[name='submit']").prop("disabled", true);
                }
                else {//hasUser=false

                    $("#address_used").remove();
                    $(":submit").attr("disabled", false);

                }
            }

             });
    });
};