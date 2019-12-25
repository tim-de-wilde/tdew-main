<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;


use tdewmain\src\Helpers\AbstractHTMLContainer;

/**
 * Class CardContainer
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class CardContainer extends AbstractHTMLContainer
{
    /**
     * @return String
     */
    public function template(): String
    {
        return '_cardContainer.html.twig';
    }
}