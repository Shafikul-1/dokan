<?php
session_start();
include "./database/database.php";
include "./database/otherFn.php";
$databaseFN = new database();
$otherFN = new otherFn();

$order_unique_id = $otherFN->uniqueIdCreate();
$user_unique_id = $_SESSION['uniqueId'];

if (isset($_POST['order_submit'])) {
    $order_user_first_name = htmlentities($_POST['order_user_first_name'], ENT_QUOTES);
    $order_user_last_name = htmlentities($_POST['order_user_last_name'], ENT_QUOTES);
    $order_user_email = htmlentities($_POST['order_user_email'], ENT_QUOTES);
    $order_user_number = htmlentities($_POST['order_user_number'], ENT_QUOTES);
    $order_user_street_address = htmlentities($_POST['order_user_street_address'], ENT_QUOTES);
    $order_user_city = htmlentities($_POST['order_user_city'], ENT_QUOTES);
    $order_user_state = htmlentities($_POST['order_user_state'], ENT_QUOTES);
    $order_user_zip_code = htmlentities($_POST['order_user_zip_code'], ENT_QUOTES);
    $order_user_payment_method = htmlentities($_POST['order_user_payment_method'], ENT_QUOTES);
    $order_user_card_number = htmlentities($_POST['order_user_card_number'], ENT_QUOTES);
    $order_user_exp = htmlentities($_POST['order_user_exp'], ENT_QUOTES);
    $order_user_cvv = htmlentities($_POST['order_user_cvv'], ENT_QUOTES);
    $order_total_price = htmlentities($_POST['order_total_price'], ENT_QUOTES);
    $all_product_id = htmlentities($_POST['all_product_id'], ENT_QUOTES);
    $user_order_time = htmlentities($_POST['user_order_time'], ENT_QUOTES);
    $user_order_id_qty = htmlentities($_POST['user_order_id_qty'], ENT_QUOTES);

    $insertUserInfo = [
        'order_user_first_name' => $order_user_first_name,
        'order_user_last_name' => $order_user_last_name,
        'order_user_email' => $order_user_email,
        'order_user_number' => $order_user_number,
        'order_user_street_address' => $order_user_street_address,
        'order_user_city' => $order_user_city,
        'order_user_state' => $order_user_state,
        'order_user_zip_code' => $order_user_zip_code,
        'order_user_payment_method' => $order_user_payment_method,
        'order_user_card_number' => $order_user_card_number,
        'order_user_exp' => $order_user_exp,
        'order_user_cvv' => $order_user_cvv,
        'order_unique_id' => $order_unique_id,
        'order_total_price' => $order_total_price,
        'all_product_id' => $all_product_id,
        'user_unique_id' => $user_unique_id,
        'user_order_time' => $user_order_time,
        'user_order_id_qty' => $user_order_id_qty,
        'status' => 1
    ];
    // echo "<pre>";
    // print_r($insertUserInfo);
    // echo "</pre>";

    // All product id str to arr
    $deleteCartProduct = explode(",", $all_product_id);

    // product id and qty
    $userOrderIdQtyArr = explode("/", $user_order_id_qty);

    if ($databaseFN->insertData("orderdetails", $insertUserInfo)) {

        // delete product User unique id And Product id cart table
        for ($i = 0; $i < count($deleteCartProduct); $i++) {
            $databaseFN->deleteData("cart", " productId = $deleteCartProduct[$i] AND uniqueId = '$user_unique_id'");
        }

        // Product qty minus product details table
        foreach ($userOrderIdQtyArr as $key => $value) {
            $idQty = explode(",", $value);
            $idQtyCount = count($idQty);
            if ($idQtyCount != 2) {
                continue;
            }
            $decrement = ['productQty' => $idQty[1]];
            $databaseFN->incrementOrDecrement("productdetails", $decrement, " id = " . $idQty[0], "-");
        }

        header("Location: " . $databaseFN->mainUrl . "/cart.php");
    } else {
        header("Location: " . $databaseFN->mainUrl . "/cart.php?msg=email");
    }
}
