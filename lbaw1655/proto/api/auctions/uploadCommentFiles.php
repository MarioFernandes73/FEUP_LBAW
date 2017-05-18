<?php

$name = $_POST['name'];
$files = $_POST['files'];

$index;

if($_FILES[$name] == null)
    $index = 0;
else
    $index = sizeof($_FILES[$name]);

    $_FILES[$name][$index]['name'] = $_POST['filename'];
    $_FILES[$name][$index]['tmp_name'] = move_uploaded_file($_POST['filename'], "/tmp/" + $name + "/" + $index + $_POST['filename'])
    $_FILES[$name][$index]['size'] = $_POST['size'];
    $_FILES[$name][$index]['type'] = $_POST['type'];
    $_FILES[$name][$index]['error'] = $_POST['error'];

echo json_encode(array("result" => 0));