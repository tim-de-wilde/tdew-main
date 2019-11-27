<?php
namespace tdewmain\src\Modules\Homepage\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;

/**
 * Class Homepage
 */
class Homepage extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        return new PageResponse('homepage.twig', []);
    }
}
