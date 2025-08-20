<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Send message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    if ($message !== '') {
        $stmt = $db->prepare("INSERT INTO messages (user_id, username, message) VALUES (?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $_SESSION['username'], $message]);
    }
}

// Fetch messages
$stmt = $db->query("SELECT username, message, created_at FROM messages ORDER BY created_at ASC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="sv">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body { font-family: Arial; background:#f5f5f5; display:flex; flex-direction:column; align-items:center; padding:20px; }
#chat-box { width:100%; max-width:500px; height:400px; border:1px solid #ccc; overflow-y:scroll; background:#fff; padding:10px; margin-bottom:10px; border-radius:10px; }
form { display:flex; width:100%; max-width:500px; }
input[type="text"] { flex:1; padding:10px; border-radius:5px; border:1px solid #ccc; }
input[type="submit"] { padding:10px 20px; border:none; background:#4CAF50; color:white; border-radius:5px; cursor:pointer; }
</style>
<script>
function reloadMessages() {
    fetch('messages.php')
    .then(response => response.text())
    .then(html => {
        document.getElementById('chat-box').innerHTML = html;
    });
}
setInterval(reloadMessages, 1000);
window.onload = reloadMessages;
</script>
</head>
<body>
<h1>Chat Room</h1>
<div id="chat-box"></div>
<form method="post">
    <input type="text" name="message" placeholder="Write your message" required>
    <input type="submit" value="Send">
</form>
</body>
</html>
