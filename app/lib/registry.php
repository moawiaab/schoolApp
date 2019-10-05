<?php

namespace FR_MO\Lib;

class Registry{

    private static $_instance;
    
    private function __construct(){}
    
    private function __clone() {}
    
    public static function getInstance()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function __set($key, $opject)
    {
        $this->$key = $opject;
    }
    
    public function __get($key)
    {
        return $this->$key;
    }
}