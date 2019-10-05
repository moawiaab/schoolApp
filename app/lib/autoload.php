<?php

namespace FR_MO\Lib;

class Autoload {
    public static function autoload($cName){
        
        $cName = str_replace('\\','/',$cName);
        $cName = strtolower($cName);
        $cName = str_replace('fr_mo','',$cName);
        if(file_exists(APP_PATH.DS.$cName.'.php'))
        {
            require_once APP_PATH . DS . $cName.'.php';
        }
    }
}

spl_autoload_register(__NAMESPACE__.'\Autoload::autoload');