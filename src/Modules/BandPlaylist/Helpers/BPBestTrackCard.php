<?php
namespace tdewmain\src\Modules\BandPlaylist\Helpers;

/**
 * Class BPBestTrackCard
 *
 * @package tdewmain\src\Modules\BandPlaylist\Helpers
 */
class BPBestTrackCard extends TrackCard
{
    /**
     * @return String
     */
    public function template(): String
    {
        return '_bp_best_track_card.html.twig';
    }
}