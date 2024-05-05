<?php

class Session
{
    public static function setSession($key, $value) 
    {
        $_SESSION[$key] = $value;
    }

    public static function getSession($key) 
    {
        return $_SESSION[$key];
    }

    public static function checkSession($key) 
    {
        return isset($_SESSION[$key]) ? self::getSession($key) : false;
    }
    public static function unsetSession($key) 
    {
        unset($_SESSION[$key]);
    }
}