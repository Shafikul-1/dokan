
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
      // echo "getPass = $pass";
      // echo "fetch pas = $dbPass";
      // echo "<br>";

      if (password_verify($pass, $dbPass)) {
        $uniqueId = $user['uniqueId'];
        $userAuth = $user['userRoll'];
        $_SESSION['uniqueId'] = $uniqueId;
        $_SESSION['userAuth'] = $userAuth;
        // echo "success";
        header("Location: " . $databaseFN->mainUrl);
        // echo $uniqueId."<br>";
        // echo $userAuth."<br>";
      } else {
        echo "Invalid password.";
      }
    } else {
      echo "Invalid email";
    }
  } else {
    echo "Error accessing the database.";
  }
}
?>
