<?php
ob_start();
include "header.php";
include "database/whichlist.php";
include "database/otherFn.php";
include "database/cart.php";
$otherFN = new otherFn();
$whichlist = new whichlist();
$cart = new cart();

if (!isset($_SESSION['userAuth'])) {
    header("Location: " . $databaseFN->mainUrl);
} else {
    $uniqueId = $_SESSION['uniqueId'];
    // echo $uniqueId;
}

if (isset($_GET['qty']) && isset($_GET['id'])) {
    $getId = $_GET['id'];

    // Product Qty Plus
    if ($_GET['qty'] == 'plus') {
        if ($cart->increment($getId, $uniqueId, 1)) {
            header("Location: " . basename($_SERVER['PHP_SELF']));
        } else {
            echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Qty Added</p>";
        }
    }

    // Product Qty Minus
    if ($_GET['qty'] == 'minus') {
        if ($cart->decrement($getId, $uniqueId, 1)) {
            header("Location: " . basename($_SERVER['PHP_SELF']));
        } else {
            echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Qty Minus</p>";
        }
    }
}

// Product Remove
if (isset($_GET['product']) && isset($_GET['id'])) {
    $getId = $_GET['id'];
    if ($databaseFN->deleteData("cart", " productId = $getId AND uniqueId = '$uniqueId'")) {
        header("Location: " . basename($_SERVER['PHP_SELF']));
    } else {
        header("Location: " . basename($_SERVER['PHP_SELF']) . "?msg=dfalse");
    }
}

// Whichlist Product remove
if (isset($_GET['whichlist']) && $_GET['whichlist'] == 'remove') {
    $whichListId = $_GET['id'];
    if ($whichlist->remove($whichListId, $uniqueId)) {
        header("Location: " . basename($_SERVER['PHP_SELF']));
    } else {
        echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Which list delete</p>";
    }
}

// Cart Add product
if (isset($_GET['cart']) && $_GET['cart'] == 'add') {
    $cartId = $_GET['id'];
    if ($cart->cart($cartId, $uniqueId)) {
        header("Location: " . basename($_SERVER['PHP_SELF']));
    } else {
        echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Product Add</p>";
    }
}

// Order database Data save error
if (isset($_GET['msg']) && $_GET['msg'] == 'dberror') {
    echo "<p id='message' class='bg-red-400 text-white text-center font-bold capitalize py-4'>please Check your provide informationo</p>";
}
// database email already exists
if (isset($_GET['msg']) && $_GET['msg'] == 'email') {
    echo "<p id='message' class='bg-red-700 text-white text-center font-bold capitalize py-4'>please Check your provide information</p>";
}
// Cart add Product delete failed in database
if (isset($_GET['msg']) && $_GET['msg'] == 'dfalse') {
    echo "<p id='message' class='bg-red-700 text-white text-center font-bold capitalize py-4'>product delete failed in database</p>";
}






