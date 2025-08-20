<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    exit("Not logged in");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    if ($message !== "") {
        $stmt = $pdo->prepare("INSERT INTO messages (user_id, message, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$_SESSION['user_id'], $message]);
    }
}
?>
