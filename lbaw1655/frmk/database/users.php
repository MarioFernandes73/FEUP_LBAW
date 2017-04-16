<?php
include_once('../../config/init.php');

function isLoginCorrect($user,$pass){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" where username=? AND password=?");
    $stmt->execute(array($user,$pass));
    return $stmt->fetch();
}

	function addUser($username, $name, $birthDate, $address, $password, $phoneNumber){//nao estou a usar o phoneNumber
		global $conn;
		 $options = ['cost' => 12];
    	 $hashPass = password_hash($password, PASSWORD_DEFAULT, $options);
		$stmt = $conn->prepare("INSERT INTO \"User\" (username, password, birthdate, name, address) 
									 VALUES ( ?, ?, ?, ?, ?)");
		$stmt->execute(array($username,$hashPass, $birthDate, $name, $address));
}

function hasUsername($usermame){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where username=?");
    $stmt->execute(array($usermame));
    echo $stmt->fetch()."<br>";
    return $stmt->fetch();
}

function hasAddress($address){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where address=?");
    $stmt->execute(array($address));
    echo $stmt->fetch()."<br>";
    return $stmt->fetch();
}
