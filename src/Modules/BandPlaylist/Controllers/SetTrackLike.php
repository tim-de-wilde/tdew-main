<?php
namespace tdewmain\src\Modules\BandPlaylist\Controllers;

use Likes\LikesQuery;
use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\Authenticator;
use tdewmain\src\Helpers\PageResponse;
use tdewmain\src\Helpers\Session;

/**
 * Class SetTrackLike
 *
 * @package tdewmain\src\Modules\BandPlaylist\Controllers
 */
class SetTrackLike extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $pageVars = $this->pageVars;

        $track = $pageVars['track_id'];
        $type = $pageVars['like_type'];
        $user = Authenticator::getUser();
        $band = Session::getSelectedBand() ?? '';

        if ($user->isOfBand($band)) {
            $like = LikesQuery::create()
                ->filterByTrack($track)
                ->filterByUser($user->getId())
                ->filterByBand($band->getId())
                ->findOneOrCreate();

            $like->setType($type);
            $like->save();
        }

        die();
    }
}