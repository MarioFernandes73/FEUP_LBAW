<?php
include_once('../../config/init.php');

/* tem que ser corrigido

function reportComment($iduser,$idcommentreported,$title,$category, $iduserreported, $idauctionreported)
{
    global $conn;
    $stmt = $conn->prepare("
INSERT INTO \"Ticket\" (iduser,idcommentreported,title,category,solved, iduserreported, idauctionreported) VALUES (?,?,?,?,false, ?, ?)");
    $stmt->execute(array($iduser,$idcommentreported,$title,$category, $iduserreported, $idauctionreported));
}
*/

function createTicketComment($date, $message, $iduser, $idticket)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"TicketComment\" (date,message,iduser,idticket) VALUES(?,?,?,?)");
    $stmt->execute(array($date, $message, $iduser, $idticket));
}