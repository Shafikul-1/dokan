<?php
include "../../database/upload.php";

function deleteUser($id)
{
    $databaseFN = new database();
    $fileDelete = false;
    if ($databaseFN->getData("users", "*", null, "id= $id")) {
        foreach ($databaseFN->getResult() as list("img" => $img)) {
            echo $img."<br>";
            $uploadFN = new Upload();
            if ($uploadFN->deleteFile($img)) {
                $fileDelete = true;
            } else {
                $fileDelete = false;
            }
        }
    } else {
        $fileDelete = false;
    }

    // Attempt to delete data
    if ($fileDelete == true) {
        if ($databaseFN->deleteData("users", 'id=' . $id)) {
            // Successful deletion, redirect to users.php
            header("Location: " . $databaseFN->mainUrl . "/admin/users.php");
            exit(); // Ensure no further code execution after redirect
        } else {
            // Error occurred during deletion, redirect with error message
            header("Location: " . $databaseFN->mainUrl . "/admin/users.php?dmsg=error");
            exit();
        }
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/users.php?fmsg=error");
        exit();
    }
}
