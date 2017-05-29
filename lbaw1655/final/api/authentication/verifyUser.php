<?php
include_once('../../database/users.php');

if (!isset($_GET["username"])  ){
    $_SESSION['error_messages'][] = 'Error receiving username.';
    header('Location: ../../index.php');
    die();
}

$username = trim(strip_tags($_GET['username']));
$hasUsername = hasUsername($_GET['username']);

echo json_encode(array("hasUsername" => $hasUsername));