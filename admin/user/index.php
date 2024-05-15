
<?php
include "../../database/database.php";
$obj = new database();

if (isset($_GET['did'])) {
    include "./deleteUser.php";
    deleteUser($_GET['did']);
    // header("Location: " . $obj->mainUrl . "/admin/users.php");
} else if (isset($_GET['eid'])) {
    include "./editUser.php";
    edituser($_GET['eid']);
} else if (isset($_GET['vid'])) {
    include "./userView.php";
    viewUser($_GET['vid']);
} else {
    header("Location: " . $obj->mainUrl . "/admin/users.php");
}

?>