<?php
include_once('../../config/init.php');

function isLoginCorrect($user,$pass){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" where username=?");
    $stmt->execute(array($user));
    $res = $stmt->fetch();
    if($user != false && password_verify($pass, $res['password']))
    	return $res;
    else
        return false;
}

	function addUser($username, $name, $birthDate, $address, $password, $phoneNumber){
		global $conn;
		 $options = ['cost' => 12];
         echo($phoneNumber);
    	 $hashPass = password_hash($password, PASSWORD_DEFAULT, $options);
		$stmt = $conn->prepare("INSERT INTO \"User\" (username, password, birthdate, name, address, phonenumber) 
									 VALUES ( ?, ?, ?, ?, ?,?)");
		$stmt->execute(array($username,$hashPass, $birthDate, $name, $address, $phoneNumber));
}

function hasUsername($usermame){
    global $conn;   
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where username=?");
    $stmt->execute(array($usermame));
    if($stmt->fetch()==false)
        return false;
    else return true;
}

function hasAddress($address){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where address=?");
    $stmt->execute(array($address));
    if($stmt->fetch()==false)
        return false;
    else return true;
}

function getUser($iduser){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" WHERE iduser=?");
    $stmt->execute(array($iduser));
    return $stmt->fetch();
}
