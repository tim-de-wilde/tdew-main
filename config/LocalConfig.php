<?php
namespace tdewmain\config;

use Twig\Environment;

/**
 * Class LocalConfig
 *
 * @package tdewmain\src\Helpers
 */
class LocalConfig
{
    private static $twigEnvironment;

    /**Twig environment**/

    public static function getTwigEnvironment()
    {
        return static::$twigEnvironment;
    }

    /**
     * @param Environment $twigEnvironment
     */
    public static function setTwigEnvironment(Environment $twigEnvironment
    ): void {
        static::$twigEnvironment = $twigEnvironment;
    }

    /**Local environment**/

    public static function getLocalConfig(): array
    {
        if (file_exists(CONFIG_LOCATION)) {
            include_once CONFIG_LOCATION;
            return get();
        }
        throw new \LogicException('Local config not set');
    }
}
