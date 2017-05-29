<?php
include_once('../../database/users.php');

if (isset($_GET["iduser"])) {
    $iduser = trim(strip_tags($_GET["iduser"]));
    try {
        echo json_encode(getUser($iduser));
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
    return;
}

if (!isset($_GET["state"]) || !isset($_GET["offset"])) {
    $_SESSION['error_messages'][] = 'Error receiving user.';
    header('Location: ../../index.php');
    die();
}

$state = trim(strip_tags($_GET["state"]));
$offset = trim(strip_tags($_GET["offset"]));

try {
    echo json_encode(getAdminUsers($state, $offset));
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}


