<?php
if (isset($_GET['id'])) {
    include "../../database/database.php";
    $databaseFN = new database();
    $id = $_GET['id'];
    if ($databaseFN->deleteData("productCatagory", "id=$id")) {
        header("Location: " . $databaseFN->mainUrl . "/admin/category");
        exit();
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/category?error=dbdfalse");
        exit();
    }
} else {
    header("Location: " . $databaseFN->mainUrl . "/admin/category");
    exit();
}
