<?php 
include "../../database/database.php";
$databaseFN = new database();
// print_r($_GET['msg']);
if (isset($_GET['msg']) && $_GET['msg'] == 'add') {
    include "./addProduct.php";
} else if (isset($_GET['msg']) && $_GET['msg'] == 'edit') {
    include "./editProduct.php";
    editProduct($_GET['id']);
    
} else if (isset($_GET['msg']) && $_GET['msg'] == 'delete') {
    include "./deleteProduct.php";
}  else if (isset($_GET['msg']) && $_GET['msg'] == 'view') {
    include "./viewProduct.php";
    viewProduct($_GET['id']);
} else {
    header("Location: ". $databaseFN->mainUrl ."/admin/products.php");
}
?>
