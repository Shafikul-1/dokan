<?php
ob_start();
include "header.php";
include "database/otherFn.php";
include "database/whichlist.php";
$whichlist = new whichlist();
$otherFn = new otherFn();

if (!isset($_SESSION['uniqueId'])) {
    header("Location: " . $databaseFN->mainUrl);
}
$userId = $_SESSION['uniqueId'];

// Remove whichlist
if (isset($_GET['whichlist'])) {
    $getId = $_GET['id'];
    if ($_GET['whichlist'] == 'remove') {
        if ($whichlist->remove($getId, $_SESSION['uniqueId'])) {
            header("Location: " . basename($_SERVER['PHP_SELF']));
        } else {
            echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Which list delete</p>";
        }
    }
}

if ($databaseFN->getData("whichlist", "*", null, " uniqueId = '$userId'")) {
    $whichlistProductCount = $databaseFN->getResult();
    if (count($whichlistProductCount) > 0) {
?>
        <section class="py-10 bg-gray-100">
            <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php
                foreach ($whichlistProductCount as $key => $value) {

                    if ($databaseFN->getData("productdetails", "*", null, " id = " . $value['productId'])) {
                        foreach ($databaseFN->getResult() as list("id" => $id, "productName" => $productName, "productDescription" => $productDescription, "productImages" => $productImages, "price" => $price, "brand" => $brand)) {
                            $exploadImage = explode(",", $productImages);
                ?>
                            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                                <div class="relative flex items-end overflow-hidden rounded-xl">
                                    <button type="button" class="absolute top-4 right-4">
                                        <?php $whichlist->check($id, $userId); ?>
                                    </button>
                                    <img src="upload/product/<?php echo trim($exploadImage[0]); ?>" alt="<?php echo trim($exploadImage[0]); ?>" />
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
                    } else {
                        echo "<h2 class='capitalize font-bold text-center text-3xl bg-red-500'>Some thing want wrong</h2>";
                    }
                }
                ?>
            </div>
        </section>
<?php
    } else {
        echo "<h2 class='capitalize font-bold text-center text-3xl bg-red-500'>No product found</h2>";
        echo "<img src='upload/icon/no product found.webp'>";
    }
} else {
    echo "<h2 class='capitalize font-bold text-center text-3xl bg-red-500'>Some thing want wrong</h2>";
}
?>


<script>
    // Comment Insert Show notic
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var messageDiv = document.getElementById("message");
            if (messageDiv) {
                messageDiv.style.display = "none";
            }
        }, 5000); // 10000 milliseconds = 10 seconds
    });
</script>
<?php

include "footer.php";

?>