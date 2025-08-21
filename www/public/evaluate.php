<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Resultat</title>
</head>
<body>
<h1>Resultat</h1>
<?php
$amount = $_POST['amount'] ?? '';
$conversion = $_POST['conversion'] ?? '';

if (is_numeric($amount)) {
    if ($conversion == 'sek') {
        $result = $amount * 9.59;
        echo "<p>$amount $ = $result kr</p>";
    } elseif ($conversion == 'euro') {
        $result = $amount * 0.86;
        echo "<p>$amount $ = $result €</p>";
    }
} else {
    echo "<p>Fyll i ett giltigt tal.</p>";
}
?>
<button onclick="window.location.href='index.php'">Gå tillbaka</button>

</body>
</html>
