<?php
ob_start();
include "../header.php";

if (isset($_SESSION['userAuth'])) {

    if (isset($_GET['view'])) {
        switch ($_GET['view']) {
            case 'users':
                include "viewProfile.php";
                viewProfile($_GET['msg']);
                break;
            case 'employee': 
                include "viewProfile.php";
                viewProfile($_GET['msg']);
                break;
            case 'manager':
                include "viewProfile.php";
                viewProfile($_GET['msg']);
                break;
            default:
                header("Location: " . $databaseFN->mainUrl);
                break;
        }
    } else {
        header("Location: " . $databaseFN->mainUrl);
    }
} else {
    header("Location: " . $databaseFN->mainUrl);
}


include "../footer.php";
