<?php
include_once('../../config/init.php');

$state = $_GET["state"];
global $conn;

if($state == "Active"){
    $stmt = $conn->prepare("SELECT \"Auction\".idauction, \"Auction\".name AS \"auctionName\", 
\"User\".iduser AS idowner, \"User\".name AS \"userName\" 
FROM \"Auction\" Join \"User\" ON idowner=iduser
 WHERE \"Auction\".state=? LIMIT 10");
    $stmt->execute(array("Opened"));
}
elseif($state == "inConclusion"){
    $stmt = $conn->prepare("SELECT \"Auction\".idauction, \"Auction\".name AS \"auctionName\", \"Auction\".state AS state,
 \"User\".iduser AS idowner, \"User\".name AS \"owner\", 
 \"Bid\".idbidder
 FROM \"Auction\" Join \"User\" ON idowner=iduser Join \"Bid\" ON \"Auction\".currentprice=\"Bid\".ammount
  WHERE \"Auction\".state=? OR \"Auction\".state=? LIMIT 10");
    $stmt->execute(array( "Awaiting_delivery", "Awaiting_payment"));
}
else{
    $stmt = $conn->prepare("SELECT \"Auction\".idauction, \"Auction\".name AS \"auctionName\", startingdate, durationhours,
 \"User\".iduser AS idowner, \"User\".name AS \"userName\"
 FROM \"Auction\" Join \"User\" ON idowner=iduser
  WHERE \"Auction\".state=? LIMIT 10");
    $stmt->execute(array($state));
}
$auctions = $stmt->fetchAll();

if(isset($_GET["idauction"])){
    foreach($auctions as $key => $value){
        if($value["idauction"] == $_GET["idauction"] ){
            echo json_encode($auctions[$key]);
            return;
        }
    }
}
else
echo json_encode($auctions);
