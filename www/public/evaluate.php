<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        die("Please enter both username and password.");
    }

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: chat.php");
        exit;
    } else {
        die("Incorrect username or password.");
    }
}
?>
