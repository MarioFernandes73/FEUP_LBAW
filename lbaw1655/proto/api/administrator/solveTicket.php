<?php
include_once('../../database/tickets.php');

if (!isset($_POST["idticket"]) ){
    $_SESSION['error_messages'][] = 'Error receiving ticket.';
    header('Location: ../../index.php');
    die();
}

$idticket = trim(strip_tags($_POST["idticket"]));

echo solveTicket($idticket);