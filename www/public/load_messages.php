<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['user_id'];
$receiver_id = isset($_GET['receiver_id']) ? $_GET['receiver_id'] : null;

if ($receiver_id) {
    // private messages
    $stmt = $pdo->prepare("
        SELECT m.id, u.username, m.message, m.created_at
        FROM messages m
        JOIN users u ON m.user_id = u.id
        WHERE (m.user_id = ? AND m.receiver_id = ?)
           OR (m.user_id = ? AND m.receiver_id = ?)
        ORDER BY m.created_at ASC
    ");
    $stmt->execute([$user_id, $receiver_id, $receiver_id, $user_id]);
} else {
    // public messages
    $stmt = $pdo->query("
        SELECT m.id, u.username, m.message, m.created_at
        FROM messages m
        JOIN users u ON m.user_id = u.id
        WHERE m.receiver_id IS NULL
        ORDER BY m.created_at ASC
    ");
}

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
