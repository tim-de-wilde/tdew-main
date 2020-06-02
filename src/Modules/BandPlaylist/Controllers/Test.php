<?php
declare(strict_types=1);

namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\Session;
use tdewmain\src\Modules\BandPlaylist\Helpers\TrackCard;
use Track\TrackQuery;

/**
 * Class Test
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class Test extends AbstractController
{

    /**
     * @inheritDoc
     */
    public function show(): PageResponse
    {
        $band = Session::getSelectedBand();

        $tracks = TrackQuery::create()
            ->limit(10)
            ->find();

        $cards = [];
        foreach ($tracks as $track) {
            $cards[] = new TrackCard($track, $band);
        }

        return new PageResponse('search_track.twig', ['results' => $cards]);
    }
}
