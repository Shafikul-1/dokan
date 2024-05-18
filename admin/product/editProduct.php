<?php
ob_start();
session_start();

function editProduct($id)
{
    include "../header.php";
    include "../../database/upload.php";
    $databaseFN = new database();
    if ($databaseFN->getData("productdetails", "*", null, "id=$id")) {
        if (isset($_POST['submit'])) {
            $productName = $_POST['productName'];
            $productDescription = htmlentities($_POST['productDescription']);
            $productColor = $_POST['productColor'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $tax = $_POST['tax'];
            $weight = $_POST['weight'];
            $brand = $_POST['brand'];
            $shippingClass = $_POST['shippingClass'];
            $warranty = $_POST['warranty'];
            $customFields = $_POST['customFields'];
            $complianceInfo = $_POST['complianceInfo'];
            $metaTitle = $_POST['metaTitle'];
            $metaDescription = $_POST['metaDescription'];
            $keywords = $_POST['keywords'];

            $productInfo = ['productName' => $productName, 'productDescription' => $productDescription, 'productColor' => $productColor, 'category' => $category, 'price' => $price, 'discount' => $discount, 'tax' => $tax, 'weight' => $weight, 'brand' => $brand, 'shippingClass' => $shippingClass, 'warranty' => $warranty, 'customFields' => $customFields, 'complianceInfo' => $complianceInfo, 'metaTitle' => $metaTitle, 'metaDescription' => $metaDescription, 'keywords' => $keywords];

            if ($databaseFN->updateData("productdetails", $productInfo, "id = $id")) {
                $categoryId = $category;
                $decrementOrIncrement = ['categoryQty' => 1];
                if ($databaseFN->incrementOrDecrement("productcatagory", $decrementOrIncrement, "id = $categoryId", "+")) {
                    foreach ($databaseFN->getResult() as list('category' => $category)) {
                        if ($databaseFN->incrementOrDecrement("productcatagory", $decrementOrIncrement, "id = $category", "-")) {
                            header("Location: " . $databaseFN->mainUrl . "/admin/products.php");
                            exit();
                        } else {
                            header("Location: " . $databaseFN->mainUrl . "/admin/product/?msg=edit&id=$id?error=dbupfailed");
                            exit();
                        }
                    }
                } else {
                    header("Location: " . $databaseFN->mainUrl . "/admin/product/?msg=edit&id=$id?error=dbupfailed");
                    exit();
                }
            } else {
                header("Location: " . $databaseFN->mainUrl . "/admin/product/?msg=edit&id=$id?error=dbupfailed");
                exit();
            }
        }
        ob_end_flush();

        foreach ($databaseFN->getResult() as list('productName' => $productName, 'productDescription' => $productDescription, 'productColor' => $productColor, 'category' => $category, 'price' => $price, 'discount' => $discount, 'tax' => $tax, 'weight' => $weight, 'brand' => $brand, 'shippingClass' => $shippingClass, 'warranty' => $warranty, 'customFields' => $customFields, 'releaseDate' => $releaseDate, 'complianceInfo' => $complianceInfo, 'metaTitle' => $metaTitle, 'metaDescription' => $metaDescription, 'keywords' => $keywords, "userAuth" => $userAuth)) {
            if (isset($_GET['error']) && $_GET['error'] == 'dbupfailed') {
                echo '<p class="text-white bg-red-500 text-center">Database Update Problem</p>';
            }
?>

            <style>
                .input-border-animated:focus {
                    border-width: 1.5px;
                    animation: border-color-animation 2s infinite;
                }

                @keyframes border-color-animation {
                    0% {
                        border-color: red;
                    }

                    25% {
                        border-color: blue;
                    }

                    50% {
                        border-color: yellow;
                    }

                    75% {
                        border-color: purple;
                    }

                    100% {
                        border-color: green;
                    }
                }
            </style>
            <div class="bg-gray-100 p-4">
                <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold mb-6">Add New Product</h1>
                    <form id="productForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-1">
                                <label for="productName" class="block text-sm font-medium text-gray-700">Product Name*</label>
                                <input type="text" value="<?php echo $productName ?>" id="productName" name="productName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                            </div>
                            <div class="col-span-1">
                                <label for="productDescription" class="block text-sm font-medium text-gray-700">Product Description*</label>
                                <textarea id="productDescription" name="productDescription" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required><?php echo $productDescription ?></textarea>
                            </div>
                            <div class="col-span-1">
                                <label for="productColor" class="block text-sm font-medium text-gray-700">Product Color*</label>
                                <input type="color" id="productColor" value="<?php echo $productColor ?>" name="productColor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                            </div>
                            <div class="col-span-1">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category*</label>
                                <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                                    <?php
                                    if ($databaseFN->getData("productCatagory")) {
                                        foreach ($databaseFN->getResult() as list("categoryName" => $categoryName, "id" => $id)) {
                                            echo "<option value=" . $id . ">$categoryName</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price*</label>
                                <input type="number" id="price" value="<?php echo $price ?>" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                            </div>
                            <div class="col-span-1">
                                <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                                <input type="text" id="discount" value="<?php echo $discount ?>" name="discount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="tax" class="block text-sm font-medium text-gray-700">Tax</label>
                                <input type="text" id="tax" value="<?php echo $tax ?>" name="tax" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                <input type="text" id="weight" value="<?php echo $weight ?>" name="weight" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                <input type="text" id="brand" value="<?php echo $brand ?>" name="brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="shippingClass" class="block text-sm font-medium text-gray-700">Shipping Class</label>
                                <input type="text" id="shippingClass" value="<?php echo $shippingClass ?>" name="shippingClass" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="warranty" class="block text-sm font-medium text-gray-700">Warranty</label>
                                <input type="text" id="warranty" value="<?php echo $warranty ?>" name="warranty" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="customFields" class="block text-sm font-medium text-gray-700">Custom Fields</label>
                                <input type="text" id="customFields" value="<?php echo $customFields ?>" name="customFields" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="complianceInfo" class="block text-sm font-medium text-gray-700">Compliance Information</label>
                                <input type="text" id="complianceInfo" value="<?php echo $complianceInfo ?>" name="complianceInfo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                                <input type="text" id="metaTitle" value="<?php echo $metaTitle ?>" name="metaTitle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                            <div class="col-span-1">
                                <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta Description</label>
                                <textarea id="metaDescription" name="metaDescription" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated"><?php echo $metaDescription ?></textarea>
                            </div>
                            <div class="col-span-1">
                                <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
                                <input type="text" id="keywords" value="<?php echo $keywords ?>" name="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" name="submit" id="submitBtn" class="w-full py-2 px-4 text-white bg-fuchsia-500 font-semibold rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

<?php
        }
    } else {
        # code...
    }
}
include "../footer.php";
?>