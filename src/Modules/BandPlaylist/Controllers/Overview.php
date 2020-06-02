<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use BandQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\Session;
use tdewmain\src\Helpers\SpotifyAuth;
use tdewmain\src\Modules\BandPlaylist\Helpers\BandContainer;
use tdewmain\src\Modules\BandPlaylist\Helpers\BandItem;
use tdewmain\src\Modules\BandPlaylist\Helpers\BPBestTrackCard;
use tdewmain\src\Modules\BandPlaylist\Helpers\BPNavbar;
use tdewmain\src\Modules\BandPlaylist\Helpers\BPNavbarItem;
use tdewmain\src\Modules\BandPlaylist\Helpers\CardContainer;
use tdewmain\src\Modules\BandPlaylist\Helpers\Switcher;
use tdewmain\src\Modules\BandPlaylist\Helpers\TrackCard;
use Track\TrackQuery;

/**
 * Class Overview
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class Overview extends AbstractController
{
    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $canvas = $this->canvas;

        $data = [];
        $user = Authenticator::getUser();
        $band = Session::getSelectedBand();
        $api = SpotifyAuth::api($user);

        $spotifyTracks = $api->search('beegees', 'track');

        foreach ($spotifyTracks->tracks->items as $track) {
            SpotifyAuth::getTrack(
                $track
            );
        }

        $draak = BandQuery::create()
            ->filterByBandName('The Whores')
            ->findOneOrCreate();

        $draak->save();

        $tracks = TrackQuery::create()
            ->filterByName('%beegees%', Criteria::LIKE)
            ->limit(100)
            ->find();

        $bands = BandQuery::create()
            ->limit(5)
            ->find();

        $navbar = new BPNavbar();
        $navbar
            ->add(
                new BPNavbarItem(
                    'My Band'
                )
            )
            ->add(
                new BPNavbarItem(
                    'Suggestions'
                )
            )
            ->add(
                new BPNavbarItem(
                    'Best Tracks'
                )
            );

        $canvas->add($navbar);

        // Switcher
        $switcher = new Switcher();

        // Containers for in switcher
        $suggestionsContainer = new CardContainer(2);
        $bestTracksContainer = new CardContainer(3);
        $bandContainer = new BandContainer();

        foreach ($tracks as $track) {
            $suggestionsContainer->add(
                new TrackCard($track, $band)
            );

            $bestTracksContainer->add(
                new BPBestTrackCard($track, $band)
            );
        }

        foreach ($bands as $band) {
            $bandContainer->add(
                new BandItem($band)
            );
        }

        $switcher
            ->add(
                $bandContainer
            )
            ->add(
                $suggestionsContainer
            )
            ->add(
                $bestTracksContainer
            );

        $canvas->add($switcher);

        $data['spotifyAccessToken'] = $user->getSpotifyAccessToken();
        return new PageResponse('bp_overview.twig', $data);
    }
}