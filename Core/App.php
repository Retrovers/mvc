<?php


namespace Core;

use \Models\Model;

class App
{

    public static $server_root = '/mvc/public/';
    public static $isInProduction = false;
    public static $db = false;

    private function parseConfig() {
        try {
            $config = parse_ini_file('./../Config/app.ini');
            self::$isInProduction = $config['IsInProduction'] == 1;
            self::$server_root = self::$isInProduction ? $config['server_root_production'] : $config['server_root_dev'];
            $config_db = $config[self::$isInProduction ? 'db_production' : 'db_dev'];
            self::$db = [
                'driver' => $config_db[0],
                'host' => $config_db[1],
                'user' => $config_db[2],
                'password' => $config_db[3],
                'db_name' => $config_db[4]
            ];
        } catch (\Exception $e) {
            echo "Impossible de traier le fichier de configuration";
            die();
        }
    }


    public function startApp() {
        $this->parseConfig();
        if (!Model::testDbConnection()) {
            echo "Impossible d'établir la connexion avec la base de donnée !";
            die();
        }
        $this->parseRoutes();
    }

    private function parseRoutes() {
        try {
            $routes = parse_ini_file('./../Config/routes.ini');
            Route::reverse($routes);
        } catch (\Exception $e) {
            echo "Impossible de parser le fichiers des routes";
        }
    }

}