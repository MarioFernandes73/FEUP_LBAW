<?php
include_once('../../database/users.php');

if(!isset($_SESSION['iduser'])) {
    $_SESSION['error_messages'][] = 'The user must be authenticated to proceed.';
    header('Location: ../../index.php');
    return;
}

$user = getUser($_SESSION['iduser']);
if($user['state'] != 'Administrator'){
    $_SESSION['error_messages'][] = 'User without permissions to proceed.';
    header('Location: ../../index.php');
    return;
}

$smarty->assign('idAuction',$_GET['idauction']);
$smarty->display('auctions/editAuction.tpl');