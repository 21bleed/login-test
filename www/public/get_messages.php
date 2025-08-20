<?php
session_start();
require 'db.php';

$stmt = $db->query("
    SELECT m.message, u.username, m.created_at
    FROM messages m
    JOIN users u ON m.user_id = u.id
    ORDER BY m.created_at ASC
");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $msg) {
    echo '<div class="msg">';
    echo '<span class="username">' . htmlspecialchars($msg['username']) . ':</span> ';
    echo htmlspecialchars($msg['message']);
    echo '</div>';
}
