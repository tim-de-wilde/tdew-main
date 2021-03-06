<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;

use tdewmain\src\Helpers\AbstractHTMLItem;

/**
 * Class CardContainer
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class CardContainer extends AbstractHTMLItem
{
    public $gridDivide;

    /**
     * CardContainer constructor.
     *
     * @param int $gridDivide
     */
    public function __construct(int $gridDivide)
    {
        $this->gridDivide = $gridDivide;

        parent::__construct();
    }

    /**
     * @return String
     */
    public function template(): String
    {
        return '_cardContainer.html.twig';
    }
}