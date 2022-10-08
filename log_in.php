<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="index.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="header">
        <a href="index.php" class="logo">Zvaigznīte</a>
        <div class="header-right">
            <a>Grupa 1</a>
            <a>Grupa 2</a>
            <a>Grupa 3</a>
            <a>Grupa 4</a>
            <a>Grupa 5</a>
            <a>Grupa 6</a>
            <a>Jaunumi</a>
            <a>Foto Galerija</a>
            <a>Kalendārs</a>
            <a>Kontakti</a>
            <a>Pieslēgties</a>
        </div>
    </div>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['fname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>

</body>


</html>
