<?php 

include "../header.php";
include "../../database/database.php";
$databaseFN = new database();

if(isset($_GET['error']) && $_GET['error'] == 'dbdfalse'){
    echo '<p class="text-center bg-red-500 text-white">Database Data not delete</p>';
}
?>

<div class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class=" sm:flex my-2 block justify-between">
            <h1 class="text-2xl font-bold mb-4">Product Categories</h1>
            <a href="<?php echo $databaseFN->mainUrl ."/admin/category/add.php" ?>" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-indigo-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                <span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"></span>
                <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>
                <span class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>
                <span class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Add Category</span>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">ID</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Category Name</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Description</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">User Auth</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Category Qty</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $databaseFN->getData("productCatagory", "productCatagory.id, productCatagory.categoryName, productCatagory.categoryDescription, productCatagory.categoryQty, users.name ", " users ON productcatagory.userAuth = users.userRoll");
                    foreach ($databaseFN->getResult() as list("id"=>$id, "categoryName"=>$categoryName,"categoryDescription"=>$Description,"name"=>$name,  "categoryQty"=>$categoryQty)) {
                        # code...
                   
                    ?>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300"><?php echo $id ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?php echo $categoryName ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?php echo $Description ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?php echo $name ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?php echo $categoryQty ?></td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <a href="<?php echo $databaseFN->mainUrl . "/admin/category/edit.php?id=".$id ?>" class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</a>
                            <a href="<?php echo $databaseFN->mainUrl . "/admin/category/delete.php?id=".$id ?>" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../footer.php"; ?>