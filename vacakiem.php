<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vecākiem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="vecakiem.css" rel="stylesheet" type="text/css">
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
                <li><a href="log_in.php">Pieslēgties</a></li>
            </ul>
        </div>
    </nav>

    <?php
    // define variables and set to empty values
    $v_vards = $v_uzvards = $b_vards = $epasts = $tel = "";
    $errvv = $errbv = $erremail = $errvecums = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["vvards"])) {
            $errvv = "Vecākā vārds ir jāievada!";
        }

        if (empty($_POST["bvards"])) {
            $errbv = "Bērna vārds ir jāievada!";
        }

        if (empty($_POST["email"])) {
            $erremail = "E-pasts ir jāievada!";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erremail = "Formāts nav pareizs!";
            }
        }

        if (empty($_POST["komentars"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["komentars"]);
        }

        if (empty($_POST["vuzv"])) {
            $uzvards = "";
        } else {
            $uzvards = test_input($_POST["vuzv"]);
        }

        if (empty($_POST["tel"])) {
            $telefons = "";
        } else {
            $telefons = test_input($_POST["tel"]);
        }

        if (empty($_POST["vecums"])) {
            $errvecums = "Jānorāda bērna vecums!";
        } else {
            $vecums = test_input($_POST["vecums"]);
        }
    }
    $info = array();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $info = $data;
        return $data;
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-4">
                <h2 class="title2">Pieteikt bērnu rindā</h2>
                <form form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <label class="formt" for="vv">Vecāka vārds:</label>
                        <input type="text" class="form-control" id="vvards" placeholder="Vecāka vārds" name="vvards">
                        <span class="error">* <?php echo $errvv;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt" for="vv">Vecāka uzvārds:</label>
                        <input type="text" class="form-control" id="vuzv" placeholder="Vecāka uzvārds" name="vuzv">
                    </div>
                    <div class="form-group">
                        <label class="formt" for="bv">Bērna vārds:</label>
                        <input type="text" class="form-control" id="bvards" placeholder="Bērna vārds" name="bvards">
                        <span class="error">* <?php echo $errbv;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt" for="vecums">Bērna vecums:</label><br>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums">1,5
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" class="formt">2
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums">3
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums">4
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums">5
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums">6
                        </label>
                        <span class="error">* <?php echo $errvecums;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt" for="tel">Vecāka telefona numurs:</label>
                        <input type="text" class="form-control" id="tel" placeholder="Tel." name="tel">
                    </div>
                    <div class="form-group">
                        <label class="formt" for="email">Vecāka e-pasts:</label>
                        <input type="email" class="form-control" id="email" placeholder="E-pasts" name="email">
                        <span class="error">* <?php echo $erremail;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt"  for="komentars">Komentārs:</label>
                        <textarea class="form-control" rows="5" id="komentas"></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom">Iesniegt</button>
                </form>
            </div>
        </div>
    </div>


    <?php
    echo "<h2>Your Input:</h2>";
    print_r($info);
    ?>

</body>
</html>

