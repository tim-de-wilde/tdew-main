<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\Functions;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\SpotifyAuth;
use User\User;

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
        $user = Authenticator::getUserNoError();

        if (($user instanceof User) &&
        SpotifyAuth::tokenIsValid($user)) {
            Functions::internRedirect('BandPlaylist/Overview');
        }


        return new PageResponse('bp_home.twig', []);
    }
}