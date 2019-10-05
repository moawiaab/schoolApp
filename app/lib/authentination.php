<?php

namespace FR_MO\Lib;

class Authentination
{
    private static $_instance;
    private $_session;

    private $_execludedRoutes = [
    '/index/default',
     '/index/index',
    '/auth/logout',
    '/profile/default',
    '/users/setting',
    '/accessdenied/default',
    '/notfonud/notfonud',
    '/notfonud/default',
    '/profile/password'
    ];
    
    private function __construct($session){
        $this->_session = $session;
    }
    
    private function __clone() {}
    
    public static function getInstance(SessionManager $session)
    {
        if(self::$_instance === null)
        {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }
    
    public function isAuthorized()
    {
      return isset($this->_session->u); 
    }

    public function hasAccess($controller, $action)
    {
       $url = strtolower('/'.$controller . '/' .$action);
       //echo  $url;
       if(in_array($url, $this->_execludedRoutes) || in_array($url, $this->_session->u->privileges))
       {
        return true;
       }
    }

}