<?php
session_start();
require 'db.php';

$stmt = $db->prepare("SELECT messages.message, users.username 
                      FROM messages 
                      JOIN users ON messages.user_id = users.id 
                      ORDER BY messages.id ASC");
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $msg) {
    $username = isset($msg['username']) ? htmlspecialchars($msg['username']) : 'Unknown';
    $message = isset($msg['message']) ? htmlspecialchars($msg['message']) : '';
    echo "<p><strong>{$username}</strong>: {$message}</p>";
}
?>
