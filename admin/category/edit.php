<?php
ob_start();
include "../header.php";
include "../../database/database.php";
$databaseFN = new database();

if (isset($_POST['submit'])) {
    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $id = $_POST['id'];
    $updateCategoryData = ["categoryName" => $categoryName, "categoryDescription" => $categoryDescription];
    if ($databaseFN->updateData("productCatagory", $updateCategoryData, "id=$id")) {
        header("Location: " . $databaseFN->mainUrl . "/admin/category");
        exit();
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/category/edit.php?id=$id&error=dbupfalse");
        exit();
    }
}
ob_end_flush();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $databaseFN->getData("productCatagory", "*", null, "id=$id");
    foreach ($databaseFN->getResult() as list("categoryName" => $categoryName, "categoryDescription" => $categoryDescription)) {

        if (isset($_GET['error']) && $_GET['error'] == 'dbupfalse') {
            echo "<p class='text-white bg-red-600 text-center'>Database data insert Problem</p>";
        }
?>

        <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Category</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="space-y-6">
                <input hidden type="text" id="id" value="<?php echo $id ?>" name="id" class="w-full p-3 border border-gray-300 rounded-lg">
                <div>
                    <label for="categoryName" class="block text-gray-700 font-semibold mb-2">Category Name</label>
                    <input type="text" id="categoryName" value="<?php echo $categoryName ?>" name="categoryName" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="categoryDescription" class="block text-gray-700 font-semibold mb-2">Category Description</label>
                    <input type="text" id="categoryDescription" value="<?php echo $categoryDescription ?>" name="categoryDescription" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <button type="submit" name="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600">Submit Category</button>
                </div>
            </form>
        </div>

<?php
    }
}
include "../footer.php";
?>