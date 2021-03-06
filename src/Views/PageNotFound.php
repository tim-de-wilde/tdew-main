<?php

namespace tdewmain\src\Views;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;
use User\UserQuery;

/**
 * Class PageNotFound
 *
 * @package tdewmain\src\Views
 */
class PageNotFound extends AbstractController
{
    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        return new PageResponse('notFound.twig', []);
    }
}
