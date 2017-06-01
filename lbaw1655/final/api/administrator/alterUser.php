<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

if (!isset($_GET["iduser"]) || !isset($_GET["state"]) || !isset($_GET["action"])) {
    $_SESSION['error_messages'][] = 'Error receiving user options.';
    header('Location: ../../index.php');
    die();
}

$id = trim(strip_tags($_POST["iduser"]));
$state = trim(strip_tags($_POST["state"]));
$action = trim(strip_tags($_POST["action"]));

try {
    if ($action == "demote") {

        demoteUser($id, $state);

    } elseif ($action == "promote") {

        promoteUser($id, $state);

    } else {
        $_SESSION['error_messages'][] = 'Error receiving state.';
        header('Location: ../../index.php');
        die();
    }
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}

echo json_encode(array("id" => $id));