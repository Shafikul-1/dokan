<?php


function deleteUser($id)
{
    $obj = new database();
    // Attempt to delete data
    if ($obj->deleteData("users", 'id=' . $id)) {
        // Successful deletion, redirect to users.php
        header("Location: " . $obj->mainUrl . "/admin/users.php");
        exit(); // Ensure no further code execution after redirect
    } else {
        // Error occurred during deletion, redirect with error message
        header("Location: " . $obj->mainUrl . "/admin/users.php?msg=error");
        exit();
    }
}

