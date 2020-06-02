<?php
namespace tdewmain\src\Helpers;

/**
 * Class AbstractHTMLItem
 *
 * @package tdewmain\src\Helpers
 */
abstract class AbstractHTMLItem
{
    /**@var String $template**/
    public $template;
    /**@var AbstractHTMLItem[] $items**/
    public $items;

    public function __construct()
    {
        $this->template = $this->template();
    }

    /**
     * @return String
     */
    abstract public function template(): String;

    /**
     * @param AbstractHTMLItem $item
     *
     * @return AbstractHTMLItem
     */
    public function add(AbstractHTMLItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return AbstractHTMLItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param AbstractHTMLItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }
}