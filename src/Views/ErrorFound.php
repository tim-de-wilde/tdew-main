<?php
namespace tdewmain\src\Views;


use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;

/**
 * Class ErrorFound
 *
 * @package tdewmain\src\Views
 */
class ErrorFound extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        return new PageResponse('errorFound.twig', []);
    }
}