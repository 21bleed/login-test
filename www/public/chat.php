<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Handle new messages
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message'] ?? '');
    if ($message !== '') {
        $stmt = $db->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
        $stmt->execute([$_SESSION['username'], $message]);
    }
}

// Fetch all messages
$stmt = $db->query("SELECT * FROM messages ORDER BY created_at ASC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body { font-family: Arial, sans-serif; padding: 20px; background-color: #f5f5f5; }
h1 { text-align: center; }
.chat-box { background: #fff; padding: 20px; border-radius: 10px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
.message { margin-bottom: 10px; }
form { display: flex; margin-top: 15px; }
input[type="text"] { flex: 1; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-right: 10px; }
input[type="submit"] { padding: 10px 15px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; cursor: pointer; }
input[type="submit"]:hover { background-color: #45a049; }
</style>
</head>
<body>
<h1>Chat Room</h1>
<div class="chat-box">
    <?php foreach ($messages as $msg): ?>
        <div class="message"><strong><?php echo htmlspecialchars($msg['username']); ?>:</strong> <?php echo htmlspecialchars($msg['message']); ?></div>
    <?php endforeach; ?>
</div>
<form method="post">
    <input type="text" name="message" placeholder="Type your message..." required>
    <input type="submit" value="Send">
</form>
</body>
</html>
