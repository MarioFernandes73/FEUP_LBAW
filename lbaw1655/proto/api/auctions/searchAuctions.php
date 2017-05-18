<?php
include_once('../../config/init.php');
$type = $_GET["type"];
global $conn;
if($type == "followed"){
    $stmt = $conn->prepare("SELECT * FROM \"Auction\" WHERE idauction IN 
   (SELECT idauction
   FROM \"Follow\"
   WHERE iduser = ?)
   LIMIT 10");
    $stmt->execute(array($_SESSION["iduser"]));
}
elseif($type == "inConclusion"){
    $stmt = $conn->prepare("SELECT * FROM \"Auction\" WHERE (idowner=? AND idauction IN 
   (SELECT idauction
   FROM \"winningBid\")) OR 
   idauction IN 
   (SELECT idauction
   FROM \"winningBid\"
   WHERE iduser=?)
   LIMIT 10");
    $stmt->execute(array($_SESSION["iduser"],$_SESSION["iduser"]));
}
elseif($type == "history"){
    $stmt = $conn->prepare("SELECT  buyerrating, sellerrating, name, startingdate, durationhours,  state, idowner, MAX(currentprice) AS ammount FROM(
SELECT * FROM \"winningBid\" JOIN \"Auction\" ON \"winningBid\".idauction = \"Auction\".idauction  WHERE
 (iduser=? OR \"Auction\".idauction IN 
   (SELECT idauction
   FROM \"Auction\"
   WHERE idowner = ?))
   LIMIT 10) AS temp
group by buyerrating, sellerrating, name, startingdate, durationhours, state, idowner");
    $stmt->execute(array($_SESSION["iduser"],$_SESSION["iduser"]));
}
//order by date
//createtime+durationhours-currentdate


$auctionsArray = $stmt->fetchAll();
echo json_encode($auctionsArray);