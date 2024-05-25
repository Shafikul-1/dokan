<?php
include "../header.php";
include "../database/otherFn.php";
$otherFn = new otherFn();
?>

<div class="grid grid-cols-5 grid-rows-1 gap-2">

    <?php
    $databaseFN = new database();
    if (isset($_GET['categoryid'])) {
        $categoryid = $_GET['categoryid'];
    }
    if ($databaseFN->getData("productdetails", "*", null, " category = $categoryid")) {
        foreach ($databaseFN->getResult() as list("productName" => $productName, "productDescription" => $productDescription, "productImages" => $productImages)) {
            $exploadImage = explode(",", $productImages);
    ?>
            <div class="h-[30rem] w-[15rem] relative cursor-pointer mb-5">
                <div class="absolute inset-0 bg-white opacity-25 rounded-lg shadow-2xl"></div>
                <div class="absolute inset-0 transform  hover:scale-90 transition duration-300">
                    <div class="h-full w-full bg-white rounded-lg shadow-2xl">
                        <div class="flex px-3 py-3">
                            <a href="#">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    <img class="w-full" src="../upload/product/<?php echo trim($exploadImage[0]) ?>" alt="Sunset in the mountains">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-md mb-2">
                                            <?php
                                            if (str_word_count($productName) >= 5) {
                                                echo $otherFn->strSort($productName, 5) . "...";
                                            } else {
                                                echo $productName;
                                            }
                                            ?>
                                        </div>
                                        <p class="text-gray-700 text-base">
                                            <?php
                                            if (str_word_count($productDescription) >= 7) {
                                                echo $otherFn->strSort($productDescription, 7) . "...";
                                            } else {
                                                echo $productDescription;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="px-6 py-4">
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#photography</span>
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#travel</span>
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span>
                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

    <?php     }
    } ?>

</div>






<?php

include "../footer.php";
?>