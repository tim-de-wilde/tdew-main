<?php
namespace tdewmain\src\Helpers;

use Propel\Runtime\Exception\LogicException;
use User\Map\UserTableMap;
use User\User;
use User\UserQuery;

/**
 * Class Authenticator
 */
class Authenticator
{

    /**
     * @return User
     */
    public static function getUser(): User
    {
        $userSession = static::getUserSession();

        if ($userSession !== null) {
            return UserQuery::create()
                ->filterByUsername($userSession->getUsername())
                ->findOne();
        }
        throw new \LogicException('Function called when no session is active');
    }

    /**
     * @return User|null
     */
    public static function getUserNoError(): ?User
    {
        $userSession = static::getUserSession();

        if ($userSession !== null) {
            return UserQuery::create()
                ->filterByUsername($userSession->getUsername())
                ->findOne();
        }
        return null;
    }

    /**
     * @return array|null
     */
    public static function getUserArray(): ?array
    {
        $user = static::getUserNoError();
        if ($user !== null) {
            return $user->toArray();
        }
        return null;
    }

    /**
     * @param String $username
     * @param String $password
     *
     * @return bool
     */
    public static function login(String $username, String $password): bool
    {
        if (static::checkCredentials($username, $password)) {
            static::createUserSession($username);
            return true;
        }
        return false;
    }

    /**
     * @return UserSession
     */
    public static function getUserSession(): ?UserSession
    {
        if (static::loggedIn()) {
            return new UserSession();
        }
        return null;
    }

    /**
     * @return bool
     */
    public static function loggedIn() : bool
    {
        return !empty($_SESSION['username']);
    }

    public static function breakSession() : void
    {
        session_destroy();
    }

    /**
     * @param String $permissions
     *
     * @return bool
     */
    public static function isPermitted(String $permissions): bool
    {
        if (static::loggedIn()) {
            $userPerms = static::getUser()->getPermissions();

            return $userPerms === UserTableMap::COL_PERMISSIONS_ADMIN
                || $permissions === UserTableMap::COL_PERMISSIONS_GUEST
                || $userPerms === $permissions;
        }
        return $permissions === UserTableMap::COL_PERMISSIONS_GUEST;
    }

    /**
     * @param User $user
     */
    public static function setUser(User $user): void
    {
        $_SESSION['username'] = $user->getUsername();
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

        if ($user !== null) {
            return password_verify($password, $user->getPassword());
        }
        return false;
    }

    /**
     * @param String $username
     *
     * @return void
     */
    private static function createUserSession(String $username): void
    {
        if (!static::loggedIn()) {
            $_SESSION['username'] = $username;
            return;
        }
        throw new LogicException('Trying to create session while a session is still active');
    }
}
