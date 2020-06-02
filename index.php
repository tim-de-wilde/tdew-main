<?php
namespace tdewmain;

use function Sentry\captureException;
use function Sentry\init;
use tdewmain\config\LocalConfig;
use tdewmain\src\Helpers\AutoRoute;
use tdewmain\src\Helpers\Functions;
use tdewmain\src\Helpers\Session;
use tdewmain\src\Helpers\SpotifyAuth;
use tdewmain\src\Views\ErrorFound;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

include __DIR__ . '/vendor/autoload.php';

//setup Sentry
init(['dsn' => 'https://273e50e1a3264de4ba2ae966863c67f4@sentry.io/1773142']);

try {
    include __DIR__ . '/src/Helpers/Session.php';
    include __DIR__ . '/src/Helpers/Token.php';
    Session::create();

    //todo DEBUG REMOVE WHEN FINISHED!!!
    $_SESSION['band_id'] = 1;

// global functions
    include __DIR__ . '/src/Helpers/Functions.php';

// global constants
    include __DIR__ . '/src/Helpers/constants.php';

//setup Local Config
    include __DIR__ . '/config/LocalConfig.php';

//setup Propel
    include __DIR__ . '/bin/generated-conf/config.php';

//setup Spotify API
    include __DIR__ . '/src/Helpers/SpotifyAuth.php';
    SpotifyAuth::init();

// router
    include __DIR__ . '/vendor/altorouter/altorouter/AltoRouter.php';
    $altoRouter = new \AltoRouter();
    $altoRouter->setBasePath('/tdewmain');

    include __DIR__ . '/src/Modules/Homepage/Controllers/Homepage.php';
    $altoRouter->map('POST|GET', '/', function () {
        Functions::internRedirect('Home');
        die();
    });

    include __DIR__ . '/src/Helpers/AutoRoute.php';
    $autoRoute = new AutoRoute($altoRouter);

    include __DIR__ . '/vendor/twig/twig/src/Loader/FilesystemLoader.php';
    include __DIR__ . '/vendor/twig/twig/src/Environment.php';

    $rootTemplatesPath = __DIR__ . '/src/Templates';
//    $twigLoader = new FilesystemLoader($rootTemplatesPath);
//
//    $twigLoader->addPath("$rootTemplatesPath/Components", 'components');

    $loader = new FilesystemLoader('src/Templates', getcwd());
    $loader->addPath('src/Templates/Components', 'components');

    $twig = new Environment(
        $loader,
//    [
//        'cache' => __DIR__ . '/src/Templates/compilation_cache'
//    ]
    [
        'debug' => true
        ]
    );
    $twig->addExtension(new \Twig\Extension\DebugExtension());

    LocalConfig::setTwigEnvironment($twig);

    $autoRoute->route();
} catch (\Throwable $e) {
    captureException($e);
    (new ErrorFound())->render();
}
