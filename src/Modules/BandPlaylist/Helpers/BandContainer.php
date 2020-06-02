<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;


use tdewmain\src\Helpers\AbstractHTMLItem;

/**
 * Class BandContainer
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class BandContainer extends AbstractHTMLItem
{

    /**
     * @return String
     */
    public function template(): String
    {
        return '_bp_band_container.html.twig';
    }
}