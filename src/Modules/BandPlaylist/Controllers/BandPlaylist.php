<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\Functions;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\SpotifyAuth;

/**
 * Class BandPlaylist
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class BandPlaylist extends AbstractController
{
    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $pageVars = $this->pageVars;

        $user = Authenticator::getUser();
        $session = SpotifyAuth::getSession();

        if (SpotifyAuth::tokenIsValid($user)) {
            Functions::internRedirect('BandPlaylist/Overview');
        } elseif (array_key_exists('code', $pageVars) &&
            $session->requestAccessToken($pageVars['code'])) {
                $user->setSpotifyAccessToken($session->getAccessToken());
                $user->setSpotifyRefreshToken($session->getRefreshToken());
                $user->save();

                header('Refresh:0');
        }

        return new PageResponse('bp_home.twig', []);
    }
}