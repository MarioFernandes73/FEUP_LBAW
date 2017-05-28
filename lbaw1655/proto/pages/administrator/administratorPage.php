<?php
include_once('../../config/init.php');

if(!isset($_SESSION['iduser'])) {
    $_SESSION['error_messages'][] = 'The user must be authenticated to proceed.';
    header('Location: ../../index.php');
    die();
}

$smarty->assign('sessionid',$_SESSION['iduser']);
$smarty->display('administrator/administratorPage.tpl');