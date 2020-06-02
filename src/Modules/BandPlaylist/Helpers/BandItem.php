<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;

use Band;
use tdewmain\src\Helpers\AbstractHTMLItem;

/**
 * Class BandItem
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class BandItem extends AbstractHTMLItem
{
    public $name;
    public $image;

    /**
     * BandItem constructor.
     *
     * @param Band $band
     */
    public function __construct(Band $band)
    {
        $this->name = $band->getBandName();
        $this->image = $band->getImage();

        parent::__construct();
    }

    /**
     * @return String
     */
    public function template(): String
    {
        return '_bp_band_item.html.twig';
    }
}
