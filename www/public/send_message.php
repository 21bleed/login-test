<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "Not logged in";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    $receiver_id = !empty($_POST['receiver_id']) ? $_POST['receiver_id'] : null;
    $user_id = $_SESSION['user_id'];

    if ($message !== "") {
        $stmt = $pdo->prepare("INSERT INTO messages (user_id, receiver_id, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$user_id, $receiver_id, $message]);
        echo "Message sent";
    }
}
?>
