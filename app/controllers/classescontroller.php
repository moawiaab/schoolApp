<?php

namespace FR_MO\Controllers;

use FR_MO\Models\ClassesModel;
use FR_MO\Models\CoursModel;
use FR_MO\Models\MaterialModel;
use FR_MO\Models\TeatcherModel;
use FR_MO\LIB\InputFilter;
use FR_MO\Lib\Messenger;
use FR_MO\LIB\herber;

class ClassesController extends AppController
{
    use InputFilter;
    use herber;
    
    public function defaultMethod(){
        $this->_data['classes']= ClassesModel::getAll();
        $this->setView();
    }

    public function addMethod(){
        if(isset($_POST['submit'])){
            $this->goToLo();
            $mat = new ClassesModel();
            $mat->className = $this->filterString($_POST['className']);
            $mat->detales = $this->filterString($_POST['detales']);
            $mat->createdBy = $this->session->u->UserId;
            $mat->updatedBy = $this->session->u->UserId;

            if($mat->save()){
                //$this->messenger->add('تم إضافة الصلاحية بنجاح');
                $this->goToLoTU('/classes',100);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],20);
            }
        }
        $this->setView();
    }
    public function editMethod(){
        $id = $this->filterInt($this->_params[0]);
        $mat = ClassesModel::getByPK($id);
        if($mat === false){
            $this->goToLoTU('/classes',2);
        }
        $this->_data['classes'] = $mat;
        if(isset($_POST['submit'])){
            $this->goToLo();
                $mat->className = $this->filterString($_POST['className']);
                $mat->detales = $this->filterString($_POST['detales']);
            if($mat->save()){
                //$this->messenger->add('تم تعديل الصلاحية بنجاح');
            $this->goToLoTU('/classes',100);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],2000);
            }
        }
        $this->setView();
    }

    public function coursMethod(){
        $id = $this->filterInt($this->_params[0]);
        $this->_data['Material']=MaterialModel::getAll();
        $this->_data['Teatcher']=TeatcherModel::getAll();
        $this->_data['courses'] = CoursModel::getCoursByClass($id);
        if(isset($_POST['submit'])){
            $cours = new CoursModel();
            $cours->classId = $id;
            $cours->corsId = $this->filterInt($_POST['corsId']);
            $cours->tachId= $this->filterInt($_POST['tachId']);
            if($cours->save()){
                $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
            }
            $this->goToLoTU($_SERVER['HTTP_REFERER'],2);

        }
        $this->setView();
    }

    public function deleteMethod(){
        $id = $this->filterInt($this->_params[0]);
        $mat = CoursModel::getByPK($id);
       // var_dump($mat);
       // die();
        if($mat === false){
            $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
        }
        if($mat->delete()){
            $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
        }

    }
}