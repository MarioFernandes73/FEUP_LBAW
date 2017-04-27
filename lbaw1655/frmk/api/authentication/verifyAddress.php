<?php
include_once('../../database/users.php');

$hasAddress = hasAddress($_GET['address']);

<<<<<<< HEAD
echo json_encode(array("hasUser" => $hasAddress));
=======
echo json_encode($hasAddress);
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
?>