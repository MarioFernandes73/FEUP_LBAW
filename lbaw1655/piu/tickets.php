<?php
include_once('../../config/init.php');
include_once('../../database/files.php');

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

function createTicketAuction($iduser,$idauction){
    global $conn;
    $title = "Auction " . $idauction . " report!";
    $stmt = $conn->prepare("INSERT INTO \"Ticket\" (iduser,idauctionreported,title,solved,category)
VALUES (?,?,?,?,?)");
    $stmt->execute(array($iduser,$idauction,$title,false,'Product'));
}

function userReportedAuction($iduser,$idauction){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" WHERE idauctionreported = ? AND iduser = ?");
    $stmt->execute(array($idauction, $iduser));
    $res = $stmt->fetch();

    if($res == null)
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

