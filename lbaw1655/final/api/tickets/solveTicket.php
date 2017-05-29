<?php
include_once('../../database/tickets.php');

if (!isset($_POST["idticket"])) {
    $_SESSION['error_messages'][] = 'Error receiving ticket.';
    header('Location: ../../index.php');
    exit();
}
$idticket = trim(strip_tags($_POST['idticket']));
try {
    solveTicket($idticket);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}