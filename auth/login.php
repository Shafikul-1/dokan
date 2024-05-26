<?php
include "../database/database.php";
$databaseFN = new database();

if (isset($_POST['login'])) {
  $email = htmlentities($_POST['email'], ENT_QUOTES);
  $pass = $_POST['pass'];

  // Fetch the user by email
  $userQuery = $databaseFN->getData("users", "*", null, "email = '$email'");
  if ($userQuery) {
    $user = $databaseFN->getResult();
    if (!empty($user)) {
      $user = $user[0]; // Assuming getResult returns an array of results
      $hashedPass = $user['pass'];
      
      // Verify the password
      if (password_verify($pass, $hashedPass)) {
        $uniqueId = $user['uniqueId'];
        // Password and email are correct
        // Continue with your execution
        // For example, start a session, redirect user, etc.
        // session_start();
        // $_SESSION['user_id'] = $uniqueId;
        // header("Location: dashboard.php");
        exit();
      } else {
        // Password is incorrect
        echo "Invalid password.";
      }
    } else {
      // Email does not exist in the database
      echo "Invalid email.";
    }
  } else {
    // Query failed
    echo "Error accessing the database.";
  }
}
?>
