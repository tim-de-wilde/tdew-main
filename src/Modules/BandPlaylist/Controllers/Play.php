<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\Session;
use tdewmain\src\Helpers\SpotifyAuth;

/**
 * Class Play
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class Play extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $user = Authenticator::getUser();
        $api = SpotifyAuth::api($user);
        $deviceId = Session::getSpotifyDeviceId();
        $trackUri = $this->pageVars['track_uri'];

        if (!empty($deviceId)) {
            $api->play(
                $deviceId,
                [
                    'uris' => [$trackUri]
                ]
            );
        }

        die();
    }
}