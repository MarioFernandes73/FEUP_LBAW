<?php
include_once('../../config/init.php');

$smarty->assign('idAuction',$_GET['idauction']);
$smarty->display('auctions/editAuction.tpl');