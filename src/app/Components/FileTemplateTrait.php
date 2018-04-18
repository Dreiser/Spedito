<?php

namespace Spedito\Components;

/**
 * Trait FileTemplateTrait
 * @package Spedito\Components
 */
trait FileTemplateTrait
{
    /**
     * Creates component template
     *
     * @param string
     *
     * @return \Nette\Templating\ITemplate
     */
    protected function createTemplate($class = null)
    {
        $template = parent::createTemplate($class);
        $ref      = new \ReflectionClass($this);
        // change file extension to .latte
        $template->setFile(preg_replace('/\.[^.]+$/', '.latte', $ref->getFileName()));

        return $template;
    }

    /**
     * Renders component template
     */
    public function render()
    {
        $this->template->render();
    }
}
