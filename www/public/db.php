<?php
// DB connection info
define('DB_USER', 'pma');
define('DB_PASSWORD', '12345');
define('DB_HOST', 'mariadb');
define('DB_NAME', 'Users');

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunde inte ansluta till databasen: " . $e->getMessage());
}
