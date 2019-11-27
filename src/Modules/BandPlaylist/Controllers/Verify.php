<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use SpotifyWebAPI\Session as SpotifySession;
use tdewmain\config\LocalConfig;
use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Functions;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\SpotifyAuth;

/**
 * Class Verify
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class Verify extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $session = SpotifyAuth::getSession();

        $options = [
            'scope' => [
                'playlist-read-private',
                'playlist-read-collaborative',
                'playlist-modify-private',
                'app-remote-control',
                'user-read-private',
                'streaming',
                'user-read-email'
            ]
        ];

        Functions::externRedirect($session->getAuthorizeUrl($options));
        die();
    }
}
