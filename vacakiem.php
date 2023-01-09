<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
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
                <li><a href="kontakti.php">Kontakti</a></li>
                <li><a href="log_in.php">Pieslēgties</a></li>
                <?php
                    if(!empty($_SESSION)) {
                        if($_SESSION["loma"] == 'admin'){
                            echo '<li><a href="admin_page.php">Administrātors</a></li>';
                            echo '<li><a href="iziet.php">Iziet</a></li>';
                        } elseif ($_SESSION["loma"] == 'lietotājs'){
                            echo '<li><a href="admin_page.php">Lietotājs</a></li>';
                            echo '<li><a href="iziet.php">Iziet</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>
    </nav>

    <?php
    // define variables and set to empty values
    $v_vards = $v_uzvards = $b_vards = $epasts = $tel = $komentars = "";
    $errvv = $errbv = $erremail = $errvecums = "";
    $info = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["vvards"])) {
            $errvv = "Vecākā vārds ir jāievada!";
        } else {
            $info[] = test_input($_POST["vvards"]);
        }

        if (empty($_POST["vuzv"])) {
            $info[] = "";
        } else {
            $info[] = test_input($_POST["vuzv"]);
        }

        if (empty($_POST["bvards"])) {
            $errbv = "Bērna vārds ir jāievada!";
        } else {
            $info[] = test_input($_POST["bvards"]);
        }

        if (empty($_POST["vecums"])) {
            $errvecums = "Jānorāda bērna vecums!";
        } else {
            $info[] = test_input($_POST["vecums"]);
        }

        if (empty($_POST["tel"])) {
            $info[] = "";
        } else {
            $info[] = test_input($_POST["tel"]);
        }

        if (empty($_POST["email"])) {
            $erremail = "E-pasts ir jāievada!";
        } else {
            // check if e-mail address is well-formed
            if (filter_var($epasts, FILTER_VALIDATE_EMAIL)) {
                $erremail = "Formāts nav pareizs!";
            } else {
                $info[] = test_input($_POST["email"]);
            }
        }

        if (empty($_POST["komentars"])) {
            $info[] = "";
        } else {
            $info[] = test_input($_POST["komentars"]);
        }

        if($errvv == "" && $errbv == "" && $erremail == "" && $errvecums == ""){
            save_info($info);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function save_info($info) {
        require_once "config.php";

        $sql = "INSERT INTO p_rinda VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]')";

        if ($link->query($sql) === TRUE) {
            echo '<div class="alert alert-success alert-dismissible">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>Paldies! Jūsu pieteikums ir saglabāts.</div>';
        }
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

                <h1 class="title1">Dokumenti</h1>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Iekšējās kartības noteikumi</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Covid-19 informācija</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Gripas epidēmijas noteikumi</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Izglītības programma</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Licenze</a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Pašvērtējums</a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Darba drošības instrukcija</a>
                            </h4>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Uguns drošības instrukcija</a>
                            </h4>
                        </div>
                        <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">kaut kas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="title2">Pieteikt bērnu rindā</h2>
                <p class="list1">Ar * atzīmēti obligātie lauki</p>
                <form form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <label class="formt" for="vv">Vecāka vārds: *</label>
                        <input type="text" class="form-control" id="vvards" placeholder="Vecāka vārds" name="vvards" value="<?php echo $v_vards;?>">
                        <span class="pazinojums"><?php echo $errvv;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt" for="vv">Vecāka uzvārds:</label>
                        <input type="text" class="form-control" id="vuzv" placeholder="Vecāka uzvārds" name="vuzv" value="<?php echo $v_uzvards;?>">
                    </div>
                    <div class="form-group">
                        <label class="formt" for="bv">Bērna vārds: *</label>
                        <input type="text" class="form-control" id="bvards" placeholder="Bērna vārds" name="bvards" value="<?php echo $b_vards;?>">
                        <span class="pazinojums"><?php echo $errbv;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt" for="vecums">Bērna vecums: *</label><br>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" <?php if (isset($vecums) && $vecums=="1,5") echo "checked";?> value="1,5">1,5
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" <?php if (isset($vecums) && $vecums=="2") echo "checked";?> value="2">2
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" <?php if (isset($vecums) && $vecums=="3") echo "checked";?> value="3">3
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" <?php if (isset($vecums) && $vecums=="4") echo "checked";?> value="4">4
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" <?php if (isset($vecums) && $vecums=="5") echo "checked";?> value="5">5
                        </label>
                        <label class="radio-inline" style="color: #ddd">
                            <input type="radio" name="vecums" <?php if (isset($vecums) && $vecums=="6") echo "checked";?> value="6">6
                        </label>
                        <span class="pazinojums"><?php echo $errvecums;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt" for="tel">Vecāka telefona numurs:</label>
                        <input type="text" class="form-control" id="tel" placeholder="Tel." name="tel"  value="<?php echo $tel;?>">
                    </div>
                    <div class="form-group">
                        <label class="formt" for="email">Vecāka e-pasts: *</label>
                        <input type="email" class="form-control" id="email" placeholder="E-pasts" name="email"  value="<?php echo $epasts;?>">
                        <span class="pazinojums"><?php echo $erremail;?></span>
                    </div>
                    <div class="form-group">
                        <label class="formt"  for="komentars">Komentārs:</label>
                        <textarea class="form-control" rows="5" id="komentars" name="komentars"><?php echo $komentars;?></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom">Iesniegt</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

