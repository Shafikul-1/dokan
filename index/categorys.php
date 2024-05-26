<?php
$databaseFN = new database();
?>
<div class="">
    <?php
    if ($databaseFN->getData("productcatagory")) {
        $result = $databaseFN->getResult();
        for ($i = 0; $i < count($result); $i++) {
            if($result[$i]['categoryQty'] == 0){
                continue;
            }
            $categoryId = $result[$i]['id'];
    ?>
            <div class="flex justify-between my-4">
                <h3 class="text-2xl font-bold text-black dark:text-white capitalize">Category Name <?php echo $result[$i]['categoryName'] ?></h3>
                <a href="<?php echo $databaseFN->mainUrl . "/product?categoryid=" . $result[$i]['id'] . "&name=" . $result[$i]['categoryName'] ?>" class="capitalize hover:underline hover:underline-offset-4 ">All <?php echo $result[$i]['categoryName'] ?> Product <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="swiper AllCategory">
                <div class="swiper-wrapper">
                    <?php
                    if ($databaseFN->getData("productdetails", "*", null, " category = $categoryId")) {
                        $productDeails = $databaseFN->getResult();
                        for ($j = 0; $j < count($productDeails); $j++) {

                            $exploadImage = explode(",", $productDeails[$j]['productImages']);
                    ?>
                            <div class="swiper-slide">
                                <div class="w-full bg-gray-200 my-3 p-2 shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                                    <a href="<?php echo $databaseFN->mainUrl . "/view.php?id=" . $productDeails[$j]['id'] ?>">
                                        <img src="upload/product/<?php echo trim($exploadImage[0]) ?>" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                                        <div class="px-4 py-3 max-w-full">
                                            <span class="text-gray-400 mr-3 uppercase text-xs"><?php echo $productDeails[$j]['brand']; ?></span>
                                            <p class="text-lg font-bold text-black truncate block capitalize"><?php echo $productDeails[$j]['productName']; ?></p>
                                            <div class="flex items-center">
                                                <p class="text-lg font-semibold text-black cursor-auto my-3">$<?php echo $productDeails[$j]['price']; ?></p>
                                                <del>
                                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$<?php echo $productDeails[$j]['previousPrice']; ?></p>
                                                </del>
                                                <div class="ml-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>


    <?php
        }
    }
    ?>
</div>
