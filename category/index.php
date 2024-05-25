<pre>
<?php 

include "../header.php";
$databaseFN = new database();
if($databaseFN->getData("productcatagory")){
    $result = $databaseFN->getResult();
    for ($i=0; $i < count($result); $i++) { 
        // print_r($result[$i]);
        $categoryId = $result[$i]['id'];
        echo $result[$i]['id']." = cateogry id <br>";
        if($databaseFN->getData("productdetails", "*", null, " category = $categoryId")){
            $productDeails = $databaseFN->getResult();
            for ($j=0; $j < count($productDeails); $j++) { 
                echo $productDeails[$j]['productName']."<br>";
                // print_r($productDeails[$j]);
            }
        }
    }
}
?></pre>