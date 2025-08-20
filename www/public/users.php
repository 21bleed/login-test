<?php
session_start();
require 'db.php'; // this defines $pdo

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]); // no logged-in user
    exit;
}

$stmt = $pdo->query("SELECT id, username FROM users");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
