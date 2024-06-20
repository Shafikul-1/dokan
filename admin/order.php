<?php
include "header.php";


if ($databaseFN->getData("orderdetails")) {
    $orderResult = $databaseFN->getResult();
    if (count($orderResult) > 0) {
?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            total price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            product status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="">view</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orderResult as list("status" => $status, "order_user_first_name" => $fname, "order_user_last_name" => $lname, "order_user_number" => $number, "order_user_email" => $email, "user_order_time" => $time, "order_total_price" => $totalPrice)) {
                    ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $fname . " " . $lname ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $number ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $email ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $totalPrice ?>
                            </td>
                            <td class="px-6 py-4">
                                <select class="bg-white dark:bg-gray-800 " name="status" id="">
                                    <option <?php echo ($status == 0) ? "selected" : "" ?> class="capitalize" value="0">delivard</option>
                                    <option <?php echo ($status == 1) ? "selected" : "" ?> class="capitalize" value="1">pending</option>
                                    <option <?php echo ($status == 2) ? "selected" : "" ?> class="capitalize" value="2">deleted</option>
                                </select>
                            </td>

                            <td class="px-6 py-4 relative">
                                <?php
                                echo "<span onmouseout='timehide()' onmouseover='timeshow()'>" . substr($time, 10, 12)  . "<span class='hidden dateHidden transition-all absolute top-0 left-4 z-20 '> " . substr($time, 0, 10) . "</span> </span>";
                                ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-between">
                                    <i class="fa-solid fa-eye hover:border-gray-400 p-2 hover:bg-blue-400 rounded-full hover:text-white transition-all cursor-pointer"></i>
                                    <i class="fa-solid fa-check rounded-full hover:text-white hover:border-gray-400 p-2 hover:bg-green-400 transition-all cursor-pointer"></i>
                                </div>
                            </td>
                        </tr>

                </tbody>
            </table>
        </div>
        <script>
            function timeshow() {
                const dateHidden = document.querySelector(".dateHidden");
                dateHidden.classList.remove("hidden");
            }

            function timehide() {
                const dateHidden = document.querySelector(".dateHidden");
                dateHidden.classList.add("hidden");
            }
        </script>
<?php
                    }
                } else {
                    echo "<h2 class='capitalize font-bold text-center text-2xl dark:text-white'>no product found</h2>";
                    echo "<img src='../upload/icon/no product found.webp'/>";
                }
            } else {
                echo "<h2 class='capitalize font-bold text-center text-2xl dark:text-white'>Someting Want wrong</h2>";
            }

            include "footer.php";
