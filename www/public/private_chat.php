<?php
session_start();
if(!isset($_SESSION['user_id'])) exit;

$db = new PDO('mysql:host=mariadb;dbname=Users;charset=utf8', 'pma', '12345');

// Fetch users for private messaging
$usersStmt = $db->query("SELECT id, username FROM users");
$users = $usersStmt->fetchAll(PDO::FETCH_ASSOC);

// Handle private message sending
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])){
    $recipient = !empty($_POST['recipient']) ? (int)$_POST['recipient'] : null;
    $stmt = $db->prepare("INSERT INTO messages (user_id, recipient_id, message) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $recipient, $_POST['message']]);
}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Private Chat</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; }
#messages { border: 1px solid #ccc; padding: 10px; height: 300px; overflow-y: scroll; margin-bottom: 10px; }
input, select, button { padding: 10px; margin: 5px 0; }
</style>
</head>
<body>
<h2>Private Chat</h2>

<div id="messages"></div>

<form id="chatForm" method="post">
    <select name="recipient" id="recipient">
        <?php foreach($users as $user){
            if($user['id'] != $_SESSION['user_id']){
                echo "<option value='{$user['id']}'>".htmlspecialchars($user['username'])."</option>";
            }
        } ?>
    </select>
    <br>
    <input type="text" name="message" id="message" placeholder="Type your message">
    <input type="submit" value="Send">
</form>

<script>
function loadMessages(){
    let recipientId = document.getElementById('recipient').value;
    fetch('load_private_messages.php?recipient=' + recipientId)
        .then(res => res.text())
        .then(data => {
            document.getElementById('messages').innerHTML = data;
            document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
        });
}
setInterval(loadMessages, 2000);
loadMessages();

document.getElementById('chatForm').addEventListener('submit', function(e){
    e.preventDefault();
    let formData = new FormData(this);
    fetch('private_chat.php', { method: 'POST', body: formData })
        .then(() => { document.getElementById('message').value = ''; loadMessages(); });
});
</script>
</body>
</html>
