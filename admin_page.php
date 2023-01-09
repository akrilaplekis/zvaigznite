<?php
    require_once "config.php";

    $username = $password = $confirm_password = $vards = $uzvards = $loma = "";
    $username_err = $password_err = $confirm_password_err = $loma_err = $vards_err = $uzvards_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            $username_err = "Ievadiet lietotāja vārdu!";
        } else {
            $sql = "SELECT id FROM lietotaji WHERE liet_v = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = trim($_POST["username"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Lietotāja vārds jau eksistē!";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "Kaut kas nogāja greizi!";
                }
                mysqli_stmt_close($stmt);
            }
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Ievadiet paroli!";
        } else{
            $password = trim($_POST["password"]);
        }

        if(empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Apstipriniet paroli!";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Paroles nesakrīt!";
            }
        }

        if(empty(trim($_POST["vards"]))){
            $vards_err = "Ievadiet vārdu!";
        } else{
            $vards = trim($_POST["vards"]);
        }

        if(empty(trim($_POST["uzvards"]))){
            $uzvards_err = "Ievadiet uzvārdu!";
        } else{
            $uzvards = trim($_POST["uzvards"]);
        }

        if(empty(trim($_POST["loma"]))){
            $loma_err = "Ievadiet lomu!";
        } elseif (trim($_POST["loma"]) == 'admin' || trim($_POST["loma"]) == 'lietotājs') {
            $loma = trim($_POST["loma"]);
        } else {
            $loma_err = "Loma neeksistē!";
        }

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)  && empty($vards_err) && empty($uzvards_err) && empty($loma_err)){
            $sql = "INSERT INTO lietotaji (liet_v, parole, darb_vards, darb_uzvards, loma) VALUES (?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_vards, $param_uzvards, $param_loma);

                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                $param_vards = $vards;
                $param_uzvards = $uzvards;
                $param_loma = $loma;

                if(mysqli_stmt_execute($stmt)){
                    echo '<div class="alert alert-success alert-dismissible">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>Jauns lietotājs ir reģistrēts!</div>';
                    $_POST = array();
                } else{
                    echo "Kaut kas nogāja greizi!";
                }

                mysqli_stmt_close($stmt);
            }
        }
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Administrātors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="admin_page.css" rel="stylesheet" type="text/css">
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
                <li><a href="admin_page.php">Profils</a></li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <h2 class="title2">Lietotāja rediģēšana</h2>
                <p class="list1">Aizpildiet visus laukus, lai rediģētu lietotāju.</p>
            </div>
            <div class="col-md-3">
                <h2 class="title2">Jauna lietotāja reģistrācija</h2>
                <p class="list1">Aizpildiet visus laukus, lai piereģistrētu jaunu darbinieku vai vadītāju.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label class="list1">Lietotāja vārds</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                        <span class="pazinojums"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="list1">Parole</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="pazinojums"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="list1">Apstipriniet paroli</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="pazinojums"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="list1">Darbinieka vārds</label>
                        <input type="text" name="vards" class="form-control <?php echo (!empty($vards_err)) ? 'is-invalid' : ''; ?>">
                        <span class="pazinojums"><?php echo $vards_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="list1">Darbinieka uzvārds</label>
                        <input type="text" name="uzvards" class="form-control <?php echo (!empty($uzvards_err)) ? 'is-invalid' : ''; ?>">
                        <span class="pazinojums"><?php echo $uzvards_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="list1">Loma (admin, lietotājs)</label>
                        <input type="text" name="loma" class="form-control <?php echo (!empty($loma_err)) ? 'is-invalid' : ''; ?>">
                        <span class="pazinojums"><?php echo $loma_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-custom" value="Reģistrēt">
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                <h2 class="title1">Galerijas rediģēšana</h2>
                <p class="para1">Aizpildiet visus laukus, lai rediģētu galeriju.</p>
            </div>
        </div>
    </div>

</body>
</html>