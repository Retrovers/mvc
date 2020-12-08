<?php


namespace core\utils;


class ClassUtils
{
    public function getClassName()
    {
        return __CLASS__;
    }

    public static function getMethodeWhoCall() {
        return debug_backtrace()[2]['function'];
    }
}