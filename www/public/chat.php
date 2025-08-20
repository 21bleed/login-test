<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Connect to database
$db = new PDO('mysql:host=mariadb;dbname=Users;charset=utf8', 'pma', '12345');

// Delete old messages older than 7 days
$db->exec("DELETE FROM messages WHERE created_at < NOW() - INTERVAL 7 DAY");

// Handle message sending
if(isset($_POST['message']) && $_POST['message'] != '') {
    $message = $_POST['message'];
    $recipient_id = $_POST['recipient_id'] ?? NULL;

    $stmt = $db->prepare("INSERT INTO messages (user_id, username, message, recipient_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $_SESSION['username'], $message, $recipient_id]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <style>
        #chatBox {
            border:1px solid #ccc; 
            padding:10px; 
            height:400px; 
            overflow-y:scroll;
            background:#f9f9f9;
        }
        .message {
            margin-bottom:8px;
        }
        .private {
            background:#ffe0e0;
            padding:4px;
            border-radius:4px;
        }
        form {
            margin-top:10px;
        }
    </style>
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>

<div id="chatBox"></div>

<form id="chatForm" method="post">
    <input type="text" name="message" placeholder="Skriv meddelande..." required>
    
    <select name="recipient_id">
        <option value="">Public</option>
        <?php
        $users = $db->query("SELECT id, username FROM users")->fetchAll(PDO::FETCH_ASSOC);
        foreach($users as $user) {
            if($user['id'] != $_SESSION['user_id']) {
                echo "<option value='{$user['id']}'>{$user['username']}</option>";
            }
        }
        ?>
    </select>

    <input type="submit" value="Skicka">
</form>

<script>
function loadMessages() {
    fetch('load_messages.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('chatBox').innerHTML = data;
        document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
    });
}

// Load messages every 2 seconds
setInterval(loadMessages, 2000);
loadMessages();

// Submit form without reloading
document.getElementById('chatForm').addEventListener('submit', function(e){
    e.preventDefault();
    let formData = new FormData(this);
    fetch('chat.php', {
        method: 'POST',
        body: formData
    }).then(() => {
        document.getElementById('chatForm').reset();
        loadMessages();
    });
});
</script>
</body>
</html>
