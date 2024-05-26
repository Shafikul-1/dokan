<?php
include "../header.php";
include "../database/otherFn.php";
$otherFn = new otherFn();
$databaseFN = new database();
if (isset($_GET['show']) && $_GET['show'] == 'all') {
    if ($databaseFN->getData("productcatagory")) {
        $result = $databaseFN->getResult();

        echo "<div class='flex flex-wrap gap-4'>";
        for ($i = 0; $i < count($result); $i++) {
?>
            <a href="<?php echo $databaseFN->mainUrl . "/category?categoryId=" . $result[$i]['id'] ?>">
                <div class="h-[15rem] w-[15rem] relative cursor-pointer mb-5">
                    <div class="absolute inset-0 bg-white opacity-25 rounded-lg shadow-2xl"></div>
                    <div class="absolute inset-0 transform  hover:scale-75 transition duration-300">
                        <div class="h-full w-full bg-white rounded-lg shadow-2xl">
                            <div class=" text-center p-3 py-10">
                                <h3 class="font-bold text-xl"><?php echo $result[$i]['categoryName'] ?></h3>
                                <p class=" text-sm py-2"><?php echo $result[$i]['categoryDescription'] ?></p>
                                <p class=" text-sm"><span class="font-bold">Qty:</span> <?php echo $result[$i]['categoryQty'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    ?>
    </div>
<?php } ?>

<?php
if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];
    echo "<div class='mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4'>";
    if ($databaseFN->getData("productdetails", "*", null, " category = $categoryId")) {
        foreach ($databaseFN->getResult() as list("id" => $id, "productName" => $productName, "productDescription" => $productDescription, "productImages" => $productImages, "price" => $price, "brand" => $brand)) {
            $exploadImage = explode(",", $productImages);
?>

            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="../upload/product/<?php echo trim($exploadImage[0]); ?>" alt="<?php echo trim($exploadImage[0]); ?>" />
                </div>
                <div class="mt-1 p-2">
                    <a href="<?php echo $databaseFN->mainUrl . "/view.php?id=" . $id ?>">
                        <h2 class="text-slate-700 font-bold hover:underline hover:underline-offset-4">
                            <?php echo (str_word_count($productName) >= 7) ? $otherFn->strSort($productName, 7) . "..." : $productName; ?>
                        </h2>
                        <p class="mt-1 text-sm text-slate-400 hover:underline hover:underline-offset-4"><?php echo (str_word_count($productDescription) >= 12) ? $otherFn->strSort($productDescription, 12) . "..." : $productDescription; ?></p>
                    </a>
                    <div class="mt-3 flex items-end justify-between">
                        <p class="text-lg font-bold text-blue-500">$<?php echo $price; ?></p>
                        <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <button class="text-sm">Add to cart</button>
                        </div>
                    </div>
                </div>
            </article>

<?php
        }
    }
    echo "  </div>";
}
?>

<?php
include "../footer.php";
?>