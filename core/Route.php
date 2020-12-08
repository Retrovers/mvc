<?php


namespace core;


use core\utils\StringUtils;

class Route
{

    private static function extractParams(Request $request, $url) {
        $params = StringUtils::getStringBetweenTag($url, '<', '>');
        $url_without_params = $url;
        if (count($params) > 0) {
            $pos = strpos($url, '<');
            $value = substr($request->getRealUrl(), $pos);
            $request->setParams([$params[0] => $value]);
            $url_without_params = str_replace('/' . $value, '', $request->getFormattedUrl());
        }
        $request->setFormattedUrl($url_without_params);
        return $url_without_params;
    }

    private static function isMatching(Request $request, $url) {
        $url_parsed = self::extractParams($request, $url);
        return $url_parsed === $request->getFormattedUrl();
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