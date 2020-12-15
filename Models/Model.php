<?php

namespace Models;

use Core\App;
use PDO;

class Model
{

    public static function testDbConnection() {
        $config = App::$db;
        $success = true;
        try {
            new PDO("$config[driver]:host=$config[host];dbname=$config[db_name]", $config['user'], $config['password'],
                [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (\Exception $e) {
            $success = false;
        }
        return $success;
    }

}