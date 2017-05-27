<?php
include_once('../../database/auctions.php');
$idauction = $_POST['id'];
echo advanceState($idauction);
