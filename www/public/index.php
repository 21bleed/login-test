<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Valutakonverterare</title>
</head>
<body>
<h1>Valutakonverterare</h1>
<form action="evaluate.php" method="post">
    <label>Ange belopp i dollar:</label>
    <input type="text" name="amount">
    <select name="conversion">
        <option value="sek">Till SEK</option>
        <option value="euro">Till EURO</option>
    </select>
    <input type="submit" value="Konvertera">
</form>
</body>
</html>