<?php
ob_start();
include "../../header.php";
include "../../../database/upload.php";
$uploadFN = new Upload();

if (isset($_GET['setting'])) {
    switch ($_GET['setting']) {
        case 'hero':
            include "hero-section/slider.php";
            break;
        case 'footer':
            include "footer/footer.php";
            break;

        default:
            # code...
            break;
    }
}

if (isset($_GET['slider'])) {
    switch ($_GET['slider']) {
        case 'add':
            include "hero-section/add.php";
            break;
        case 'delete':
            include "hero-section/delete.php";
            break;
        default:
            break;
    }
}

if (empty($_GET)) {
    // echo "<a href='" . $databaseFN->mainUrl . "/admin/setting/home?setting=hero' class='capitalize font-bold text-xl dark:text-white py-1 px-2 rounded-md hover:shadow-md my-3 bg-gray-600 hover:bg-gray-500'>hero section</a>";
    // echo "<a href='" . $databaseFN->mainUrl . "/admin/setting/home?setting=footer' class='capitalize font-bold text-xl dark:text-white py-1 px-2 rounded-md hover:shadow-md my-3 bg-gray-600 hover:bg-gray-500'>footer section</a>";
?>
    <a href="<?php echo $databaseFN->mainUrl . "/admin/setting/home?setting=hero" ?>" class="capitalize font-bold text-xl dark:text-white py-1 px-2 rounded-md hover:shadow-md my-3 bg-gray-600 hover:bg-gray-500">hero section</a>
    <a href="<?php echo $databaseFN->mainUrl . "/admin/setting/home?setting=footer" ?>" class="capitalize font-bold text-xl dark:text-white py-1 px-2 rounded-md hover:shadow-md my-3 bg-gray-600 hover:bg-gray-500">footer</a>
<?php
}

include "../../footer.php";
?>