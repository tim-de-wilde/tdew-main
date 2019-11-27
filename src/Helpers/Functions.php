<?php
namespace tdewmain\src\Helpers;

/**
 * Class Functions
 *
 * @package tdewmain\src\Helpers
 */
class Functions
{
    /**
     * @param      $url
     * @param null $permanent
     */
    public static function internRedirect($url, $permanent = null): void
    {
        header('Location: ' . LOCAL_ROOT . '/' . $url, true, $permanent ? 301 : 302);

        die();
    }

    /**
     * @param      $url
     * @param null $permanent
     */
    public static function externRedirect($url, $permanent = null): void
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        die();
    }
}
