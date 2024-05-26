<div class="swiper categorySwiper">
    <div class="swiper-wrapper">
        <?php
        $databaseFN = new database();
        if ($databaseFN->getData("productcatagory")) {
            foreach ($databaseFN->getResult() as list("id" => $id, "categoryName" => $categoryName, "categoryDescription" => $categoryDescription)) {

        ?>

                <div class="swiper-slide">
                    <div class="group relative m-0 flex h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                        <a href="<?php echo $databaseFN->mainUrl . "/product?categoryid=" . $id . "&name=" . $categoryName ?>">
                            <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                                <img src="https://images.unsplash.com/photo-1506187334569-7596f62cf93f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=3149&q=80" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                            </div>
                            <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                                <h1 class="font-serif text-2xl font-bold text-white shadow-xl"><?php echo ucwords($categoryName); ?></h1>
                                <h1 class="text-sm font-light text-gray-200 shadow-xl"><?php echo ucfirst($categoryDescription); ?></h1>
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