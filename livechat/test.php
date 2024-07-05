<?php
include "../database/database.php";
include "../database/otherFn.php";
function singleChatData($userId)
{
    $data = (int)$userId;
    $databaseFN = new database();
    if ($databaseFN->getData('chat_details', "*", null, " livechat_user_id = $data ")) {
        $messages = $databaseFN->getResult();
        return ['success' => true, 'data' => $messages];
    } else {
        return ['success' => false, 'message' => 'Fetch failed: '];
    }
}



$data = '{"action":"singleuser","message":"3"}';
$datas = json_decode($data, true);


$alldata = singleChatData($datas['message']);
echo json_encode($alldata);
