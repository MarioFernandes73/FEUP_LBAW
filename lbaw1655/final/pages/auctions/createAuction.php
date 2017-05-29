<?php
include_once('../../config/init.php');

if(!isset($_SESSION['iduser'])) {
    $_SESSION['error_messages'][] = 'The user must be authenticated to proceed.';
    header('Location: ../../index.php');
    return;
}

$smarty->assign('types',getEnum("auctiontype"));
$smarty->display('auctions/createAuction.tpl');
