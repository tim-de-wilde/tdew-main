<?php
namespace tdewmain\src\Helpers;

use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIException;
use tdewmain\config\LocalConfig;
use \SpotifyWebAPI\Session as SpotifySession;
use Track\Track;
use Track\TrackQuery;
use User\User;

/**
 * Class spotifyAuth
 *
 * @package tdewmain\src\Helpers
 */
class SpotifyAuth
{
    private static $session;

    public static function init()
    {
        $localConfig = LocalConfig::getLocalConfig();

        static::$session = new SpotifySession(
            $localConfig['spotify_client_id'],
            $localConfig['spotify_client_secret'],
            $localConfig['spotify_redirect_uri']
        );
    }


    /**
     * @return SpotifySession
     */
    public static function getSession(): SpotifySession
    {
        return static::$session;
    }

    /**
     * @param User $user
     *
     * @return SpotifyWebAPI
     */
    public static function api(User $user): SpotifyWebAPI
    {
        $api = new SpotifyWebAPI();
        $token = null;

        if (static::tokenIsValid($user)){
            $token = $user->getSpotifyAccessToken();
        } else {
            $session = static::getSession();

            if ($session->refreshAccessToken($user->getSpotifyRefreshToken())) {
                $token = $session->getAccessToken();

                $user->setSpotifyAccessToken($token);
                $user->setSpotifyRefreshToken($session->getRefreshToken());
                $user->save();
            } else {
                throw new \LogicException('Refresh token invalid for user ' . $user->getUsername());
            }
        }

        $api->setAccessToken($token);
        return $api;
    }

    /**
     * @param $spotifyApiTrack
     *
     * @return Track
     */
    public static function getTrack($spotifyApiTrack): Track
    {
        $track = TrackQuery::create()
            ->filterByTrackuri($spotifyApiTrack->uri)
            ->filterByName($spotifyApiTrack->name)
            ->filterByArtist($spotifyApiTrack->album->artists[0]->name)
            ->filterByImage($spotifyApiTrack->album->images[0]->url)
            ->filterByDuration($spotifyApiTrack->duration_ms)
            ->findOneOrCreate();

        $track->save();

        return $track;
    }


    /**
     * @param User $user
     *
     * @return bool
     */
    public static function tokenIsValid(User $user): bool
    {
        try {
            $tester = new SpotifyWebAPI();
            $tester->setAccessToken($user->getSpotifyAccessToken());

            $tester->me();
        }catch (SpotifyWebAPIException $e) {
            return false;
        }

        return true;
    }
}