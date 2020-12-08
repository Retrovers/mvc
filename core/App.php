<?php


namespace core;

class App
{

    private static $server_root = '/mvc/public/';

    public function startApp() {
        // BDD
    }

    public function route($params) {
        Route::reverse($params);
    }

}