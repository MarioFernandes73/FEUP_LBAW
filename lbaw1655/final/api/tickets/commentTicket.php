<?php
include_once('../../database/tickets.php');
include_once('../../database/users.php');

if (!isset( $_POST['idticket'])) {
    $_SESSION['error_messages'][] = 'Error receiving ticket.';
    header('Location: ../../index.php');
    die();
}
$idticket = trim(strip_tags($_POST['idticket']));

if (!isset( $_POST['idticket'])) {
    $message = "";
}
else{
    $message = trim(strip_tags($_POST['message']));
}

$date = new DateTime();
$iduser = $_SESSION['iduser'];
$res = 0;
$photos = array();

try {

    if (isset($_SESSION['iduser']) && (hasTicketComment($iduser,$idticket) || $_SESSION['state'] == 'Administrator')) {

        if ($message == "" && sizeof($_FILES) == 0) {
            $res = "Comment without any message or file. Please try again";
            echo json_encode(array("result" => $res));
            exit();
        }

        createTicketComment($date->format('Y-m-d H:i:s'), $message, $iduser, $idticket);

        //Add files
        $photos = array();
        $totalSize = 0;
        //var_dump($_FILES);
        foreach ($_FILES as $file) {
            $totalSize += $file['size'];
        }

        if ($totalSize > $TOTAL_SIZE_IMAGES) {
            $res = "The uploaded files in total have more than 5MB. Please upload files with a total capacity bellow 5MB.";
            echo json_encode(array("result" => $res));
            exit();
        }

        $uploaddir = $BASE_DIR . 'images/tickets/' . $idticket;
        $i = 0;

        if (!file_exists($uploaddir))
            mkdir($uploaddir, 0777, true);

        foreach ($_FILES as $file) {

            $tmppath = $file['tmp_name'];

            if ($tmppath != "") {

                $type = pathinfo($file['name'], PATHINFO_EXTENSION);

                if ($type != 'jpg' && $type != 'png' && $type != 'jpeg' && $type != 'gif') {
                    $res = "Sorry, only JPG, JPEG, PNG & GIF files allowed.";
                    echo json_encode(array("result" => $res));
                    exit();
                } else {
                    $idcomment = getIdTicketComment($idticket, $date->format('Y-m-d H:i:s'));

                    //Setup our new file path
                    $pathimage = 'images/tickets/' . $idticket . "/" . $idcomment . '_' . $i . "." . $type;
                    $newFilePath = $uploaddir . "/" . $idcomment . "_" . $i . "." . $type;

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmppath, $newFilePath)) {

                        $msg = addTicketCommentFile($idcomment, $file['name'], $pathimage, $date->format('Y-m-d H:i:s'));
                        array_push($photos, array('name' => $file['name'], 'path' => $pathimage));

                        if ($msg != 0) {
                            unlink($newFilePath);
                            echo json_encode(array("result" => $msg));
                            exit();
                        }
                    } else {
                        $res = "Error uploading files. Please try again.";
                        echo json_encode(array("result" => $res));
                        exit();
                    }
                    $i = $i + 1;
                }
            }
        }


    } else {
        $res = "User must be authenticated to proceed.";
    }

    echo json_encode(array("id" => $idcomment, "result" => $res, "photos" => $photos, "state" => $_SESSION['state'], 'date' => $date->format('Y-m-d H:i:s'),'username' => $_SESSION['username']));

} catch (PDOException $e) {
    echo $e;
    $res = "Could not comment. Please try again.";
    echo json_encode(array("result" => $res));
    exit();
}
