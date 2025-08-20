<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat Room</title>
    <style>
        body { font-family: Arial, sans-serif; }
        #chat-box { width: 500px; height: 300px; border: 1px solid #ccc; overflow-y: scroll; padding: 10px; }
        #message { width: 400px; }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <div id="chat-box"></div>
    <form id="chat-form" method="post" action="send_message.php">
        <input type="text" name="message" id="message" required>
        <button type="submit">Send</button>
    </form>

    <script>
        async function loadMessages() {
            const res = await fetch("load_messages.php");
            const data = await res.json();
            let chatBox = document.getElementById("chat-box");
            chatBox.innerHTML = "";
            data.forEach(msg => {
                chatBox.innerHTML += `<p><strong>${msg.username}:</strong> ${msg.message}</p>`;
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // auto refresh
        setInterval(loadMessages, 2000);
        loadMessages();

        // prevent double sending
        document.getElementById("chat-form").addEventListener("submit", async function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            await fetch("send_message.php", { method: "POST", body: formData });
            this.reset();
        });
    </script>
</body>
</html>
