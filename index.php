<?php
include "header.php";
$databaseFN = new database();
?>



<div class="grid grid-cols-1 md:grid-cols-6  gap-2 dark:bg-black dark:text-white">
  <div class="w-full md:col-start-1 md:col-span-4 ">
    <?php
    include "home/heroSection.php";
    ?>
  </div>
  <div class=" w-full md:col-start-5 md:col-span-6 ">
    <div class="grid grid-cols-1"></div>
    <?php
    include "home/searchProduct.php";
    include "home/googleAds.php";
    ?>
  </div>
</div>

<section class="text-gray-700 body-font dark:bg-black">
  <div class="container px-5 py-10 mx-auto">
    <div class="flex justify-between dark:text-white">
      <h3 class="text-xl font-bold text-black dark:text-white mb-5">Feture Categories</h3>
      <a href="<?php echo $databaseFN->mainUrl . "/category?show=all" ?> " class="hover:underline hover:underline-offset-4">See All Categories <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
    <?php include "home/fetureCategories.php"; ?>
  </div>
</section>


<section class="dark:bg-black dark:text-white">
  <div class="flex justify-between">
    <h3 class="text-2xl font-bold text-black dark:text-white ">Just Now Added Product</h3>
    <a href="<?php echo $databaseFN->mainUrl . "/product/all-product.php" ?> " class="hover:underline hover:underline-offset-4">See All Product <i class="fa-solid fa-arrow-right-long"></i></a>
  </div>
  <?php include "home/justAddedProduct.php"; ?>
</section>


<section class="mt-4 dark:bg-black dark:text-white">
  <?php include "home/categorys.php"; ?>
</section>





<?php include "footer.php"; ?>