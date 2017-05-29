<?php
include_once('../../database/users.php');

if (!isset($_POST["idauction"])) {
    $_SESSION['error_messages'][] = 'Error receiving auction.';
    header('Location: ../../index.php');
    die();
}

if (!isset($_SESSION['iduser'])) {
    echo json_encode(array("result" => "No user available."));
    return;
}

$idauction = trim(strip_tags($_POST['idauction']));
try {
    $res = isUserFollowing($_SESSION['iduser'], $idauction);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}


echo json_encode(array("result" => $res));