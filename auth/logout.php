<?php 

$databaseFN = new database();
unset($_SESSION['userAuth']);
header("Location: " . $databaseFN->mainUrl);
?>