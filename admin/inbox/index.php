<?php
ob_start();
include "../header.php";
$unqueId = $_SESSION['uniqueId'];
$valuesPerPage = 5;
$active = "bg-gray-100 dark:bg-gray-800";

// See comment and send data in databse
if (isset($_POST['seenComment'])) {
    $tapProductId = htmlentities($_POST['tapProductId'], ENT_QUOTES);
    $unseenCommentId = htmlentities($_POST['unseenCommentId'], ENT_QUOTES);
    $exploadUnseenCommentId = explode(",", $unseenCommentId);

    $seenOk = false;
    if ($unseenCommentId == '') {
        $seenOk = true;
    } else {
        for ($see = 0; $see < count($exploadUnseenCommentId); $see++) {
            $changeUniqueId = $unqueId . ",";
            $addedSeenId = ['commentSeenId' => "'$changeUniqueId'"];
            if ($databaseFN->concatData('usercomment', $addedSeenId, " id = $exploadUnseenCommentId[$see]")) {
                $seenOk = true;
            } else {
                $seenOk = false;
            }
        }
    }

    if ($seenOk) {
        header("Location: " . $databaseFN->mainUrl . "/view.php?id=" . $tapProductId);
    } else {
        echo "<p id='message' class='text-white text-center bg-red-500'>Someting want wrong</p>";
    }
}

$allId = array();
$unseenId = array();
$seenId = array();
$searchTrue = false;

// Search Value
if (isset($_GET['search'])) {
    $searchTrue = true;
    $search = $_GET['search'];
    if ($databaseFN->searchData("productdetails", "*", "productName", $search)) {
        foreach ($databaseFN->getResult() as list("id" => $postId)) {
            if ($databaseFN->getData("usercomment", "*", null, " postId = $postId", null, 1)) {
                $commentTableData = $databaseFN->getResult();
                if (count($commentTableData) > 0) {
                    $pushArr = ['postId' => $postId];
                    array_push($allId, $pushArr);
                } else {
                    continue;
                }
            }
        }
    } else {
        echo "someting want wrong Search";
    }
}

// Comment All Data Fetch
if ($searchTrue == false) {
    if ($databaseFN->getData("usercomment", "*", null, null, " id DESC")) {
        $result = $databaseFN->getResult();
        foreach ($result as list("id" => $id, "postId" => $postId, "commentSeenId" => $commentSeenId)) {
            $pushArr = ['postId' => $postId, 'commentId' => $id];
            if (is_null($commentSeenId) || strpos($commentSeenId, $unqueId) === false) {
                array_push($unseenId, $pushArr);
            }
            if (!is_null($commentSeenId) && strpos($commentSeenId, $unqueId) !== false) {
                array_push($seenId, $pushArr);
            }
            array_push($allId, $pushArr);
        }
    } else {
        echo "someting want wrong";
    }
}

$showValue = $allId;
if (isset($_GET['msg']) && $_GET['msg'] == 'seen') {
    $showValue = $seenId;
}
if (isset($_GET['msg']) && $_GET['msg'] == 'unseen') {
    $showValue = $unseenId;
}
$checkUniquePostIds = array_unique(array_column($showValue, 'postId'));

function getCommentData($id)
{
    $databaseFN = new database();
    if ($databaseFN->getData("usercomment", "*", null, " postId = $id")) {
        $data = $databaseFN->getResult();
        return $data;
    }
}


