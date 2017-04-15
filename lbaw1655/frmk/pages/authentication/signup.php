<?php
include_once('../../config/init.php');
$smarty->display('common/header.tpl');
$smarty->display('common/navbar.tpl');
$smarty->display('authentication/signup.tpl');
$smarty->display('common/footer.tpl');
?>