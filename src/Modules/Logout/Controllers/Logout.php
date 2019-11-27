<?php
namespace tdewmain\src\Modules\Logout\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\Functions;
use tdewmain\src\Helpers\PageResponse;

/**
 * Class Logout
 *
 * @package tdewmain\src\Modules\Logout\Controllers
 */
class Logout extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        if (Authenticator::loggedIn()) {
            Authenticator::breakSession();

        }

        Functions::internRedirect('Home', true);
        die();
    }
}
