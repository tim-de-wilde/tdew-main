<?php
namespace tdewmain\src\Helpers;

/**
 * Class AbstractPage
 *
 * @package Helpers
 */
abstract class AbstractPage
{
    /**
     * @return void
     */
    abstract public function render() : void;
}
