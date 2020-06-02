<?php
namespace tdewmain\src\Helpers;

/**
 * Class AbstractResponse
 *
 * @package tdewmain\src\Helpers
 */
class PageResponse
{
    private String $twig;
    private array $variables;

    /**
     * AbstractResponse constructor.
     *
     * @param String $twig
     * @param array  $variables
     */
    public function __construct(String $twig, array $variables = null)
    {
        $this->twig = $twig;
        $this->variables = $variables ?? [];
    }

    /**
     * @return String
     */
    public function getTwig(): String
    {
        return $this->twig;
    }

    /**
     * @return array
     */
    public function getVariables(): array
    {
        return $this->variables;
    }
}
