<?php
include "../database/database.php";
include "../database/otherFn.php";

function singleChatData($userId)
{
    $data = (int)$userId['userId'];
    $unseenAllId = $userId['unseenId'];
    $databaseFN = new database();

    // if (!is_null($unseenAllId)) {
    //     $unseenId = explode(",", $unseenAllId);
    // }
    foreach ($unseenAllId as $value) {
        if ($databaseFN->updateData('chat_details', ['message_status' => 1], "id = $value")) {
            echo "success ---- ";
        };
    }

    if ($databaseFN->getData('chat_details', "*", null, " livechat_user_id = $data ")) {
        $messages = $databaseFN->getResult();
        return ['success' => true, 'data' => $messages];
    } else {
        return ['success' => false, 'message' => 'Fetch failed: '];
    }
}

$arr = [
    'userId' => '22',
    'unseenId' => [
        "3",
        "43",
        "2"
    ],
];

$response = singleChatData($arr);


// echo json_encode($alldata);
?>
<pre>
    <?php print_r($response) ?>
</pre>