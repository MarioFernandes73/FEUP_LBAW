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

function addPhotosComment($idcomment, $photos)
{
    $msg = "";

    if (is_array($photos)) {
        var_dump("array");
        foreach ($photos as $photo) {
            if (addFile($photo[0], $photo[1], $photo[2]) != -1) {
                $idfile = getFileId($photo[0], $photo[1]);
                addAImagesComment($idfile, $idcomment);
            } else {
                $msg = "Could not insert file try again";
                return $msg;
            }
        }
    } else {
        if (addFile($photos[0], $photos[1], $photos[2]) != -1) {
            $idfile = getFileId($photos[0], $photos[1]);

            addAImagesComment($idfile, $idcomment);
        } else {
            $msg = "Could not insert file try again";
            return $msg;
        }
    }
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