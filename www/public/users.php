<?php
session_start();
require 'db.php';

$stmt = $db->prepare("SELECT id, username FROM users WHERE id != :me");
$stmt->execute([':me' => $_SESSION['user_id']]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<button onclick='openPublicChat()'>Public Chat</button><br>";
foreach ($users as $u) {
    echo "<button onclick='openPrivateChat(".$u['id'].", \"".$u['username']."\")'>".$u['username']."</button> ";
}
?>
