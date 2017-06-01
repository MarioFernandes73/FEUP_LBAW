<?php
include_once('../../database/tickets.php');

if (!isset($_GET["state"]) || !isset($_GET["category"]) || !isset($_GET["offset"])) {
    $_SESSION['error_messages'][] = 'Error receiving tickets.';
    header('Location: ../../index.php');
    die();
}
$state = trim(strip_tags($_GET["state"]));
$category = trim(strip_tags($_GET["category"]));
$offset = trim(strip_tags($_GET["offset"]));

try {
    $tickets = getAdminTickets($state, $category, $offset);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}

echo json_encode($tickets);