<?php

    include_once('../../config/init.php');

    $smarty->display('common/header.tpl');
    if(isset($_SESSION['username'])) {
        $smarty->assign('username',$_SESSION['username']);
    }

    $smarty->display('common/navbar.tpl');
    $smarty->display('authentication/homepage.tpl');
    $smarty->display('common/footer.tpl');