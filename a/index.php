<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ecommarce</h1>
    <pre>
    <?php
    include "./database/database.php";
    $a = new database();
    print_r($a->getResult())
    ?>
    </pre>

    





    <?php
include "../database/database.php";
$databaseFN = new database();
?>

<script>
function checkForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var conPass = document.getElementById("conPass").value;
    var date = document.getElementById("date").value;
    var userComment = document.getElementById("userComment").value;
    var userRoll = document.getElementById("userRoll").value;

    if (name !== '' && email !== '' && pass !== '' && conPass !== '' && date !== '' && userComment !== '' && userRoll !== '') {
        if (pass === conPass) {
            return true;
        } else {
            alert("Password and Confirm Password do not match!");
            return false;
        }
    } else {
        alert("Please fill in all fields.");
        return false;
    }
}
</script>

<form action="" method="post" onsubmit="return checkForm()">
    <input type="text" name="name" id="name" placeholder="Name">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="pass" id="pass" placeholder="Password">
    <input type="password" name="conPass" id="conPass" placeholder="Confirm Password">
    <input type="date" name="date" id="date">
    <textarea name="userComment" id="userComment" placeholder="Comment"></textarea>
    <select name="userRoll" id="userRoll">
        <option value="1">admin</option>
        <option value="2">moderator</option>
        <option value="3">user</option>
    </select>
    <input type="submit" name="submit" value="Save" id="submit" disabled>
</form>

<script>
document.addEventListener("input", function() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var conPass = document.getElementById("conPass").value;
    var date = document.getElementById("date").value;
    var userComment = document.getElementById("userComment").value;
    var userRoll = document.getElementById("userRoll").value;

    if (name !== '' && email !== '' && pass !== '' && conPass !== '' && date !== '' && userComment !== '' && userRoll !== '') {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
});
</script>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conPass = $_POST['conPass'];
    $date = $_POST['date'];
    $userComment = $_POST['userComment'];
    $userRoll = $_POST['userRoll'];

    $formData = ["name" => $name, "email" => $email, "pass" => $pass, "date" => $date, "userComment" => $userComment, "userRoll" => $userRoll];
    $databaseFN->insertData("users", $formData);
}
?>





</body>

</html>