?>
<div class="font-sans">
    <?php
    $cartUrl = basename($_SERVER['PHP_SELF']);
    $allProductId = array();


    if ($databaseFN->getData("cart", "cart.Qty, cart.productId, productdetails.price, productdetails.productName, productdetails.productImages, productdetails.id", null, " cart.uniqueId = '$uniqueId'", " id DESC", null, " productdetails ON cart.productId = productdetails.id")) {
        $cartResult = $databaseFN->getResult();
        $countProduct = count($cartResult);
    ?>
        <div class="flex justify-between  bg-gray-400 ml-5 text-center">
            <h2 class="text-2xl font-bold text-black flex-1 cursor-pointer hover:bg-gray-500 transition-all rounded-md py-2"><a href="<?php echo $databaseFN->mainUrl . "/cart.php" ?>">Shopping Cart</a> </h2>
            <h2 class="text-2xl font-bold text-black flex-1 capitalize cursor-pointer hover:bg-gray-500 transition-all rounded-md py-2"><a href="<?php echo $databaseFN->mainUrl . "/previousOrder.php" ?>">Previes order</a> </h2>
        </div>
        <div class="grid lg:grid-cols-3 " id="AllProductCart">

            <div class="lg:col-span-2 p-6 bg-white overflow-x-auto">
                <div class="flex gap-2 border-b pb-4">
                    <h2 class="text-xl font-medium text-black flex-1"><a class="hover:underline underline-offset-4" href="<?php echo $databaseFN->mainUrl ?>">Go All Product </a></h2>

                    <h3 class="text-xl font-bold text-black"><?php echo $countProduct; ?> Items</h3>
                </div>

                <table class="mt-6 w-full border-collapse divide-y">
                    <thead class="whitespace-nowrap text-left">
                        <tr>
                            <th class="text-base text-black p-4">Description</th>
                            <th class="text-base text-black p-4">Quantity</th>
                            <th class="text-base text-black p-4">Price</th>
                        </tr>
                    </thead>

                    <tbody class="whitespace-nowrap divide-y relative">
                        <?php
                        // All price push this array
                        $allPrice = array();
                        $productIdQty = array();
                        if ($countProduct > 0) {
                            foreach ($cartResult as list("id" => $id, "productName" => $productName, "price" => $price, "productId" => $productId, "Qty" => $Qty, "productImages" => $productImages)) {
                                $singleImage = explode(",", $productImages);
                                array_push($allProductId, $id);
                        ?>
                                <tr>
                                    <td class="py-6 px-4">
                                        <div class="flex items-center gap-6 w-max">
                                            <div class="h-32 shrink-0">
                                                <img src="upload/product/<?php echo $singleImage[0] ?>" alt="<?php echo $singleImage[0] ?>" class="w-full h-full object-contain rounded" />
                                            </div>
                                            <div>
                                                <p class="text-base font-bold text-black">
                                                    <a href="<?php echo $databaseFN->mainUrl . "/view.php?id=$id" ?>"> <?php echo (str_word_count($productName) >= 3) ? $otherFN->strSort($productName, 3) . "..." : $productName; ?></a>
                                                </p>
                                                <a href="<?php echo $cartUrl . "?product=remove&id=$id" ?>" type="button" class="mt-3 font-semibold text-red-400 text-sm">
                                                    Remove
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-6 px-4">
                                        <div class="flex divide-x border w-max rounded overflow-hidden">

                                            <a href="<?php echo $cartUrl . "?qty=minus&id=$id" ?>" type="button" class="<?php echo ($Qty > 1) ? '' : 'cursor-not-allowed opacity-35 pointer-events-none'; ?>  flex items-center justify-center bg-gray-100 w-10 h-10 font-semibold">
                                                <i class="fa-solid fa-minus w-3 fill-current"></i>
                                            </a>
                                            <button type="button" class="bg-transparent w-10 h-10 font-semibold text-black text-base">
                                                <?php
                                                echo $Qty;
                                                array_push($productIdQty, [$id => $Qty]);
                                                ?>
                                            </button>
                                            <a href="<?php echo $cartUrl . "?qty=plus&id=$id" ?>" type="button" class="flex justify-center items-center bg-gray-800 text-white w-10 h-10 font-semibold">
                                                <i class="fa-solid fa-plus w-3 fill-current"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-6 px-4">
                                        <h4 class="text-base font-bold text-black">
                                            $<?php
                                                $countPrice = $price * $Qty;
                                                echo $countPrice;
                                                array_push($allPrice, $countPrice);
                                                ?>
                                        </h4>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<img class='absolute top-[17rem] left-3' src='./upload/icon/no product found.webp'/>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Summury Price -->
            <div class="bg-gray-50 p-6 lg:sticky lg:top-0 lg:h-screen">
                <h3 class="text-xl font-bold text-black border-b pb-4">Order Summary</h3>

                <ul class="text-black divide-y mt-6">
                    <li class="flex flex-wrap gap-4 text-base py-4">Subtotal <span class="ml-auto font-bold">
                            $<?php
                                $subTotalPrice = array_sum($allPrice);
                                echo $subTotalPrice;
                                ?>
                        </span>
                    </li>
                    <li class="flex flex-wrap gap-4 text-base py-4">Shipping <span class="ml-auto font-bold">$0.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base py-4">Tax <span class="ml-auto font-bold">$0.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base py-4 font-bold">Total <span class="ml-auto">
                            $<?php
                                $allTotalPrice = $subTotalPrice;
                                echo $allTotalPrice;
                                ?>
                        </span></li>
                </ul>

                <button onclick="checkout()" type="button" class="mt-6 text-base px-6 py-2.5 w-full bg-gray-800 hover:bg-gray-900 text-white rounded">
                    Check out
                </button>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<!-- Checkout page Inculd -->
<div id="checkOutSection" class="hidden">
    <?php include "checkout.php"; ?>
</div>

<!-- Which list product -->
<div class="">
    <h2 class="text-xl font-bold">Your Which list product</h2>
    <div class="flex flex-wrap gap-2">
        <?php
        if (isset($_SESSION)) {
            if ($databaseFN->getData('whichlist', "*", null, " uniqueId = '$uniqueId'")) {
                $whichlistResult = $databaseFN->getResult();
                $whichlistResultCount = count($whichlistResult);
                if ($whichlistResultCount > 0) {
                    for ($i = 0; $i < $whichlistResultCount; $i++) {
                        $whichlistId = $whichlistResult[$i]['productId'];
                        if ($databaseFN->getData('productdetails', "*", null, " id =  $whichlistId")) {
                            foreach ($databaseFN->getResult() as list("productName" => $productName, 'productImages' => $productImages, 'productDescription' => $productDescription)) {
                                $whichlistSingleImage = explode(",", $productImages);
        ?>
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="relative">
                                        <div class="absolute top-1 right-3 text-xl">
                                            <?php $whichlist->check($whichlistId, $uniqueId); ?>
                                        </div>
                                        <img src="upload/product/<?php echo $whichlistSingleImage[0] ?>" alt="<?php echo $singleImage[0] ?>" />
                                    </div>
                                    <div class="p-5">
                                        <a href="<?php echo $databaseFN->mainUrl . "/view.php?id=$whichlistId" ?>">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                <?php echo (str_word_count($productName) >= 5) ? $otherFN->strSort($productName, 5) . "..." : $productName; ?>
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            <?php echo (str_word_count($productDescription) >= 15) ? $otherFN->strSort($productDescription, 15) . "..." : $productDescription; ?>
                                        </p>
                                        <div class="flex justify-between">
                                            <a href="<?php echo $databaseFN->mainUrl . "/view.php?id=$whichlistId" ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Read more
                                                <i class="ml-2 fa-solid fa-arrow-right-long"></i>
                                            </a>
                                            <a href="<?php echo basename($_SERVER['PHP_SELF']) . "?cart=add&id=" . $whichlistId ?>" class="capitalize bg-indigo-300 py-2 px-3 rounded-md font-bold hover:bg-gray-500 hover:text-white transition-all">add to cart</a>
                                        </div>
                                    </div>
                                </div>
        <?php
                            }
                        } else {
                            echo "<p class='font-bold text-xl'>Something want wrong</p>";
                        }
                    }
                } else {
                    echo "<img class='' src='./upload/icon/no product found.webp'/>";
                }
            } else {
                echo "<p class='font-bold text-xl'>please reflesh website</p>";
            }
        } ?>
    </div>
</div>

<script>
    function checkout() {
        const AllProductCart = document.getElementById("AllProductCart");
        const checkOutSection = document.getElementById("checkOutSection");
        AllProductCart.classList.add("hidden");
        checkOutSection.classList.remove("hidden");
    }

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