<?php
include_once('../../database/auctions.php');

if (!isset($_GET["state"]) || !isset($_GET["offset"])){
    $_SESSION['error_messages'][] = 'Error receiving auction.';
    header('Location: ../../index.php');
    die();
}

$state = trim(strip_tags($_GET["state"]));
$offset = trim(strip_tags($_GET["offset"]));

if($state == "Active") {
    $auctions = getActiveAdminAuctions($offset);
} elseif($state == "inConclusion") {
    $auctions = getConcludingAdminAuctions($offset);
} else{
    $auctions = getAdminAuctions($offset,$state);
}

if(isset($_GET["idauction"]))
{
    $idauction = trim(strip_tags($_GET["idauction"]));
    foreach($auctions as $key => $value){
        if($value["idauction"] == $idauction ){
            echo json_encode($auctions[$key]);
            return;
        }
    }
}
else
echo json_encode($auctions);
