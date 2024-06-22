<div class="CarosulSwiper">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            if ($databaseFN->getData('slider')) {
                foreach ($databaseFN->getResult() as list('heading' => $heading, 'image' => $image, 'description' => $description)) {
            ?>
                    <div class="swiper-slide">
                        <div class="group relative m-0 flex h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                            <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                                <img src="upload/slider/<?php echo $image ?>" alt="" />
                            </div>
                            <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                                <h1 class="font-serif text-2xl font-bold text-white shadow-xl"><?php echo $heading ?></h1>
                                <h1 class="text-sm font-light text-gray-200 shadow-xl"><?php echo $description ?></h1>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p id='message' class='text-center bg-red-500 py-3 capitalize font-bold'>Someting want wrong</p>";
            }
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>
</div>