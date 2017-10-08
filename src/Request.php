<?php
/**
 * Created by PhpStorm.
 * User: skyfire
 * Date: 17-10-8
 * Time: 上午11:12
 */
namespace Mu;
class Request
{
    public static function get($key, $default = null)
    {
        return $_GET[$key]??$default;
    }

    public static function post($key, $default = null)
    {
        return $_POST[$key]??$default;
    }

    public static function request($key, $default = null)
    {
        return $_REQUEST[$key]??$default;
    }
}