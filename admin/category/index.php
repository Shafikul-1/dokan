<?php 
include "../../database/database.php";
$databaseFN = new database();
// print_r($_GET['msg']);
if (isset($_GET['msg']) && $_GET['msg'] == 'add') {
    include "./addProduct.php";
} else if (isset($_GET['msg']) && $_GET['msg'] == 'edit') {
    include "./editProduct.php";
} else if (isset($_GET['msg']) && $_GET['msg'] == 'delete') {
    include "./deleteProduct.php";
} else {
    header("Location: ". $databaseFN->mainUrl ."/admin/products.php");
}
?>
