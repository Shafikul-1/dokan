
<?php
session_start();
include "../database/database.php";
$databaseFN = new database();

if (isset($_POST['login'])) {
  $email = htmlentities($_POST['email'], ENT_QUOTES);
  $pass = $_POST['pass'];

  $userQuery = $databaseFN->getData("users", "*", null, "email = '$email'");

  if ($userQuery) {
    $result = $databaseFN->getResult();
    if ($result) {
      $user = $result[0];
      $dbPass = $user['pass'];

      if (password_verify($pass, $dbPass)) {
        $uniqueId = $user['uniqueId'];
        $userAuth = $user['userRoll'];
        $_SESSION['uniqueId'] = $uniqueId;
        $_SESSION['userAuth'] = $userAuth;
        // echo $uniqueId."<br>";
        // echo $userAuth."<br>";
        header("Location: " . $databaseFN->mainUrl);
      } else {
        header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth&error=pass");
      }
    } else {
      header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth&error=email");
    }
  } else {
    header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth&error=dbConn");
  }
}
?>
