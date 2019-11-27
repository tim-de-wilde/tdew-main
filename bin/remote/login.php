<?php
namespace tdewmain\bin\remote;

use tdewmain\src\Helpers\Authenticator;

session_start();
include __DIR__ . '/../../vendor/autoload.php';
include __DIR__ . '/../../bin/generated-conf/config.php';


$name = $_POST['name'];
$pass = $_POST['pass'];

if (Authenticator::login($name, $pass)) {
    echo 'true';
}
echo 'false';
return;
