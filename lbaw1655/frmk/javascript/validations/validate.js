function validateSignup() {
    var password = document.forms["signup"]["password"].value;
    var confirmPassword = document.forms["signup"]["confirPassword"].value;
    if (password == confirmPassword) {
        return true;
    } else {
        alert("Confirm the password again");
        return false;
    }

}