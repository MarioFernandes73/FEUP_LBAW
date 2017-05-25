<?php
include_once('../../config/init.php');

$smarty->assign("name",$_GET['name']);
$smarty->assign("rating",$_GET['rating']);
$smarty->assign("category",$_GET['category']);
$smarty->assign("type",$_GET['type']);
$smarty->assign("date",$_GET['startingdate']);
$smarty->assign("duration",$_GET['durationhours']);
$smarty->display('auctions/searchResults.tpl');