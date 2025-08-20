<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) exit;

$user_id = $_SESSION['user_id'];
$message = trim($_POST['message'] ?? '');
$receiver_id = !empty($_POST['receiver_id']) ? $_POST['receiver_id'] : null;

if ($message !== '') {
    $stmt = $db->prepare("INSERT INTO messages (user_id, receiver_id, message) VALUES (:user_id, :receiver_id, :message)");
    $stmt->execute([
        ':user_id' => $user_id,
        ':receiver_id' => $receiver_id,
        ':message' => $message
    ]);
}
?>
