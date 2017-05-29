<?php
include_once('../../database/tickets.php');

if (!isset($_POST["idticket"])) {
    $_SESSION['error_messages'][] = 'Error receiving ticket.';
    header('Location: ../../index.php');
    die();
}

$idticket = trim(strip_tags($_POST["idticket"]));

try {
    echo solveTicket($idticket);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}