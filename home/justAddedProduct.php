<div class="swiper justAdd">
    <div class="swiper-wrapper">
        <?php
        $databaseFN = new database();
        if ($databaseFN->getData("productdetails", "*", null, null, " id DESC")) {
            $counter = 0;
            foreach ($databaseFN->getResult() as list("id" => $id, "productName" => $productName, "productDescription" => $productDescription, "productImages" => $productImages, "price"=>$price, "releaseDate"=>$releaseDate)) {
                $imageNameExplde = explode(",", $productImages);
                if ($counter >= 20) {
                    break;
                }
                $counter++
        ?>
                <div class="swiper-slide">
                    <div class="bg-white my-2 w-full">
                        <div class="bg-gray-200 rounded-lg overflow-hidden hover:shadow-2xl transition-all  p-2">
                            <a href="<?php echo $databaseFN->mainUrl . "/view.php?id=" . $id ?>">
                                <img class="h-48 w-full object-cover object-end" src="upload/product/<?php echo trim($imageNameExplde[0]) ?>" alt="<?php echo trim($imageNameExplde[0]) ?>" />
                                <div class="p-3 w-full">
                                    <div class="flex items-baseline">
                                        <span class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase font-semibold tracking-wide">New</span>
                                        <div class="ml-2 text-gray-600 text-xs  font-semibold tracking-wide">
                                       Add: <?php echo substr($releaseDate, 11, 16) ?>
                                        </div>
                                    </div>
                                    <h4 class="mt-2 font-semibold text-lg leading-tight truncate"><?php echo $productName; ?></h4>

                                    <div class="mt-1">
                                        <span>$<?php echo $price; ?></span>
                                        <span class="text-gray-600 text-sm">/ wk</span>
                                    </div>
                                    <div class="mt-2 flex items-center">
                                        <span class="text-teal-600 font-semibold">
                                            <span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>
                                                </span>
                                                <br>
                                                <span class="ml-2 text-gray-600 text-sm">34 reviews</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="swiper-pagination"></div>
</div>