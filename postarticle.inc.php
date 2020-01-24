<?php

if(isset($_POST['post-submit'])) {

    include_once 'dbh.inc.php';

    date_default_timezone_set('America/Los_Angeles');

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $time = date("F jS, Y - h:i A");

    $sql = "INSERT INTO Articles(author, title, subtitle, image, video, videopath, body, isCrisis, date) VALUES ('" . $author . "', '" . $title . "', '" . $subtitle . "','','','','" . $body . "', 0, '" . $time . "');";

    if(mysqli_query($conn, $sql)) {
        header('Location: login.php?status=postsuccess');
    } else {
        header('Location: login.php?status=posterror');
        exit();
    }

    /*

    if($_FILES["fileToUpload"]["error"] > 0) {

        $sql = "INSERT INTO Articles(author, title, subtitle, body, isCrisis, date) VALUES ('" . $author . "', '" . $title . "', '" . $subtitle . "','" . $body . "', 0, '" . $time . "');";

        if(mysqli_query($conn, $sql)) {
            header('Location: login.php?status=postsuccess');
        } else {
            header('Location: login.php?status=posterror');
            exit();
        }
    } else {

        $target_dir = "medias/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            header('Location: login.php?status=filealreadyexists');
        } else {

            // Check if file is supported (image or .mp4 video)
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {

                $sql = "INSERT INTO Articles(author, title, subtitle, image, video, videopath, imagepath, body, isCrisis, date) VALUES ('" . $author . "', '" . $title . "', '" . $subtitle . "', '', '', '', '" . $target_file . "', '" . $body . "', 0, '" . $time . "');";
                
                if(mysqli_query($conn, $sql)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        header('Location: login.php?status=postsuccess');
                    } else {
                        header('Location: login.php?status=posterrorupload');
                    }
                } else {
                    header('Location: login.php?status=posterrorfile');
                    exit();
                }
            } else if ($imageFileType == "mp4") {

                $sql = "INSERT INTO Articles(author, title, subtitle, image, video, videopath, imagepath, body, isCrisis, date) VALUES ('" . $author . "', '" . $title . "', '" . $subtitle . "', '', '', '" . $target_file . "', '','" . $body . "', 0, '" . $time . "');";
                
                if(mysqli_query($conn, $sql)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        header('Location: login.php?status=postsuccess');
                    } else {
                        header('Location: login.php?status=posterrorupload');
                    }
                } else {
                    header('Location: login.php?status=posterrorfile');
                    exit();
                }
            } else {
                header ('Location: login.php?error=filenotsupported');
            }
        
        }
    }
    */
}

?>