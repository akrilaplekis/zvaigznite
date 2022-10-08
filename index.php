<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Zvaigznīte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="header">
        <a href="#default" class="logo">Zvaigznīte</a>
        <div class="header-right">
            <a>Grupa 1</a>
            <a>Grupa 2</a>
            <a>Grupa 3</a>
            <a>Grupa 4</a>
            <a>Grupa 5</a>
            <a>Grupa 6</a>
            <a>Jaunumi</a>
            <a href="foto.php">Foto Galerija</a>
            <a>Kalendārs</a>
            <a href="kontakti.html">Kontakti</a>
            <a href="log_in.php">Pieslēgties</a>
        </div>
    </div>
   
    <form method="post" action="process.php">
  Enter name: <input type="text" name="fname">
  <input type="submit">
</form>


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
