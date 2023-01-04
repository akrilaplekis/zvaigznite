<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zvaigznīte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="foto.css" rel="stylesheet" type="text/css">
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
                <li><a href="#">Vecākiem</a></li>
                <li><a href="foto.php">Foto Galerija</a></li>
                <li><a href="kontakti.html">Kontakti</a></li>
                <li><a href="log_in.php">Pieslēgties</a></li>
            </ul>
        </div>
    </nav>

    <?php
    require_once "config.php";
    $result = $link->query("SELECT data FROM foto_gal ORDER BY foto_id DESC");
    $att = array();

    if($result->num_rows > 0){ ?>
        <div class="gallery">
            <?php while($row = $result->fetch_assoc()){
                $att[] = $row['data'];
            } ?>
        </div>
    <?php }else{ ?>
        <p class="status error">Image(s) not found...</p>
    <?php } ?>


    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Foto ar bērnu darbiem</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($att[0]); ?>" class="img-rounded" alt="Cinque Terre" width="236" height="306"/>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($att[1]); ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                    </div>
                </div>
            </div>
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Rotaļlietas</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($att[5]); ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($att[2]); ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($att[4]); ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                    </div>
                </div>
            </div>
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Spēļlaukumi</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($att[3]); ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/></div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

