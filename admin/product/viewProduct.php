<?php
function viewProduct($id)
{
  include "../../database/upload.php";
  $databaseFN = new database();

  // Insert Comment
  if (isset($_POST['commentSubmit'])) {
    $postId = $id;
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $comment = htmlentities($_POST['comment'], ENT_QUOTES);
    $time = htmlentities($_POST['time'], ENT_QUOTES);
    $userAuth = htmlentities($_SESSION['userAuth'], ENT_QUOTES);
    $commentData = ['name' => $name, 'time' => $time, 'comment' => $comment, 'postId' => $postId, 'userAuth' => $userAuth];
    if ($databaseFN->insertData("usercomment", $commentData)) {
      echo "<p id='message' class='text-black bg-green-500 text-center'>Comment Insert Successful</p>";
    } else {
      echo "<p id='message' class='text-white text-center bg-red-500'>Comment Insert Failed</p>";
    }
  }

  // Comment delete
  if (isset($_GET['did'])) {
    $did = $_GET['did'];
    if ($databaseFN->deleteData("usercomment", "id = $did")) {
      echo "<p id='message' class='text-black bg-green-500 text-center'>Comment Delete Successful</p>";
    } else {
      echo "<p id='message' class='text-black bg-green-500 text-center'>Comment Delete Unsuccessful</p>";
    }
  }


  // Get Data Product Details
  if ($databaseFN->getData("productdetails", "*", null, "id=$id")) {
    foreach ($databaseFN->getResult() as list('productName' => $productName, 'productDescription' => $productDescription, 'productColor' => $productColor, 'category' => $category, 'price' => $price, 'discount' => $discount, 'tax' => $tax, 'weight' => $weight, 'brand' => $brand, 'shippingClass' => $shippingClass, 'warranty' => $warranty, 'customFields' => $customFields, 'releaseDate' => $releaseDate, 'complianceInfo' => $complianceInfo, 'metaTitle' => $metaTitle, 'metaDescription' => $metaDescription, 'productImages' => $productImages, 'keywords' => $keywords, "userAuth" => $userAuth)) {

?>
      <style>
        .zoomDiv {
          width: 400px;
          height: 400px;
          position: absolute;
          top: 19rem;
          left: 51rem;
          display: none;
          background-repeat: no-repeat !important;
          overflow: hidden;
          border: 1px solid #ccc;
        }
      </style>

      <div class="font-sans">
        <div class="p-6 lg:max-w-6xl max-w-2xl mx-auto">
          <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="w-full lg:sticky top-0 sm:flex gap-2">
              <div class="sm:space-y-3 w-16 max-sm:flex max-sm:mb-4 max-sm:gap-4">
                <?php
                $productimageExplode = explode(",", $productImages);
                $productImageCount = count($productimageExplode);
                $supportExt = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
                for ($i = 0; $i < $productImageCount; $i++) {
                  $fileExt = strtolower(pathinfo($productimageExplode[$i], PATHINFO_EXTENSION));
                  if (in_array($fileExt, $supportExt)) {
                    echo "<img onclick='changeImage(event)' src='../../upload/product/" . trim($productimageExplode[$i]) . "' alt='" . $productimageExplode[$i] . "' class='w-full cursor-pointer rounded-sm outline' />";
                  }
                }
                ?>

              </div>
              <img onmousemove="zoomImage(event)" onmouseout="zoomOutImage()" id="imgZoom" src="../../upload/product/<?php echo trim($productimageExplode[0]) ?>" alt="<?php echo trim($productimageExplode[0]) ?>" class="cursor-zoom-in changeImageSrc w-4/5 rounded object-cover" />
            </div>
            <div class="zoomDiv"> </div>
            <div>
              <h2 class="text-2xl font-extrabold text-gray-800"><?php echo html_entity_decode($productName); ?></h2>
              <div class="flex flex-wrap gap-4 mt-4">
                <p class="text-gray-800 text-xl font-bold">$12</p>
                <p class="text-gray-400 text-xl"><strike>$16</strike> <span class="text-sm ml-1">Tax included</span></p>
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
                  <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">SM</button>
                  <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">MD</button>
                  <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">LG</button>
                  <button type="button" class="w-12 h-12 border-2 hover:border-gray-800 font-semibold text-sm rounded-full flex items-center justify-center shrink-0">XL</button>
                </div>
                <button type="button" class="w-full mt-4 px-4 py-3 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded">Add to cart</button>
              </div>

              <div class="mt-8">
                <h3 class="text-lg font-bold text-gray-800">About the item</h3>
                <div class="space-y-3 list-disc mt-4 pl-0 text-sm text-gray-800"><?php echo html_entity_decode($productDescription); ?></div>
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
        </div>
      </div>


      <!-- Comment -->
      <section class="w-full rounded-lg border-2 border-purple-600 p-4 my-8 mx-auto max-w-xl">
        <h3 class="font-os font-bold text-2xl"><a href="#comment">Comments</a></h3>
        <?php
        if ($databaseFN->getData("userComment", "*", null, " postId = $id", " id DESC")) {
          if ($comment = $databaseFN->getResult()) {
            foreach ($comment as list("name" => $name, "comment" => $comment, "time" => $time, "id" => $commentid)) {
        ?>
              <div class="flex mt-4">
                <div class="w-14 h-14 rounded-full bg-purple-400/50 flex-shrink-0 flex items-center justify-center">
                  <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/43.jpg" alt="">
                </div>

                <div class="ml-3">
                  <div class="font-medium text-purple-800"><?php echo html_entity_decode($name); ?></div>
                  <div class="text-gray-600">Comment on <?php echo html_entity_decode($time); ?></div>
                  <div class="mt-2 text-purple-800"><?php echo html_entity_decode($comment); ?></div>
                </div>
                <div>
                  <div class="comment-container">
                    <i onclick="commentToggleBtn(event)" class="fa-solid fa-ellipsis cursor-pointer"></i>
                    <div class="z-10 hidden commentToggle bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                          <a href="<?php echo $databaseFN->mainUrl . "/admin/product/?msg=view&id=$id&did=" . $commentid . "#comment" ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hide</a>
                        </li>
                      </ul>
                    </div>

                  </div>
                </div>
              </div>
        <?php
            }
          } else {
            echo "<p class='text-center font-bold text-xl'>No Comment This Post</p>";
          }
        } else {
          echo "<p class='text-center font-bold text-xl'>Comment Load Failed In Database</p>";
        }
        ?>

        <form class="mt-4" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="mb-4">
            <label for="name" class="block text-purple-800 font-medium">Name</label>
            <input type="text" id="name" name="name" class="border-2 border-purple-600 p-2 w-full rounded" required>
          </div>
          <input hidden name="time" type="text" value="<?php date_default_timezone_set("Asia/Dhaka");
                                                        echo date("d-m-Y h:i:s A"); ?>">
          <div class="mb-4">
            <label for="comment" class="block text-purple-800 font-medium">Comment</label>
            <textarea id="comment" name="comment" class="border-2 border-purple-600 p-2 w-full rounded" required></textarea>
          </div>

          <button type="submit" name="commentSubmit" class="bg-purple-700 text-white font-medium py-2 px-4 rounded hover:bg-purple-600">Post Comment </button>
        </form>
      </section>

      <!-- Comment -->
<?php
    }
  }
}

