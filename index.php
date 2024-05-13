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
</body>
</html>