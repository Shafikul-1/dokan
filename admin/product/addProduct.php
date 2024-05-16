<?php
include "../header.php";
?>
<style>
    .input-border-animated:focus {
        border-width: 3px;
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
        <form id="productForm" action="insert.php" method="POST" enctype="multipart/form-data">
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
                    <label for="category" class="block text-sm font-medium text-gray-700">Category*</label>
                    <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                        <option value="">Select Category</option>
                        <option value="electronics">Electronics</option>
                        <option value="apparel">Apparel</option>
                        <option value="home">Home</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price*</label>
                    <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated" required>
                </div>
                <div class="col-span-1">
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                    <input type="number" id="discount" name="discount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="tax" class="block text-sm font-medium text-gray-700">Tax</label>
                    <input type="number" id="tax" name="tax" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
                </div>
                <div class="col-span-1">
                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                    <input type="number" id="weight" name="weight" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
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
                <div class="col-span-1">
                    <label for="releaseDate" class="block text-sm font-medium text-gray-700">Release Date</label>
                    <input type="date" id="releaseDate" name="releaseDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-border-animated">
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
            <div class="mt-6">
                <button type="submit" id="submitBtn" class="w-full py-2 px-4 text-white font-semibold rounded-md" disabled>Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('productForm');
            const submitBtn = document.getElementById('submitBtn');
            const requiredFields = ['productName', 'productDescription', 'productColor', 'category', 'price'];

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