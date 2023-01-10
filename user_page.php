<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once "config.php";
    function  sql_safe($mysqli, $s){
        $s = stripslashes($s);
        return mysqli_real_escape_string($mysqli, $s);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['att'])) {
        $title = trim(sql_safe($link, $_POST['title']));
        if ($title == '') {
            $title = '(nav)';
        }
        if (isset($_FILES['photo'])) {
            @list(, , $imtype, ) = getimagesize($_FILES['photo']['tmp_name']);
            if ($imtype == 3)
                $ext="png";
            elseif ($imtype == 2)
                $ext="jpeg";
            elseif ($imtype == 1)
                $ext="gif";
            else
                $msg = 'Nav zināms attēla formāts';
            if (!isset($msg)) {
                $data = file_get_contents($_FILES['photo']['tmp_name']);
                $data = mysqli_real_escape_string($link, $data);
                // Sagatabojam datus priekð MySQL vaicajuma
                mysqli_query($link, "INSERT INTO foto_gal SET ext='$ext', title='$title',  data='$data'");
                $msg = 'Veiksmīgi atjaunota galerija!';
            }
        } elseif (isset($_GET['title'])) {
            $msg = 'Fails nav ielādējies!';
        }
        mysqli_close($link);
        echo '<div class="alert alert-warning alert-dismissible">
                            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>';
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['del'])) {
        $title = $title = trim(sql_safe($link, $_POST['title']));
        mysqli_query($link, "DELETE FROM foto_gal WHERE title='$title'");
        $msg = 'Attēls ir izdzēsts!';

        mysqli_close($link);
        echo '<div class="alert alert-warning alert-dismissible">
                            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>';
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sutit'])) {
        $zina = trim(sql_safe($link, $_POST['zina']));
        $autors = $_SESSION["username"];
        if ($zina == '') {
            $msg = 'Ievadiet ziņu!';
        } else {
            mysqli_query($link, "INSERT INTO zinojumi SET zina='$zina', autors='$autors'");
            $msg = 'Ziņojums saglabāts!';
        }

        mysqli_close($link);
        echo '<div class="alert alert-warning alert-dismissible">
                                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $msg . '</div>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lietotājs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="user_page.css" rel="stylesheet" type="text/css">
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
                <h2 class="title1">Galerijas rediģēšana</h2>
                <p class="para1">Aizpildiet visus laukus, lai rediģētu galeriju. Lai izdzēstu attēlu ir jāievada tā nosaukums.</p>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <label for="title" class="para1">Nosaukims:</label><br>
                    <input type="text" name="title" id="title" class="form-control" size="64"><br><br>
                    <label for="photo" class="para1">Attēls:</label><br>
                    <input class="custom-file-input" type="file" name="photo" id="photo"><br>
                    <input type="submit" class="btn btn-custom1" name="att" value="Augšuielādēt">
                    <input type="submit" class="btn btn-custom2" name="del" value="Dzēst attēlu">
                </form>
            </div>
            <div class="col-md-4">
                <h2 class="title2">Ziņu pievienošana ziņojumu dēlim</h2>
                <p class="list1">Ievadiet ziņojumu un nosūtiet to.</p>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <p><label class="list1">Ziņojums:</label></p>
                    <textarea id="zina" name="zina" rows="4" cols="50"></textarea><br>
                    <input type="submit" class="btn btn-custom" name="sutit" value="Nosūtīt">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
