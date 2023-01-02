<!DOCTYPE html>
<html>
<?php
    $id = $_GET['id'];
    switch ($id) {
        case 1:
            $nos = 'Zvaniņi';
        break;
        case 2:
            $nos = 'Bitītes';
        break;
        case 3:
            $nos = 'Kumelītes';
        break;
        default:
            echo 'id not found';
    }
?>
<head>
    <meta charset="UTF-8">
    <title><?php echo $nos?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="grupas.css" rel="stylesheet" type="text/css">
    <link href="index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="header">
    <a href="index.php" class="logo">Zvaigznīte</a>
    <div class="header-right">
        <div class="dropdown">
            <button class="dropbtn">Grupas
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="grupas.php?id=1">Zvaniņi</a>
                <a href="grupas.php?id=2">Bitītes</a>
                <a href="grupas.php?id=3">Kumelītes</a>
            </div>
        </div>
        <a>Jaunumi</a>
        <a href="foto.php">Foto Galerija</a>
        <a>Kalendārs</a>
        <a href="kontakti.html">Kontakti</a>
        <a href="log_in.php">Pieslēgties</a>
    </div>
</div>

<div class="flex-parent-grupas">
    <div class="flex-child-grupas">
        <div class="flex-parent-grupas-split">
            <h1><?php echo $nos?></h1>
            <div class="flex-child-grupas-split">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet iaculis rutrum. Etiam elementum vitae nisl a vestibulum. Nulla egestas est arcu, nec sodales odio semper vitae. Maecenas ultrices rhoncus nibh eu molestie. Sed dictum sapien a arcu porttitor, ut ornare neque tristique. Ut mattis dolor at lacus efficitur vestibulum. Sed sagittis sollicitudin nisl, nec pellentesque turpis ullamcorper luctus. Integer sem tellus, scelerisque et facilisis lacinia, volutpat quis urna. Nulla sed lacus pulvinar, porta ex at, porta nunc. Cras sodales gravida congue. In hac habitasse platea dictumst. Proin leo mauris, sodales in sodales eget, rhoncus ut augue. Cras maximus nibh vel enim scelerisque, nec hendrerit risus facilisis. Nunc at vulputate lorem. Aliquam erat volutpat. Sed pulvinar tempor dolor, sit amet dignissim lacus viverra id. </p>
                <p>In feugiat metus non cursus gravida. In consequat, diam sed sodales tristique, eros dui gravida est, quis rutrum sem augue sollicitudin felis. Curabitur maximus condimentum iaculis. Nam tristique ligula vitae eleifend sagittis. Duis vitae mattis elit. Suspendisse pharetra posuere turpis eu dignissim. Phasellus vulputate massa vitae urna pharetra placerat. Fusce eget odio id tortor ultricies sagittis ut non ex. Suspendisse nec elementum quam, a varius leo. Ut et ultricies turpis. Sed quis facilisis libero. Vivamus at efficitur magna. Mauris in metus vitae lorem maximus sagittis ut sit amet ipsum. Duis lobortis faucibus orci.</p>
            </div>
            <div class="flex-child-grupas-split">
                <ul>
                    <li>Lorem ipsum dolor sit </li>
                    <li>In consequat, diam sed sodales tristique</li>
                    <li>Etiam elementum vitae nisl a vesti</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex-child-grupas">
        <h2>Svarīgi</h2>
        <ul>
            <li>Lorem ipsum dolor sit </li>
            <li>In consequat, diam sed sodales tristique</li>
            <li>Etiam elementum vitae nisl a vesti</li>
        </ul>
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