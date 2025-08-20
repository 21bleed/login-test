<?php
define('DB_USER', 'pma');
define('DB_PASSWORD', '12345');
define('DB_HOST', 'mariadb');
define('DB_NAME', 'Users');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunde inte ansluta till databasen: " . $e->getMessage());
}
?>
