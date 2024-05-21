<?php
ob_start();
session_start();
include "../header.php";
include "../../database/upload.php";
$uploadFN = new Upload();
$databaseFN = new database();

if (isset($_POST['submit'])) {
    $productName = htmlentities($_POST['productName'], ENT_QUOTES );
    $productDescription = htmlentities($_POST['productDescription'], ENT_QUOTES );
    $productColor = htmlentities($_POST['productColor'], ENT_QUOTES );
    $category = htmlentities($_POST['category'], ENT_QUOTES );
    $price = htmlentities($_POST['price'], ENT_QUOTES );
    $discount = htmlentities($_POST['discount'], ENT_QUOTES );
    $tax = htmlentities($_POST['tax'], ENT_QUOTES );
    $weight = htmlentities($_POST['weight'], ENT_QUOTES );
    $brand = htmlentities($_POST['brand'], ENT_QUOTES );
    $shippingClass = htmlentities($_POST['shippingClass'], ENT_QUOTES );
    $warranty = htmlentities($_POST['warranty'], ENT_QUOTES );
    $customFields = htmlentities($_POST['customFields'], ENT_QUOTES );
    $releaseDate = htmlentities($_POST['releaseDate'], ENT_QUOTES );
    $complianceInfo = htmlentities($_POST['complianceInfo'], ENT_QUOTES );
    $metaTitle = htmlentities($_POST['metaTitle'], ENT_QUOTES );
    $metaDescription = htmlentities($_POST['metaDescription'], ENT_QUOTES );
    $userAuth = htmlentities($_POST['userAuth'], ENT_QUOTES );
    $keywords = htmlentities($_POST['keywords'], ENT_QUOTES );
    $productQty = htmlentities($_POST['productQty'], ENT_QUOTES );
    $productStatus = htmlentities($_POST['productStatus'], ENT_QUOTES );
    $checkImgOrVideo = false;

    if (isset($_FILES['productImages']) && !empty($_FILES['productImages']['name'][0])) {
        if ($uploadFN->multiFileUpload($_FILES['productImages'])) {
            $getFileName = $uploadFN->getFileResult();
            $nameStr = implode(", ", $getFileName['fileNames']);
            $productImages = "$nameStr";
            $checkImgOrVideo = true;
        } else {
            $checkImgOrVideo = false;
        }
    } else {
        $productImages = '';
        $checkImgOrVideo = true;
    }
    if (isset($_FILES['videos']) && !empty($_FILES['videos']['name'][0])) {
        if ($uploadFN->multiFileUpload($_FILES['videos'])) {
            $getFileName = $uploadFN->getFileResult();
            $nameStr = implode(", ", $getFileName['fileNames']);
            $videos = "$nameStr";
            $checkImgOrVideo = true;
        } else {
            $checkImgOrVideo = false;
        }
    } else {
        $videos = '';
        $checkImgOrVideo = true;
    }
    // echo "$productImages <br>$videos ";

    $productInfo = ['productName' => $productName, 'productDescription' => $productDescription, 'productColor' => $productColor, 'category' => $category, 'price' => $price, 'discount' => $discount, 'tax' => $tax, 'weight' => $weight, 'brand' => $brand, 'shippingClass' => $shippingClass, 'warranty' => $warranty, 'customFields' => $customFields, 'releaseDate' => $releaseDate, 'complianceInfo' => $complianceInfo, 'metaTitle' => $metaTitle, 'metaDescription' => $metaDescription, 'keywords' => $keywords, 'productQty' => $productQty, 'productStatus' => $productStatus, 'productImages' => $productImages, 'videos' => $videos, "userAuth" => $userAuth];
    if ($checkImgOrVideo) {
        if ($databaseFN->insertData("productdetails", $productInfo)) {
            // Update the category quantity
            $categoryId = $category; 
            $columnsToIncrement = ['categoryQty' => 1];

            if ($databaseFN->incrementOrDecrement("productcatagory", $columnsToIncrement, "id = $categoryId", "+")) {
                header("Location: " . $databaseFN->mainUrl . "/admin/products.php");
            } else {
                header("Location: " . $databaseFN->mainUrl . "/admin/product/?msg=add&error=dbinfalse");
            }
        } else {
            header("Location: " . $databaseFN->mainUrl . "/admin/product/?msg=add&error=dbinfalse");
            exit();
        }
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/product/?msg=add&error=imgUpFalse");
        exit();
    }
}
ob_end_flush();
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
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'dbinfalse') {
            echo '<p class="bg-red-600 text-white text-center font-bold text-xl">Database Data Not Insert</p>';
        }
        if ($_GET['error'] == 'imgUpFalse') {
            echo '<p class="bg-red-600 text-white text-center font-bold text-xl">Image Upload not Complete</p>';
        }
    }

    ?>

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Add New Product</h1>
        <form id="productForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="productName" class="block text-sm font-medium text-gray-700">Product Name*</label>
                    <input type="text" id="productName" name="productName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                </div>
                <div class="col-span-1">
                    <label for="productDescription" class="block text-sm font-medium text-gray-700">Product Description*</label>
                    <textarea id="productDescription" name="productDescription" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required></textarea>
                </div>
                <div class="col-span-1">
                    <label for="productColor" class="block text-sm font-medium text-gray-700">Product Color*</label>
                    <input type="color" id="productColor" name="productColor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                </div>
                <div class="col-span-1">
                    <label for="productQty" class="block text-sm font-medium text-gray-700">Product Qty*</label>
                    <input type="number" id="productQty" name="productQty" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                </div>
                <div class="col-span-1">
                    <label for="productStatus" class="block text-sm font-medium text-gray-700">Product Status*</label>
                    <select id="productStatus" name="productStatus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                        <option value="No Update">No Update</option>
                        <option value="Urgent">Urgent</option>
                        <option value="Pending">Pending</option>
                        <option value="Done">Done</option>
                        <option value="Shipping">Shipping</option>
                    </select>
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
                    <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                </div>
                <div class="col-span-1">
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                    <input type="text" id="discount" name="discount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="tax" class="block text-sm font-medium text-gray-700">Tax</label>
                    <input type="text" id="tax" name="tax" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                    <input type="text" id="weight" name="weight" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                    <input type="text" id="brand" name="brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="shippingClass" class="block text-sm font-medium text-gray-700">Shipping Class</label>
                    <input type="text" id="shippingClass" name="shippingClass" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="productImages" class="block text-sm font-medium text-gray-700">Product Images</label>
                    <input type="file" id="productImages" name="productImages[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" multiple>
                </div>
                <div class="col-span-1">
                    <label for="videos" class="block text-sm font-medium text-gray-700">Videos</label>
                    <input type="file" id="videos" name="videos[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" multiple>
                </div>
                <div class="col-span-1">
                    <label for="warranty" class="block text-sm font-medium text-gray-700">Warranty</label>
                    <input type="text" id="warranty" name="warranty" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="customFields" class="block text-sm font-medium text-gray-700">Custom Fields</label>
                    <input type="text" id="customFields" name="customFields" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1 hidden">
                    <label for="releaseDate" class="block text-sm font-medium text-gray-700">Release Date</label>
                    <input type="text" value="<?php date_default_timezone_set("Asia/Dhaka");
                                                echo date("d-m-Y h:i:s A"); ?>" id="releaseDate" name="releaseDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="complianceInfo" class="block text-sm font-medium text-gray-700">Compliance Information</label>
                    <input type="text" id="complianceInfo" name="complianceInfo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <input type="text" id="metaTitle" name="metaTitle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta Description</label>
                    <textarea id="metaDescription" name="metaDescription" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated"></textarea>
                </div>
                <div class="col-span-1">
                    <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
                    <input type="text" id="keywords" name="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
            </div>
            <input type="text" hidden value="<?php echo $_SESSION['userAuth'] ?>" id="userAuth" name="userAuth">
            <div class="mt-6">
                <button type="submit" name="submit" id="submitBtn" class="w-full py-2 px-4 text-white font-semibold rounded-md" disabled>Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('productForm');
            const submitBtn = document.getElementById('submitBtn');
            const requiredFields = ['productName', 'productDescription', 'productColor', 'productQty', 'category', 'price', 'productStatus'];

            const checkRequiredFields = () => {
                const allFilled = requiredFields.every(id => document.getElementById(id).value.trim() !== '');
                if (allFilled) {
                    submitBtn.removeAttribute('disabled');
                    submitBtn.classList.remove('bg-red-400');
                    submitBtn.classList.add('bg-green-500');
                    submitBtn.style.cursor = 'pointer';
                } else {
                    submitBtn.setAttribute('disabled', 'true');
                    submitBtn.classList.remove('bg-green-500');
                    submitBtn.classList.add('bg-red-400');
                    submitBtn.style.cursor = 'not-allowed';
                }
            };

            requiredFields.forEach(id => {
                document.getElementById(id).addEventListener('input', checkRequiredFields);
            });

            form.addEventListener('submit', function(e) {
                const allFilled = requiredFields.every(id => document.getElementById(id).value.trim() !== '');
                if (!allFilled) {
                    e.preventDefault();
                }
            });

            checkRequiredFields();
        });
    </script>
</div>

<?php
include "../footer.php";
?>