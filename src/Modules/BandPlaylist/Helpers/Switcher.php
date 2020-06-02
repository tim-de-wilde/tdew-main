<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;
use tdewmain\src\Helpers\AbstractHTMLItem;

/**
 * Class Switcher
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class Switcher extends AbstractHTMLItem
{

    /**
     * @return String
     */
    public function template(): String
    {
        return '_bp_switcher.html.twig';
    }
}