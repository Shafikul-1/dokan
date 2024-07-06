<?php
include "../database/database.php";
include "../database/otherFn.php";

function checkMessageStatus() {
    $databaseFN = new database();
    $userData = array();

    if ($databaseFN->getData('livechatuser')) {
        $chatTableUser = $databaseFN->getResult();
        foreach ($chatTableUser as $key => $value) {
            // Initialize unseen message count
            $unseen = 0;

            if ($databaseFN->getData('chat_details', "*", null, "livechat_user_id = " . $value['id'] . " AND check_user = 1 AND message_status = 0")) {
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

function livechatusertable() {
    $chatUserAllData = checkMessageStatus();

    return ['success' => true, 'message' => 'Message saved successfully', 'allData' => $chatUserAllData];
}

$alldata = livechatusertable();
// echo json_encode($alldata);
?>
<pre>
    <?php print_r($alldata) ?>
</pre>

<!-- 
    // for ($i = 0; $i < count($userId); $i++) {
    //     if ($databaseFN->getData('chat_details', "*", null, " livechat_user_id = " . $i . " AND check_user = " . 1 . " AND message_status = " . 0)) {
    //         $chatTableUser = $databaseFN->getResult();

    //         echo count($chatTableUser) . "<br>";
    //     }
    // }    
 -->

