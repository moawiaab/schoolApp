<?php

namespace FR_MO\Lib\Template;

class Template {

    use FormInput;
    
    private $_template_path;
    private $_actinView;
    private $_data;
    private $_registry;

    public function __get($key)
    {
        return $this->_registry->$key;
    }
    public function __construct(array $path){
        $this->_template_path = $path; 
        //var_dump($this->session);
    }

    public function swapTemplate($template)
    {
      // var_dump($template);
        $this->_template_path['template'] = $template;
    }
    public function setRegistry($registry){
        $this->_registry = $registry;
        //var_dump($this->_registry);
    }

    public function setData($data){
        $this->_data = $data;
    }

    public function setActionView($view){
        $this->_actinView = $view;
    }

    private function setStartHeader(){
        extract($this->_data);
        require_once TEMPLATE_PATH .DS. 'startheader.php';
    }

    private function setEndHeader(){
        extract($this->_data);
        require_once TEMPLATE_PATH .DS. 'endheader.php';
    }


    private function setfooter(){
        extract($this->_data);
        require_once TEMPLATE_PATH .DS. 'footer.php';

    }

    private function setBlackTemplate(){
        if(array_key_exists('template',$this->_template_path)){
            $parth = $this->_template_path['template'];
            extract($this->_data);
            if(!empty($parth)){
                foreach($parth as $key => $file){
                    if($key == 'the_view'){
                        require_once $this->_actinView;
                    }else{
                        require_once $file;
                    }
                }
            }
        }else{
            echo "sory";
        }
    }

    public function renderTemplate(){
        $this->setStartHeader();
        $this->setEndHeader();
        $this->setBlackTemplate();
        $this->setfooter();
    }
}