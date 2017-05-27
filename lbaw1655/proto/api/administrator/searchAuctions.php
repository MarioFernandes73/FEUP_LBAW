<?php
include_once('../../database/auctions.php');

$state = $_GET["state"];
$offset = $_GET["offset"];

if($state == "Active") {
    $auctions = getActiveAdminAuctions($offset);
} elseif($state == "inConclusion") {
    $auctions = getConcludingAdminAuctions($offset);
} else{
    $auctions = getAdminAuctions($offset,$state);
}

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
