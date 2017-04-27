<?php
session_set_cookie_params(3600, '/~lbaw1655'); //FIXME
session_start();

error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

<<<<<<< HEAD
$BASE_DIR = dirname(__DIR__) . '/'; //FIXME
$BASE_URL = dirname(dirname(dirname($_SERVER['PHP_SELF']))) . '/'; //FIXME

$conn = new PDO('pgsql:host=dbm.fe.up.pt;dbname=lbaw1655', 'lbaw1655', 'vo66gl49'); //FIXME
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======
  $BASE_DIR =  dirname(__DIR__) . '/'; //FIXME
  $BASE_URL = dirname(dirname(dirname($_SERVER['PHP_SELF']))) . '/'; //FIXME

  $conn = new PDO('pgsql:host=dbm.fe.up.pt;dbname=lbaw1655', 'lbaw1655', 'vo66gl49'); //FIXME
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692

$conn->exec('SET SCHEMA \'public\''); //FIXME?

include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
include_once('../../database/common.php');

$smarty = new Smarty;
$smarty->template_dir = $BASE_DIR . 'templates/';
$smarty->compile_dir = $BASE_DIR . 'templates_c/';
$smarty->assign('BASE_URL', $BASE_URL);

<<<<<<< HEAD
$smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
$smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
$smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
$smarty->assign('FORM_VALUES', $_SESSION['form_values']);
$smarty->assign('USERNAME', $_SESSION['username']);
$smarty->assign('STATE', $_SESSION['state']);
$smarty->assign('categories',getEnum("auctioncategory"));


unset($_SESSION['success_messages']);
unset($_SESSION['error_messages']);
unset($_SESSION['field_errors']);
unset($_SESSION['form_values']);

date_default_timezone_set("Portugal");
=======
  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);
  $smarty->assign('STATE', $_SESSION['state']);

  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);

  date_default_timezone_set("Portugal");
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
