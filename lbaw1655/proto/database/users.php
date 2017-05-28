<?php
include_once('../../config/init.php');

/* States */

function isValidUser($state)
{
    if ($state == "Validated" || $state == "Administrator")
        return true;
    else
        return false;
}

function isRegistered($state)
{
    if (isValidUser($state) || $state == "Registered")
        return true;
    else
        return false;
}

function isAdminUser($state)
{
    if ($state == "Administrator")
        return true;
    else
        return false;
}

/* Database */
function validPass($user, $pass)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" where username=?");
    $stmt->execute(array($user));
    $res = $stmt->fetch();
    if ($res == false) {
        return false;
    }

    if (!password_verify($pass, $res['password'])) {
        return false;
    }

    return true;
}

function isLoginCorrect($user, $pass)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" where username=?");
    $stmt->execute(array($user));
    $res = $stmt->fetch();
    if ($res == false) {
        $_SESSION['error_messages'][] = "Invalid login, username not found.";
        return false;
    }

    if (password_verify($pass, $res['password'])) {
        return $res;
    }
    $_SESSION['error_messages'][] = "Invalid login, invalid password.";
    return false;
}

function addUser($username, $name, $birthDate, $address, $password, $phoneNumber)
{
    global $conn;
    $msg = '';

    $conn->beginTransaction();

    $currentDate = new DateTime();
    $tmp = new DateTime($birthDate);
    $yearsOld = $currentDate->diff($tmp)->format('%a');

    if (hasUsername($username)) {
        $conn->rollback();
        $msg = "Username already taken. Please try another one.";
        return $msg;
    } else if (hasAddress($address)) {
        $conn->rollback();
        $msg = "Address already taken. Please try another one.";
        return $msg;
    } else if ($yearsOld < 18) {
        $conn->rollback();
        $msg = "Must be at least 18 years old.";
        return $msg;
    }

    $options = ['cost' => 12];
    $hashPass = password_hash($password, PASSWORD_DEFAULT, $options);
    $stmt = $conn->prepare("INSERT INTO \"User\" (username, password, birthdate, name, address, phonenumber) 
									 VALUES ( ?, ?, ?, ?, ?,?)");
    $stmt->execute(array($username, $hashPass, $birthDate, $name, $address, $phoneNumber));

    $conn->commit();
}

function hasUsername($user)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where username=?");
    $stmt->execute(array($user));
    if ($stmt->fetch() == false)
        return false;
    else return true;
}

function hasAddress($address)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" Where address=?");
    $stmt->execute(array($address));
    if ($stmt->fetch() == false)
        return false;
    else return true;
}

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
    $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Inactive'::userstate WHERE \"User\".idUser = ?");
    $stmt->execute(array($idUser));
    return $stmt->fetch();
}

function editProfile($idUser, $name, $address, $password, $phonenumber)
{
    global $conn;
    $conn->beginTransaction();
    $msg = "";

    $state = getUser($idUser)['state'];


    if (!isRegistered($state)) {
        $conn->rollback();
        return "User without permissions to edit profile.";
    }


    if ($name != "") {
        $stmt = $conn->prepare("UPDATE \"User\" SET name = ? WHERE iduser = ?");
        $stmt->execute(array($name, $idUser));
        $msg = $name;
    }

    if ($address != "") {
        $stmt = $conn->prepare("UPDATE \"User\" SET address = ? WHERE \"User\".iduser = ?");
        $stmt->execute(array($address, $idUser));
    }

    if ($password != "") {
        $options = ['cost' => 12];
        $hashPass = password_hash($password, PASSWORD_DEFAULT, $options);
        $stmt = $conn->prepare("UPDATE \"User\" SET password = ? WHERE \"User\".iduser = ?");
        $stmt->execute(array($hashPass, $idUser));
    }

    if ($phonenumber != null) {
        $stmt = $conn->prepare("UPDATE \"User\" SET phonenumber=? WHERE \"User\".iduser = ?");
        $stmt->execute(array($phonenumber, $idUser));
    }


    $conn->commit();
    return $msg;
}

/*Auctions related*/

function isUserFollowing($iduser, $idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Follow\" WHERE iduser = ? AND idauction = ?");
    $stmt->execute(array($iduser, $idauction));
    $res = $stmt->fetch();

    if ($res == null)
        return false;
    else
        return true;
}

function isAuctionOwner($iduser, $idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Auction\" WHERE idowner = ? AND idauction = ?");
    $stmt->execute(array($iduser, $idauction));
    $res = $stmt->fetch();

    if ($res == null)
        return false;
    else
        return true;
}

function demoteUser($id,$state){
    global $conn;
    if($state == "Administrator") {
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Validated'::userstate WHERE iduser=? AND state =?");
    }
    elseif ($state == "Validated" || $state == "Registered"){
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Banned'::userstate WHERE iduser=? AND state =?");
    }
    $stmt->execute(array($id, $state));
}

function promoteUser($id,$state){
    global $conn;
    if($state == "Registered" || $state == "Validated")
    {
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Administrator'::userstate WHERE iduser=? AND state =?");
    }
    elseif ($state == "Banned")
    {
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Validated'::userstate WHERE iduser=? AND state =?");
    }
    $stmt->execute(array($id, $state));
}

function getAdminUsers($state,$offset){
    global $conn;
    if($state == "Active"){
        $statement = "SELECT * FROM \"User\" WHERE state=? OR state=? LIMIT 10 OFFSET ".$offset*10;
        $stmt = $conn->prepare($statement);
        $stmt->execute(array("Validated", "Registered"));
    }
    else{
        $statement = "SELECT * FROM \"User\" WHERE state=? LIMIT 10 OFFSET ".$offset*10;
        $stmt = $conn->prepare($statement);
        $stmt->execute(array($state));
    }
    return $stmt->fetchAll();
}