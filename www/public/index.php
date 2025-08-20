<!doctype html>
<html>
<head lang="sv">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body { font-family: Arial; background: #f5f5f5; display:flex; flex-direction: column; align-items: center; padding:20px; margin:0; }
  h1 { color:#333; margin-bottom:20px; text-align:center; }
  form { background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); width:100%; max-width:400px; box-sizing:border-box; margin-bottom:15px;}
  label { display:block; margin-top:10px; margin-bottom:5px; color:#555; }
  input[type="text"], input[type="password"] { width:100%; padding:10px; border-radius:5px; border:1px solid #ccc; font-size:1em; box-sizing:border-box; }
  input[type="submit"], .register-btn { margin-top:15px; padding:10px; border:none; border-radius:5px; background:#4CAF50; color:white; font-size:1em; cursor:pointer; width:100%; }
  input[type="submit"]:hover, .register-btn:hover { background:#45a049; }
  .images { display:flex; flex-wrap:wrap; justify-content:center; gap:15px; margin-top:20px; }
  .images img { max-width:100%; width:200px; height:auto; border-radius:10px; box-shadow:0 3px 6px rgba(0,0,0,0.2); }
</style>
</head>
<body>
<h1>Login-test</h1>
<form action="evaluate.php" method="post">
   <fieldset>
       <legend>Login</legend>
       <label>Username</label>
       <input type="text" name="username">
       <label>Password</label>
       <input type="password" name="password">
       <input type="submit" value="Login">
   </fieldset>
</form>

<a href="register.php" class="register-btn">Registrera</a>

<div class="images">
    <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSjw2xfEfIVI05AIvM78gs4PZj7UR9ov0Pl7xuPkoNItEOsUC9IvLbYNRHEFaPOtMts__XNb-nbw_2qWQk_WbY9PfMs4Qi_hpLwS1Ywxws" alt="burger">
    <img src="https://i.makeagif.com/media/5-12-2023/SqaT-c.gif" alt="car">
</div>
</body>
</html>
