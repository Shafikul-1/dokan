<?php
ob_start();

function fileDelete($id)
{
    include "../../database/upload.php";
    $databaseFN = new database();
    $uploadFN = new Upload();

    $databaseFN->getData("productdetails", "*", null, "id = $id");
    foreach ($databaseFN->getResult() as list("productImages" => $productImages, "videos" => $videos)) {
        // echo $productImages."<br>";
        if ($uploadFN->multifileDelete($productImages, 'product')) {
            if ($uploadFN->multifileDelete($videos, 'product')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

function getOtherData($id)
{
    if (fileDelete($id)) {
        $databaseFN = new database();
        $decrement = ['categoryQty' => 1];
        $databaseFN->getData("productdetails", "*", null, "id = $id");
        foreach ($databaseFN->getResult() as list("category" => $category)) {
            if ($databaseFN->incrementOrDecrement("productcatagory", $decrement, "id = $category", "-")) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    } else {
        return false;
    }
}

function deleteProduct($id)
{
    $databaseFN = new database();
    if (getOtherData($id)) {
        if ($databaseFN->deleteData("productdetails", "id = $id")) {
            if ($databaseFN->deleteData("usercomment", " postId = $id")) {
                header("Location: " . $databaseFN->mainUrl . "/admin/products.php");
                exit();
            } else {
                header("Location: " . $databaseFN->mainUrl . "/admin/products.php?msg=dbfalse");
                exit();
            }
        } else {
            header("Location: " . $databaseFN->mainUrl . "/admin/products.php?msg=dbfalse");
            exit();
        }
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/products.php?msg=filefalse");
        exit();
    }
}

ob_end_flush();
