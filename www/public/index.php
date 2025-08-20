<?php session_start(); ?>
<!doctype html>
<html lang="sv">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body { font-family: Arial; background: #f5f5f5; display:flex; flex-direction:column; align-items:center; padding:20px; }
  h1 { color:#333; }
  form { background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); width:100%; max-width:400px; }
  input[type="text"], input[type="password"] { width:100%; padding:10px; margin-bottom:10px; }
  input[type="submit"], .btn-register { width:100%; padding:10px; margin-top:10px; background:#4CAF50; color:white; border:none; border-radius:5px; cursor:pointer; }
  .btn-register { text-align:center; text-decoration:none; display:block; }
</style>
</head>
<body>
<h1>Login</h1>
<form action="evaluate.php" method="post">
    <input type="text" name="q1" placeholder="Username" required>
    <input type="password" name="q2" placeholder="Password" required>
    <input type="submit" value="Login">
</form>
<a href="register.php" class="btn-register">Register</a>
</body>
</html>
