<div class="CarosulSwiper">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            if ($databaseFN->getData('slider')) {
                foreach ($databaseFN->getResult() as list('heading' => $heading, 'image' => $image, 'description' => $description)) {
            ?>
                    <div class="swiper-slide">
                        <div style="background: url(upload/slider/<?php echo $image ?>); background-size: cover; background-position: center;" class=" w-[900px] h-[300px] p-6 rounded-lg shadow-lg flex items-center relative">
                            <div>
                                <div class="text-4xl font-bold text-white"><?php echo $heading ?></div>
                                <div class="text-xl font-light text-white mt-2"><?php echo $description ?></div>
                                <!-- <button class="mt-4 bg-orange-500 text-white py-2 px-4 rounded-full font-bold">Shop Now</button> -->
                            </div>
                            <!-- <div class="absolute top-6 right-6 bg-orange-500 text-white p-4 rounded-full text-center">
                                <div class="text-lg font-bold">UP TO</div>
                                <div class="text-4xl font-bold">68%</div>
                                <div class="text-lg font-bold">OFF</div>
                            </div>
                            <div class="flex-grow flex justify-end items-center">
                                <img src="https://img.icons8.com/external-flat-juicy-fish/60/000000/external-treadmill-gym-flat-flat-juicy-fish.png" alt="Treadmill" class="h-40">
                                <img src="https://img.icons8.com/external-flat-juicy-fish/60/000000/external-football-soccer-flat-flat-juicy-fish.png" alt="Football" class="h-20 ml-4">
                                <img src="https://img.icons8.com/external-flat-juicy-fish/60/000000/external-guitar-music-flat-flat-juicy-fish.png" alt="Guitar" class="h-24 ml-4">
                            </div> -->
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