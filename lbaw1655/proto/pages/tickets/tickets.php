<?php
include_once('../../config/init.php');

if(!isset($_SESSION['iduser'])) {
    $_SESSION['error_messages'][] = 'The user must be authenticated to proceed.';
    header('Location: ../../index.php');
    return;
}

if (isset ( $_POST['iduser'] ))
    $idUser = trim(strip_tags($_POST['iduser']));
else
    $idUser = -1;

if (isset ( $_POST['idauction'] ))
    $idAuction = trim(strip_tags($_POST['idauction']));
else
    $idAuction = -1;

if (isset ( $_POST['idcomment'] ))
    $idComment = trim(strip_tags($_POST['idcomment']));
else
    $idComment = -1;

if (isset ( $_POST['msg'] ))
    $msg = trim(strip_tags($_POST['msg']));
else
    $msg = "";


$smarty->assign('idUser',$idUser);
$smarty->assign('idAuction',$idAuction);
$smarty->assign('idComment',$idComment);
$smarty->assign('msg',$msg);

$smarty->display('tickets/tickets.tpl');