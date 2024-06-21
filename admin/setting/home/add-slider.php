<?php
include "../../header.php";
if (isset($_POST['submit'])) {
    $where_slider = htmlentities($_POST['where_slider'], ENT_QUOTES);
    $heading = htmlentities($_POST['heading'], ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);

    $fileUploadComplete = false;
    // print_r($_POST);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        include "../../../database/upload.php";
        $fileObj = new upload();
        $fileObj->uploadFile($_FILES['image']);
        // $fileResult = $fileObj->getFileResult();
        // if (isset($fileResult['fileName']) && !empty($fileResult['fileName'])) {
        //     $img = $fileResult['fileName'];
        //     $fileUploadComplete = true;
        // } else {
        //     $fileUploadComplete = false;
        //     foreach ($fileResult as $errorResult) {
        //         echo "<b>Error -> </b>" . $errorResult . "<br>";
        //     }
        // }
        print_r($fileResult);


    }



    // $sliderArr = ['where_slider' => $where_slider, 'image' => $image, 'heading' => $heading, 'description' => $description];

    // if ($databaseFN->insertData('slider', $sliderArr)) {
    //     //    header("Location: " . basename($_SERVER['PHP_SELF']));
    // } else {
    //     echo "<p id='message' class='text-white text-center bg-red-500'>Comment Insert Failed</p>";
    // }
}
?>
<div class="flex justify-center mt-20 px-8">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="max-w-2xl">
        <div class="flex flex-wrap border shadow rounded-lg p-3 dark:bg-gray-600">
            <h2 class="text-xl text-gray-600 dark:text-gray-300 pb-2">Account settings:</h2>

            <input type="text" value="home top" name="where_slider" hidden id="">

            <div class="flex flex-col gap-2 w-full border-gray-400">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">slider image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" id="file_input" type="file">
                </div>

                <div>
                    <label class="text-gray-600 dark:text-gray-400">slider header </label>
                    <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100" name="heading" type="text">
                </div>
                <div>
                    <label class="text-gray-600 dark:text-gray-400">slider description</label>
                    <textarea class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100" name="description"></textarea>
                </div>
                <div class="flex justify-end">
                    <button class="py-1.5 px-3 m-1 text-center bg-violet-700 border rounded-md text-white  hover:bg-violet-500 hover:text-gray-100 dark:text-gray-200 dark:bg-violet-700" name="submit" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
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
<?php include "../../footer.php"; ?>