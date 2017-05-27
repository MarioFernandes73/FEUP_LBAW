<?php
include_once('../../database/auctions.php');
$iduser = $_POST['iduser'];
$idauction = $_POST['id'];
$val = $_POST['val'];
$type = $_POST['type'];

if($val >= 0 && $val <= 5)
    echo rateAuction($iduser, $idauction, $val, $type);
else
    echo false;