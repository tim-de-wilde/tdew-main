<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;

use Band;
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
     * @param Band  $currentBand
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function __construct(Track $track, Band $currentBand)
    {
        $this->id = $track->getId();
        $this->name = $track->getName();
        $this->artist = $track->getArtist();
        $this->image = $track->getImage();
        $this->trackUri = $track->getTrackuri();
        $this->duration = $track->getDuration();

        $like = $track->getLikeByUser(Authenticator::getUser(), $currentBand);

        if ($like !== null) {
            $like = $like->getType();
        }

        $this->like = $like;

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