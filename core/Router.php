<?php

namespace core;

class Router
{

    private static function loadController($class) {
        $controller = false;
        $class = "\\Controller\\" . $class;
        try {
            $controller = new $class;
        } catch (\Exception $e){
            echo "Impossible de charger la classe $class";
        }

        return $controller;

    }

    public static function get($func, $request) {
        $split = explode('@', $func);

        $controller = self::loadController($split[0]);
        $controller->{$split[1]}($request);

    }

    public static function post($func) {

    }

}