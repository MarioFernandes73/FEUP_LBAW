<?php
include_once('../../database/users.php');

/**
 * EDIT ACCOUNT
 */

if ($_GET["acao"] == "edit") {

    $name = trim(strip_tags($_POST["name"]));
    $address = trim(strip_tags($_POST["address"]));
    $pass = trim(strip_tags($_POST["password"]));
    $confirmPass = trim(strip_tags($_POST["confirmPassword"]));
    $phone = trim(strip_tags($_POST["phone"]));

    if($pass != "" && $pass != $confirmPass){
        $_SESSION['error_messages'][] = 'The passwords must match.';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }

    try {
        editProfile($_SESSION['iduser'],$name, $address, $password,$phone);
        $_SESSION['success_messages'][] = 'Profile updated with success.';
        header('Location: ../../pages/users/profile.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Could not update profile. Please try again.';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }
}

/**
 * DELETE ACCOUNT
 */

if ($_GET["acao"] == "delete") {
    try {
        deleteAccount($_SESSION['iduser']);
        include_once('../authentication/logout.php');
        $_SESSION['success_messages'][] = 'Account deleted successfully.';
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Access denied.';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }
}
header('Location: ../../pages/authentication/homepage.php');