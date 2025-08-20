<?php
// db.php
define('DB_USER', 'pma');       // MariaDB username
define('DB_PASSWORD', '12345');  // Password
define('DB_HOST', 'mariadb');    // Host (docker container name or server)
define('DB_NAME', 'Users');      // Database name

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunde inte ansluta till databasen: " . $e->getMessage());
}
?>
