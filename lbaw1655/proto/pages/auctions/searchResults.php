<?php
include_once('../../config/init.php');

if (isset ( $_GET ["name"] ))
    $name = trim(strip_tags($_GET["name"]));
else
    $name = "";

if (isset ( $_GET ["rating"] ))
    $rating = trim(strip_tags($_GET["rating"]));
else
    $rating = "";

if (isset ( $_GET ["category"] ))
    $category = trim(strip_tags($_GET["category"]));
else
    $category = "";

if (isset ( $_GET ["type"] ))
    $type = trim(strip_tags($_GET["type"]));
else
    $type = "";

if (isset ( $_GET ["startingdate"] ))
    $date = trim(strip_tags($_GET["startingdate"]));
else
    $date = "";

if (isset ( $_GET ["durationhours"] ))
    $duration = trim(strip_tags($_GET["durationhours"]));
else
    $duration = "";

if (isset ( $_GET ["fullTextSearch"] ))
    $fts = trim(strip_tags($_GET["fullTextSearch"]));
else
    $fts = false;

if (isset ( $_GET ["hot"] ))
    $hot = trim(strip_tags($_GET["hot"]));
else
    $hot = false;

if (isset ( $_GET ["lastMinute"] ))
    $lmo = trim(strip_tags($_GET["lastMinute"]));
else
    $lmo = false;

$smarty->assign("name",$name);
$smarty->assign("rating",$rating);
$smarty->assign("category",$category);
$smarty->assign("type",$type);
$smarty->assign("date",$date);
$smarty->assign("duration",$duration);
$smarty->assign("fullTextSearch",$fts);
$smarty->assign("hot",$hot);
$smarty->assign("lastMinute",$lmo);

$smarty->display('auctions/searchResults.tpl');