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


function getAdvancedSearchedAuctions($offset, $name, $rating, $category, $type, $date, $duration)
{
    $statement = "SELECT idauction,category,\"Auction\".name,currentprice,startingdate,durationhours
                  FROM \"Auction\" JOIN \"User\" ON \"Auction\".idowner = \"User\".iduser
                  WHERE \"Auction\".state = 'Opened'::auctionstate";
    $params = array();
    $i = 0;

    if ($name) {
        $statement = $statement . " AND \"Auction\".name=?";
        $params[$i] = $name;
        $i = $i + 1;
    }
    if ($rating) {
        $statement = $statement . " AND \"User\".rating=?";
        $params[$i] = $rating;
        $i = $i + 1;
    }
    if ($category) {
        $statement = $statement . " AND category=?";
        $params[$i] = $category;
        $i = $i + 1;
    }
    if ($type) {
        $statement = $statement . " AND type=?";
        $params[$i] = $type;
        $i = $i + 1;
    }
    if ($date) {
        $statement = $statement . " AND startingdate=?";
        $params[$i] = $type;
        $i = $i + 1;
    }
    if ($duration) {
        $statement = $statement . " AND durationhours=?";
        $params[$i] = $duration;
    }

    $statement = $statement . " LIMIT 9 OFFSET " . $offset*9;

    global $conn;
    $stmt = $conn->prepare($statement);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getFullTextSearch($mysearch)
{
    global $conn;
    $stmt = $conn->prepare("
      SELECT * 
      FROM \"Auction\"
      WHERE \"Auction\".state = 'Opened'::auctionstate
      AND ( to_tsvector('english', name) @@ to_tsquery('english', ?)
            OR to_tsvector('english', description) @@ to_tsquery('english', ?)
            OR LOWER(name) LIKE LOWER(?));");
    $stmt->execute(array($mysearch,$mysearch,'%'.$mysearch.'%'));
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

function createAuctionDutch($name, $category, $baseprice, $type, $startdate, $time, $description, $state, $idowner){
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
durationhours,description,state,idowner) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($name, $category, $baseprice, $baseprice, $type, $startdate, $time, $description, $state, $idowner));

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

function addPhotosComment($idcomment, $name, $path, $date)
{
    $msg = "";
    if (addFile($name, $path, $date) != -1) {
        $idfile = getFileId($name, $path);

        addAImagesComment($idfile, $idcomment);
    } else {
        $msg = "Could not insert file. Please try again.";
        return $msg;
    }

    return $msg;
}

function createComment($idauction, $iduser, $date, $message)
{
    //POR TRANSIÇÃO
    global $conn;
    $conn->beginTransaction();

    if (!isValidUser(getUser($iduser)['state'])) {
        $conn->rollBack();
        return "User without permissions to comment an auction.";
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

    $result = $stmt->fetch();
    if ($result == null)
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
        $result = "User without permissions to remove comment on auction.";
        return $result;
    }
    $msg = getComment($idcomment);
    if (!$msg) {
        $conn->rollBack();
        $result = "Could not remove comment. Please try again.";
        return $result;
    }

    $msg = "REMOVED" . $msg;

    $stmt = $conn->prepare("UPDATE \"Comment\" SET message=? WHERE idcomment = ?");
    $stmt->execute(array($msg, $idcomment));

    $conn->commit();
    return $result;
}


function getComentPathAuction($idauction, $offset)
{

    global $conn;
    $stmt = $conn->prepare("SELECT \"Comment\".idcomment,date, message, path
    FROM \"Comment\" LEFT JOIN \"FileComment\"
    ON \"Comment\".idcomment = \"FileComment\".idcomment
    LEFT JOIN \"File\"
    ON \"File\".idfile = \"FileComment\".idfile
    WHERE \"Comment\".idauction =? AND NOT(\"Comment\".message LIKE 'REMOVED%')
    ORDER BY date DESC
    LIMIT 10 OFFSET ?");
    $stmt->execute(array($idauction, $offset));

    return $stmt->fetchAll();
}

function editAuction($idAuction, $idUser, $name, $description, $category)
{

    global $conn;
    $conn->beginTransaction();

    $state = getUser($idUser)['state'];

    if (!isAdminUser($state)) {
        $conn->rollback();
        return "User without permissions to edit the auction.";
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

    $res = bidTransaction($conn, $idauction, $idbidder, $value);
    if($res != "")
        return $res;

    $conn->commit();
    return 0;
}

function alterAuctionPrice($idauction, $iduser, $value){

    global $conn;
    $conn->beginTransaction();

    if (isValidUser(getUser($iduser)['state'])) {

        $auction = getAuction($idauction);

        if($auction['state'] != 'Opened'){
            $conn->rollBack();
            return "Can not make a bid on a not opened auction.";
        }
        if($auction['idowner'] != $iduser){
            $conn->rollBack();
            return "Only the owner of the auction can alter its price.";
        }
        if($auction['type'] != 'Dutch'){
            $conn->rollBack();
            return "You can only alter \"dutch\" auctions price.";
        }
        if ($auction['currentprice'] < $value) {
            $conn->rollBack();
            return "The alter value must be lower than the current price.";
        }

    } else {
        $conn->rollBack();
        return "User without permissions to bin on auction.";
    }

    $stmt = $conn->prepare("UPDATE \"Auction\" SET currentprice = ? WHERE state = 'Opened'::auctionstate AND idauction=?");
    $stmt->execute(array($value, $idauction));
    $conn->commit();
    return 0;
}

function bidTransaction($conn, $idauction, $idbidder, $value){
    if (isValidUser(getUser($idbidder)['state'])) {

        $auction = getAuction($idauction);

        if($auction['state'] != 'Opened'){
            $conn->rollBack();
            return "Can not make a bid on a not opened auction.";
        }

        $currentprice = $auction['currentprice'];
        $baseprice = $auction['baseprice'];
        $type = $auction['type'];

        if($type == 'Dutch'){
            if ($currentprice != $value ) {
                $conn->rollBack();
                return "The buy value is lower than the current price.";
            }
        }
        elseif ($type == 'English' && $currentprice > $value) {
            $conn->rollBack();
            return "The bid value is lower than the current price. Please insert a value above.";
        }
        elseif ($type == 'Blind' && $baseprice > $value) {
            $conn->rollBack();
            return "The bid value is lower than the base price. Please insert a value above.";
        }

        $date = new DateTime();
        $stmt = $conn->prepare("INSERT INTO \"Bid\" (idauction,idbidder,ammount,date) VALUES (?,?,?,?)");
        $stmt->execute(array($idauction, $idbidder, $value, $date->format('Y-m-d H:i:s')));
    } else {
        $conn->rollBack();
        return "User without permissions to bin on auction.";
    }
    return "";
}

function buyAuction($idauction, $idbidder, $value){

    global $conn;
    $conn->beginTransaction();

    $res = bidTransaction($conn, $idauction, $idbidder, $value);
    if($res != "")
        return $res;
    $stmt = $conn->prepare("UPDATE \"Auction\" SET state = 'Awaiting_payment'::auctionstate WHERE state = 'Opened'::auctionstate AND idauction=?");
    $stmt->execute(array($idauction));
    $conn->commit();
    return 0;

}

function banAuction($idauction,$iduser)
{
    global $conn;
    $conn->beginTransaction();

    $auction = getAuction($idauction);
    if($auction['state'] != 'Opened'){
        $conn->rollBack();
        $res = array("result" => 1, "msg"=>"Can not ban an not opened auction.");
        return $res;
    }

    $state = getUser($iduser)['state'];
    if (isAdminUser($state)) {

        $stmt = $conn->prepare("UPDATE \"Auction\" SET state = 'Banned'::auctionstate WHERE idauction=? ");
        $stmt->execute(array($idauction));
        $conn->commit();
        $res = array("result" => 0, "msg"=>"Auction banned with success.");
        return $res;
    }
    else{
        $conn->rollBack();
        $res = array("result" => 1, "msg"=>"User without permissions to ban the auction.");
        return $res;
    }
}

function followAuction($iduser, $idauction)
{
    global $conn;
    $conn->beginTransaction();

    $auction = getAuction($idauction);
    if($auction['state'] != 'Opened'){
        $conn->rollBack();
        $res = array("result" => 1, "msg"=>"Can not follow/unfollow an not opened auction.");
        return $res;
    }

    if (isUserFollowing($iduser, $idauction)) {

        $stmt = $conn->prepare("DELETE FROM \"Follow\" WHERE iduser=? and idauction=?;");
        $stmt->execute(array($iduser, $idauction));
        $conn->commit();
        $res = array("result" => 0, "msg"=>"Unfollow the auction successfully.", "follow"=>"Follow");
        return $res;

    }

    /*if (isAuctionOwner($iduser, $idauction)) {
        $conn->rollBack();
        $res = array("result" => 1, "msg"=>"Can not follow a self-owned auction.");
        return $res;
    }*/

    $state = getUser($iduser)['state'];

    if (isValidUser($state)) {
        $stmt = $conn->prepare("INSERT INTO \"Follow\" (iduser,idauction) VALUES (?,?)");
        $stmt->execute(array($iduser, $idauction));
        $conn->commit();
        $res = array("result" => 0, "msg"=>"Follow the auction successfully.","follow"=>"Unfollow");
        return $res;
    } else {
        $conn->rollBack();
        $res = array("result" => 1, "msg"=>"User without permissions to follow an auction.");
        return $res;
    }
}

function reportAuction($iduser, $idauction)
{
    global $conn;
    $conn->beginTransaction();

    $auction = getAuction($idauction);
    if($auction['state'] != 'Opened'){
        $conn->rollBack();
        return "Can not report an not opened auction.";
    }

    if (userReportedAuction($iduser, $idauction)) {
        $conn->rollBack();
        return "Auction already reported.";
    }

    createTicketAuction($iduser, $idauction);

    $conn->commit();
    return 0;
}

function reportComment($iduser, $idcomment, $message)
{
    global $conn;
    $conn->beginTransaction();

    //TODO verificar se a auction esta aberta

    $msg = "";
    if (getIdReportComment($iduser, $idcomment)) {
        $conn->rollBack();
        $msg = "Comment already reported.";
        return $msg;
    }

    createreportComment($iduser, $idcomment);

    $idticket = getIdReportComment($iduser, $idcomment);

    if (hasTicketComment($iduser, $idticket)) {
        $conn->rollBack();
        $msg = "Comment already reported.";
        return $msg;
    }

    $now = new DateTime();
    createTicketComment($now->format('Y-m-d H:i:s'), $message, $iduser, $idticket);

    $conn->commit();
    return $msg;
}

function advanceState($idauction){

    global $conn;
    $stmt = $conn->prepare("SELECT state FROM \"Auction\" WHERE idauction=?");
    $stmt->execute(array($idauction));
    $tempState = $stmt->fetch();
    if($tempState['state'] == 'Awaiting_payment')
        $stmt = $conn->prepare("UPDATE \"Auction\" SET state='Awaiting_delivery'::\"auctionstate\" WHERE idauction=?");
    elseif($tempState['state'] == 'Awaiting_delivery')
        $stmt = $conn->prepare("UPDATE \"Auction\" SET state='Closed'::\"auctionstate\" WHERE idauction=?");
    if($stmt->execute(array($idauction)))
        return true;
    else
        return false;
}

function rateAuction($iduser, $idauction, $val, $type){
    global $conn;

    if($type == "buyer")
        $stmt = $conn->prepare("UPDATE \"winningBid\" SET buyerrating=? WHERE iduser=? AND idauction=?");
    elseif($type == "seller")
        $stmt = $conn->prepare("UPDATE \"winningBid\" SET sellerrating=? WHERE iduser=? AND idauction=?");
    else
        return false;
    return $stmt->execute(array($val,$iduser, $idauction ));
}

function getIdUser($idauction){
    global $conn;
    $stmt = $conn->prepare("SELECT iduser FROM \"winningBid\" JOIN \"Auction\" ON \"winningBid\".idauction = \"Auction\".idauction WHERE \"Auction\".idauction = ?");
    $stmt->execute(array($idauction));
    return $stmt->fetch();
}

function getFollowedAuctions($iduser,$offset){
    global $conn;
    $stmt = $conn->prepare("
    SELECT * FROM \"Auction\" WHERE idauction IN 
    (SELECT idauction
    FROM \"Follow\"
    WHERE iduser = ? AND state='Opened'::\"auctionstate\")
    LIMIT 10 OFFSET ".$offset*10);
    $stmt->execute(array($iduser));
    return $stmt->fetchAll();
}

function getInConclusionAuctions($iduser,$offset){
    global $conn;
    $stmt = $conn->prepare("
    SELECT * 
    FROM \"Auction\" 
    WHERE (state='Awaiting_delivery'::\"auctionstate\" 
    OR state='Awaiting_payment'::\"auctionstate\") 
    AND(
        (idowner=? AND idauction IN (SELECT idauction FROM \"winningBid\")) 
        OR 
        idauction IN (SELECT idauction FROM \"winningBid\" WHERE iduser=?)
        )
   LIMIT 10 OFFSET ".$offset*10);
    $stmt->execute(array($iduser,$iduser));
    return $stmt->fetchAll();
}

function getHistoryAuctions($iduser,$offset){
    global $conn;

    $statement = "
SELECT  iduser, buyerrating, sellerrating, id, name, startingdate, durationhours,  state, idowner, MAX(currentprice) AS ammount 
FROM (
  SELECT iduser, buyerrating, sellerrating, \"Auction\".idauction AS id, name, startingdate, durationhours,  state, idowner, currentprice 
  FROM \"winningBid\" JOIN \"Auction\" ON \"winningBid\".idauction = \"Auction\".idauction  
  WHERE state='Closed'::\"auctionstate\" AND (iduser=?) 
  )AS temp
group by iduser, buyerrating, sellerrating, id, name, startingdate, durationhours, state, idowner
UNION
SELECT iduser, buyerrating, sellerrating, id, name, startingdate, durationhours,  state, idowner, MAX(currentprice) AS ammount 
FROM(
  SELECT iduser, buyerrating, sellerrating, \"Auction\".idauction AS id, name, startingdate, durationhours,  state, idowner, currentprice 
  FROM \"winningBid\" JOIN \"Auction\" ON \"winningBid\".idauction = \"Auction\".idauction  
  WHERE state='Closed'::\"auctionstate\" 
  AND \"Auction\".idauction IN 
    (SELECT idauction
     FROM \"Auction\"
     WHERE idowner = ?)
    )AS temp
group by iduser, buyerrating, sellerrating, id, name, startingdate, durationhours, state, idowner
LIMIT 10 OFFSET ".$offset*10;

    $stmt = $conn->prepare($statement);
    $stmt->execute(array($iduser,$iduser));
    return $stmt->fetchAll();
}

function getActiveAdminAuctions($offset){
    global $conn;
    $statement = "
SELECT \"Auction\".idauction, \"Auction\".name AS \"auctionName\", \"User\".iduser AS idowner, \"User\".username AS \"username\" 
FROM \"Auction\" Join \"User\" ON idowner=iduser
WHERE \"Auction\".state=? 
LIMIT 10 OFFSET ".$offset*10;

    $stmt = $conn->prepare($statement);
    $stmt->execute(array("Opened"));
    return $stmt->fetchAll();
}

function getConcludingAdminAuctions($offset){
    global $conn;
    $statement = "
SELECT \"Auction\".idauction, \"Auction\".name AS \"auctionName\", \"Auction\".state AS state,\"User\".iduser AS idowner, \"User\".username AS \"username\", \"Bid\".idbidder
FROM \"Auction\" Join \"User\" ON idowner=iduser Join \"Bid\" ON \"Auction\".currentprice=\"Bid\".ammount
WHERE \"Auction\".state=? OR \"Auction\".state=? 
LIMIT 10 OFFSET ".$offset*10;

    $stmt = $conn->prepare($statement);
    $stmt->execute(array("Awaiting_delivery", "Awaiting_payment"));
    return $stmt->fetchAll();
}

function getAdminAuctions($offset,$state){
    global $conn;
    $statement = "
SELECT \"Auction\".idauction, \"Auction\".name AS \"auctionName\", startingdate, durationhours,\"User\".iduser AS idowner, \"User\".username AS \"username\"
FROM \"Auction\" Join \"User\" ON idowner=iduser
WHERE \"Auction\".state=? 
LIMIT 10 OFFSET ".$offset*10;

    $stmt = $conn->prepare($statement);
    $stmt->execute(array($state));
    return $stmt->fetchAll();
}

function getQtAuctions(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM \"Auction\"");
    $stmt->execute();
    return $stmt->fetch();
}

function getQtWonAuctions($iduser){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM \"winningBid\" WHERE iduser=?");
    $stmt->execute(array($iduser));
    return $stmt->fetch();
}
