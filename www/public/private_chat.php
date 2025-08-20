<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: index.php");
require_once "db.php";

if(!isset($_GET['user'])) exit("No user specified");

$otherUser = $_GET['user'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Private Chat with <?=htmlspecialchars($otherUser)?></title>
<script>
function sendPrivateMessage() {
    const msg = document.getElementById("pmessage").value;
    if(msg.trim() === "") return;

    fetch("send_private_message.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "to=<?=urlencode($otherUser)?>&message=" + encodeURIComponent(msg)
    }).then(() => { document.getElementById("pmessage").value = ""; });
}

function loadPrivateMessages() {
    fetch("load_private_messages.php?user=<?=urlencode($otherUser)?>")
    .then(res => res.text())
    .then(data => {
        document.getElementById("pchatbox").innerHTML = data;
        document.getElementById("pchatbox").scrollTop = document.getElementById("pchatbox").scrollHeight;
    });
}

setInterval(loadPrivateMessages, 1000);
</script>
<style>
#pchatbox { border: 1px solid #ccc; height: 300px; overflow-y: scroll; padding: 10px; margin-bottom: 10px; }
input[type=text] { width: 80%; padding: 8px; }
button { padding: 8px; }
</style>
</head>
<body>
<h3>Private Chat with <?=htmlspecialchars($otherUser)?></h3>
<div id="pchatbox"></div>
<input type="text" id="pmessage" placeholder="Type message">
<button onclick="sendPrivateMessage()">Send</button>
</body>
</html>
