<?php
ob_start();
include "../header.php";

$check = false;

if (isset($_GET['checkPoint']) && $_GET['checkPoint'] == 'auth') {
    $check = true;
    include "auth.php";
}
if (isset($_GET['checkPoint']) && $_GET['checkPoint'] == 'logout') {
    $check = true;
    include "logout.php";
}
if (isset($_GET['checkPoint']) && $_GET['checkPoint'] == 'forgetPass') {
    $check = true;
    include "forgetPass.php";
}

if (!$check) {
    header("Location: $databaseFN->mainUrl");
}


include "../footer.php";
