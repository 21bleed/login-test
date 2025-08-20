<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['q1'] ?? '';
    $password = $_POST['q2'] ?? '';

    if ($username === '' || $password === '') {
        die('Please enter both username and password');
    }

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to chat room
        header("Location: chat.php");
        exit;
    } else {
        die('Invalid username or password');
    }
}
