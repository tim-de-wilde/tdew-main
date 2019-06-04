<?php
namespace tdewmain\html;

session_start();
include '../src/Helpers/Autoload.php';
?>
<html lang="en">
<head>
    <title>Broken website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/tdewmain/assets/css/uikit.min.css" />
    <script src="http://localhost/tdewmain/assets/js/uikit.min.js"></script>
    <script src="http://localhost/tdewmain/assets/js/uikit-icons.min.js"></script>
</head>
<body>
<?php
include __DIR__ . '/../src/Views/Base.php';

require_once __DIR__ . '/../src/Helpers/Router.php';

require_once __DIR__ . '/../src/Helpers/Routes.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>

