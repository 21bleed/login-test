<?php
session_start();
if(!isset($_SESSION['username'])) exit;
require 'db.php';

$stmt = $db->query("SELECT username, message, created_at FROM messages ORDER BY id ASC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($messages as $msg){
    echo "<strong>".htmlspecialchars($msg['username']).":</strong> ".htmlspecialchars($msg['message'])."<br>";
}
?>
