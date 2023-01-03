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
<body>
    <nav class="navbar navbar-custom navbar-fixed-to">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Zvaigznīte</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Grupas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="grupas.php?id=1">Zvaniņi</a></li>
                        <li><a href="grupas.php?id=2">Bitītes</a></li>
                        <li><a href="grupas.php?id=3">Kumelītes</a></li>
                    </ul>
                </li>
                <li><a href="#">Foto Galerija</a></li>
                <li><a href="kontakti.html">Kontakti</a></li>
                <li><a href="log_in.php">Pieslēgties</a></li>
            </ul>
        </div>
    </nav>

    <div class="flex-parent-element">
        <div class="flex-child-element">
            <h1>Par mums</h1>
            <p>info Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet iaculis rutrum. Etiam elementum vitae nisl a vestibulum. Nulla egestas est arcu, nec sodales odio semper vitae. Maecenas ultrices rhoncus nibh eu molestie. Sed dictum sapien a arcu porttitor, ut ornare neque tristique. Ut mattis dolor at lacus efficitur vestibulum. Sed sagittis sollicitudin nisl, nec pellentesque turpis ullamcorper luctus. Integer sem tellus, scelerisque et facilisis lacinia, volutpat quis urna. Nulla sed lacus pulvinar, porta ex at, porta nunc. Cras sodales gravida congue. In hac habitasse platea dictumst. Proin leo mauris, sodales in sodales eget, rhoncus ut augue. Cras maximus nibh vel enim scelerisque, nec hendrerit risus facilisis. Nunc at vulputate lorem. Aliquam erat volutpat. Sed pulvinar tempor dolor, sit amet dignissim lacus viverra id. </p>
            <p>In feugiat metus non cursus gravida. In consequat, diam sed sodales tristique, eros dui gravida est, quis rutrum sem augue sollicitudin felis. Curabitur maximus condimentum iaculis. Nam tristique ligula vitae eleifend sagittis. Duis vitae mattis elit. Suspendisse pharetra posuere turpis eu dignissim. Phasellus vulputate massa vitae urna pharetra placerat. Fusce eget odio id tortor ultricies sagittis ut non ex. Suspendisse nec elementum quam, a varius leo. Ut et ultricies turpis. Sed quis facilisis libero. Vivamus at efficitur magna. Mauris in metus vitae lorem maximus sagittis ut sit amet ipsum. Duis lobortis faucibus orci.</p>
        </div>
        <div class="flex-child-element">
            <h2>Ikdiena</h2>
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
