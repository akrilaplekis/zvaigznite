<!DOCTYPE html>
<html>
<?php
    require_once "config.php";

    $id = $_GET['id'];

    $sql = "SELECT nosaukums, p_vards_1, p_uzvards_1, p_vards_2, p_uzvards_2, a_vards, a_uzvards FROM grupas WHERE grupa_id = $id";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    $nos = $row["nosaukums"];
    $pv1 = $row["p_vards_1"];
    $pu1 = $row["p_uzvards_1"];
    $pv2 = $row["p_vards_2"];
    $pu2 = $row["p_uzvards_2"];
    $av = $row["a_vards"];
    $au = $row["a_uzvards"];

    $link->close();
?>
<head>
    <meta charset="UTF-8">
    <title><?php echo $nos?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="grupas.css" rel="stylesheet" type="text/css">
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
                <li><a href="#">Vecākiem</a></li>
                <li><a href="foto.php">Foto Galerija</a></li>
                <li><a href="kontakti.html">Kontakti</a></li>
                <li><a href="log_in.php">Pieslēgties</a></li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <h1 class="title1"><?php echo $nos?></h1>
                <p class="para1">info Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet iaculis rutrum. Etiam elementum vitae nisl a vestibulum. Nulla egestas est arcu, nec sodales odio semper vitae. Maecenas ultrices rhoncus nibh eu molestie. Sed dictum sapien a arcu porttitor, ut ornare neque tristique. Ut mattis dolor at lacus efficitur vestibulum. Sed sagittis sollicitudin nisl, nec pellentesque turpis ullamcorper luctus. Integer sem tellus, scelerisque et facilisis lacinia, volutpat quis urna. Nulla sed lacus pulvinar, porta ex at, porta nunc. Cras sodales gravida congue. In hac habitasse platea dictumst. Proin leo mauris, sodales in sodales eget, rhoncus ut augue. Cras maximus nibh vel enim scelerisque, nec hendrerit risus facilisis. Nunc at vulputate lorem. Aliquam erat volutpat. Sed pulvinar tempor dolor, sit amet dignissim lacus viverra id. </p>
                <p class="para1">In feugiat metus non cursus gravida. In consequat, diam sed sodales tristique, eros dui gravida est, quis rutrum sem augue sollicitudin felis. Curabitur maximus condimentum iaculis. Nam tristique ligula vitae eleifend sagittis. Duis vitae mattis elit. Suspendisse pharetra posuere turpis eu dignissim. Phasellus vulputate massa vitae urna pharetra placerat. Fusce eget odio id tortor ultricies sagittis ut non ex. Suspendisse nec elementum quam, a varius leo. Ut et ultricies turpis. Sed quis facilisis libero. Vivamus at efficitur magna. Mauris in metus vitae lorem maximus sagittis ut sit amet ipsum. Duis lobortis faucibus orci.</p>
            </div>
            <div class="col-md-2">
                <ul>
                    <h1 class="title3">Pedagogi</h1>
                    <li class="list1"><?php echo $pv1.' '.$pu1?></li>
                    <li class="list1"><?php echo $pv2.' '.$pu2?></li>
                    <li class="list1"><?php echo $av.' '.$au?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h2 class="title2">Svarīgi</h2>
                <ul>
                    <li class="list1">Lorem ipsum dolor sit </li>
                    <li class="list1">In consequat, diam sed sodales tristique</li>
                    <li class="list1">Etiam elementum vitae nisl a vesti</li>
                </ul>
            </div>
        </div>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}
?>

</body>


</html>
<?php
