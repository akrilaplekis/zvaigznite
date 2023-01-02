<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="header">
        <a href="index.php" class="logo">Zvaigznīte</a>
        <div class="header-right">
            <div class="dropdown">
                <button class="dropbtn">Grupas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#">Zvaniņi</a>
                    <a href="#">Bitītes</a>
                    <a href="#">Kumelītes</a>
                </div>
            </div>
            <a>Jaunumi</a>
            <a href="foto.php">Foto Galerija</a>
            <a>Kalendārs</a>
            <a href="kontakti.html">Kontakti</a>
            <a href="log_in.php">Pieslēgties</a>
        </div>
    </div>

    <div class="container">
        <div>
            <label for="uname"><b>Lietotāja vārds</b></label>
        </div><div>
            <input type="text" placeholder="Ievadiet lietotāja vārdu" name="uname" required>
        </div>
        <div>
            <label for="psw"><b>Parole</b></label>
        </div><div>
            <input type="password" placeholder="Ievadiet paroli" name="psw" required>
        </div>

      <button type="submit">Pierakstīties</button>
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
