<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['q1'] ?? '';
    $password = $_POST['q2'] ?? '';

    if ($username === '' || $password === '') {
        die("Fyll i både användarnamn och lösenord.");
    }

    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: chat.php");
        exit;
    } else {
        die("Felaktigt användarnamn eller lösenord.");
    }
}
