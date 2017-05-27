<?php
include_once('../../config/init.php');
include_once('../../database/users.php');


if (isset($_SESSION['iduser'])) {

    $confirmPass = trim(strip_tags($_POST["confirmPassword"]));
    var_dump($_POST);

    try {

        if (validPass($_SESSION['username'], $confirmPass) == false) {
            throw new PDOException();
        }

        deleteAccount($_SESSION['iduser']);

        $_SESSION['success_messages'][] = 'Account deleted with success.';

        header('Location: ../../actions/authentication/logout.php');

    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Could not delete account. Please, try again.';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }

} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location: ../../pages/authentication/homepage.php');
    exit();
}