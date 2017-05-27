<?php
include_once('../../database/auctions.php');
$idauction = $_POST['idauction'];
echo json_encode(getIdUser($idauction));