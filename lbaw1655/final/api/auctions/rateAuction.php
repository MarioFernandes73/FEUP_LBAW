<?php
include_once('../../database/auctions.php');

if (!isset($_POST["iduser"]) || !isset($_POST["id"]) || !isset($_POST["val"]) || !isset($_POST["type"])) {
    $_SESSION['error_messages'][] = 'Error receiving rate arguments.';
    header('Location: ../../index.php');
    die();
}

$iduser = trim(strip_tags($_POST['iduser']));
$idauction = trim(strip_tags($_POST['id']));
$val = trim(strip_tags($_POST['val']));
$type = trim(strip_tags($_POST['type']));

if ($val >= 0 && $val <= 5) {
    try {
        echo rateAuction($iduser, $idauction, $val, $type);
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
} else
    echo false;