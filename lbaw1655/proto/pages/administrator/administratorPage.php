<?php
include_once('../../config/init.php');
$smarty->assign('sessionid',$_SESSION['iduser']);
$smarty->display('administrator/administratorPage.tpl');