<?php 
ob_start();
include "../header.php";

// print_r($_GET['msg']);
if (isset($_GET['msg']) && $_GET['msg'] == 'add') {
    include "./addProduct.php";
} else if (isset($_GET['msg']) && $_GET['msg'] == 'edit') {
    include "./editProduct.php";
    editProduct($_GET['id']);
    
} else if (isset($_GET['msg']) && $_GET['msg'] == 'delete') {
    include "./deleteProduct.php";
    deleteProduct($_GET['id']);

}  else if (isset($_GET['msg']) && $_GET['msg'] == 'view') {
    include "./viewProduct.php";
    viewProduct($_GET['id']);
    
} else {
    header("Location: ". $databaseFN->mainUrl ."/admin/products.php");
}

include "../footer.php";
?>
