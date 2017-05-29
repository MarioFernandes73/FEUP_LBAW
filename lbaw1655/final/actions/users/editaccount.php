<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

if (isset($_SESSION['iduser']))
{
    $name = trim(strip_tags($_POST["name"]));
    $address = trim(strip_tags($_POST["address"]));
    $pass = trim(strip_tags($_POST["password"]));
    $confirmPass = trim(strip_tags($_POST["confirmPassword"]));
    $phone = trim(strip_tags($_POST["phone"]));

    if ($pass != "" && $pass != $confirmPass) {
        $_SESSION['error_messages'][] = 'The passwords must match.';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }

    try {
        $msg = editProfile($_SESSION['iduser'], $name, $address, $password, $phone);

        $varsUser= getUser($_SESSION['iduser']);

        foreach ($varsUser as $key => $value) {
            if ($key != "password") {
                $_SESSION[$key] = $value;
            }
        }

        $_SESSION['success_messages'][] = 'Profile updated with success.';
        header('Location: ../../pages/users/profile.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Could not change profile. Please, try again.';
        header('Location: ../../pages/authentication/homepage.php');
        exit;
    }
} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
    exit();
}