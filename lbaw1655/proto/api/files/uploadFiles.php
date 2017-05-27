<?php
include_once('../../config/init.php');

$data = array();

if(isset($_GET['files']))
{
    $error = false;
    $files = array();

    $uploaddir = $BASE_DIR . 'images/tmp/';
    foreach($_FILES as $file)
    {
        if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
        {
            $files[] = $uploaddir .basename($file['name']);
        }
        else
        {
            $error = true;
        }
    }
    $data = ($error) ? array('error' => 'There was an error uploading your files. Please try again.') : array('files' => $files);
}
else
{
    $data = array('success' => 'Files submitted successfully.');
}

echo json_encode($data);