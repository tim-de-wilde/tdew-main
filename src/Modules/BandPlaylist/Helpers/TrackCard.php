<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;

use tdewmain\src\Helpers\AbstractHTMLItem;
use tdewmain\src\Helpers\Authenticator;
use Track\Track;

/**
 * Class TrackCard
 *
 * Cards that will be displayed in Bandplaylist/Overview. Because of the like system this card can only be used on pages where user is defined!
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class TrackCard extends AbstractHTMLItem
{
    public $id;
    public $name;
    public $artist;
    public $image;
    public $trackUri;
    public $duration;
    public $like;

    /**
     * TrackCard constructor.
     *
     * @param Track $track
     */
    public function __construct(Track $track)
    {
        $this->id = $track->getId();
        $this->name = $track->getName();
        $this->artist = $track->getArtist();
        $this->image = $track->getImage();
        $this->trackUri = $track->getTrackuri();
        $this->duration = $track->getDuration();
        $this->like = $track->getLikeByUser(Authenticator::getUser());

        parent::__construct();
    }

    /**
     * @return String
     */
    public function template(): String
    {
        return '_trackCard.html.twig';
    }
}