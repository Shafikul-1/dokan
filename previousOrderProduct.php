<?php
ob_start();
include "header.php";
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
                            foreach ($databaseFN->getResult() as list("productName" => $productName)) {
        ?>
                                <div class="grid col-span-4 relative">
                                    <a class="group shadow-lg hover:shadow-2xl duration-200 delay-75 w-full bg-white rounded-sm py-6 pr-6 pl-9" href="" style="background: url('https://cdni.iconscout.com/illustration/premium/thumb/sorry-item-not-found-3328225-2809510.png?f=webp'); background-size: cover;">

                                        <!-- Title -->
                                        <p class="text-2xl font-bold text-gray-500 group-hover:text-gray-700"> <?php echo $productName; ?> </p>

                                        <!-- Description -->
                                        <p class="text-sm font-semibold text-gray-500 group-hover:text-gray-700 mt-2 leading-6"> Include an issue key in a commit, branch name, or PR, and it will automatically update in Jira. </p>

                                        <!-- Color -->
                                        <div class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0"> </div>

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