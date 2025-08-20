<?php
session_start();
if(!isset($_SESSION['user_id'])) exit;

$db = new PDO('mysql:host=mariadb;dbname=Users;charset=utf8', 'pma', '12345');

$recipient = isset($_GET['recipient']) ? (int)$_GET['recipient'] : 0;

$stmt = $db->prepare("
    SELECT m.*, u.username AS sender_name
    FROM messages m
    LEFT JOIN users u ON m.user_id = u.id
    WHERE (m.user_id = ? AND m.recipient_id = ?) OR (m.user_id = ? AND m.recipient_id = ?)
    ORDER BY m.created_at ASC
");
$stmt->execute([$_SESSION['user_id'], $recipient, $recipient, $_SESSION['user_id']]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($messages as $msg){
    echo "<div><b>".htmlspecialchars($msg['sender_name'])."</b>: ".htmlspecialchars($msg['message'])."</div>";
}
