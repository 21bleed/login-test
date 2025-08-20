<?php
session_start();
if(!isset($_SESSION['user_id'])) exit;

$db = new PDO('mysql:host=mariadb;dbname=Users;charset=utf8', 'pma', '12345');

// Fetch public and private messages
$stmt = $db->prepare("
    SELECT m.*, u.username AS recipient_name 
    FROM messages m
    LEFT JOIN users u ON m.recipient_id = u.id
    WHERE m.recipient_id IS NULL OR m.recipient_id = ? OR m.user_id = ?
    ORDER BY m.created_at ASC
");
$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($messages as $msg) {
    $private = $msg['recipient_id'] ? "private" : "";
    $toText = "";
    if($msg['recipient_id'] && $msg['recipient_id'] != $_SESSION['user_id']) {
        $toText = " → To " . htmlspecialchars($msg['recipient_name']);
    } elseif ($msg['recipient_id'] && $msg['recipient_id'] == $_SESSION['user_id']) {
        $toText = " → Private from " . htmlspecialchars($msg['username']);
    }
    echo "<div class='message {$private}'><b>".htmlspecialchars($msg['username'])."</b>{$toText}: ".htmlspecialchars($msg['message'])."</div>";
}
?>
