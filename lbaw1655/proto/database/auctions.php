<?php
include_once('../../database/files.php');
include_once('../../database/users.php');
include_once('../../database/tickets.php');

/**
 * GETS
 */

//auction
function getAuctionId($name, $category, $baseprice, $type, $startingdate, $durationhours, $idowner)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Auction\" WHERE name=? AND category=? AND 
baseprice=? AND type=? AND startingdate=? AND durationhours=? AND idowner=?");
    $stmt->execute(array($name, $category, $baseprice, $type, $startingdate, $durationhours, $idowner));
    return $stmt->fetch()['idauction'];
}

function getAuction($idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Auction\" WHERE idauction=?");
    $stmt->execute(array($idauction));
    return $stmt->fetch();
}

function getAuctionPhotosIDs($idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT idfile FROM \"ImagesAuction\" WHERE idauction=?");
    $stmt->execute(array($idauction));
    return $stmt->fetchAll();
}

function getAuctionPhotosPathId($idauction)
{

    global $conn;
    $stmt = $conn->prepare("SELECT \"Auction\".idauction, path FROM \"Auction\" JOIN \"ImagesAuction\"
ON \"Auction\".idauction = \"ImagesAuction\".idauction
JOIN  \"File\"
ON \"File\".idfile = \"ImagesAuction\".idfile
WHERE \"Auction\".idauction=? ");
    $stmt->execute(array($idauction));
    return $stmt->fetchAll();

}

function getAuctionPhoto($idFile)
{
    global $conn;
    $stmt = $conn->prepare("SELECT path FROM \"File\" WHERE idfile=?");
    $stmt->execute(array($idFile));
    return $stmt->fetch();
}

function auctionsLMO()
{
    global $conn;
    $stmt = $conn->prepare("
        SELECT * FROM \"Auction\" A
        WHERE A.state = 'Opened'::auctionstate
        ORDER BY (A.startingdate + A.durationhours * '1 hour'::interval - current_timestamp) DESC
        LIMIT 12;");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function auctionsHot()
{
    global $conn;
    $stmt = $conn->prepare("
        SELECT *
        FROM \"Auction\" A
        WHERE  A.state = 'Opened'::auctionstate
        ORDER BY (	SELECT COUNT(*)
        FROM \"Bid\" B 
        WHERE B.idAuction = A.idAuction) 
        DESC, A.name ASC
        LIMIT 12;");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

//comments
function getAuctionComments($idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Comment\" WHERE idauction=? ORDER BY date DESC");
    $stmt->execute(array($idauction));
    return $stmt->fetchAll();
}

//bids

function getLastBid($idAuction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Bid\" WHERE idauction = ? AND ammount IN (SELECT MAX(ammount) FROM
\"Bid\" WHERE idauction = ?)");
    $stmt->execute(array($idAuction, $idAuction));

    return $stmt->fetch();
}

function getAuctionBids($idauction)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"Bid\" WHERE idauction=?");
    $stmt->execute(array($idauction));
    return $stmt->fetchAll();
}

/**
 * ADDS , CREATES
 */

//auctions

function createAuction($name, $category, $baseprice, $type, $startdate, $time, $description, $state, $idowner)
{
    global $conn;
    $conn->beginTransaction();

    /**
     * Verify if user is validated to create an auction
     */

    $stmt = $conn->prepare("SELECT state FROM \"User\" WHERE iduser = ?");
    $stmt->execute(array($idowner));

    if (isValidUser($stmt->fetch())) {
        $conn->rollback();
        return false;
    }

    /**
     * Created the auction
     */

    $stmt = $conn->prepare("INSERT INTO \"Auction\" (name,category,baseprice,currentprice,type,startingdate,
durationhours,description,state,idowner) VALUES (?,?,?,0,?,?,?,?,?,?)");
    $stmt->execute(array($name, $category, $baseprice, $type, $startdate, $time, $description, $state, $idowner));

    $conn->commit();

    return true;
}

function addAuctionPhotos($idauction, $photos)
{

    if (is_array($photos)) {
        foreach ($photos as $photo) {
            if (addFile($photo[0], $photo[1], $photo[2]) != -1) {
                $idfile = getFileId($photo[0], $photo[1]);
                addAImagesAuction($idfile, $idauction);
            }
        }
    } else {
        if (addFile($photos[0], $photos[1], $photos[2]) != -1) {
            $idfile = getFileId($photos[0], $photos[1]);
            addAImagesAuction($idfile, $idauction);
        }
    }
}

//comments

function createComment($idauction, $iduser, $date, $message)
{
    //POR TRANSIÇÃO
    global $conn;
    $conn->beginTransaction();

    if (!isValidUser(getUser($iduser)['state'])) {
        $conn->rollBack();
        return "You must be a validated user to comment on the auction.";
    }

    if (getIdComment($idauction, $iduser, $date, $message) != null) {
        $conn->rollBack();
        return "Could not comment, please try again.";
    }
    $stmt = $conn->prepare("
INSERT INTO \"Comment\" (idauction,iduser,date,message) VALUES(?,?,?,?)");
    $stmt->execute(array($idauction, $iduser, $date, $message));

    $conn->commit();
    return 0;
}

function getIdComment($idauction, $iduser, $date, $message)
{
    global $conn;
    $stmt = $conn->prepare("SELECT idcomment FROM \"Comment\" WHERE idauction =? AND iduser = ? AND date = ? AND message =?");
    $stmt->execute(array($idauction, $iduser, $date, $message));

    return $stmt->fetch()['idcomment'];

}

