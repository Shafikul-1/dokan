<?php

ob_start();
include "header.php";
include "database/otherFn.php";
include "database/whichlist.php";
$databaseFN = new database();
$otherFn = new otherFn();
$whichlist = new whichlist();

if (!isset($_GET['id'])) {
  header("Location: " . $databaseFN->mainUrl);
  exit();
} else {
  $getId = $_GET['id'];
}
$getId = intval($_GET['id']); // Sanitize input

//  check user login
if (isset($_SESSION['userAuth'])) {
  $uniqueId = $_SESSION['uniqueId'];

  if (isset($_GET['cart'])) {
    // Get Data Cart table with check product id
    if ($databaseFN->getData("cart", "*", null, " productId = $getId  AND uniqueId = '$uniqueId'")) {
      $increment =  ['Qty' => 1];
      $result = $databaseFN->getResult();
      $qty = 1;
      $collectData = ['uniqueId' => $uniqueId, "productId" => $getId, "Qty" => $qty];

      // Check Cart table Result already exist
      if (count($result) > 0) {

        // Current User cart tabel exist then update qty
        if ($databaseFN->incrementOrDecrement("cart", $increment, " productId = $getId AND uniqueId = '$uniqueId'", "+")) {
          echo "<p id='message' class='text-center bg-green-500 py-3 capitalize'>Product Qty + 1 Update</p>";
          header("Location: " . basename($_SERVER['PHP_SELF']) . "?id=$getId");
        } else {
          echo "<p class='text-center bg-green-500 py-3 capitalize'>Someting is wrong Increment</p>";
        }
      } else {

        // Current User Does not cart tabel exist then insert data
        if ($databaseFN->insertData("cart", $collectData)) {
          echo "<p id='message'  class='text-center bg-green-500 py-3 capitalize'>Product add successful</p>";
          header("Location: " . basename($_SERVER['PHP_SELF']) . "?id=$getId");
        } else {
          echo "<p class='text-center bg-green-500 py-3 capitalize'>Someting is wrong Insert data</p>";
        }
      }
    } else {
      echo "<p  id='message' class='text-center bg-green-500 py-3 capitalize'>Someting is wrong</p>";
    }
  }

  // Which list Add or remove
  if (isset($_GET['whichlist'])) {

    // Added whichlist
    if ($_GET['whichlist'] == 'add') {
      if ($whichlist->add($getId, $uniqueId)) {
        header("Location: " . basename($_SERVER['PHP_SELF']) . "?id=" . $getId);
      } else {
        echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Which list delete</p>";
      }
    }

    // Remove whichlist
    if ($_GET['whichlist'] == 'remove') {
      if ($whichlist->remove($getId, $uniqueId)) {
        header("Location: " . basename($_SERVER['PHP_SELF']) . "?id=" . $getId);
      } else {
        echo "<p id='message' class='text-center bg-red-500 py-3 capitalize'>Someting is wrong Which list delete</p>";
      }
    }
  }
} else {
  header("Location: " . $databaseFN->mainUrl . "/auth/?checkPoint=auth");
}

