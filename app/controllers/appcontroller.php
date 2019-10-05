<?php 


namespace FR_MO\Controllers;

class AppController {
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_template;
    protected $_registry;
    protected $_data=[];

    public function __get($key)
    {
        return $this->_registry->$key;
    }
    public function setController($controller){
       $this->_controller = $controller;
    }

    public function setAction($action){
        $this->_action = $action;
    }

    public function setParams($params){
        $this->_params = $params;
    }

    public function setTemplate($template){
        $this->_template = $template;
    }

    public function setRegistry($registry){
        $this->_registry = $registry;
       // var_dump($this->_registry);
    }

    public function setView(){
      $veiw = VIEW_PATH .strtolower($this->_controller) .DS. $this->_action .'.view.php';
      if(file_exists($veiw)){
          $this->_template->setActionView($veiw);
          $this->_template->setRegistry($this->_registry);
          $this->_template->setData($this->_data);
          $this->_template->renderTemplate();
        }

    }
}