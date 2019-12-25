<?php


namespace tdewmain\src\Helpers;


/**
 * Class AbstractHTMLContainer
 *
 * @package tdewmain\src\Helpers
 */
abstract class AbstractHTMLContainer extends AbstractHTMLItem
{
    /**@var AbstractHTMLItem[] $items**/
    public $items;

    /**
     * @param AbstractHTMLItem $item
     *
     * @return AbstractHTMLContainer
     */
    public function add(AbstractHTMLItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }
}