// Insert Comment
if (isset($_POST['commentSubmit'])) {
  $postId = $getId;
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

?>

<style>
  .zoomDiv {
    display: none;
    background-repeat: no-repeat !important;
    overflow: hidden;
  }
</style>

<div class="md:grid md:grid-cols-5 md:gap-2">
  <?php
  if ($databaseFN->getData("productdetails", "*", null, " id = $getId")) {
    foreach ($databaseFN->getResult() as list("id" => $dbId, "productQty"=>$productQty, "price" => $price, "productName" => $productName, "productImages" => $productImages, "category" => $category)) {
      $singleImgName =  explode(",", $productImages);
  ?>
      <div class="md:col-start-1 md:col-span-4 font-sans bg-white">
        <div class="p-6 lg:max-w-7xl max-w-4xl mx-auto">
          <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">

              <div class="px-4 py-10 rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative">
                <img onmousemove="zoomImage(event)" onmouseout="zoomOutImage()" id="imgZoom" src="upload/product/<?php echo trim($singleImgName[0]) ?>" alt="Product" class="changeImageSrc w-4/5 rounded object-cover" />
                <button type="button" class="absolute top-4 right-4">
                  <?php
                  if (!$_SESSION['uniqueId']) {
                    echo "<a href='" . basename($_SERVER['PHP_SELF']) . "?id=" . $getId . "&whichlist=add'><i class='fa-regular fa-heart'></i></a>";
                  } else {
                    $whichlist->check($getId, $uniqueId);
                  }
                  ?>
                </button>
              </div>

              <div class="mt-6 flex flex-wrap justify-center gap-6 mx-auto">
                <?php
                for ($i = 0; $i < count($singleImgName); $i++) {
                ?>
                  <div class="rounded-xl p-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
                    <img onclick="changeImage(event)" src="upload/product/<?php echo trim($singleImgName[$i]) ?>" alt="Product2" class="w-24 cursor-pointer" />
                  </div>
                <?php } ?>
              </div>
            </div>
            <div class="zoomDiv w-[400px] h-[400px] absolute top-[10rem] left-[40rem]"> </div>
            <div class="lg:col-span-2">
              <h2 class="text-2xl font-extrabold text-[#333]"><?php echo $productName; ?></h2>
              <div class="flex flex-wrap gap-4 mt-4">
                <p class="text-[#333] text-3xl font-bold">$<?php echo $price; ?></p>
                <p class="text-gray-400 text-lg"><strike>$1500</strike> <span class="text-sm ml-1">Tax included</span></p>
              </div>

              <div class="flex space-x-2 mt-4">
                <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                <i class="fa-regular fa-star w-5 fill-[#333]"></i>

                <h4 class="text-[#333] text-base">500 Reviews</h4>
              </div>

              <div class="mt-10">
                <h3 class="text-lg font-bold text-gray-800">Choose a Color</h3>
                <div class="flex flex-wrap gap-3 mt-4">
                  <button type="button" class="w-10 h-10 bg-black border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
                  <button type="button" class="w-10 h-10 bg-gray-300 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
                  <button type="button" class="w-10 h-10 bg-gray-100 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
                  <button type="button" class="w-10 h-10 bg-blue-400 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
                </div>
              </div>

              <div class="flex flex-wrap gap-4 mt-10">
                <button type="button" class="min-w-[200px] px-4 py-3 bg-[#333] hover:bg-[#111] text-white text-sm font-semibold rounded">Buy now</button>
                <button type="button" class="min-w-[200px] px-4 py-2.5 border border-[#333] bg-transparent hover:bg-gray-50 text-[#333] text-sm font-semibold rounded">
                  <?php 
                  if($productQty > 0){
                    echo "<a href='" . basename($_SERVER['PHP_SELF']) . "?id=". $getId ."&cart=add'>Add to cart</a>";
                  } else {
                    echo "<a class='capitalize pointer-events-none' href='" . basename($_SERVER['PHP_SELF']) . "?id=". $getId ."&cart=add'>stock out</a>";
                  }
                   ?>
                   
                </button>
              </div>
            </div>
          </div>

          <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <div class="flex gap-5 my-5">
              <h4 onclick="showinformation()" class="text-md font-bold border-b-indigo-400 cursor-pointer border-t-0 border-l-0 border-r-0 border">Information</h4>
              <h4 onclick="showComment()" class="text-md font-bold border-b-indigo-400 cursor-pointer border-t-0 border-l-0 border-r-0 border">Comment</h4>
            </div>
            <!-- Product Information -->
            <div class=" InformationShow">
              <ul class="mt-6 space-y-6 text-[#333]">
                <li class="text-sm">TYPE <span class="ml-4 float-right">LAPTOP</span></li>
                <li class="text-sm">RAM <span class="ml-4 float-right">16 BG</span></li>
                <li class="text-sm">SSD <span class="ml-4 float-right">1000 BG</span></li>
                <li class="text-sm">PROCESSOR TYPE <span class="ml-4 float-right">INTEL CORE I7-12700H</span></li>
                <li class="text-sm">PROCESSOR SPEED <span class="ml-4 float-right">2.3 - 4.7 GHz</span></li>
                <li class="text-sm">DISPLAY SIZE INCH <span class="ml-4 float-right">16.0</span></li>
                <li class="text-sm">DISPLAY SIZE SM <span class="ml-4 float-right">40.64 cm</span></li>
                <li class="text-sm">DISPLAY TYPE <span class="ml-4 float-right">OLED, TOUCHSCREEN, 120 Hz</span></li>
                <li class="text-sm">DISPLAY RESOLUTION <span class="ml-4 float-right">2880x1620</span></li>
              </ul>
            </div>

            <!-- Product Comment -->
            <div class="hidden commentShow">
              <section class="w-full rounded-lg border-2 border-purple-600 p-4 my-8 mx-auto max-w-xl">
                <h3 class="font-os font-bold text-2xl"><a href="#comment">Comments</a></h3>
                <?php
                if ($databaseFN->getData("userComment", "*", null, " postId = $getId", " id DESC")) {
                  if ($comment = $databaseFN->getResult()) {
                    foreach ($comment as list("name" => $name, "comment" => $comment, "time" => $time)) {
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
            </div>

            <!-- Product Review -->
          </div>

          <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-lg font-bold text-[#333]">Reviews(10)</h3>
            <div class="grid md:grid-cols-2 gap-12 mt-6">
              <div>
                <div class="space-y-3">
                  <div class="flex items-center">
                    <p class="text-sm text-[#333] font-bold">5.0</p>
                    <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <div class="bg-gray-400 rounded w-full h-2 ml-3">
                      <div class="w-2/3 h-full rounded bg-[#333]"></div>
                    </div>
                    <p class="text-sm text-[#333] font-bold ml-3">66%</p>
                  </div>

                  <div class="flex items-center">
                    <p class="text-sm text-[#333] font-bold">4.0</p>
                    <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <div class="bg-gray-400 rounded w-full h-2 ml-3">
                      <div class="w-1/3 h-full rounded bg-[#333]"></div>
                    </div>
                    <p class="text-sm text-[#333] font-bold ml-3">33%</p>
                  </div>

                  <div class="flex items-center">
                    <p class="text-sm text-[#333] font-bold">3.0</p>
                    <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <div class="bg-gray-400 rounded w-full h-2 ml-3">
                      <div class="w-1/6 h-full rounded bg-[#333]"></div>
                    </div>
                    <p class="text-sm text-[#333] font-bold ml-3">16%</p>
                  </div>

                  <div class="flex items-center">
                    <p class="text-sm text-[#333] font-bold">2.0</p>
                    <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <div class="bg-gray-400 rounded w-full h-2 ml-3">
                      <div class="w-1/12 h-full rounded bg-[#333]"></div>
                    </div>
                    <p class="text-sm text-[#333] font-bold ml-3">8%</p>
                  </div>

                  <div class="flex items-center">
                    <p class="text-sm text-[#333] font-bold">1.0</p>
                    <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <div class="bg-gray-400 rounded w-full h-2 ml-3">
                      <div class="w-[6%] h-full rounded bg-[#333]"></div>
                    </div>
                    <p class="text-sm text-[#333] font-bold ml-3">6%</p>
                  </div>
                </div>
              </div>

              <div>
                <div class="flex items-start">
                  <img src="https://readymadeui.com/team-2.webp" class="w-12 h-12 rounded-full border-2 border-white" />
                  <div class="ml-3">
                    <h4 class="text-sm font-bold text-[#333]">John Doe</h4>
                    <div class="flex space-x-1 mt-1">
                      <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                      <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                      <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                      <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                      <i class="fa-regular fa-star w-5 fill-[#333]"></i>
                      <p class="text-xs !ml-2 font-semibold text-[#333]">2 mins ago</p>
                    </div>
                    <p class="text-sm mt-4 text-[#333]">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>

                <button type="button" class="w-full mt-10 px-4 py-2.5 bg-transparent hover:bg-gray-50 border border-[#333] text-[#333] font-bold rounded">Read all reviews</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  }
  ?>


  <div class="max-w-full">
    <!-- Side Bar Similler PRoduct -->
    <div class="max-w-full">
      <h2 class="text-xl font-bold">Similler Product</h2>
      <?php
      if ($databaseFN->getData("productdetails", "*", null, " category = $category", " id DESC")) {
        $counter = 0;
        foreach ($databaseFN->getResult() as list("id" => $id, "productName" => $productName,  "productImages" => $productImages, "price" => $price)) {
          if ($counter >= 7) { // Check if the counter has reached 10
            break; // Exit the loop if 10 items have been displayed
          }
          $SuggestproductImg = explode(",", $productImages);
          $counter++;
      ?>
          <div class="grid grid-cols-3 gap-2 bg-gray-300 p-2 rounded-md my-3  hover:shadow-md transition-all hover:shadow-indigo-400">
            <div class="col-start-1 ">
              <a href="<?php echo basename($_SERVER['PHP_SELF']) . "?id=" . $id ?>">
                <img src="upload/product/<?php echo trim($SuggestproductImg[0]) ?>" alt="<?php echo trim($SuggestproductImg[0]) ?>">
              </a>
            </div>

            <div class="col-span-2">
              <a href="<?php echo basename($_SERVER['PHP_SELF']) . "?id=" . $id ?>">
                <h2 class="text-md font-bold hover:underline-offset-4 hover:underline">
                  <?php echo (str_word_count($productName) >= 3) ? $otherFn->strSort($productName, 3) . "..." : $productName; ?>
                </h2>
              </a>
              <div class="flex justify-between">
                <p class="font-bold text-green-700">$<?php echo $price ?></p>
                <a href="#" class="rounded-xl text-sm font-bold hover:underline hover:text-green-700 text-indigo-600">Add to Cart</a>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>


    <!-- Other Category -->
    <div class="max-w-full">
      <h2 class="text-xl font-bold">Other Category Product</h2>
      <?php
      // Random Category Number Create
      if ($databaseFN->getData("productdetails")) {
        $arr = array();
        foreach ($databaseFN->getResult() as list("category" => $dynamicCategory)) {
          array_push($arr, $dynamicCategory);
        }
        $values = array_unique($arr);
        $keys = array_keys($values);
        if (isset($_SESSION['array_index'])) {
          $_SESSION['array_index'] = ($_SESSION['array_index'] - 1 + count($keys)) % count($keys);
        } else {
          $_SESSION['array_index'] = count($keys) - 1;
        }
        $current_key = $keys[$_SESSION['array_index']];
        $current_value = $values[$current_key];
      }
      if ($databaseFN->getData("productdetails", "*", null, " category = $current_value", " id DESC")) {
        $counter = 0;
        foreach ($databaseFN->getResult() as list("id" => $id, "productName" => $productName,  "productImages" => $productImages, "price" => $price)) {
          if ($counter >= 7) { // Check if the counter has reached 10
            break; // Exit the loop if 10 items have been displayed
          }
          $SuggestproductImg = explode(",", $productImages);
          $counter++;
      ?>
          <div class="grid grid-cols-3 gap-2 bg-gray-300 p-2 rounded-md my-3  hover:shadow-md transition-all hover:shadow-indigo-400">
            <div class="col-start-1 ">
              <a href="<?php echo basename($_SERVER['PHP_SELF']) . "?id=" . $id ?>">
                <img src="upload/product/<?php echo trim($SuggestproductImg[0]) ?>" alt="<?php echo trim($SuggestproductImg[0]) ?>">
              </a>
            </div>

            <div class="col-span-2">
              <a href="<?php echo basename($_SERVER['PHP_SELF']) . "?id=" . $id ?>">
                <h2 class="text-md font-bold hover:underline-offset-4 hover:underline">
                  <?php echo (str_word_count($productName) >= 3) ? $otherFn->strSort($productName, 3) . "..." : $productName; ?>
                </h2>
              </a>
              <div class="flex justify-between">
                <p class="font-bold text-green-700">$<?php echo $price ?></p>
                <a href="<?php  ?>" class="rounded-xl text-sm font-bold hover:underline hover:text-green-700 text-indigo-600">Add to Cart</a>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>


</div>




<?php

include "footer.php";
?>

<script>
  // Comment Insert Show notic
  document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
      var messageDiv = document.getElementById("message");
      if (messageDiv) {
        messageDiv.style.display = "none";
      }
    }, 5000); // 10000 milliseconds = 10 seconds
  });
</script>