<?php
session_start();
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

$stmt = $db->query("SELECT * FROM messages ORDER BY created_at ASC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($messages as $msg){
    echo "<div class='message'><span class='message-user'>".htmlspecialchars($msg['user']).":</span> ".htmlspecialchars($msg['message'])."</div>";
}
