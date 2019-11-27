<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\SpotifyAuth;

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
        $data = [];
        $user = Authenticator::getUser();
        $api = SpotifyAuth::api($user);


        $results = $api->search('if you leave me now', 'track');


        foreach ($results->tracks->items as $track) {
            $data['temp'][] = [
                'name' => $track->name,
                'artist' => $track->album->artists[0]->name,
                'img_url' => $track->album->images[0]->url,
                'uri' => $track->uri,
                'duration_ms' => $track->duration_ms
            ];
        }

        $data['spotifyAccessToken'] = $user->getSpotifyAccessToken();


        return new PageResponse('bp_overview.twig', $data);
    }
}