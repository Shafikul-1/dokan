<?php
session_start();
include "../database/otherFn.php";
include "../database/database.php";
$databaseFN = new database();
$otherFN = new otherFn();
if (isset($_POST['signUp'])) {
  $name = htmlentities($_POST['name'], ENT_QUOTES);
  $date = htmlentities($_POST['date'], ENT_QUOTES);
  $email = htmlentities($_POST['email'], ENT_QUOTES);
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $conPass = password_hash($_POST['conPass'], PASSWORD_DEFAULT);
  $uniqueId = $otherFN->uniqueIdCreate();
  $userRoll = 4;
  $userComment = 'OutSide User';

  $formData = ["name" => $name, "email" => $email, "pass" => $pass, "conPass" => $conPass, "date" => $date, "userComment" => $userComment, "userRoll" => $userRoll, "uniqueId" => $uniqueId];
  // print_r($formData);

  if ($databaseFN->getData("users", "email", null, " email = '$email'")) {
    $dbresult = $databaseFN->getResult();
    if (count($dbresult) > 0) {
      header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth&error=emailexist");
    } else {
      if ($databaseFN->insertData("users", $formData)) {
        $_SESSION['uniqueId'] = $uniqueId;
        $_SESSION['userAuth'] = $userRoll;
        header("Location: " . $databaseFN->mainUrl);
      } else {
        header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth&error=dbConn");
      }
    }
  } else {
    header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth&error=geterror");
  }
}
