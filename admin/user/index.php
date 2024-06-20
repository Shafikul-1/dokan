
<?php
ob_start();
include "../header.php";


if (isset($_GET['did'])) {
    include "./deleteUser.php";
    deleteUser($_GET['did']);
} else if (isset($_GET['eid'])) {
    include "./editUser.php";
    edituser($_GET['eid']);
} else if (isset($_GET['vid'])) {
    include "./userView.php";
    viewUser($_GET['vid']);
} else {
    header("Location: " . $databaseFN->mainUrl . "/admin/users.php");
}

?>