<?php
include_once('../../database/users.php');

if (!isset($_GET["username"])) {
    $_SESSION['error_messages'][] = 'Error receiving username.';
    header('Location: ../../index.php');
    die();
}

$username = trim(strip_tags($_GET['username']));
try {
    $hasUsername = hasUsername($_GET['username']);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}
echo json_encode(array("hasUsername" => $hasUsername));