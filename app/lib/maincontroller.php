<?php

namespace FR_MO\Lib;
use FR_MO\Lib\Template\Template;
use FR_MO\Lib\Registry;
use FR_MO\Lib\Authentination;
use FR_MO\LIB\herber;
class MainController{

    use herber;

    private $_controller = 'index';
    private $_action     = 'default';
    private $_params     =[];
    private $_template;
    private $_registry;
    private $_authentination;

    public function __construct(Template $template, Registry $registry,Authentination $authentination){
        $this->_template = $template;
        $this->_registry = $registry;
        $this->_authentination = $authentination;
       /// var_dump($this->_registry);
        $this->checkUrl();
    } 

    private function checkUrl(){
        $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),3);
        if(isset($url[0]) && !empty($url[0])){
            $this->_controller = $url[0];
        }else{
            $url[0] = $this->_controller;
        }
        if(isset($url[1]) && !empty($url[1])){
            $this->_action = $url[1];
        }else{
            $url[1] = $this->_action;
        }

        if(isset($url[2]) && $url[2] !== ''){
            $this->_params = explode('/',$url[2]);
        }
    }

    public function getInstance(){
        $controller = 'FR_MO\Controllers\\' . ucfirst($this->_controller).'Controller';
        $action = $this->_action.'Method';

        if(!$this->_authentination->isAuthorized())
        {
            if($this->_controller != 'auth' &&  $this->_action !== 'login'){
                 $this->redirect('/auth/login');
            }  
        }else{
            if($this->_controller == 'auth' &&  $this->_action == 'login'){
                isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/');
            }
            if((bool)CHAGE_FOR_PRIVILEGE === true){
                if(!$this->_authentination->hasAccess($this->_controller, $this->_action))
                {
                    $this->redirect('/accessdenied/default');
                }
                   
            }
        }

        if(!class_exists($controller)){
            $controller = 'FR_MO\Controllers\NotFoundController';
            $this->_controller = 'NotFound';
        }
        if(class_exists($controller) && !method_exists($controller,$action)){
            $controller = 'FR_MO\Controllers\NotFoundController';
            $this->_action = 'notfond';
            $this->_controller = 'NotFound';
            $action = 'notfondMethod';
        }

        $control = new $controller();
        $control->setController($this->_controller);
        $control->setAction($this->_action);
        $control->setParams($this->_params);
        $control->setTemplate($this->_template);
        $control->setRegistry($this->_registry);

        $control->$action();

    }
}