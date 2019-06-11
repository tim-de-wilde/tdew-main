<?php
namespace tdewmain;

use AltoRouter;
use tdewmain\src\Views\Homepage;

session_start();
include __DIR__ . '/vendor/autoload.php';

//setup Propel
include __DIR__ . '/bin/generated-conf/config.php';
?>
<html lang="en">
<head>
    <title>tdew</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/tdewmain/assets/css/uikit.min.css" />
    <script src="http://localhost/tdewmain/assets/js/uikit.min.js"></script>
    <script src="http://localhost/tdewmain/assets/js/uikit-icons.min.js"></script>
</head>
<body>
<?php
include __DIR__ . '/src/Views/Base.php';

$router = new AltoRouter();

$router->map('GET', '/', function () {
    (new Homepage())->render();
});
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>

