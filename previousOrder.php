<?php
include "header.php";
$user_unique_id = $_SESSION['uniqueId'];
?>
<div class="flex justify-between  bg-gray-400 ml-5 text-center">
    <h2 class="text-2xl font-bold text-black flex-1 cursor-pointer hover:bg-gray-500 transition-all rounded-md py-2"><a href="<?php echo $databaseFN->mainUrl . "/cart.php" ?>">Shopping Cart</a> </h2>
    <h2 class="text-2xl font-bold text-black flex-1 capitalize cursor-pointer hover:bg-gray-500 transition-all rounded-md py-2"><a href="<?php echo $databaseFN->mainUrl . "/previousOrder.php" ?>">Previes order</a> </h2>
</div>
<?php
if ($databaseFN->getData("orderdetails", "*", null, " user_unique_id = '$user_unique_id'")) {
?>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 relative">
                        <?php
                        $cartResult = $databaseFN->getResult();
                        $countProduct = count($cartResult);
                        if ($countProduct > 0) {
                        ?>
                            <caption class="py-6 text-xl text-center text-gray-600 dark:text-neutral-500 font-bold">Your Previce Order Details</caption>
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">S.r no.</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Order ID</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">confirm Date</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Total Price</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <?php
                                foreach ($cartResult as list("id" => $id, "order_unique_id" => $order_unique_id, "user_order_time" => $user_order_time, "order_total_price" => $order_total_price, "status" => $status)) {
                                ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?php echo $id ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm  text-gray-800 dark:text-neutral-200">#<?php echo "<a href='$databaseFN->mainUrl/previousOrderProduct.php?id=$order_unique_id'>$order_unique_id</a>"?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?php echo substr($user_order_time, 0, 10) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">$<?php echo $order_total_price ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            <button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center capitalize 
                                        <?php
                                        if ($status == 0) {
                                            echo "text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800";
                                        } else if ($status == 1) {
                                            echo "text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800";
                                        } else if ($status == 2) {
                                            echo "text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800";
                                        }

                                        ?>">
                                                <?php
                                                if ($status == 0) {
                                                    echo "delivard";
                                                } else if ($status == 1) {
                                                    echo "pending";
                                                } else if ($status == 2) {
                                                    echo "deleted";
                                                }
                                                ?>
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent disabled:opacity-50 disabled:pointer-events-none  flex gap-3">
                                                <a href="<?php echo $databaseFN->mainUrl . "/previousOrderProduct.php?id=$order_unique_id" ?>"><i class="fa-solid fa-eye"></i></a>
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        <?php
                        } else {
                            echo "<img class=' left-4' src='./upload/icon/no product found.webp'/>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
}
include "footer.php";
?>