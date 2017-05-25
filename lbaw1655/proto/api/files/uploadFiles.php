<?php
include_once('../../config/init.php');

$filepath = $_POST['filepath'];
$name = $_POST['filename'];

//tmp

//copy($filepath,$BASE_DIR ."images/tmp/filetmp_" . $name);
move_uploaded_file($filepath,$BASE_DIR ."images/tmp/filetmp_" . $name);
echo json_encode(array("result" => $filepath));

/*

//  exit();
/*
    file_put_contents($BASE_DIR ."images/tmp/filetmp_" . $name, file_get_contents($filepath));

    if ($filepath != "") {
        $type = pathinfo($filepath, PATHINFO_EXTENSION);

        // Allow certain file formats
        if ($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif") {
            $res = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo json_encode(array("result" => $res));
            exit();

        } else {

            $dir = opendir('images/tmp/');
            $nFiles = iterator_count(new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS));

            $newFilepath = $BASE_DIR . "images/tmp/filetmp_" . $name;// . "_" . $nFiles;


            if (move_uploaded_file($filepath, $newFilepath)) {

                $res = 0;
                echo json_encode(array("result" => $res));
                exit();
            } else {
                $res = "Error on uploading files. Please try again.";
            }
        }

    } else {
        $res = "The file could not be uploaded.";
    }*/