<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = "Please enter both username and password.";
    } else {
        // Check if username already exists
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            $error = "Username already exists.";
        } else {
            // Insert new user
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hash]);
            header("Location: index.php");
            exit;
        }
    }
}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body { font-family: Arial, sans-serif; background-color: #f5f5f5; display: flex; flex-direction: column; align-items: center; padding: 20px; margin: 0; }
form { background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; box-sizing: border-box; margin-bottom: 15px; }
input[type="text"], input[type="password"] { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box; font-size: 1em; }
input[type="submit"] { margin-top: 15px; padding: 10px 15px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; font-size: 1em; cursor: pointer; width: 100%; }
input[type="submit"]:hover { background-color: #45a049; }
.error { color: red; margin-top: 10px; }
</style>
</head>
<body>
<h1>Register</h1>
<form method="post">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <input type="submit" value="Register">
</form>
<?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
<a href="index.php">Back to Login</a>
</body>
</html>
