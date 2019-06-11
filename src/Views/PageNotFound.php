<?php
namespace tdewmain\src\Views;

use tdewmain\src\Helpers\AbstractPage;

/**
 * Class PageNotFound
 *
 * @package tdewmain\src\Views
 */
class PageNotFound extends AbstractPage
{

    /**
     * @return void
     */
    public function render(): void
    {
        echo 'Page not found!';
    }
}
