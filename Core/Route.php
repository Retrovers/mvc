<?php


namespace Core;


use Core\utils\StringUtils;

class Route
{

    private static function isMatching(Request $request, $url) {

        $url_parts = explode('/', substr($request->getRealUrl(), 1));
        $url_check_parts = explode('/', substr($url, 1));

        $match = true;
        $params = [];

        for ($i = 0; $i < count($url_check_parts); ++$i) {
            if ($url_check_parts[$i] === $url_parts[$i]) {
            } else if (strpos($url_check_parts[$i], '<') !== false && strlen($url_parts[$i]) > 0) {
                $key = str_replace('<', '', $url_check_parts[$i]);
                $key = str_ireplace('>', '', $key);
                $params[$key] = $url_parts[$i];
            } else {
                $match = false;
            }
        }

        if ($match) $request->setParams($params);
        return $match;
    }

    public static function reverse($params) {

        $request = new Request();

        $method = $request->getMethod();

        $find = false;

        foreach ($params as $url => $func) {
            if (self::isMatching($request, $url)) {
                try {
                    Router::{$method}($func, $request);
                } catch (\Exception $e) {
                    echo 'Impossible de charger la route';
                }
                $find = true;
                break;
            }
        }
        if (!$find) {
            echo "404";
        }
    }

}