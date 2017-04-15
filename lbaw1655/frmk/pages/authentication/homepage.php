<?php
    include_once('../../config/init.php');
    include_once('../../templates/common/header.tpl');
    if(isset($_SESSION['username'])) {
        $smarty->assign('username',$_SESSION['username']);
    }
    $smarty->display('../../templates/common/navbar.tpl');
    $smarty->display('../../templates/authentication/homepage.tpl');
    $smarty->display('../../templates/common/footer.tpl');