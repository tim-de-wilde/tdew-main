<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;


use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\Session;

/**
 * Class SetSpotifyDeviceId
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class SetSpotifyDeviceId extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $pageVars = $this->pageVars;

        if (array_key_exists('device_id', $pageVars) && \is_string($pageVars['device_id'])) {
            Session::setSpotifyDeviceId($pageVars['device_id']);
        }

        die();
    }
}