<?php

namespace tdewmain\src\Modules\Login\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\Session;

/**
 * Class Login
 *
 * @package tdewmain\src\Modules\Login\Controllers
 */
class Login extends AbstractController
{
    private $maxLoginAttempts = 3;
    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $vars = $this->pageVars;
        $attempts = Session::getLoginAttempts();

        $response = 'false';
        if (Session::isLocked()) {
            $response = 'max_attempts';
        } elseif (array_key_exists('name', $vars) &&
            array_key_exists('pass', $vars)) {
            if (Authenticator::login($vars['name'], $vars['pass'])) {
                $response = 'true';
            } else {
                ++$attempts;
            }
        }

        if ($response === 'false' && $attempts > $this->maxLoginAttempts) {
            Session::lock(new \DateTime('+15 minutes'));
        }

        Session::setLoginAttempts($attempts);
        echo $response;
        die();
    }
}
