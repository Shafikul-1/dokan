<?php
include "header.php";
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];
    // echo $orderId;
    if ($databaseFN->getData("orderdetails", "*", null, " order_unique_id = '$orderId'")) {
        foreach ($databaseFN->getResult() as list("all_product_id" => $all_product_id)) {
            $productid = explode(",", $all_product_id);
            
            for ($i = 0; $i < count($productid); $i++) {
                if ($databaseFN->getData("productdetails", "*", null, " id = " . $productid[$i])) {
                    foreach ($databaseFN->getResult() as list("productName"=>$productName)) {
                        echo $productName  . "<br>    <br><br><br>  ";
                    }
                };
            }
?>



<?php
        }
    }
}
include "footer.php";
?>