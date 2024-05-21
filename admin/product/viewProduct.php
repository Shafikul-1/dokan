<?php

function viewProduct($id)
{
  include "../header.php";
  include "../../database/upload.php";
  $databaseFN = new database();

  if ($databaseFN->getData("productdetails", "*", null, "id=$id")) {
    foreach ($databaseFN->getResult() as list('productName' => $productName, 'productDescription' => $productDescription, 'productColor' => $productColor, 'category' => $category, 'price' => $price, 'discount' => $discount, 'tax' => $tax, 'weight' => $weight, 'brand' => $brand, 'shippingClass' => $shippingClass, 'warranty' => $warranty, 'customFields' => $customFields, 'releaseDate' => $releaseDate, 'complianceInfo' => $complianceInfo, 'metaTitle' => $metaTitle, 'metaDescription' => $metaDescription, 'productImages' => $productImages, 'keywords' => $keywords, "userAuth" => $userAuth)) {

?>

      <div class="font-sans">
        <div class="p-6 lg:max-w-6xl max-w-2xl mx-auto">
          <!-- grid -->
          <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="">
              <div class="w-full lg:sticky  top-0 sm:flex gap-2 dark:bg-gray-800 bg-white">
                <div class="sm:space-y-3 w-16 max-sm:flex max-sm:mb-4 max-sm:gap-4">
                  <?php
                  $productimageExplode = explode(",", $productImages);
                  $productImageCount = count($productimageExplode);
                  $supportExt = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
                  for ($i = 0; $i < $productImageCount; $i++) {
                    $fileExt = strtolower(pathinfo($productimageExplode[$i], PATHINFO_EXTENSION));
                    if (in_array($fileExt, $supportExt)) {
                      echo "<img src='../../upload/product/" . trim($productimageExplode[$i]) . "' alt='" . $productimageExplode[$i] . "' class='w-full cursor-pointer rounded-sm outline' />";
                    }
                  }
                  ?>
                </div>
                <img src="../../upload/product/<?php echo trim($productimageExplode[0]) ?>" alt="<?php echo trim($productimageExplode[0]) ?>" class="w-4/5 rounded object-cover" />
              </div>

              <div>
                <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white"><?php echo html_entity_decode($productName); ?></h2>
                <div class="flex flex-wrap gap-4 mt-4">
                  <p class="text-gray-800 text-xl font-bold dark:text-white">$<?php echo html_entity_decode($price); ?></p>
                  <p class="text-gray-400 text-xl dark:gray-500"><strike>$16</strike> <span class="text-sm ml-1">Tax included</span></p>
                </div>

                <div class="flex space-x-2 mt-4">
                  <svg class="w-5 fill-gray-800" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-gray-800" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-gray-800" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-gray-800" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                </div>

                <div class="mt-8">
                  <h3 class="text-lg font-bold text-gray-800">Sizes</h3>
                  <div class="flex flex-wrap gap-4 mt-4">
                    <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0 ">SM</button>
                    <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">MD</button>
                    <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">LG</button>
                    <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">XL</button>
                  </div>
                  <button type="button" class="w-full mt-4 px-4 py-3 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded">Add to cart</button>
                </div>

                <div class="mt-8">
                  <h3 class="text-lg font-bold text-gray-800">About the item</h3>
                  <div class="space-y-3 list-disc mt-4 pl-0 text-sm text-gray-800 dark:text-white">
                    <?php echo html_entity_decode($productDescription); ?>
                  </div>
                </div>

                <div class="mt-8 max-w-md">
                  <h3 class="text-lg font-bold text-gray-800">Reviews(10)</h3>
                  <div class="space-y-3 mt-4">
                    <div class="flex items-center">
                      <p class="text-sm text-gray-800 font-bold">5.0</p>
                      <svg class="w-5 fill-gray-800 ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                      </svg>
                      <div class="bg-gray-300 rounded w-full h-2 ml-3">
                        <div class="w-2/3 h-full rounded bg-gray-800"></div>
                      </div>
                      <p class="text-sm text-gray-800 font-bold ml-3">66%</p>
                    </div>

                    <div class="flex items-center">
                      <p class="text-sm text-gray-800 font-bold">4.0</p>
                      <svg class="w-5 fill-gray-800 ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                      </svg>
                      <div class="bg-gray-300 rounded w-full h-2 ml-3">
                        <div class="w-1/3 h-full rounded bg-gray-800"></div>
                      </div>
                      <p class="text-sm text-gray-800 font-bold ml-3">33%</p>
                    </div>

                    <div class="flex items-center">
                      <p class="text-sm text-gray-800 font-bold">3.0</p>
                      <svg class="w-5 fill-gray-800 ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                      </svg>
                      <div class="bg-gray-300 rounded w-full h-2 ml-3">
                        <div class="w-1/6 h-full rounded bg-gray-800"></div>
                      </div>
                      <p class="text-sm text-gray-800 font-bold ml-3">16%</p>
                    </div>

                    <div class="flex items-center">
                      <p class="text-sm text-gray-800 font-bold">2.0</p>
                      <svg class="w-5 fill-gray-800 ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                      </svg>
                      <div class="bg-gray-300 rounded w-full h-2 ml-3">
                        <div class="w-1/12 h-full rounded bg-gray-800"></div>
                      </div>
                      <p class="text-sm text-gray-800 font-bold ml-3">8%</p>
                    </div>

                    <div class="flex items-center">
                      <p class="text-sm text-gray-800 font-bold">1.0</p>
                      <svg class="w-5 fill-gray-800 ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                      </svg>
                      <div class="bg-gray-300 rounded w-full h-2 ml-3">
                        <div class="w-[6%] h-full rounded bg-gray-800"></div>
                      </div>
                      <p class="text-sm text-gray-800 font-bold ml-3">6%</p>
                    </div>
                  </div>
                  <button type="button" class="w-full mt-8 px-4 py-2 bg-transparent border-2 border-gray-800 text-gray-800 font-bold rounded">Read all reviews</button>
                </div>
              </div>
            </div>
            <!-- grid -->
          </div>
        </div>

        <!-- Comment Section -->
        <div class="w-full">
          <div class="">
            <section class="w-full rounded-lg border-2 border-purple-600 p-4 my-8 mx-auto max-w-xl">
              <h3 class="font-os text-lg font-bold">Comments</h3>

              <!-- Sample Comment 1 -->
              <div class="flex mt-4">
                <?php
                if ($databaseFN->getData("userComment", "*", null, " postId = $id", " id DESC")) {
                  if ($comment = $databaseFN->getResult()) {
                    foreach ($comment as list("name" => $name, "comment" => $comment, "time" => $time)) {

                ?>
                      <div class="w-14 h-14 rounded-full bg-purple-400/50 flex-shrink-0 flex items-center justify-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/43.jpg" alt="">
                      </div>
                      <div class="ml-3">
                        <div class="font-medium text-purple-800"><?php echo $name ?></div>
                        <div class="text-gray-600">Posted on <?php echo $time ?></div>
                        <div class="mt-2 text-purple-800"> <?php echo $comment ?></div>
                      </div>
              </div>
        <?php
                    }
                  } else {
                    echo "No comment this post";
                  }
                } else {
                  echo "Comment Load Failed in database";
                }
        ?>


        <!-- Comment Form -->
        <form class="mt-4">
          <div class="mb-4">
            <label for="name" class="block text-purple-800 font-medium">Name</label>
            <input type="text" id="name" name="name" class="border-2 border-purple-600 p-2 w-full rounded" required>
          </div>

          <div class="mb-4">
            <label for="comment" class="block text-purple-800 font-medium">Comment</label>
            <textarea id="comment" name="comment" class="border-2 border-purple-600 p-2 w-full rounded" required></textarea>
          </div>

          <button type="submit" class="bg-purple-700 text-white font-medium py-2 px-4 rounded hover:bg-purple-600">Post
            Comment
          </button>
        </form>
            </section>
          </div>
        </div>
      </div>
      <!-- Comment Section -->
<?php
    }
  }
}
include "../footer.php";
?>