<?php
include "../database/database.php";
include "../database/otherFn.php";
function authChatUser($getData)
{
    $databaseFN = new database();
    $otherFn = new otherFn();
    $data = [
        'name' => $getData['name'],
        'email' => $getData['email'],
        'number' => $getData['phonenumber'],
        'user_unique_id' => $otherFn->uniqueIdCreate()
    ];

    echo "<pre>";
    print_r($data);
    echo "</pre>";

    if ($databaseFN->insertData('livechatuser', $data)) {
        return ['success' => true, 'message' => 'Message saved successfully'];
    } else {
        return ['success' => false, 'message' => 'Failed to save message'];
    }
}

$data = '{"action":"chatUserData","message":{"name":"RUnjla","email":"RUnjla@gmail.com","phonenumber":"01311770633"}}';
$datas = json_decode($data, true);


$alldata = authChatUser($datas['message']);
echo json_encode($alldata);
