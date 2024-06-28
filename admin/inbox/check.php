<?php
include "../header.php";
$databaseFN->getData("usercomment", " DISTINCT  postId", null, null, " id DESC");

foreach ($databaseFN->getResult() as $post) {
    echo "<pre>";
    print_r($post);
    echo "</pre>";
}
