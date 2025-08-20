<?php
session_start();
require 'db.php';

$stmt = $db->query("SELECT username, message, created_at FROM messages ORDER BY created_at ASC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $msg) {
    echo "<b>".htmlspecialchars($msg['username'])."</b>: ".htmlspecialchars($msg['message'])."<br>";
}
