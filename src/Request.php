<?php
namespace src;

class Request
{
    static function isMethod($method)
    {
        return strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method);
    }

    static function all()
    {
        return self::_parse($_REQUEST);
    }

    static function post($obj = true)
    {
        return $obj ? self::_parse($_POST) : $_POST;
    }

    static function get()
    {
        return self::_parse($_GET);
    }

    static function _parse($arr)
    {
        return (new ArrayHelper($arr))->toObject();
    }
}