<?php
include_once('../../database/users.php');

$hasUsername = hasUsername($_GET['username']);

<<<<<<< HEAD
echo json_encode(array("hasUsername" => $hasUsername));
=======
echo json_encode($hasUsername);
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
?>