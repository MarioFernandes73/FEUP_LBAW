<?php
include_once('../../config/init.php');
include_once('../../database/users.php');



$username = $_POST['username'];
$password = $_POST['password'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$birthDate = $_POST['birthDate'];
$name = $_POST['name'];

echo  echo 'aqui' . "<br>";
/*
if(!hasUsername($usermame)){
    echo 'unique Username' . "<br>";

    if(!hasEmail($email)){
        echo 'unique email' . "<br>";
        addUser($username, $name, $birthDate, $address, $password, $phoneNumber);
        echo 'insert username' . $username . "<br>";
    }
}*/
