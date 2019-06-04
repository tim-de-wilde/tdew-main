<?php
namespace tdewmain\src\Helpers;

use tdewmain\src\Views\Homepage;

route('tdewmain/html/Homepage', function () {
    return (new Homepage())->render();
});

route('tdewmain/html', function () {
    return (new Homepage())->render();
});


$action = $_SERVER['REQUEST_URI'];
dispatch($action);
