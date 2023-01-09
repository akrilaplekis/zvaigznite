<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Pieslēgties</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="login.css" rel="stylesheet" type="text/css">
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
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: index.php");
            exit;
        }

        // Include config file
        require_once "config.php";

        // Define variables and initialize with empty values
        $username = $password = "";
        $username_err = $password_err = $login_err = "";

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            // Check if username is empty
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter username.";
            } else{
                $username = trim($_POST["username"]);
            }

            // Check if password is empty
            if(empty(trim($_POST["parole"]))){
                $password_err = "Please enter your password.";
            } else{
                $password = trim($_POST["parole"]);
            }

            // Validate credentials
            if(empty($username_err) && empty($password_err)){
                // Prepare a select statement
                $sql = "SELECT loma, liet_v, parole FROM lietotaji WHERE liet_v = ?";

                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    // Set parameters
                    $param_username = $username;

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Store result
                        mysqli_stmt_store_result($stmt);

                        // Check if username exists, if yes then verify password
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            // Bind result variables
                            mysqli_stmt_bind_result($stmt, $loma, $username, $hashed_password);
                            if(mysqli_stmt_fetch($stmt)){
                                if(password_verify($password, $hashed_password)){
                                    // Password is correct, so start a new session
                                    session_start();

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["loma"] = $loma;
                                    $_SESSION["username"] = $username;

                                    // Redirect user to welcome page
                                    header("location: index.php");
                                } else{
                                    // Password is not valid, display a generic error message
                                    $login_err = "Invalid username or password.";
                                    echo $hashed_password.'<br></br>';
                                    echo password_hash($password, PASSWORD_DEFAULT);
                                }
                            }
                        } else{
                            // Username doesn't exist, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

            // Close connection
            mysqli_close($link);
        }
    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="username" class="para1">Lietotāja vārds</label>
                        <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" id="username" placeholder="Lietotāja vards" name="username">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="para1">Parole:</label>
                        <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="parole" placeholder="Parole" name="parole">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <button type="submit" class="btn btn-custom">Pierakstīties</button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
