<?php include "../header.php"; ?>
<div class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Product Categories</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">ID</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Category Name</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Description</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">1</td>
                        <td class="py-2 px-4 border-b border-gray-300">Electronics</td>
                        <td class="py-2 px-4 border-b border-gray-300">Devices and gadgets</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <button class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</button>
                            <button class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">2</td>
                        <td class="py-2 px-4 border-b border-gray-300">Books</td>
                        <td class="py-2 px-4 border-b border-gray-300">Printed and digital books</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <button class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</button>
                            <button class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../footer.php"; ?>