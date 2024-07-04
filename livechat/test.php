<?php
include "../database/database.php";
include "../database/otherFn.php";
function livechatusertable()
{
    $databaseFN = new database();
    if ($databaseFN->getData('livechatuser')) {
        $chatTableUser = $databaseFN->getResult();
        return ['success' => true, 'message' => 'Message saved successfully', 'allData' => $chatTableUser];
    } else {
        return ['success' => false, 'message' => 'Failed to save message'];
    }
}


$data = '{"action":"chatUserData","message":{"name":"RUnjla","email":"RUnjla@gmail.com","phonenumber":"01311770633"}}';
$datas = json_decode($data, true);


$alldata = livechatusertable();
echo json_encode($alldata);
