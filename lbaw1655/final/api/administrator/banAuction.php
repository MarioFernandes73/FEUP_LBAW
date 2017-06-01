<?php
include_once('../../database/auctions.php');

if (!isset($_POST["idauction"]) ){
    echo json_encode(array("result" => 1, "msg"=>"Error receiving auction."));
    return;
}

if(!isset($_SESSION['iduser'])){
    echo json_encode(array("result" => 1, "msg"=>"User without permissions to ban the auction"));
    return;
}

$id = trim(strip_tags($_POST["idauction"]));

try {
    $res = banAuction($id, $_SESSION['iduser']);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}

echo json_encode(array("result" => $res["result"], "msg"=>$res["msg"]));