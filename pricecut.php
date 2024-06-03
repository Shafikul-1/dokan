<?php
session_start();
include "./database/database.php";
include "./database/otherFn.php";
$databaseFN = new database();
$otherFN = new otherFn();

$order_unique_id = "#" . $otherFN->uniqueIdCreate();
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
        'user_unique_id' => $user_unique_id
    ];
// echo "<pre>";
// print_r($insertUserInfo);
// echo "</pre>";
    if ($databaseFN->insertData("orderdetails", $insertUserInfo)) {
        header("Location: " . $databaseFN->mainUrl . "/cart.php?msg=pending");
    } else {
        header("Location: " . $databaseFN->mainUrl . "/cart.php?msg=dberror");
    }
} else {
    header("Location: " . $databaseFN->mainUrl . "/cart.php");
}
