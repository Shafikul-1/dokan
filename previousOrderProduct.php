<?php
ob_start();
include "header.php";
include "./database/otherFn.php";
$otherFn = new otherFn();
?>
<div class=" py-[5rem] flex items-center justify-center bg-gray-100">
    <div class="grid grid-cols-12 max-w-5xl gap-4">
        <?php
        if (isset($_GET['id'])) {
            $orderId = $_GET['id'];
            // echo $orderId;
            if ($databaseFN->getData("orderdetails", "*", null, " order_unique_id = '$orderId'")) {
                foreach ($databaseFN->getResult() as list("all_product_id" => $all_product_id)) {
                    $productid = explode(",", $all_product_id);
                    for ($i = 0; $i < count($productid); $i++) {
                        if ($databaseFN->getData("productdetails", "*", null, " id = " . $productid[$i])) {
                            foreach ($databaseFN->getResult() as list("id" => $poductID, "productName" => $productName, "productImages" => $productImages, "productDescription" => $productDescription)) {
                                $singleImgName =  explode(",", $productImages);
        ?>
                                <div class="grid col-span-4 relative ">
                                    <a class="group shadow-lg hover:shadow-2xl duration-200 delay-75 w-full bg-white rounded-sm py-6 pr-6 pl-9" href="<?php echo $databaseFN->mainUrl . "/view.php?id=" . $poductID ?>" style="background: url('upload/product/<?php echo $singleImgName[0]; ?>'); background-size: cover;">

                                        <div class="bg-[#00000094] group-hover:bg-[#ecdfdfd8] p-3">
                                            <!-- Title -->
                                            <p class="text-2xl font-bold  group-hover:text-gray-700 text-white"> <?php echo (str_word_count($productName) > 5) ? $otherFn->strSort($productName, 5) . "..." : $productName; ?> </p>

                                            <!-- Description -->
                                            <p class="text-sm font-semibold  group-hover:text-gray-700 mt-2 leading-6 text-white"> <?php echo (str_word_count($productDescription) > 25) ? $otherFn->strSort($productDescription, 25) . "..." : $productDescription; ?></p>

                                            <!-- Color -->
                                            <div class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0 text-white"> </div>
                                        </div>
                                    </a>
                                </div>
        <?php
                            }
                        }
                    }
                }
            }
        } else {
            header("Location: " . $databaseFN->mainUrl . "/cart.php");
        }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>