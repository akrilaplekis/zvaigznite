<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kontakti</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="kontakti.css" rel="stylesheet" type="text/css">
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
                <li><a href="kontakti.html">Kontakti</a></li>
                <?php
                    if(empty($_SESSION)){
                        echo '<li><a href="log_in.php">Pieslēgties</a></li>';
                    }
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

    <div class="kontDiv">
        <div>
            <dl class="kontList">
                <dt class="dt">Direktors:</dt>
                <dd>Evita Eisaka</dd>
                <dt class="dt">Vadītājs:</dt>
                <dd>Iveta Kleina</dd>
                <dt class="dt">Tālr.:</dt>
                <dd>26 748 582</dd>
                <dt class="dt">E-pasts:</dt>
                <dd>test@pasts.lv</dd>
                <dt class="dt">Darba laiks:</dt>
                <dd>7:00-19:00</dd>
            </dl>
        </div>
        <div>
            <h1 class="title1">Atrašanās vieta</h1>
            <h2 class="title1">Krišjāņa Barona iela 46a , Rīga, Latvia</h2>
        </div>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2193.3520788864043!2d23.711106815965632!3d56.651005280803105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46ef25484dae3fcd%3A0x37a500b5d2ece1be!2zS3JpxaFqxIHFhmEgQmFyb25hIGllbGEgNDZBLCBKZWxnYXZhLCBMVi0zMDAx!5e0!3m2!1slv!2slv!4v1672617023796!5m2!1slv!2slv" width="800" height="450" style="margin: 5%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </iframe>
        </div>
    </div>
</body>
</html>
