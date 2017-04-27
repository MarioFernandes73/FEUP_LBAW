<?php
include_once('../../config/init.php');

<<<<<<< HEAD
function isLoginCorrect($user, $pass)
{
=======
function isLoginCorrect($user,$pass){
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" where username=?");
    $stmt->execute(array($user));
    $res = $stmt->fetch();
<<<<<<< HEAD
    if($res == false) {
        $_SESSION['error_messages'][] = "Invalid login, username not found.";
        return false;
    }
    elseif(password_verify($pass, $res['password'])){
        $_SESSION['error_messages'][] = "Invalid login, invalid password.";
        return false;
    }
    return $res;
}

function addUser($username, $name, $birthDate, $address, $password, $phoneNumber)
{
    global $conn;
    $options = ['cost' => 12];
    $hashPass = password_hash($password, PASSWORD_DEFAULT, $options);
    $stmt = $conn->prepare("INSERT INTO \"User\" (username, password, birthdate, name, address, phonenumber) 
									 VALUES ( ?, ?, ?, ?, ?,?)");
    $stmt->execute(array($username, $hashPass, $birthDate, $name, $address, $phoneNumber));
}

function hasUsername($user)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where username=?");
    $stmt->execute(array($user));
    if ($stmt->fetch() == false)
=======
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
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
        return false;
    else return true;
}

<<<<<<< HEAD
function hasAddress($address)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where address=?");
    $stmt->execute(array($address));
    if ($stmt->fetch() == false)
=======
function hasAddress($address){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where address=?");
    $stmt->execute(array($address));
    if($stmt->fetch()==false)
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
        return false;
    else return true;
}

<<<<<<< HEAD
function getUser($idUser)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" WHERE iduser=?");
    $stmt->execute(array($idUser));
    return $stmt->fetch();
}

function deleteAccount($idUser)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE \"User\" 
SET state = 'Inactive'::userstate
WHERE \"User\".idUser = ?");
    $stmt->execute(array($idUser));
    return $stmt->fetch();
}

function editNameProfile($idUser, $name)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE \"User\" 
      SET name = ?
WHERE \"User\".iduser = ?");
    $stmt->execute(array($name, $idUser));
    return $stmt->fetch();
}

function editAddressProfile($idUser, $address)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE \"User\" 
      SET address = ?
WHERE \"User\".iduser = ?");
    $stmt->execute(array($address, $idUser));
    return $stmt->fetch();
}

function editPasswordProfile($idUser, $password)
{
    global $conn;
    $options = ['cost' => 12];
    $hashPass = password_hash($password, PASSWORD_DEFAULT, $options);
    $stmt = $conn->prepare("UPDATE \"User\" 
      SET password = ?
WHERE \"User\".iduser = ?");
    $stmt->execute(array($hashPass, $idUser));
    return $stmt->fetch();

}

function editPhone_numberProfile($idUser, $phone_number)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE \"User\" 
      SET phonenumber=?
WHERE \"User\".iduser = ?");
    $stmt->execute(array($phone_number, $idUser));
    return $stmt->fetch();
}


=======
function getUser($iduser){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" WHERE iduser=?");
    $stmt->execute(array($iduser));
    return $stmt->fetch();
}
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
