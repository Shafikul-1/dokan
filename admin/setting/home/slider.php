<?php
include "../../header.php";
if ($databaseFN->getData('slider', '*', null, "where_slider = 'homepage'")) {
    $slider = $databaseFN->getResult();
    if(count($slider) > 0){
?>

<div class="">
    <img src="https://cdn.prod.website-files.com/610bb663a35dd3364ddbf08c/6240a218db7ffbb91faf1589_creating-hover-effect-tailwind-css.png" alt="">
    <input type="text" name="sliderHeading" id=""><br>
    <textarea name="sliderParagrape" id=""></textarea>
</div>

<?php 
    }else {
        echo  "<p class='bg-red-600 text-white text-xl text-center font-bold capitalize'>no slider add in database</p>";
    }
} else {
    echo "<p class='bg-red-600 text-white text-xl text-center font-bold capitalize'>someting want wrong</p>";
}

?>

<a href="<?php echo $databaseFN->mainUrl . "/admin/setting/home/add-slider.php" ?>"  class="capitalize text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">add slider</a>

<?php include "../../footer.php"; ?>