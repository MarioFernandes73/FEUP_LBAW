<?php
session_start();
echo json_encode(array("iduser" => $_SESSION["iduser"]));