<?php
namespace tdewmain\src\Helpers;

/**
 * Class Menu
 *
 * @package tdewmain\src\Helpers
 */
class Menu
{
    /**
     * @return array
     */
    public static function getItems(): array
    {
        return [
            [
                'link' => LOCAL_ROOT . '/Home',
                'icon' => 'home',
                'condition' => 'none'
            ],
            [
                'link' => LOCAL_ROOT . '/Logout',
                'icon' => 'sign-out',
                'condition' => Authenticator::loggedIn()
            ]
        ];
    }
}
