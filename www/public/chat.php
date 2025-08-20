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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .chat-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
            height: 600px;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .chat-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .chat-header h2 {
            position: relative;
            z-index: 1;
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }

        .online-indicator {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            margin-top: 8px;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .online-dot {
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            margin-right: 6px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        #chat-box { 
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #f8fafc;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        #chat-box::-webkit-scrollbar {
            width: 6px;
        }

        #chat-box::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        #chat-box::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 8px;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-bubble {
            background: white;
            padding: 12px 16px;
            border-radius: 18px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            max-width: 80%;
            position: relative;
        }

        .message-bubble::before {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 16px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid white;
        }

        .message-username {
            font-weight: 600;
            color: #4f46e5;
            font-size: 0.85rem;
            margin-bottom: 4px;
        }

        .message-text {
            color: #374151;
            line-height: 1.4;
            word-wrap: break-word;
        }

        .chat-input-container {
            padding: 20px;
            background: white;
            border-top: 1px solid #e5e7eb;
        }

        #chat-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        #message {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 25px;
            font-size: 1rem;
            outline: none;
            transition: all 0.2s ease;
            background: #f9fafb;
        }

        #message:focus {
            border-color: #4f46e5;
            background: white;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .send-button {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            min-width: 80px;
            justify-content: center;
        }

        .send-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .send-button:active {
            transform: translateY(0);
        }

        .send-icon {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        /* Responsive design */
        @media (max-width: 640px) {
            .chat-container {
                height: 100vh;
                border-radius: 0;
                max-width: none;
            }
            
            .chat-header {
                padding: 16px;
            }
            
            .chat-header h2 {
                font-size: 1.25rem;
            }
            
            #chat-box {
                padding: 16px;
            }
            
            .chat-input-container {
                padding: 16px;
            }
        }

        /* Loading animation for messages */
        .loading-message {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            background: #f3f4f6;
            border-radius: 18px;
            margin-bottom: 12px;
        }

        .loading-dots {
            display: flex;
            gap: 4px;
        }

        .loading-dot {
            width: 6px;
            height: 6px;
            background: #9ca3af;
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        .loading-dot:nth-child(1) { animation-delay: -0.32s; }
        .loading-dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes bounce {
            0%, 80%, 100% {
                transform: scale(0);
            } 40% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <div class="online-indicator">
                <div class="online-dot"></div>
                Online
            </div>
        </div>
        
        <div id="chat-box"></div>
        
        <div class="chat-input-container">
            <form id="chat-form" method="post" action="send_message.php">
                <input type="text" name="message" id="message" placeholder="Type your message..." required>
                <button type="submit" class="send-button">
                    <svg class="send-icon" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                    Send
                </button>
            </form>
        </div>
    </div>

    <script>
        async function loadMessages() {
            const res = await fetch("load_messages.php");
            const data = await res.json();
            let chatBox = document.getElementById("chat-box");
            chatBox.innerHTML = "";
            data.forEach(msg => {
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message';
                messageDiv.innerHTML = `
                    <div class="message-bubble">
                        <div class="message-username">${msg.username}</div>
                        <div class="message-text">${msg.message}</div>
                    </div>
                `;
                chatBox.appendChild(messageDiv);
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

        document.getElementById("message").addEventListener("keypress", function(e) {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                document.getElementById("chat-form").dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>
</html>
