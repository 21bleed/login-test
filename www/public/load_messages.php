<?php
session_start();
require 'db.php';

$receiver_id = $_GET['receiver_id'] ?? null;

if ($receiver_id) {
    // Private chat
    $stmt = $db->prepare("SELECT m.message, u.username 
                          FROM messages m 
                          JOIN users u ON m.user_id = u.id 
                          WHERE (m.user_id = :me AND m.receiver_id = :them) 
                             OR (m.user_id = :them AND m.receiver_id = :me)
                          ORDER BY m.id ASC");
    $stmt->execute([
        ':me' => $_SESSION['user_id'],
        ':them' => $receiver_id
    ]);
} else {
    // Public chat
    $stmt = $db->prepare("SELECT m.message, u.username 
                          FROM messages m 
                          JOIN users u ON m.user_id = u.id 
                          WHERE m.receiver_id IS NULL
                          ORDER BY m.id ASC");
    $stmt->execute();
}

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $msg) {
    $username = htmlspecialchars($msg['username']);
    $message = htmlspecialchars($msg['message']);
    echo "<p><strong>{$username}</strong>: {$message}</p>";
}
?>
