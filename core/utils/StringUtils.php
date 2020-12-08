<?php

namespace core\utils;

class StringUtils
{

    public static function getStringBetweenTag($string, $start, $end) {

        $result = [];
        $string = ' '.$string;
        $offset = 0;
        while(true)
        {
            $ini = strpos($string,$start,$offset);
            if ($ini == 0)
                break;
            $ini += strlen($start);
            $len = strpos($string,$end,$ini) - $ini;
            $result[] = substr($string,$ini,$len);
            $offset = $ini+$len;
        }
        return $result;

    }

}