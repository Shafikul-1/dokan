<?php
ob_start(); // Start output buffering
function edituser($id)
{
    include "../header.php";
    $data = new database();
    // echo $id."<br>";
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userRoll = $_POST['userRoll'];
        $userComment = $_POST['userComment'];
        $fileUploadComplete = false;

        if (isset($_FILES['newImg'])) {
            include "../../database/upload.php";
            $fileObj = new upload();
            $fileObj->uploadFile($_FILES['newImg']);
            $fileResult = $fileObj->getFileResult();
            if (isset($fileResult['fileName'])) {
                $img = $fileResult['fileName'];
                $fileUploadComplete = true;
            } else {
                $fileUploadComplete = false;
                foreach ($fileResult as $errorResult) {
                    echo "<b>Error -> </b>". $errorResult."<br>";
                }
            }
        } else {
            $img = $_POST['oldImg'];
            $fileUploadComplete = true;
        }
        if (!$fileUploadComplete) {
            echo "<b>Error -> </b> File Upload Not Complete";
        } else {
            $sql = ["name" => $name, "email" => $email, "userRoll" => $userRoll, "userComment" => $userComment, "img" => $img];
            $data->updateData("users",$sql, "id = $id");
            $uploadReslut = $data->getResult();
            // print_r($uploadReslut);
            if ($uploadReslut) {
                ob_end_clean(); // Clear the output buffer before sending headers
                header("Location:" . $data->mainUrl . "/admin/users.php");
                exit;
            } else {
                ob_end_flush(); // Flush the output buffer and send it to the browser
                echo "User Data Update Failed";
            }
            
        }
    }
?>

    <section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-2">
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">Edit Account Information</h1>
        <?php


        $data->getData("users", "name, userComment, userRoll, email, img", null, "id=$id", null, null);
        foreach ($data->getResult() as list("name" => $name, "userComment" => $userComment, "userRoll" => $userRoll, "email" => $email, "img" => $img)) {
            // echo "<li>$name</li><li>$userComment</li><li>$userRoll</li><li>$email</li>";

        ?>
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-white dark:text-gray-200" for="name">Username</label>
                        <input id="name" value="<?php echo $name ?>" name="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200" for="email">Email Address</label>
                        <input id="email" value="<?php echo $email ?>" name="email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-white dark:text-gray-200" for="userRoll">Select</label>
                        <select name="userRoll" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" id="userRoll">
                            <option <?php if ($userRoll == 1) {
                                        echo "selected";
                                    } ?> value="1">Admin</option>
                            <option <?php if ($userRoll == 2) {
                                        echo "selected";
                                    } ?> value="2">Manager</option>
                            <option <?php if ($userRoll == 3) {
                                        echo "selected";
                                    } ?> value="3">Empolyee</option>
                            <option <?php if ($userRoll == 4) {
                                        echo "selected";
                                    } ?> value="4">User</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-white dark:text-gray-200" for="userComment">Text Area</label>
                        <textarea id="userComment" name="userComment" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"><?php echo $userComment ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white">
                            Image
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span class="">Upload a file</span>
                                        <input id="file" name="newImg" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 text-white">or drag and drop</p>
                                </div>
                                <p class="text-xs text-white">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="oldImg" hidden value="<?php echo $img ?>">
                        <input type="text" name="id" hidden value="<?php echo $id ?>">
                        <img id="profileImage" class="w-[5rem]" src="../img/<?php echo $img ?>" alt="">
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <input type="submit" name="submit" value="Save" id="submit" class=" px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md  focus:outline-none focus:bg-blue-600">
                </div>
            </form>
    </section>
<?php
        }
        include "../footer.php";
    }

?>