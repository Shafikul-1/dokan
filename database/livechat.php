<?php
include "database.php";

function insertMassage($getData){
    $databaseFN = new database();
    $data = [
        'chat_text' => $getData['chatInput'],
        'check_user' => $getData['massageUser']
    ];
    if($databaseFN->insertData('chat_details', $data)){
        return ['success' => true, 'message' => 'Message saved successfully'];
    }else{
        return ['success' => false, 'message' => 'Failed to save message'];
    }
}

function getMassage(){
    $databaseFN = new database();
    if ($databaseFN->getData('chat_details')) {
        $messages = $databaseFN->getResult();
        return ['success' => true, 'data' => $messages];
    } else {
        return ['success' => false, 'message' => 'Fetch failed: ' . $databaseFN->getResult()];
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
                $response = getMassage();
                echo json_encode($response);
                break;
            case 'update':
                // $response = updateMessage($pdo, $data['id'], $data['message']);
                // echo json_encode($response);
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No action specified']);
    }
}
?>
