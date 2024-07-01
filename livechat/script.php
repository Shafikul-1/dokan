<?php
$host = 'localhost';
$dbname = 'dokan';
$username = 'root';
$password = '';

function getPdoConnection($host, $dbname, $username, $password) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
        exit;
    }
}

function insertMessage($pdo, $message) {
    try {
        $stmt = $pdo->prepare("INSERT INTO chat_details (chat_text) VALUES (:message)");
        $stmt->bindParam(':message', $message);
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Message saved successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to save message'];
        }
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Insert failed: ' . $e->getMessage()];
    }
}

function getAllMessages($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM chat_details");
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ['success' => true, 'data' => $messages];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Fetch failed: ' . $e->getMessage()];
    }
}

function updateMessage($pdo, $id, $message) {
    try {
        $stmt = $pdo->prepare("UPDATE chat_details SET other_person_text = :message WHERE id = :id");
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Message updated successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to update message'];
        }
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Update failed: ' . $e->getMessage()];
    }
}

$pdo = getPdoConnection($host, $dbname, $username, $password);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = file_get_contents("php://input");
    $data = json_decode($requestData, true);

    if (isset($data['action'])) {
        switch ($data['action']) {
            case 'insert':
                $response = insertMessage($pdo, $data['message']);
                echo json_encode($response);
                break;
            case 'fetch':
                $response = getAllMessages($pdo);
                echo json_encode($response);
                break;
            case 'update':
                $response = updateMessage($pdo, $data['id'], $data['message']);
                echo json_encode($response);
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No action specified']);
    }
}
?>
