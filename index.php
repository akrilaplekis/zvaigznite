<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Zvaigznīte</title>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title1">Par mums</h1>
                <p class="para1">Mēs piedāvājam izglītojošu, radošu un dzīvespriecīgu vidi jūsu bērnam. Mūsu izglītojamie profesionālu, pieredzējušu un radošu pedagogu vadībā apgūs pirmskolas izglītības programmu un tiks sagatavoti skolas gaitu uzsākšanai.</p>
                <h1 class="title1">Uzņemšana</h1>
                <p class="para1">Pirmsskolas izglītības programmā tiek uzņemti bērni vecumā no 1,6 gadiem.</p>
                <p class="para1">Pa vecuma grupām:</p>
                <ul>
                    <li class="list2">Bitītes - 1,5 līdz 2 gadi</li>
                    <li class="list2">Pienenes - 3 gadi</li>
                    <li class="list2">Kumelītes - 4 gadi</li>
                    <li class="list2">Saulespuķes - 5 gadi</li>
                    <li class="list2">Zvaniņi - 6 gadi</li>
                    <li class="list2">Rudzupuķes - 6 gadi</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h2 class="title2">Ikdiena</h2>
                <ul>
                    <li class="list1">7:00 - 8:30 Bērnu ierašanās iestādē</li>
                    <li class="list1">8:30 - 8:50 Brokastis</li>
                    <li class="list1">9:00 - 10:30 Nodarbības</li>
                    <li class="list1">10:30 - 12:00 Aktivitātes svaigā gaisā</li>
                    <li class="list1">12:00 - 12:20 Pusdienas</li>
                    <li class="list1">12:30 - 15:00 Atpūta</li>
                    <li class="list1">15:30 - 15:50 Launags</li>
                    <li class="list1">16:00 - 17:00 Nodarbības</li>
                    <li class="list1">17:00 - 19:00 Bērni dodas mājās</li>
                </ul>
            </div>
            <div class="col-md-2">
                <h2 class="title2">Ziņojumu dēlis</h2>
            </div>
        </div>
    </div>

</body>
</html>
