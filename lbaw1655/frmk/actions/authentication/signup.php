<?php
include_once('../../config/init.php');
include_once('../../database/users.php');


$username = $_POST['username'];
$password= $_POST['password'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$birthDate = $_POST['birthDate'];
$name = $_POST['name'];

 var_dump($_POST);

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


