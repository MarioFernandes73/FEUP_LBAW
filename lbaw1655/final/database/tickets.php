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
    $conn->beginTransaction();

    if(!hasTicketComment($iduser,$idticket) && getUser($iduser)['state'] != 'Administrator'){
        $conn->rollBack();
        return "User without permissions to comment an auction.";
    }

    if(getIdTicketComment($idticket,$date) != null){
        $conn->rollBack();
        return "Could not comment, please try again.";
    }

    $stmt = $conn->prepare("INSERT INTO \"TicketComment\" (date,message,iduser,idticket) VALUES(?,?,?,?)");
    $stmt->execute(array($date, $message, $iduser, $idticket));

    $conn->commit();
    return 0;
}

function getIdTicketComment($idticket,$date){
    global  $conn;
    $stmt = $conn->prepare("SELECT idticketcomment FROM \"TicketComment\" WHERE idticket = ? AND date = ?");
    $stmt->execute(array($idticket,$date));
    return $stmt->fetch()['idticketcomment'];
}

function addTicketCommentFile($idticketcomment, $name, $path, $data){
    if(addFile($name,$path,$data) != -1){
        $idfile = getFileId($name,$path);
        addFileToTicketComment($idfile, $idticketcomment);
        return 0;
    }
    else
        return "Already exists file with that name.";
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
        $msg = "Could not create ticket. Please try again.";
        return $msg;
    }
    
    $now = new DateTime();
    $stmt = $conn->prepare("INSERT INTO \"TicketComment\" (date,message,iduser,idticket) VALUES(?,?,?,?)");
    $stmt->execute(array($now->format('Y-m-d H:i:s'), $message, $iduser, $idticket));

    $conn->commit();
    return $msg;
}

function getAllTickets($idUser,$offset){
    global $conn;
    $statement = "SELECT * FROM \"Ticket\" WHERE iduser=? ORDER BY idticket LIMIT 10 OFFSET ".$offset*10;
    $stmt = $conn->prepare($statement);
    $stmt->execute(array($idUser));
    return $stmt->fetchAll();
}

function getUserTickets($idUser, $solved,$offset){
    global $conn;
    if($solved == true){
        $statement = "SELECT * FROM \"Ticket\" WHERE iduser=? AND solved=? ORDER BY idticket DESC LIMIT 10 OFFSET ".$offset*10;
    }
    elseif($solved == false){
        $statement = "SELECT * FROM \"Ticket\" WHERE iduser=? AND solved=? ORDER BY resolveddate DESC LIMIT 10 OFFSET ".$offset*10;
    }
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
    $stmt = $conn->prepare("SELECT idticket,title,idticketcomment,message,path,date,username
                                    FROM \"Ticket\"
                                    NATURAL JOIN
                                    (
                                    SELECT \"TicketComment\".idticketcomment,message,path,date,idticket,iduser
                                    FROM \"TicketComment\" 
                                    LEFT JOIN \"FileTicketComment\" ON \"FileTicketComment\".idticketcomment = \"TicketComment\".idticketcomment
                                    LEFT JOIN \"File\" ON \"File\".idfile = \"FileTicketComment\".idfile
                                    
                                    ) AS TMP
                                    JOIN \"User\" ON TMP.iduser = \"User\".iduser 
                                    WHERE \"Ticket\".idticket=? ORDER BY date ASC");
    $stmt->execute(array($idticket));
    return $stmt->fetchAll();
}

function getAdminTickets($state,$category,$offset){
    global $conn;
    $statement = "
    SELECT \"User\".iduser, \"Ticket\".idticket, title, username, \"Ticket\".resolveddate 
    FROM \"Ticket\" JOIN \"User\" ON \"Ticket\".iduser = \"User\".iduser";
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
    elseif($category == "Product")
    {
        $statement = "
        SELECT \"User\".iduser, \"Ticket\".idticket, username, \"Ticket\".resolveddate, idauction, \"Auction\".name
        FROM \"Ticket\" JOIN \"User\" ON \"Ticket\".iduser = \"User\".iduser 
                        JOIN \"Auction\" ON \"Auction\".idauction = \"Ticket\".idauctionreported
        WHERE solved=? AND \"Ticket\".category=? 
        LIMIT 10 OFFSET ".$offset*10;
        
        $stmt = $conn->prepare($statement);
        $stmt->execute(array($state, $category));
    }
    else {
        $statement =  $statement."  WHERE solved=? AND category=? LIMIT 10 OFFSET ".$offset*10;
        $stmt = $conn->prepare($statement);
        $stmt->execute(array($state, $category));
    }
    return $stmt->fetchAll();
}