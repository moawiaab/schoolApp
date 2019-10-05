<?php

namespace FR_MO\Controllers;

use FR_MO\Models\MaterialModel;
use FR_MO\LIB\InputFilter;
use FR_MO\Lib\Messenger;
use FR_MO\LIB\herber;

class MaterialController extends AppController
{
    use InputFilter;
    use herber;
    
    public function defaultMethod(){
        $this->_data['material']= MaterialModel::getAll();
        $this->setView();
    }

    public function addMethod(){
        if(isset($_POST['submit'])){
            $this->goToLo();
            $mat = new MaterialModel();
            $mat->corName = $this->filterString($_POST['corName']);
            $mat->detales = $this->filterString($_POST['detales']);
            $mat->grade   = $this->filterInt($_POST['grade']);
            $mat->createdBy = $this->session->u->UserId;
            $mat->updatedBy = $this->session->u->UserId;

            if($mat->save()){
                //$this->messenger->add('تم إضافة الصلاحية بنجاح');
                $this->goToLoTU('/material',100);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],20);
            }
        }
        $this->setView();
    }
    public function editMethod(){
        $id = $this->filterInt($this->_params[0]);
        $mat = MaterialModel::getByPK($id);
        if($mat == false){
            $this->goToLoTU('/material',2);
        }
        $this->_data['material'] = $mat;
        if(isset($_POST['submit'])){
            $this->goToLo();
                $mat->corName = $this->filterString($_POST['corName']);
                $mat->detales = $this->filterString($_POST['detales']);
                $mat->grade   = $this->filterInt($_POST['grade']);
            if($mat->save()){
                //$this->messenger->add('تم تعديل الصلاحية بنجاح');
            $this->goToLoTU('/material',100);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],2000);
            }
        }
        $this->setView();
    }

    public function deleteMethod(){
        $id = $this->filterInt($this->_params[0]);
        $pri = MaterialModel::getByPK($id);
        if($pri === false){
            $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
        }
        if($pri->delete()){
            $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
        }
    }
}