function getComment($idcomment)
{
    global $conn;
    $stmt = $conn->prepare("SELECT message FROM \"Comment\" WHERE idcomment =? AND NOT(message LIKE 'REMOVED%')");
    $stmt->execute(array($idcomment));

    $result= $stmt->fetch();
    if($result==null)
        return false;
    else
        return $result['message'];

}

function removeComment($iduser, $idcomment)
{
    $result = "";
    global $conn;
    $conn->beginTransaction();

    if (!isAdminUser(getUser($iduser)['state'])) {
        $conn->rollBack();
        $result = "You must be a administrator user to remove comment on the auction.";
        return $result;
    }
    $msg = getComment($idcomment);
    if(!$msg){
        $conn->rollBack();
        $result = "It's not possible to remove the comment.";
        return $result;
    }

    $msg = "REMOVED" . $msg;

   $stmt = $conn->prepare("UPDATE \"Comment\" SET message=? WHERE idcomment = ?");
    $stmt->execute(array($msg,$idcomment));

    $conn->commit();
    return $result;
}


function getComentPathAuction($idauction)
{

    global $conn;
    $stmt = $conn->prepare("SELECT \"Comment\".idcomment,date, message, path
FROM \"Comment\" LEFT JOIN \"FileComment\"
ON \"Comment\".idcomment = \"FileComment\".idcomment
LEFT JOIN \"File\"
ON \"File\".idfile = \"FileComment\".idfile
WHERE \"Comment\".idauction =? AND NOT(\"Comment\".message LIKE 'REMOVED%')
ORDER BY date DESC;");
    $stmt->execute(array($idauction));

    return $stmt->fetchAll();
}


function editAuction($idAuction, $idUser, $name, $description, $category)
{

    global $conn;
    $conn->beginTransaction();

    $state = getUser($idUser)['state'];


    if (!isAdminUser($state)) {
        $conn->rollback();
        return "You need to be a Administrator user!";
    }


    if ($category != null) {
        $stmt = $conn->prepare("UPDATE \"Auction\" SET category=? WHERE \"Auction\".idauction = ?");
        $stmt->execute(array($category, $idAuction));
    }

    if ($description != null) {
        $stmt = $conn->prepare("UPDATE \"Auction\" SET description=?  WHERE \"Auction\".idauction = ?");
        $stmt->execute(array($description, $idAuction));
    }

    if ($name != null) {
        $stmt = $conn->prepare("UPDATE \"Auction\" SET name=? WHERE \"Auction\".idauction = ?");
        $stmt->execute(array($name, $idAuction));
    }
    $conn->commit();
}

/*Bid*/

function bidAuction($idauction, $idbidder, $value)
{
    global $conn;
    $conn->beginTransaction();

    if (isValidUser(getUser($idbidder)['state'])) {

        $auction = getAuction($idauction);
        $currentprice = $auction['currentprice'];
        $baseprice = $auction['baseprice'];
        $type = $auction['type'];

        if ($currentprice >= $value && $type != 'Blind') {
            $conn->rollBack();
            return "The bid value is lower than the current price. Please insert a value above.";
        }
        if ($baseprice > $value) {
            $conn->rollBack();
            return "The bid value is lower than the base price. Please insert a value above.";
        }

        $date = new DateTime();
        $stmt = $conn->prepare("INSERT INTO \"Bid\" (idauction,idbidder,ammount,date) VALUES (?,?,?,?)");
        $stmt->execute(array($idauction, $idbidder, $value, $date->format('Y-m-d H:i:s')));
    } else {
        $conn->rollBack();
        return "You must be an administrator or a validated user to bid on an auction.";
    }

    $conn->commit();
    return 0;
}

function followAuction($iduser, $idauction)
{
    global $conn;
    $conn->beginTransaction();

    if (isUserFollowing($iduser, $idauction)) {
        $conn->rollBack();
        return 0;
    }

    if (isAuctionOwner($iduser, $idauction)) {
        $conn->rollBack();
        return "You can't follow an auction that you own.";
    }

    $state = getUser($iduser)['state'];

    if (isValidUser($state)) {
        $stmt = $conn->prepare("INSERT INTO \"Follow\" (iduser,idauction) VALUES (?,?)");
        $stmt->execute(array($iduser, $idauction));
        $conn->commit();
    } else {
        $conn->rollBack();
        return "You have to be an administrator or a validated user to follow an auction.";
    }
}

function reportAuction($iduser, $idauction)
{
    global $conn;
    $conn->beginTransaction();
    if (userReportedAuction($iduser, $idauction)) {
        $conn->rollBack();
        return "You already reported this auction.";
    }

    createTicketAuction($iduser, $idauction);

    $conn->commit();
    return 0;
}

function reportComment($iduser, $idcomment, $message)
{
    global $conn;
    $conn->beginTransaction();
    $msg = "";
    if (getIdReportComment($iduser, $idcomment)) {
        $conn->rollBack();
        $msg = "You already reported this comment.";
        return $msg;
    }

    createreportComment($iduser, $idcomment);

    $idticket = getIdReportComment($iduser, $idcomment);

    if (hasTicketComment($iduser, $idticket)) {
        $conn->rollBack();
        $msg = "You already reported this comment.";
        return $msg;
    }

    $now = new DateTime();
    createTicketComment($now->format('Y-m-d H:i:s'), $message, $iduser, $idticket);

    $conn->commit();
    return $msg;
}
