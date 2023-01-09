<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lietotājs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ffdb57;">
    <nav class="navbar navbar-custom navbar-fixed-to">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Zvaigznīte</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Grupas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="grupas.php?id=1">Bitītes</a></li>
                        <li><a href="grupas.php?id=2">Pienenes</a></li>
                        <li><a href="grupas.php?id=3">Kumelītes</a></li>
                        <li><a href="grupas.php?id=4">Saulespuķes</a></li>
                        <li><a href="grupas.php?id=5">Zvaniņi</a></li>
                        <li><a href="grupas.php?id=6">Rudzupuķes</a></li>
                    </ul>
                </li>
                <li><a href="vacakiem.php">Vecākiem</a></li>
                <li><a href="foto.php">Foto Galerija</a></li>
                <li><a href="kontakti.php">Kontakti</a></li>
                <li><a href="log_in.php">Pieslēgties</a></li>
                <?php
                if(!empty($_SESSION)) {
                    if($_SESSION["loma"] == 'admin'){
                        echo '<li><a href="admin_page.php">Administrātors</a></li>';
                        echo '<li><a href="iziet.php">Iziet</a></li>';
                    } elseif ($_SESSION["loma"] == 'lietotājs'){
                        echo '<li><a href="user_page.php">Lietotājs</a></li>';
                        echo '<li><a href="iziet.php">Iziet</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </nav>


</body>
</html>
