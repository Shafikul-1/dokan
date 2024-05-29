<div class="container mx-auto my-3">
    <h1 class="text-2xl font-bold mb-4">Product Search</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <div class="mb-6">
            <input id="search-input" name="product" type="text" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Search for products...">
        </div>
        <button type="submit" class="group relative min-h-[50px] w-40 overflow-hidden border border-purple-500 bg-white text-purple-500 shadow-2xl transition-all before:absolute before:left-0 before:top-0 before:h-0 before:w-1/4 before:bg-purple-500 before:duration-500 after:absolute after:bottom-0 after:right-0 after:h-0 after:w-1/4 after:bg-purple-500 after:duration-500 hover:text-white hover:before:h-full hover:after:h-full">
            <span class="top-0 flex h-full w-full items-center justify-center before:absolute before:bottom-0 before:left-1/4 before:z-0 before:h-0 before:w-1/4 before:bg-purple-500 before:duration-500 after:absolute after:right-1/4 after:top-0 after:z-0 after:h-0 after:w-1/4 after:bg-purple-500 after:duration-500 hover:text-white group-hover:before:h-full group-hover:after:h-full"></span>
            <span class="absolute bottom-0 left-0 right-0 top-0 z-10 flex h-full w-full items-center justify-center group-hover:text-white font-bold">Search</span>
        </button>
    </form>

</div>