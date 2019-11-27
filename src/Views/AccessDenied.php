<?php
namespace tdewmain\src\Views;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;

/**
 * Class AccessDenied
 *
 * @package tdewmain\src\Views
 */
class AccessDenied extends AbstractController
{
    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        return new PageResponse('accessDenied.twig', []);
    }
}
