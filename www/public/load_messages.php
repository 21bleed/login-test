<?php
session_start();
require 'db.php';

$stmt = $pdo->query("
    SELECT m.id, u.username, m.message, m.created_at
    FROM messages m
    JOIN users u ON m.user_id = u.id
    ORDER BY m.created_at ASC
");

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
