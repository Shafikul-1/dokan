<?php
ob_start();
include "../header.php";

$check = false;
if (isset($_GET['checkPoint']) && $_GET['checkPoint'] == 'auth') {
    include "auth.php";
    $check = true;
}
if (isset($_GET['checkPoint']) && $_GET['checkPoint'] == 'logout') {
    include "logout.php";
    $check = true;
}
if (isset($_GET['checkPoint']) && $_GET['checkPoint'] == 'forgetPass') {
    include "forgetPass.php";
    $check = true;
}

if (!$check) {
    header("Location: $databaseFN->mainUrl");
}


include "../footer.php";
