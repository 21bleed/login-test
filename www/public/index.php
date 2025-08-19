<!doctype html>
<html>
<head lang="sv">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      margin: 0;
  }

  h1 {
      color: #333;
      margin-bottom: 20px;
      text-align: center;
  }

  form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px; /* ensures it doesn't get too wide on big screens */
      box-sizing: border-box;
      margin-bottom: 30px;
  }

  fieldset {
      border: none;
      padding: 0;
  }

  legend {
      font-size: 1.2em;
      font-weight: bold;
      margin-bottom: 10px;
  }

  label {
      display: block;
      margin-top: 10px;
      margin-bottom: 5px;
      color: #555;
  }

  input[type="text"],
  input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      font-size: 1em;
  }

  input[type="submit"] {
      margin-top: 15px;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      font-size: 1em;
      cursor: pointer;
      width: 100%;
  }

  input[type="submit"]:hover {
      background-color: #45a049;
  }

  .images {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
  }

  .images img {
      max-width: 100%;
      width: 200px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
  }

  @media (max-width: 500px) {
      form {
          padding: 15px;
      }
      input[type="text"],
      input[type="password"],
      input[type="submit"] {
          font-size: 0.9em;
      }
      .images img {
          width: 100%;
          max-width: 150px;
      }
  }
</style>
</head>
<body>
<h1>Login-test</h1>
<form action="evaluate.php" method="post">
   <fieldset>
       <legend>Login</legend>
       <label>Username</label>
       <input type="text" name="q1">
       <br>
       <label>Password</label>
       <input type="password" name="q2">
       <br>
       <input type="submit" value="Login">
   </fieldset>
</form>
<div class="images">
    <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSjw2xfEfIVI05AIvM78gs4PZj7UR9ov0Pl7xuPkoNItEOsUC9IvLbYNRHEFaPOtMts__XNb-nbw_2qWQk_WbY9PfMs4Qi_hpLwS1Ywxws" alt="burger">
    <img src="https://i.makeagif.com/media/5-12-2023/SqaT-c.gif" alt="car">
</div>
</body>
</html>
