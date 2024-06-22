<div class="mb-5">
    <a href="<?php echo $databaseFN->mainUrl .  "/admin/setting/home?slider=add" ?>" class="capitalize text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">add slider</a>
</div>

<?php
if(isset($_GET['msg'])){
    echo "<p id='message' class='text-center bg-red-500 py-3 capitalize font-bold'>".$_GET['msg']." Delete Failed</p>";
}

if ($databaseFN->getData('slider', '*', null, "where_slider = 'homeTop'")) {
    $slider = $databaseFN->getResult();
    if (count($slider) > 0) {

        foreach ($slider as list('id'=>$id, 'heading' => $heading, 'image' => $image, 'description' => $description)) {
?>
            <div id="card" class="relative bg-white rounded-lg shadow-lg p-4 min-w-md my-3 w-full dark:bg-gray-500 dark:hover:bg-gray-600 transition-all hover:shadow-sm">
                <button id="removeButton" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-700">
                    <a href="<?php echo $databaseFN->mainUrl .  "/admin/setting/home?slider=delete&id=" . $id ?>"><i class="fa-solid fa-trash"></i></a>
                </button>
                <img src="<?php echo $databaseFN->mainUrl ?>/upload/slider/<?php echo $image ?>" alt="<?php echo $image ?>" class="w-full rounded-lg mb-4 h-[30rem]">
                <h3 class="font-bold text-xl dark:text-white"><?php echo $heading ?></h3>
                <p class="dark:text-white"><?php echo $description ?></p>
            </div>
<?php
        }
    } else {
        echo  "<p class='bg-red-600 text-white text-xl text-center font-bold capitalize'>no slider add in database</p>";
    }
} else {
    echo "<p class='bg-red-600 text-white text-xl text-center font-bold capitalize'>someting want wrong</p>";
}

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