?>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
      var messageDiv = document.getElementById('message');
      if (messageDiv) {
        messageDiv.style.display = 'none';
      }
    }, 5000); // 10000 milliseconds = 10 seconds
  });

  // Comment Toggle BTN
  function commentToggleBtn(event) {
    const commentContainer = event.target.closest('.comment-container');
    const commentToggle = commentContainer.querySelector('.commentToggle');
    commentToggle.classList.toggle('hidden');
  }

  // Image Change
  function changeImage(event) {
    // console.log(event.srcElement.currentSrc);
    const getUrl = event.srcElement.currentSrc;
    const changeImageSrc = document.querySelector(".changeImageSrc").src = getUrl;
  }

  // Zoom Image
  function zoomImage(event) {
    const currentUrl = event.srcElement.currentSrc;
    const zoomDiv = document.querySelector(".zoomDiv")
    zoomDiv.style.backgroundImage = `url('${currentUrl}')`;
    zoomDiv.style.display = "block";
    let img = document.getElementById("imgZoom");
    let imgRect = img.getBoundingClientRect();
    let posX = event.clientX - imgRect.left;
    let posY = event.clientY - imgRect.top;
    const zoomLevel = 2;

    zoomDiv.style.backgroundSize = `${img.width * zoomLevel}px ${img.height * zoomLevel}px`;
    zoomDiv.style.backgroundPosition = `${-posX * (zoomLevel - 1)}px ${-posY * (zoomLevel - 1)}px`;

  }
   // Zoom Image
  function zoomOutImage(){
    const zoomDiv = document.querySelector(".zoomDiv")
    zoomDiv.style.display = "none";
  }
</script>