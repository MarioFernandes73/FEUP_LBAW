<?php
include_once('../../config/init.php');

$smarty->assign('types',getEnum("auctiontype"));
$smarty->display('auctions/advancedSearch.tpl');