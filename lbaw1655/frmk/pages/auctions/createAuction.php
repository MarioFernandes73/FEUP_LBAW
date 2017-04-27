<?php
include_once('../../config/init.php');
<<<<<<< HEAD

$smarty->assign('types',getEnum("auctiontype"));
$smarty->display('auctions/createAuction.tpl');
=======
$smarty->display('common/header.tpl');
$smarty->display('common/navbar.tpl');
$smarty->display('auctions/createAuction.tpl');
$smarty->display('common/footer.tpl');
?>
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
