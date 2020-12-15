<?php

namespace Controller;

use Core\utils\ClassUtils;

class Controller
{

    public function render($vars = [], $params = ['path' => false, 'layout' => true]) {

        $path = $params['path'];

        if ($path === false) {
            $path = str_replace('Controller\\', '', get_class($this));
            $path = str_replace('Controller', '', $path);
            $path .= '/' . ClassUtils::getMethodeWhoCall();
        }

        if ($params['layout'] === true) require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/' . $path . '.php';
        if ($params['layout'] === true) require __DIR__ . '/../Views/layouts/footer.php';
    }

}