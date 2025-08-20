<?php
session_start();
if(!isset($_SESSION['username'])) exit;
define('DB_USER', 'appuser');    
define('DB_PASSWORD', '12345');   
define('DB_HOST', 'mariadb');     
define('DB_NAME', 'Users');      

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['message'])){
    $stmt = $db->prepare("INSERT INTO messages (user, message) VALUES (?, ?)");
    $stmt->execute([$_SESSION['username'], $_POST['message']]);
}
