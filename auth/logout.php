<?php 

$databaseFN = new database();
unset($_SESSION['userAuth']);
unset($_SESSION['uniqueId']);
header("Location: " . $databaseFN->mainUrl);
?>