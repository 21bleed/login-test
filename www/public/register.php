<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        die("Fyll i alla fält.");
    }

    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        die("Användaren finns redan.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);

    $_SESSION['user_id'] = $db->lastInsertId();
    $_SESSION['username'] = $username;

    header("Location: chat.php");
    exit;
}
?>

<!doctype html>
<html lang="sv">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body { font-family: Arial; background:#f5f5f5; display:flex; flex-direction:column; align-items:center; padding:20px; }
form { background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); width:100%; max-width:400px; }
input { width:100%; padding:10px; margin-bottom:10px; border-radius:5px; border:1px solid #ccc; }
input[type="submit"] { background:#4CAF50; color:white; border:none; cursor:pointer; }
</style>
</head>
<body>
<h1>Register</h1>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Register">
</form>
<a href="index.php">Back to Login</a>
</body>
</html>
