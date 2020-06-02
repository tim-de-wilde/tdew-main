<?php


namespace tdewmain\src\Modules\BandPlaylist\Helpers;


use tdewmain\src\Helpers\AbstractHTMLItem;

/**
 * Class BPNavbarItem
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class BPNavbarItem extends AbstractHTMLItem
{
    public $name;

    /**
     * BPNavbarItem constructor.
     *
     * @param String $name
     */
    public function __construct(String $name)
    {
        $this->name = $name;

        parent::__construct();
    }

    /**
     * @return String
     */
    public function template(): String
    {
        return '_bp_navbar_item.html.twig';
    }
}