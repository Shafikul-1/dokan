<?php
// print_r($_SERVER['DOCUMENT_ROOT']) . "<br>";
// print_r(__DIR__) . "<br>";
// echo getcwd();
session_start();
include $_SERVER['DOCUMENT_ROOT']."/dokan/database/database.php";
include $_SERVER['DOCUMENT_ROOT']."/dokan/database/otherFn.php";

$databaseFN = new database();
$otherFN = new otherFn();

$actual_link = $databaseFN->mainUrl;
if (!isset($_SESSION['userAuth'])) {
   header("Location: " . $actual_link);
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dokan</title>
   <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
</head>

<body>
   <!-- Main Part Admin  -->
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

   <script>
      function showMobileMenu() {
         const MobileMenu = document.querySelector(".MobileMenu");

         if (MobileMenu.classList.contains("sm:translate-x-0")) {
            MobileMenu.classList.replace("sm:translate-x-0", "translate-x-0");
            MobileMenu.classList.remove("-translate-x-full");
         } else {
            MobileMenu.classList.replace("translate-x-0", "sm:translate-x-0");
            MobileMenu.classList.add("-translate-x-full");
         }
      }
   </script>
   <!-- Main Part Admin  -->

   <!-- Admin Right Side Content Part Start -->
   <div class="p-4 sm:ml-64  bg-white dark:bg-gray-800">
      <div class="p-4 border-2 border-gray-700 border-dashed rounded-lg dark:border-gray-200 mt-14">