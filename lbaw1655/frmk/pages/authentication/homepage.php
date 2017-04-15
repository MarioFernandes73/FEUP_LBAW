<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'templates/common/header.tpl');
    if(isset($_SESSION['username'])) {
        $smarty->assign('username',$_SESSION['username']);
    }
    $smarty->display($BASE_DIR .'templates/common/navbar.tpl');
    $smarty->display($BASE_DIR .'templates/authentication/homepage.tpl');
    $smarty->display($BASE_DIR .'templates/common/footer.tpl');