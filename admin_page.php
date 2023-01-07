<?php
    require_once "config.php";

    $username = $password = $confirm_password = $vards = $uzvards = $loma = "";
    $username_err = $password_err = $confirm_password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            $username_err = "Ievadiet lietotāja vārdu!";
        } else{
            $sql = "SELECT id FROM lietotaji WHERE liet_v = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = trim($_POST["username"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Lietotāja vārds jau eksistē!";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
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

        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Apstipriniet paroli!";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Paroles nesakrīt!";
            }
        }

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            $sql = "INSERT INTO lietotaji (liet_v, parole) VALUES (?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                if(mysqli_stmt_execute($stmt)){
                    header("location: login.php");
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
                <h2>Jauna lietotāja reģistrācija</h2>
                <p>Aizpildiet visus laukus, lai piereģistrētu jaunu darbinieku vai vadītāju.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Lietotāja vārds</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Parole</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Apstipriniet paroli</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Darbinieka vārds</label>
                        <input type="text" name="vards" value="<?php echo $vards; ?>">
                    </div>
                    <div class="form-group">
                        <label>Darbinieka uzvārds</label>
                        <input type="text" name="uzvards" value="<?php echo $uzvards; ?>">
                    </div>
                    <div class="form-group">
                        <label>Loma (admin, lietotājs)</label>
                        <input type="text" name="loma" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $loma; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>