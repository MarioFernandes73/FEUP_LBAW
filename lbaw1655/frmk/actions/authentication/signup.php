<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

<<<<<<< HEAD
$username = trim(strip_tags($_POST['username']));
$password= trim(strip_tags($_POST['password']));
$phoneNumber = trim(strip_tags($_POST['phoneNumber']));
$address = trim(strip_tags($_POST['address']));
$birthDate = trim(strip_tags($_POST['birthDate']));
$name = trim(strip_tags($_POST['name']));

if(!hasUsername($usermame)){

    if(!hasAddress($address)){

        try {
            addUser($username, $name, $birthDate, $address, $password, $phoneNumber);
            $_SESSION['success_messages'][] = 'User registered successfully';
            header('Location: ../../pages/authentication/homepage.php');

        }catch (PDOException $e){
            $_SESSION['error_messages'][] = 'Could not register, please try again.';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    else {
        $_SESSION['error_messages'][] = 'Address used';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
 else {
     $_SESSION['error_messages'][] = 'User used';
     header('Location: ' . $_SERVER['HTTP_REFERER']);
     exit;
 }
=======

$username = $_POST['username'];
$password= $_POST['password'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$birthDate = $_POST['birthDate'];
$name = $_POST['name'];


if(!hasUsername($usermame)){
    echo 'unique Username' . "<br>";

    if(!hasAddress($address)){
        echo 'unique email' . "<br>";
        addUser($username, $name, $birthDate, $address, $password, $phoneNumber);
        echo 'insert username' . $username . "<br>";
        header('Location: ../../pages/authentication/homepage.php');
    }
    else
     header('Location: ' . $_SERVER['HTTP_REFERER']);
}
 else
    header('Location: ' . $_SERVER['HTTP_REFERER']);
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692


