<?php
include "header.php";

if (isset($_POST['submit'])) {
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $img = htmlentities($_POST['img'], ENT_QUOTES);
    // $pass = md5($_POST['pass']);
    // $conPass = md5($_POST['conPass']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $conPass = password_hash($_POST['conPass'], PASSWORD_DEFAULT);
    $date = htmlentities($_POST['date'], ENT_QUOTES);
    $userComment = htmlentities($_POST['userComment'], ENT_QUOTES);
    $userRoll = htmlentities($_POST['userRoll'], ENT_QUOTES);
    $uniqueId = $otherFN->uniqueIdCreate();

    $formData = ["name" => $name, "email" => $email, "pass" => $pass, "conPass" => $conPass, "date" => $date, "userComment" => $userComment, "userRoll" => $userRoll, "uniqueId" => $uniqueId];
    if ($databaseFN->getData("users", "email", null, " email = '$email'")) {
        $dbresult = $databaseFN->getResult();
        if (count($dbresult) > 0) {
            echo "<p id='message' class='font-bold text-white bg-red-800 py-2 text-center'>Email Already Exist</p>";
        } else {
            if ($databaseFN->insertData("users", $formData)) {
                echo "<p id='message' class='text-black bg-green-500 text-center'>User Insert Successful</p>";
            } else {
                echo "<p id='message' class='text-white text-center bg-red-500'>User Insert Failed</p>";
            }
        }
    }
}
if (isset($_GET['fmsg']) == "error") {
    echo "<b style='background:red;color:white; padding:5px;'>File Delete Failed</b>";
}
if (isset($_GET['dmsg']) == "error") {
    echo "<b style='background:red;color:white; padding:5px;'>Database Data Delete Failed</b>";
}
?>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <!-- user toggle BTn -->
        <div>
            <button onclick="actionBTN()" id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="CDuserShow z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                </div>
            </div>
        </div>
        <!-- user toggle BTn -->

        <!-- user Time View toggle BTn -->
        <div class="relative">
            <button onclick="timeUserView()" id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                </svg>
                Last 30 days
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownRadio" class="timeAll z-10 absolute top-[2.2rem] hidden left-0 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- user Time View toggle BTn -->

        <!-- User Add Button -->
        <div>
            <div class="flex items-center justify-center w-full h-full button">
                <button onclick="userAddFormShow()" class="relative inline-flex items-center justify-start px-6 py-1 border overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                    <span class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                    <span class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Add User</span>
                </button>
            </div>
        </div>
        <!-- User Add Button -->

        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <form method="get">
                <input type="text" name="search" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </form>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Add Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['search'])) {
                $databaseFN->searchData("users", "*", "name", $_GET['search']);
            } else {
                $databaseFN->getData("users", "*", null, null, "id DESC", 5);
            }
            $allUsers = $databaseFN->getResult();
            foreach ($allUsers as list("id" => $id, "name" => $name, "email" => $email, "img" => $img, "date" => $date, "userComment" => $userComment, "userRoll" => $userRoll)) {
            ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="../upload/user/<?php echo ($img == null) ? 'icon/user-defult-icon.png' : $img ?>" alt="<?php echo ($img == null) ? 'user-defult-icon.png' : $img ?>">
                        <div class="ps-3">
                            <div class="text-base font-semibold"><?php echo html_entity_decode($name); ?></div>
                            <div class="font-normal text-gray-500"><?php echo html_entity_decode($email); ?></div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <?php
                        if ($userRoll == 1) {
                            echo "Admin";
                        } else if ($userRoll == 2) {
                            echo "Manager";
                        } else if ($userRoll == 3) {
                            echo "Employee";
                        } else if ($userRoll == 4) {
                            echo "User";
                        }
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <?php echo substr($date, 0, 10); ?>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-between">
                            <a href="<?php echo $databaseFN->mainUrl . '/admin/user?eid=' . $id ?>"><i class="text-[1.2rem] fa-solid fa-pen-to-square hover:text-green-500"></i></a>
                            <a href="<?php echo $databaseFN->mainUrl . '/admin/user?did=' . $id ?>"><i class="text-[1.2rem] fa-solid fa-trash hover:text-red-600"></i></a>
                            <a href="<?php echo $databaseFN->mainUrl . '/admin/user?vid=' . $id ?>"><i class="text-[1.2rem] fa-solid fa-eye hover:text-indigo-500"></i></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="text-center my-4">
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                <?php
                $getTotalPage = $databaseFN->pagination("users", null, null, 5);
                $currentPath = $_SERVER['PHP_SELF'];
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                if ($page > 1) {
                    $prev = $page - 1;
                    echo "<li><a href='$currentPath?page=$prev'class='flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>Previous</a></li>";
                }
                for ($i = 1; $i <= $getTotalPage; $i++) {
                    $active = ($i == $page) ? 'bg-indigo-500 text-white' : '';
                    echo "<li><a href='$currentPath?page=$i' class='$active flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>$i</a></li>";
                }
                if ($page < $getTotalPage) {
                    $next = $page + 1;
                    echo "<li><a href='$currentPath?page=$next' class='flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>Next</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    <!-- Pagination -->
</div>


<!-- User Add Section Start -->
<section class="absolute top-[-69rem] userAddingForm object-left-top  shadow-gray-600 shadow-2xl z-40 max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md  dark:bg-gray-800 mt-20 transition-all">
    <div class="flex justify-between">
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">Provide user Information</h1>
        <i onclick="userAddFormClose()" class="fa-solid fa-x text-2xl cursor-pointer closeAddUserForm" style="color: #ff055d;"></i>
    </div>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return checkForm()">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="name">Full Name</label>
                <input name="name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="email">Email Address</label>
                <input name="email" id="email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="pass">Password</label>
                <input name="pass" id="pass" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="conPass">Password Confirmation</label>
                <input name="conPass" id="conPass" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="userRoll">Select</label>
                <select name="userRoll" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" id="userRoll">
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">Empolyee</option>
                    <option value="4" selected>User</option>
                </select>
            </div>
            <div class="hidden">
                <label class="text-white dark:text-gray-200" for="date">Date</label>
                <input name="date" value="<?php date_default_timezone_set("Asia/Dhaka");
                                            echo date("d-m-Y h:i:s A"); ?>" id="date" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div class="hidden">
                <label class="text-white dark:text-gray-200" for="img">User Image</label>
                <input name="img" value="user-defult-icon.png" id="img" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="userComment">Text Area</label>
                <textarea name="userComment" id="userComment" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <input type="submit" name="submit" value="Save" id="submit" class=" px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md  focus:outline-none focus:bg-blue-600" disabled>
        </div>
    </form>
</section>
<!-- User Add Section End -->
<script src="./js/users.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var messageDiv = document.getElementById('message');
            if (messageDiv) {
                messageDiv.style.display = 'none';
            }
        }, 5000); // 10000 milliseconds = 10 seconds
    });
</script>
<?php include "footer.php"; ?>