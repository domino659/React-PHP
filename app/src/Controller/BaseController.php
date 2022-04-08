<?php

namespace App\Controller;

use App\Manager\AuthorManager;

abstract class BaseController
{
    private $templateFile = __DIR__ . './../Views/template.php';
    private $viewsDir = __DIR__ . './../Views/Frontend/';
    protected $params;

    public function __construct(string $action, array $params = [])
    {
        $this->params = $params;

        $method = 'execute' . ucfirst($action);
        if (is_callable([$this, $method])) {
            $this->$method();
        }
    }
}