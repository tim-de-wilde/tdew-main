<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;
use tdewmain\src\Helpers\AbstractHTMLItem;

/**
 * Class BPNavBar
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class BPNavbar extends AbstractHTMLItem
{
    /**
     * @return String
     */
    public function template(): String
    {
        return '_bp_navbar.html.twig';
    }
}