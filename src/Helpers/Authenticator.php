<?php
namespace tdewmain\src\Helpers;

use Propel\Runtime\Exception\LogicException;
use User\UserQuery;

/**
 * Class Authenticator
 */
class Authenticator
{
    /**
     * @param String $username
     * @param String $password
     *
     * @return bool
     */
    public static function login(String $username, String $password): bool
    {
        if (static::checkCredentials($username, $password)) {
            static::createSession($username, $password);
            return true;
        }
        return false;
    }

    /**
     * @return UserSession
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
        session_destroy();
    }

    /**
     * @param String $username
     * @param String $password
     *
     * @return bool
     */
    private static function checkCredentials(String $username, String $password): bool
    {
        $user = UserQuery::create()
            ->filterByUsername($username)
            ->findOne();

        return password_verify($password, $user->getPassword());
    }

    /**
     * @param String $username
     * @param String $password
     *
     * @return void
     */
    private static function createSession(String $username, String $password): void
    {
        if (!static::inSession()) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }
        throw new LogicException('Trying to create session while a session is still active');
    }
}
