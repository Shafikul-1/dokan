<?php
include "database.php";
include "otherFn.php";
function insertMassage($getData)
{
    $databaseFN = new database();
    $data = [
        'chat_text' => $getData['chatInput'],
        'check_user' => $getData['massageUser'],
        'livechat_user_id' => $getData['chatUserTableId']
    ];
    if ($databaseFN->insertData('chat_details', $data)) {
        return ['success' => true, 'message' => 'Message saved successfully'];
    } else {
        return ['success' => false, 'message' => 'Failed to save message'];
    }
}

function authChatUser($getData)
{
    $databaseFN = new database();
    $otherFn = new otherFn();
    $currentUniqueId = $otherFn->uniqueIdCreate();
    $data = [
        'name' => $getData['name'],
        'email' => $getData['email'],
        'number' => $getData['phonenumber'],
        'user_unique_id' => $currentUniqueId
    ];
    if ($databaseFN->insertData('livechatuser', $data)) {
        $tableDats = $databaseFN->getResult();
        return ['success' => true, 'message' => 'Message saved successfully', 'tableData' => $tableDats, 'YourUniqueId' => $currentUniqueId];
    } else {
        return ['success' => false, 'message' => 'Failed to save message'];
    }
}

function getMassage($data)
{
    $databaseFN = new database();
    $tableId = $data['chatUserTableId'];
    // if ($databaseFN->getData( "livechatuser", " chat_details.chat_text, chat_details.chat_time, chat_details.check_user", null, " livechatuser.user_unique_id = '$data'", null, null, " chat_details on livechatuser.id = chat_details.livechat_user_id")) {
    if ($databaseFN->getData("chat_details", "*", null, " livechat_user_id = $tableId")) {
        $messages = $databaseFN->getResult();
        return ['success' => true, 'data' => $messages];
    } else {
        return ['success' => false, 'message' => 'Fetch failed: '];
    }
}

function checkUser($getData)
{
    $data = $getData['authUser'];
    $databaseFN = new database();
    if ($databaseFN->getData('livechatuser', "*", null, " user_unique_id = '$data' ")) {
        $messages = $databaseFN->getResult();
        return ['success' => true, 'data' => $messages];
    } else {
        return ['success' => false, 'message' => 'Fetch failed: '];
    }
}

// All Message & Unseen Message
function checkMessageStatus() {
    $databaseFN = new database();
    $userData = array();

    if ($databaseFN->getData('livechatuser')) {
        $chatTableUser = $databaseFN->getResult();
        foreach ($chatTableUser as $key => $value) {
            // Initialize unseen message count
            $unseen = 0;

            if ($databaseFN->getData('chat_details', "*", null, "livechat_user_id = " . $value['id'] . " AND check_user = 1 AND message_status = 0", " id DESC")) {
                $unseenMessages = $databaseFN->getResult();
                // $unseen = count($unseenMessages);
                $unseen = $unseenMessages;
            }

            // Add unseen message count to user data
            $value['unseenmessage'] = $unseen;
            array_push($userData, $value);
        }
    } else {
        return ['success' => false, 'message' => 'Failed to save message'];
    }

    return $userData;
}
// ⏫ Show all Message
function liveChatUserlist()
{
    $chatUserAllData = checkMessageStatus();
    return ['success' => true, 'message' => 'Message saved successfully', 'allData' => $chatUserAllData];
}

function singleChatData($userId)
{
    $data = (int)$userId['userId'];
    $unseenAllId = $userId['unseenId'];
    $databaseFN = new database();
    
    // if(!is_null($unseenAllId)){
    //     $unseenId = explode(",", $unseenAllId);
        
    // }

    foreach ($unseenAllId as $value) {
        $databaseFN->updateData('chat_details', ['message_status' => 1], "id = " . (int)$value);
    }

    if ($databaseFN->getData('chat_details', "*", null, " livechat_user_id = $data ")) {
        $messages = $databaseFN->getResult();
        return ['success' => true, 'data' => $messages];
    } else {
        return ['success' => false, 'message' => 'Fetch failed: '];
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = file_get_contents("php://input");
    $data = json_decode($requestData, true);

    if (isset($data['action'])) {
        switch ($data['action']) {
            case 'insert':
                $response = insertMassage($data['message']);
                echo json_encode($response);
                break;
            case 'fetch':
                $response = getMassage($data['message']);
                echo json_encode($response);
                break;
            case 'update':
                // $response = updateMessage($pdo, $data['id'], $data['message']);
                // echo json_encode($response);
                break;
            case 'checkUser':
                $response = checkUser($data['message']);
                echo json_encode($response);
                break;
            case 'chatUserData':
                $response = authChatUser($data['message']);
                echo json_encode($response);
                break;
            case 'liveChatUserlist':
                $response = liveChatUserlist();
                echo json_encode($response);
                break;
            case 'singleuser':
                $response = singleChatData($data['message']);
                echo json_encode($response);
                break;

            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No action specified']);
    }
}
