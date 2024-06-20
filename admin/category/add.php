<?php 
ob_start();
include "../header.php";

if(isset($_POST['submit'])){
    $categoryName = htmlentities($_POST['categoryName'], ENT_QUOTES );
    $userAuth = htmlentities($_POST['userAuth'], ENT_QUOTES );
    $uniqueId = htmlentities($_POST['uniqueId'], ENT_QUOTES );
    $categoryDescription = htmlentities($_POST['categoryDescription'], ENT_QUOTES );

    $categoryInfo = ['uniqueId'=>$uniqueId, 'categoryName'=>$categoryName,  'userAuth'=>$userAuth, 'categoryDescription'=>$categoryDescription, 'categoryQty'=>$categoryQty];
    if ($databaseFN->insertData("productCatagory", $categoryInfo)) {
       header("Location: " . $databaseFN->mainUrl . "/admin/category");
       exit();
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/category/add.php?error=dbfalse");
        exit();
    }
}
ob_end_flush();
if(isset($_GET['error'])){
    echo '<p class="text-white bg-red-600"> Database Data Not sent</p>';
}
?>

<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Category</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="space-y-6">
        <div>
            <label for="categoryName" class="block text-gray-700 font-semibold mb-2">Category Name</label>
            <input type="text" id="categoryName" name="categoryName" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>
        <div>
            <label for="categoryDescription" class="block text-gray-700 font-semibold mb-2">Category Description</label>
            <input type="text" id="categoryDescription" name="categoryDescription" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>
        <div class="hidden">
            <label for="userAuth" class="block text-gray-700 font-semibold mb-2">User Auth</label>
            <input  type="number" id="userAuth" value="<?php echo $_SESSION['userAuth'] ?>" name="userAuth" class="w-full p-3 border border-gray-300 rounded-lg" required>
        </div>
        <input  type="text" id="uniqueId" hidden  value="<?php echo $_SESSION['uniqueId'] ?>" name="uniqueId" class="w-full p-3 border border-gray-300 rounded-lg" required>
        <input type="number" hidden name="categoryQty" id="categoryQty">
        <div>
            <button type="submit" name="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600">Add Category</button>
        </div>
    </form>
</div>

<?php 
include "../footer.php";
?>