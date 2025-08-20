<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

require_once "db.php"; // your PDO connection

$username = $_SESSION['username'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat Room</title>
<style>
body { font-family: Arial; padding: 20px; }
#chatbox { border: 1px solid #ccc; height: 300px; overflow-y: scroll; padding: 10px; margin-bottom: 10px; }
input[type=text] { width: 80%; padding: 8px; }
button { padding: 8px; }
</style>
<script>
function sendMessage() {
    const msg = document.getElementById("message").value;
    if(msg.trim() === "") return;

    fetch("send_message.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "message=" + encodeURIComponent(msg)
    }).then(() => {
        document.getElementById("message").value = "";
    });
}

function loadMessages() {
    fetch("load_messages.php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("chatbox").innerHTML = data;
        document.getElementById("chatbox").scrollTop = document.getElementById("chatbox").scrollHeight;
    });
}

// refresh every 1 second
setInterval(loadMessages, 1000);

// open private chat
function openPrivateChat(user) {
    window.open("private_chat.php?user=" + encodeURIComponent(user), "_blank", "width=500,height=500");
}
</script>
</head>
<body>
<h2>Public Chat</h2>
<div id="chatbox"></div>

<input type="text" id="message" placeholder="Type your message">
<button onclick="sendMessage()">Send</button>

<h3>Users:</h3>
<?php
$users = $db->query("SELECT username FROM users WHERE username != '$username'");
foreach($users as $u){
    echo '<button onclick="openPrivateChat(\''.$u['username'].'\')">'.$u['username'].'</button> ';
}
?>
</body>
</html>
