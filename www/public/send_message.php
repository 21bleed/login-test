<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message']) && isset($_SESSION['user_id'])) {
    $stmt = $db->prepare("INSERT INTO messages (user_id, message, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$_SESSION['user_id'], $_POST['message']]);
}
