<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use SpotifyWebAPI\Session as SpotifySession;
use SpotifyWebAPI\SpotifyWebAPI;
use tdewmain\config\LocalConfig;
use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\Functions;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\SpotifyAuth;
use User\Map\UserTableMap;
use User\UserQuery;

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
        $pageVars = $this->pageVars;
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

        if (\array_key_exists('code', $pageVars) &&
        $session->requestAccessToken($pageVars['code'])) {
            $api = new SpotifyWebAPI();
            $api->setAccessToken($session->getAccessToken());

            $spotifyUser = $api->me();

            $user = UserQuery::create()
                ->filterByUsername($spotifyUser->id)
                ->filterByPermissions(UserTableMap::COL_PERMISSIONS_USER)
                ->findOneOrCreate();

            $user->setSpotifyAccessToken($session->getAccessToken());
            $user->setSpotifyRefreshToken($session->getRefreshToken());

            $user->save();
            Authenticator::setUser($user);

            Functions::internRedirect('BandPlaylist/Overview');
        } else {
            Functions::externRedirect($session->getAuthorizeUrl($options));
        }

        die();
    }
}
