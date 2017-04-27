<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

$idUser = $_SESSION['iduser'];


if ($_GET["acao"] == "edit") {
    //  var_dump($_POST);
    $name = trim(strip_tags($_GET["name"]));
    var_dump($name);
    if ($name != "") {

        try {
            editNameProfile($idUser, $name);
            $_SESSION['name'] = $name;
            $_SESSION['success_messages'][] = 'Name successfully changed';
        } catch (PDOException $e) {
            $_SESSION['error_messages'][] = 'Could not change name';
            header('Location: ../../pages/authentication/homepage.php');
            exit;
        }
    }

    $address = trim(strip_tags($_GET["address"]));
    if ($address != "") {
        try {
            editAddressProfile($idUser, $address);
            $_SESSION['address'] = $address;
            $_SESSION['success_messages'][] = 'Address successfully changed';
        } catch (PDOException $e) {
            $_SESSION['error_messages'][] = 'Could not change address';
            header('Location: ../../pages/authentication/homepage.php');
            exit;
        }
    }

    $pass = trim(strip_tags($_GET["password"]));
    $confirmPass = trim(strip_tags($_GET["confirmPassword"]));
    if ($pass != "") {
        if ($pass != $confirmPass) {
            $_SESSION['error_messages'][] = 'Passwords must match';
            header('Location: ../../pages/authentication/homepage.php');
            exit;

        } else {
            try {
                editPasswordProfile($idUser, $pass);
                $_SESSION['success_messages'][] = 'Password successfully changed';
            } catch (PDOException $e) {
                $_SESSION['error_messages'][] = 'Could not change password';
                header('Location: ../../pages/authentication/homepage.php');
                exit;
            }
        }
    }

    $phone = trim(strip_tags($_GET["phone"]));
    if ($phone != "") {
        try {
            editPhone_numberProfile($idUser, $phone);
            $_SESSION['phonebumber'] = $phone;
            $_SESSION['success_messages'][] = 'Phone number successfully changed';
        } catch (PDOException $e) {
            $_SESSION['error_messages'][] = 'Could not change phone number';
            header('Location: ../../pages/authentication/homepage.php');
            exit;
        }
    }
}

if ($_GET["acao"] == "delete") {
    try {
        var_dump($idUser);
        deleteAccount($idUser);
        include_once('../authentication/logout.php');
        $_SESSION['success_messages'][] = 'Account deleted successfully';
        // header('Location: ../../pages/authentication/homepage.php');
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Access denied';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }
}

header('Location: ../../pages/authentication/homepage.php');