<?php
ob_start();
include "header.php";
include "database/otherFn.php";
$otherFN = new otherFn();
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
        $increment =  ['Qty' => 1];
        if ($databaseFN->incrementOrDecrement("cart", $increment, " productId = $getId AND uniqueId = '$uniqueId'", "+")) {
            header("Location: " . basename($_SERVER['PHP_SELF']));
        } else {
            echo "<p class='text-center bg-green-500 py-3 capitalize'>Someting is wrong Qty Added</p>";
        }
    }

    // Product Qty Minus
    if ($_GET['qty'] == 'minus') {
        $increment =  ['Qty' => 1];
        if ($databaseFN->incrementOrDecrement("cart", $increment, " productId = $getId AND uniqueId = '$uniqueId'", "-")) {
            header("Location: " . basename($_SERVER['PHP_SELF']));
        } else {
            echo "<p class='text-center bg-green-500 py-3 capitalize'>Someting is wrong Qty Added</p>";
        }
    }
}

// Product Remove
if (isset($_GET['product']) && isset($_GET['id'])) {
    $getId = $_GET['id'];
    if($databaseFN->deleteData("cart", " productId = $getId AND uniqueId = '$uniqueId'")){
        header("Location: " . basename($_SERVER['PHP_SELF']));
    }
}

?>
<div class="font-sans">
    <?php
    $cartUrl = basename($_SERVER['PHP_SELF']);

    if ($databaseFN->getData("cart", "cart.Qty, cart.productId, productdetails.price, productdetails.productName, productdetails.productImages, productdetails.id", null, " cart.uniqueId = '$uniqueId'", " id DESC", null, " productdetails ON cart.productId = productdetails.id")) {
        $cartResult = $databaseFN->getResult();
        $countProduct = count($cartResult);
    ?>
        <div class="grid lg:grid-cols-3">
            <div class="lg:col-span-2 p-6 bg-white overflow-x-auto">
                <div class="flex gap-2 border-b pb-4">
                    <h2 class="text-2xl font-bold text-black flex-1">Shopping Cart</h2>
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

                    <tbody class="whitespace-nowrap divide-y">
                        <?php
                        // All price push this array
                        $allPrice = array();

                        if ($countProduct > 0) {
                            foreach ($cartResult as list("id" => $id, "productName" => $productName, "price" => $price, "productId" => $productId, "Qty" => $Qty, "productImages" => $productImages)) {
                                $singleImage = explode(",", $productImages);
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

                                            <a href="<?php echo $cartUrl . "?qty=minus&id=$id" ?>" type="button" class="<?php echo ($Qty > 1) ? '' : 'cursor-not-allowed opacity-35 pointer-events-none' ; ?>  flex items-center justify-center bg-gray-100 w-10 h-10 font-semibold">
                                                <i class="fa-solid fa-minus w-3 fill-current"></i>
                                            </a>
                                            <button type="button" class="bg-transparent w-10 h-10 font-semibold text-black text-base">
                                                <?php echo $Qty; ?>
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
                            echo "<p class='text-center font-bold bg-blue-500 text-white py-4 '>You have no added any data to the cart.</p>";
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
                    <li class="flex flex-wrap gap-4 text-base py-4">Shipping <span class="ml-auto font-bold">$4.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base py-4">Tax <span class="ml-auto font-bold">$4.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base py-4 font-bold">Total <span class="ml-auto">$45.00</span></li>
                </ul>

                <button type="button" class="mt-6 text-base px-6 py-2.5 w-full bg-gray-800 hover:bg-gray-900 text-white rounded"><a href="<?php echo $databaseFN->mainUrl . "/checkout.php"?>">Check out</a></button>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include "footer.php";
?>