?>
<!-- component -->
<section class="container px-4 mx-auto">
    <div class="mt-6 md:flex md:items-center md:justify-between">
        <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <a class="<?php echo (empty($_GET['msg'])) ? $active : '' ?> px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100" href="<?php echo basename($_SERVER['PHP_SELF']) ?>">View All</a>
            <a class="<?php echo (isset($_GET['msg']) && $_GET['msg'] == 'unseen') ? $active : '' ?> px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100" href="<?php echo basename($_SERVER['PHP_SELF']) . "?msg=unseen" ?>">Unseen</a>
            <a class="<?php echo (isset($_GET['msg']) && $_GET['msg'] == 'seen') ? $active : '' ?> px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100" href="<?php echo basename($_SERVER['PHP_SELF']) . "?msg=seen" ?>">Seen</a>
        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <form action="" method="get">
                <input type="text" name="search" placeholder="Search Product Name" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </form>
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    ID
                                </th>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Product </span>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Image
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Comment
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Users</th>


                                <th scope="col" class="relative py-3.5 px-4 dark:text-gray-400">
                                    <span class="">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <?php
                            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $totalPages = ceil(count($checkUniquePostIds) / $valuesPerPage);
                            if ($currentPage < 1) {
                                $currentPage = 1;
                            } elseif ($currentPage > $totalPages) {
                                $currentPage = $totalPages;
                            }
                            $startIndex = ($currentPage - 1) * $valuesPerPage;
                            $currentPageValues = array_slice($checkUniquePostIds, $startIndex, $valuesPerPage);

                            foreach ($currentPageValues as $checkUniquePostId) {
                                if ($databaseFN->getData("productdetails", "id, productName, productDescription, productImages", null, " id = $checkUniquePostId")) {
                                    foreach ($databaseFN->getResult() as list("id" => $productId, "productName" => $productName, "productDescription" => $productDescription, "productImages" => $productImages)) {
                                        $singleImgName =  explode(",", $productImages);
                                        $Commentdata = getCommentData($productId);
                                        $unseenComment = array();

                                        foreach ($Commentdata as list("id" => $commentid, "name" => $commentorName, "comment" => $comment, "commentSeenId" => $commentSeenId)) {
                                            if (is_null($commentSeenId) || strpos($commentSeenId, $unqueId) === false) {
                                                array_push($unseenComment, $commentid);
                                            }
                                        }

                            ?>
                                        <tr class="<?php echo (count($unseenComment) <= 0) ? 'opacity-50 mt-5' : 'shadow-md shadow-blue-500/50 opacity-100 mt-5' ?>">
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    <?php echo "P=" . $productId ?>
                                                </div>
                                            </td>
                                            <!-- Product Name & Description -->
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">
                                                        <?php echo (str_word_count($productName) < 5) ? $productName : $otherFN->strSort($productName, 5)  . " ..." ?>
                                                    </h2>
                                                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                        <?php echo (str_word_count($productDescription) < 5) ? $productDescription : $otherFN->strSort($productDescription, 5)  . " ..." ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <!-- Product Image -->
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                <img src="<?php echo $databaseFN->mainUrl . "/upload/product/" . $singleImgName[0]   ?>" class="w-[45px] h-[40px] " alt="<?php echo $singleImgName[0] ?>">
                                            </td>
                                            <!-- Commentor Name & Comment -->
                                            <td class="px-4 py-4 text-sm whitespace-nowrap ">
                                                <div class="">
                                                    <h4 class="text-gray-700 dark:text-gray-200">
                                                        <?php echo (str_word_count($commentorName) < 5) ? $commentorName : $otherFN->strSort($commentorName, 5)  . " ..."
                                                        ?>
                                                        <?php echo (count($unseenComment) <= 0) ? "" : "<sup class='inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800'>" . count($unseenComment) . "</sup>";
                                                        ?>
                                                    </h4>
                                                    <p class="text-gray-500 dark:text-gray-400">
                                                        <?php echo (str_word_count($comment) < 7) ? $comment : $otherFN->strSort($comment, 7)  . " ..."
                                                        ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <!-- All Commentor Show -->
                                            <td class="px-4 mx-10 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <?php
                                                    $allCountVal = count($Commentdata);
                                                    if ($allCountVal < 5) {
                                                        for ($image = 0; $image < $allCountVal; $image++) {
                                                            echo "<img class='object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0' src='https://picsum.photos/200/300?random=" . rand(1, 10) . "' alt=''>";
                                                        }
                                                    } else {
                                                        for ($images = 0; $images < 4; $images++) {
                                                            echo "<img class='object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0' src='https://picsum.photos/200/300?random=" . rand(10, 20) . "' alt=''>";
                                                        }
                                                        echo "<p class='flex items-center justify-center w-6 h-6 -mx-1 text-xs text-blue-600 bg-blue-100 border-2 border-white rounded-full'>+" . $allCountVal - 4 . "</p> ";
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <!-- Submit Button -->
                                            <td class="px-4 py-4 text-sm whitespace-nowrap ml-5 text-right">
                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                                    <input type="text" hidden name="tapProductId" value="<?php echo $productId ?>">
                                                    <input type="text" hidden name="unseenCommentId" value="<?php echo implode(",", $unseenComment) ?>">
                                                    <button name="seenComment" type="submit"><i class="fa-solid fa-eye dark:text-white hover:text-green-400 text-[1rem] cursor-pointer"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo "someting want wrong";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Page <span class="font-medium text-gray-700 dark:text-gray-100"> <?php echo (isset($_GET['page'])) ? $_GET['page'] : 1;
                                                                                echo " of " . count($checkUniquePostIds); ?></span>
        </div>

        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            <!-- Pagination -->
            <div class="text-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm">
                        <?php
                        $getTotalPage = $totalPages;
                        $currentPath = basename($_SERVER['PHP_SELF']) . "?";

                        if (isset($_GET['msg'])) {
                            $currentPath = basename($_SERVER['PHP_SELF']) . "?msg=" . $_GET['msg'] . "&";
                        }

                        if (isset($_GET['page'])) {
                            $page = intval($_GET['page']);
                        } else {
                            $page = 1;
                        }

                        if ($page > 1) {
                            $prev = $page - 1;
                            echo "<li><a href='" . $currentPath . "page=$prev'class='flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>Previous</a></li>";
                        }
                        for ($paginationLoop = 1; $paginationLoop <= $getTotalPage; $paginationLoop++) {
                            $active = ($paginationLoop == $page) ? "bg-indigo-500 text-white dark:bg-blue-500 dark:text-white" : "";
                            echo "<li ><a href='" . $currentPath . "page=$paginationLoop' class='$active  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>$paginationLoop</a></li>";
                        }
                        if ($page < $getTotalPage) {
                            $next = $page + 1;
                            echo "<li><a href='" . $currentPath . "page=$next' class='flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>Next</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- Pagination -->
        </div>
    </div>
</section>
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
include "../footer.php";
?>