<?php
namespace tdewmain\src\Helpers;


/**
 * Class Canvas
 *
 * @package tdewmain\src\Helpers
 */
class Canvas
{
    /**@var AbstractHTMLItem[] $items**/
    protected $items;

    /**
     * @param AbstractHTMLItem $item
     *
     * @return Canvas
     */
    public function add(AbstractHTMLItem $item): Canvas
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items): void
    {
        $this->items = $items;
    }
}
