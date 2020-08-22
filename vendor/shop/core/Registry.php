<?php

namespace shop;

use shop\_traits\Singleton;

class Registry
{
    use Singleton;
    
    protected static $properties = [];
    
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }
    
    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }
}