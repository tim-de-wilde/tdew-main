<?php


namespace tdewmain\src\Helpers;


/**
 * Class AbstractHTMLItem
 *
 * @package tdewmain\src\Helpers
 */
abstract class AbstractHTMLItem
{
    public $template;

    public function __construct()
    {
        $this->template = $this->template();
    }

    /**
     * @return String
     */
    abstract public function template(): String;
}