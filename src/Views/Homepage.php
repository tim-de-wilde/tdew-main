<?php
namespace tdewmain\src\Views;

use tdewmain\src\Helpers\AbstractPage;

/**
 * Class Homepage
 */
class Homepage extends AbstractPage
{
    /**
     * @inheritdoc
     */
    public function render() : void
    {
        echo '
            <div>Homepage!</div>
        ';
    }
}
