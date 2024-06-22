<?php
if (isset($_GET['slider']) &&  $_GET['slider'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($databaseFN->getData('slider', "*", null, " id = $id")) {
        $data = $databaseFN->getResult();
       
        if ($uploadFN->deleteFile($data[0]['image'], 'slider')) {
            if ($databaseFN->deleteData('slider', " id = $id")) {
                header("Location: " . $databaseFN->mainUrl . "/admin/setting/home/?setting=hero");
            } else {
                header("Location: " . $databaseFN->mainUrl . "/admin/setting/home/?setting=hero&msg=database");
            }
            echo "flse";
        } else {
            header("Location: " . $databaseFN->mainUrl . "/admin/setting/home/?setting=hero&msg=file");
        }
    } else {
        header("Location: " . $databaseFN->mainUrl . "/admin/setting/home/?setting=hero&msg=getdata");
    }
}
