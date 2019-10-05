<?php

namespace FR_MO\Controllers;

use FR_MO\Models\PrivilegesModel;
use FR_MO\LIB\InputFilter;
use FR_MO\Lib\Messenger;
use FR_MO\LIB\herber;

class PrivilegesController extends AppController
{
    use InputFilter;
    use herber;
    
    public function defaultMethod(){
        $this->_data['privileges']= PrivilegesModel::getAll();
        $this->setView();
    }

    public function addMethod(){
        if(isset($_POST['submit'])){
            $this->goToLo();
            $pri = new PrivilegesModel();
            $pri->privilege = $this->filterString($_POST['privilege']);
            $pri->privilegetitle = $this->filterString($_POST['privilegetitle']);
            if($pri->save()){
                //$this->messenger->add('تم إضافة الصلاحية بنجاح');
                $this->goToLoTU('/privileges',100);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],20);
            }
        }
        $this->setView();
    }
    public function editMethod(){
        $id = $this->filterInt($this->_params[0]);
        $pri = PrivilegesModel::getByPK($id);
        if($pri == false){
            $this->goToLoTU('/privileges',2);
        }
        $this->_data['privilege'] = $pri;
        if(isset($_POST['submit'])){
            $this->goToLo();
            $pri->privilege = $this->filterString($_POST['privilege']);
            $pri->privilegetitle = $this->filterString($_POST['privilegetitle']);
            if($pri->save()){
                //$this->messenger->add('تم تعديل الصلاحية بنجاح');
            $this->goToLoTU('/privileges',100);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],2000);
            }
        }
        $this->setView();
    }

    public function deleteMethod(){
        $id = $this->filterInt($this->_params[0]);
        $pri = PrivilegesModel::getByPK($id);
        if($pri == false){
            if(isset($_POST['privilege']) && is_array($_POST['privilege'])){
                foreach($_POST['privilege'] as $prid){
                    $pri = PrivilegesModel::getByPK($prid);
                    $pri->delete();
                }
                $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
            }
            //$this->goToLoTU($_SERVER['HTTP_REFERER'],2);
var_dump($_POST['privilege']);
            }else{
                if($pri->delete($id)){
                    $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
                }
        }
    }
}