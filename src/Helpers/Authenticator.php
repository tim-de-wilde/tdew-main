<?php
namespace tdewmain\src\Helpers;

/**
 * Class Authenticator
 */
class Authenticator
{
    /**
     * @param UserSession $session
     */
    public static function setUserSession(UserSession $session): void
    {
        $_SESSION['username'] = $session->getUsername();
        $_SESSION['token'] = $session->getToken();
    }

    /**
     * @return \Helpers\UserSession
     */
    public static function getUserSession(): UserSession
    {
        if (static::inSession()) {
            return new UserSession();
        }
        throw new \RuntimeException('Session is not set!');
    }

    /**
     * @return bool
     */
    public static function inSession() : bool
    {
        return !empty($_SESSION['token']) && !empty($_SESSION['username']);
    }

    public static function breakSession() : void
    {
        unset($_SESSION);
        session_destroy();
    }
}
