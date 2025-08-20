<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "[]"; // no logged in user, return empty list
    exit;
}

$stmt = $pdo->query("SELECT id, username FROM users");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

?>
