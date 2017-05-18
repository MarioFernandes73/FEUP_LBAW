<?php
include_once('../../config/init.php');

$smarty->assign('idAuction',$_POST['idauction']);
$smarty->assign('idComment',$_POST['idcomment']);
$smarty->assign('msg',$_POST['msg']);

$smarty->display('tickets/tickets.tpl');