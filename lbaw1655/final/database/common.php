<?php

function getEnum($type){
    global $conn;
    $stmt = $conn->prepare("SELECT unnest(enum_range(NULL::$type))");
    $stmt->execute();
    return $stmt->fetchAll();
}
