<?php
session_start();
require 'db.php';

// Only logged-in users
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat Room</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    #chat-box { border: 1px solid #ccc; padding: 10px; height: 300px; overflow-y: scroll; }
    #message { width: 80%; padding: 5px; }
    #send { padding: 5px 10px; }
    .msg { margin-bottom: 10px; }
    .username { font-weight: bold; }
</style>
</head>
<body>
<h1>Chat Room</h1>
<div id="chat-box"></div>

<form id="chat-form">
    <input type="text" id="message" name="message" autocomplete="off" placeholder="Type your message...">
    <button type="submit" id="send">Send</button>
</form>

<script>
function fetchMessages() {
    fetch('get_messages.php')
        .then(response => response.text())
        .then(data => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML = data;
            chatBox.scrollTop = chatBox.scrollHeight; // scroll to bottom
        });
}

// Fetch messages every 2 seconds
setInterval(fetchMessages, 2000);
fetchMessages(); // initial fetch

// Handle form submission
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const message = document.getElementById('message').value.trim();
    if (message === '') return;

    fetch('send_message.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'message=' + encodeURIComponent(message)
    }).then(() => {
        document.getElementById('message').value = '';
        fetchMessages(); // update immediately
    });
});
</script>
</body>
</html>
