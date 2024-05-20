<?php 
session_start();

if(isset($_POST['submit'])){
   $s = htmlentities($_POST['age'], ENT_QUOTES );
   $a = htmlentities($_POST['name'], ENT_QUOTES );
   echo $s . "<br>" . $a;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ecommarce</h1>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="name">
    <input type="text" name="age">
    <input type="submit" name="submit" value="submit">
    </form>

 
    <p> Check 'One'</p>
    <p>Check "Two"</p>


</body>

</html>