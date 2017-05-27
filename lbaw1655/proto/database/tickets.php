<?php
include_once('../../config/init.php');
include_once('../../database/files.php');

function createreportComment($iduser, $idcomment)
{
    global $conn;
    $title = 'Comment ' . $idcomment . 'report!';
    $stmt = $conn->prepare("INSERT INTO \"Ticket\" (iduser,idcommentreported,title,solved,category)
VALUES (?,?,?,?,?)");
    $stmt->execute(array($iduser, $idcomment, $title, 'false', 'Report'));
}

function getIdReportComment($iduser, $idcomment)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" WHERE iduser=? AND idcommentreported=?");
    $stmt->execute(array($iduser, $idcomment));

    $res = $stmt->fetch();

    if ($res == null)
        return false;
    else
        return $res['idticket'];
}

function getIdTicket($iduser, $title, $category)
{

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" WHERE iduser=? AND title=? AND category=?");
    $stmt->execute(array($iduser, $title, $category));

    $res = $stmt->fetch();

    if ($res == null)
        return false;
    else
        return $res['idticket'];
}

function createTicketComment($date, $message, $iduser, $idticket)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"TicketComment\" (date,message,iduser,idticket) VALUES(?,?,?,?)");
    $stmt->execute(array($date, $message, $iduser, $idticket));
}

function hasTicketComment($iduser, $idticket)
{

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"TicketComment\" WHERE iduser=? AND idticket=?");
    $stmt->execute(array($iduser, $idticket));

    $res = $stmt->fetch();

    if ($res == null)
        return false;
    else
        return true;
}

function createTicketAuction($iduser, $idauction)
{
    global $conn;
    $title = 'Auction ' . $idauction . 'report!';
    $stmt = $conn->prepare("INSERT INTO \"Ticket\" (iduser,idauctionreported,title,solved,category)
VALUES (?,?,?,?,?)");
    $stmt->execute(array($iduser, $idauction, $title, 'false', 'Product'));
}

function userReportedAuction($iduser, $idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" WHERE idauctionreported = ? AND iduser = ?");
    $stmt->execute(array($idauction, $iduser));
    $res = $stmt->fetch();

    if ($res == null)
        return false;
    else
        return true;
}

function insertTicketIntoDB($iduser, $title, $category)
{

    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"Ticket\" (iduser,title,solved,category)
VALUES (?,?,?,?)");
    $stmt->execute(array($iduser, $title, 'false', $category));


}

function createTicket($iduser, $title, $category, $message)
{

    global $conn;
    $conn->beginTransaction();
    $msg = "";

    insertTicketIntoDB($iduser, $title, $category);

    $idticket = getIdTicket($iduser, $title, $category);

   if (hasTicketComment($iduser, $idticket)) {
        $conn->rollBack();
        $msg = "Could not create ticket, please try again.";
        return $msg;
    }
    
    $now = new DateTime();
    createTicketComment($now->format('Y-m-d H:i:s'), $message, $iduser, $idticket);

    $conn->commit();
    return $msg;
}

function getAllTickets($idUser,$offset){
    global $conn;
    $statement = "SELECT * FROM \"Ticket\" WHERE iduser=? LIMIT 10 OFFSET ".$offset*10;
    $stmt = $conn->prepare($statement);
    $stmt->execute(array($idUser));
    return $stmt->fetchAll();
}

function getUserTickets($idUser, $solved,$offset){
    global $conn;
    $statement = "SELECT * FROM \"Ticket\" WHERE iduser=? AND solved=? LIMIT 10 OFFSET ".$offset*10;
    $stmt = $conn->prepare($statement);
    $stmt->execute(array($idUser, $solved));
    return $stmt->fetchAll();
}

function solveTicket($idticket){
    global $conn;
    $stmt = $conn->prepare("UPDATE \"Ticket\" SET solved=TRUE, resolveddate=now() WHERE idticket=?");
    $stmt->execute(array($idticket));
    return $stmt->fetchAll();
}

function getTicket($idticket){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" JOIN \"TicketComment\" ON \"Ticket\".idticket = \"TicketComment\".idticket JOIN \"User\" ON \"TicketComment\".iduser = \"User\".iduser WHERE \"Ticket\".idticket=? ORDER BY date ASC");
    $stmt->execute(array($idticket));
    return $stmt->fetchAll();
}

function getAdminTickets($state,$category,$offset){
    global $conn;
    $statement = "SELECT \"User\".iduser, \"Ticket\".idticket, title, username, \"Ticket\".resolveddate FROM \"Ticket\" JOIN \"User\" ON \"Ticket\".iduser = \"User\".iduser";
    if($category == "null")
    {
        if($state == "")
        {
            $statement = $statement." LIMIT 10 OFFSET ".$offset*10;
            $stmt = $conn->prepare($statement);
            $stmt->execute(array());
        }
        else
        {
            $statement =  $statement." WHERE solved=? LIMIT 10 OFFSET ".$offset*10;
            $stmt = $conn->prepare($statement);
            $stmt->execute(array($state));
        }
    }
    else
    {
        $statement =  $statement."  WHERE solved=? AND category=? LIMIT 10 OFFSET ".$offset*10;
        $stmt = $conn->prepare($statement);
        $stmt->execute(array($state, $category));
    }
    return $stmt->fetchAll();
}