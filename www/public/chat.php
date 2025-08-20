<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <style>
        #chat-box { width: 600px; height: 300px; border: 1px solid #ccc; overflow-y: scroll; margin-bottom: 10px; }
        #users { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Public Chat</h2>
    <div id="chat-box"></div>
    <input type="text" id="message" placeholder="Type your message">
    <button onclick="sendMessage()">Send</button>

    <h3>Users:</h3>
    <div id="users"></div>

<script>
let receiverId = null; // null = public chat

function loadMessages() {
    let url = "load_messages.php";
    if (receiverId) {
        url += "?receiver_id=" + receiverId;
    }
    fetch(url)
        .then(res => res.text())
        .then(data => {
            document.getElementById("chat-box").innerHTML = data;
        });
}

function sendMessage() {
    const msg = document.getElementById("message").value;
    if (!msg.trim()) return;

    fetch("send_message.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "message=" + encodeURIComponent(msg) + "&receiver_id=" + (receiverId ? receiverId : "")
    }).then(() => {
        document.getElementById("message").value = "";
        loadMessages();
    });
}

function loadUsers() {
    fetch("users.php")
        .then(res => res.text())
        .then(data => {
            document.getElementById("users").innerHTML = data;
        });
}

function openPrivateChat(id, username) {
    receiverId = id;
    document.querySelector("h2").innerText = "Private Chat with " + username;
    loadMessages();
}

function openPublicChat() {
    receiverId = null;
    document.querySelector("h2").innerText = "Public Chat";
    loadMessages();
}

// Auto update
setInterval(loadMessages, 2000);
setInterval(loadUsers, 5000);

loadMessages();
loadUsers();
</script>
</body>
</html>
