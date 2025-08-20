<?php
session_start();
require_once "db.php";

if(!isset($_GET['user'])) exit;

$other = $_GET['user'];
$user = $_SESSION['username'];

$stmt = $db->prepare("SELECT sender, message FROM messages WHERE (sender=:user AND private_to=:other) OR (sender=:other AND private_to=:user) ORDER BY id ASC");
$stmt->execute([':user'=>$user, ':other'=>$other, ':other'=>$other, ':user'=>$user]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($messages as $m){
    echo "<b>".htmlspecialchars($m['sender'])."</b>: ".htmlspecialchars($m['message'])."<br>";
}
