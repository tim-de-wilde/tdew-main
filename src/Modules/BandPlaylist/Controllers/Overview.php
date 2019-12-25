<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use Likes\LikesQuery;
use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\SpotifyAuth;
use tdewmain\src\Modules\BandPlaylist\Helpers\CardContainer;
use tdewmain\src\Modules\BandPlaylist\Helpers\TrackCard;

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
        $api = SpotifyAuth::api($user);

        $results = $api->search('bee gees', 'track');

        $container = new CardContainer();

        foreach ($results->tracks->items as $spotifyApiTrack) {
            $container->add(
                new TrackCard(SpotifyAuth::getTrack($spotifyApiTrack))
            );
        }

        $canvas->add($container);
        $data['spotifyAccessToken'] = $user->getSpotifyAccessToken();

        return new PageResponse('bp_overview.twig', $data);
    }
}