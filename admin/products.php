<?php
include "header.php";

?>

<!-- component -->
<div class="sm:px-3 w-full">
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == 'dbfalse') {
        echo "Database insert Problem";
    }
    if (isset($_GET['msg']) && $_GET['msg'] == 'filefalse') {
        echo "File delete Failed";
    }
    ?>
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 dark:text-white">Tasks</p>
            <div class="py-3 px-4 flex items-center text-sm font-medium leading-none text-gray-600 bg-gray-200 hover:bg-gray-300 cursor-pointer rounded">
                <p>Sort By:</p>
                <select aria-label="select" class="focus:text-indigo-600 focus:outline-none bg-transparent ml-1">
                    <option class="text-sm text-indigo-800">Latest</option>
                    <option class="text-sm text-indigo-800">Oldest</option>
                    <option class="text-sm text-indigo-800">Latest</option>
                </select>
            </div>
        </div>
    </div>
    <div class="bg-white py-4 md:py-4 px-4 md:px-4 xl:px-5 dark:bg-gray-800">
        <div class="sm:flex sm:flex-wrap items-center justify-between">
           
            <a href="<?php echo $databaseFN->mainUrl . "/admin/product?msg=add" ?>" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Add Product</p>
            </a>
        </div>
        <div class="mt-7 overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tbody>
                    <?php
                    if ($databaseFN->getData("productdetails", "productdetails.id, productdetails.releaseDate, productdetails.productName, users.name, productcatagory.categoryName, productdetails.productQty, productdetails.deliveryComplete", null, null, " id DESC", "5", " productcatagory ON productdetails.category = productcatagory.id LEFT JOIN users ON productdetails.uniqueId = users.uniqueId")) {
                        foreach ($databaseFN->getResult() as list('releaseDate' => $releaseDate, 'id' => $id, 'productName' => $productName, 'name' => $name, "categoryName" => $categoryName,  'productQty' => $productQty, 'deliveryComplete' => $deliveryComplete)) {
                    ?>
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded relative">
                                <td>
                                    <div class="ml-5">
                                        <div class="bg-gray-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">
                                            <input placeholder="checkbox" type="checkbox" class="focus:opacity-100 checkbox opacity-0 absolute cursor-pointer w-full h-full" />
                                            <div class="check-icon hidden bg-indigo-700 text-white rounded-sm">
                                                <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <!-- This Product product Name -->
                                        <a class="text-base font-medium leading-none text-gray-700 mr-2" href="<?php echo $databaseFN->mainUrl . "/admin/product?msg=view&id=" . $id ?>">
                                            <?php echo substr(html_entity_decode($productName), 0, 25); ?> ...
                                        </a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M6.66669 9.33342C6.88394 9.55515 7.14325 9.73131 7.42944 9.85156C7.71562 9.97182 8.02293 10.0338 8.33335 10.0338C8.64378 10.0338 8.95108 9.97182 9.23727 9.85156C9.52345 9.73131 9.78277 9.55515 10 9.33342L12.6667 6.66676C13.1087 6.22473 13.357 5.62521 13.357 5.00009C13.357 4.37497 13.1087 3.77545 12.6667 3.33342C12.2247 2.89139 11.6251 2.64307 11 2.64307C10.3749 2.64307 9.77538 2.89139 9.33335 3.33342L9.00002 3.66676" stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.33336 6.66665C9.11611 6.44492 8.8568 6.26876 8.57061 6.14851C8.28442 6.02825 7.97712 5.96631 7.66669 5.96631C7.35627 5.96631 7.04897 6.02825 6.76278 6.14851C6.47659 6.26876 6.21728 6.44492 6.00003 6.66665L3.33336 9.33332C2.89133 9.77534 2.64301 10.3749 2.64301 11C2.64301 11.6251 2.89133 12.2246 3.33336 12.6666C3.77539 13.1087 4.37491 13.357 5.00003 13.357C5.62515 13.357 6.22467 13.1087 6.66669 12.6666L7.00003 12.3333" stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <!-- That Product product Name -->
                                    </div>
                                </td>
                                <td class="pl-4">
                                    <!-- This Product Category Name -->
                                    <p class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"> <?php echo (html_entity_decode($categoryName)) ? html_entity_decode($categoryName) : "Uncategory" ; ?> </p>
                                    <!-- That Product Category Name -->
                                </td>
                               
                                <td class="pl-5">
                                    <!-- Qty This Product -->
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M7.5 5H16.6667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.5 10H16.6667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.5 15H16.6667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.16669 5V5.00667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.16669 10V10.0067" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.16669 15V15.0067" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-sm leading-none text-gray-600 ml-2"><?php echo $productQty . "/" . $deliveryComplete ?></p>
                                    </div>
                                    <!-- Qty That Product -->
                                </td>
                                <td class="pl-5">
                                    <!-- Comment This Product -->
                                    <a href="<?php echo $databaseFN->mainUrl . "/admin/product/?msg=view&id=" . $id . "#comment" ?>">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M3.33331 17.4998V6.6665C3.33331 6.00346 3.59671 5.36758 4.06555 4.89874C4.53439 4.4299 5.17027 4.1665 5.83331 4.1665H14.1666C14.8297 4.1665 15.4656 4.4299 15.9344 4.89874C16.4033 5.36758 16.6666 6.00346 16.6666 6.6665V11.6665C16.6666 12.3295 16.4033 12.9654 15.9344 13.4343C15.4656 13.9031 14.8297 14.1665 14.1666 14.1665H6.66665L3.33331 17.4998Z" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10 9.1665V9.17484" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M6.66669 9.1665V9.17484" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M13.3333 9.1665V9.17484" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <?php
                                            if ($databaseFN->getData("usercomment", "*", null, " postId = $id")) {
                                                echo "<p class='text-sm leading-none text-gray-600 ml-2'>" . count($databaseFN->getResult()) . "</p>";
                                            }
                                            ?>
                                        </div>
                                    </a>
                                    <!-- Comment That Product -->
                                </td>
                                <td class="pl-5">
                                    <!-- Parmalink This Product -->
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M12.5 5.83339L7.08333 11.2501C6.75181 11.5816 6.56556 12.0312 6.56556 12.5001C6.56556 12.9689 6.75181 13.4185 7.08333 13.7501C7.41485 14.0816 7.86449 14.2678 8.33333 14.2678C8.80217 14.2678 9.25181 14.0816 9.58333 13.7501L15 8.33339C15.663 7.67034 16.0355 6.77107 16.0355 5.83339C16.0355 4.8957 15.663 3.99643 15 3.33339C14.337 2.67034 13.4377 2.29785 12.5 2.29785C11.5623 2.29785 10.663 2.67034 10 3.33339L4.58333 8.75005C3.58877 9.74461 3.03003 11.0935 3.03003 12.5001C3.03003 13.9066 3.58877 15.2555 4.58333 16.2501C5.57789 17.2446 6.92681 17.8034 8.33333 17.8034C9.73985 17.8034 11.0888 17.2446 12.0833 16.2501L17.5 10.8334" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-sm leading-none text-gray-600 ml-2">04/07</p>
                                    </div>
                                    <!-- Parmalink That Product -->
                                </td>
                                <td class="pl-5">
                                    <!-- Release Date This Product-->
                                    <button class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">Release Date <?php echo substr($releaseDate, 0, 10); ?></button>
                                    <!-- Release Date That Product-->
                                </td>
                                <td class="pl-4">
                                    <p class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"><?php echo $name; ?></p>
                                </td>
                                <td>
                                    <div class="px-5 pt-2 relative">
                                        <button class="focus:ring-2 rounded-md focus:outline-none" onclick="dropdownFunction(this)" role="button" aria-label="option">
                                            <i class="fa-solid fa-bars-staggered dropbtn"></i>
                                        </button>
                                        <div class="dropdownContent bg-white shadow w-24 hidden z-30 right-0 top-[3.2rem] absolute">
                                            <div class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <a href="<?php echo $databaseFN->mainUrl . "/admin/product?msg=view&id=" . $id ?>">View</a>
                                            </div>
                                            <div class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <a href="<?php echo $databaseFN->mainUrl . "/admin/product?msg=edit&id=" . $id ?>">Edit</a>
                                            </div>
                                            <div class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <a href="<?php echo $databaseFN->mainUrl . "/admin/product?msg=delete&id=" . $id ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="h-3"></tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- pagination -->
        <div class="text-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm">

                    <?php
                    $getTotalPage = $databaseFN->pagination("productdetails", null, null, 5);
                    $currentPath = basename($_SERVER['PHP_SELF']);
                    if (isset($_GET['page'])) {
                        $page = intval($_GET['page']);
                    } else {
                        $page = 1;
                    }

                    if ($page > 1) {
                        $prev = $page - 1;
                        echo "<li><a href='$currentPath?page=$prev'class='flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>Previous</a></li>";
                    }
                    for ($i = 1; $i <= $getTotalPage; $i++) {
                        $active = ($i == $page) ? "bg-indigo-500 text-white" : "";
                        echo "<li><a href='$currentPath?page=$i' class='$active  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>$i</a></li>";
                    }
                    if ($page < $getTotalPage) {
                        $next = $page + 1;
                        echo "<li><a href='$currentPath?page=$next' class='flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>Next</a></li>";
                    }
                    ?>

                </ul>
            </nav>
        </div>
        <!-- pagination -->
    </div>
</div>
<style>
    .checkbox:checked+.check-icon {
        display: flex;
    }
</style>
<script src="js/products.js"></script>
<?php include "footer.php"; ?>