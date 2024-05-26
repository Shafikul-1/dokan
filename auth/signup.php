<?php
include "../database/otherFn.php";
$otherFN = new otherFn();
$uniqueId = $otherFN->uniqueIdCreate();
if (isset($_POST['signUp'])) {
  print_r($_POST);
}
