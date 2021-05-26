<?php

namespace App\System;

class View
{
    protected $template;

    protected $controllerName;

    protected $params;

    private $view;

    public function __construct(string $controllerName, string $view, $params = array())
    {
        $this->controllerName = $controllerName;
        $this->view = $view;
        $this->params = $params;
        $this->render();
    }

    protected function render()
    {
        $directory = strtolower(str_replace('Controller', '', class_basename($this->controllerName)));
        $this->template = $this->getContentTemplate($directory);
        echo $this->template;
    }

    protected function getContentTemplate(string $directory)
    {
        $filePath = PATH_VIEWS . '/' . $directory . '/' . $this->view . '.php';
        extract($this->params);
        ob_start();
        require($filePath);
        $template = ob_get_contents();
        ob_end_clean();
        return $template;
    }

}
