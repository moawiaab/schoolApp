<?php

namespace FR_MO\Controllers;

use FR_MO\Models\TeatcherModel;
use FR_MO\Models\MaterialModel;
use FR_MO\Models\CoursModel;
use FR_MO\Models\ClassesModel;
use FR_MO\LIB\herber;
use FR_MO\LIB\InputFilter;
use FR_MO\Lib\Messenger;

class TeatcherController extends AppController
{
    use herber;
    use InputFilter;

    public function defaultMethod(){
        $this->_data['teatcher']= TeatcherModel::getAll();

        $this->setView();
    }

    public function addMethod(){
        $this->_data['sex_Id']= TeatcherModel::getAllSex();
        if(isset($_POST['submit'])){
            $this->goToLo();
            $user = new TeatcherModel();
            $user->techName           = $this->filterString($_POST['techName']);
            $user->address            = $this->filterString($_POST['address']);
            $user->phone              = $this->filterString($_POST['phone']);
            $user->email              = $this->filterString($_POST['email']);
            $user->abut               = $this->filterString($_POST['abut']);
            $user->sexId              = $this->filterInt($_POST['sexId']);
            $user->createdBy          = $this->session->u->UserId;
            $user->pdatedBy           = $this->session->u->UserId;

            if($user->save()){
                //$this->messenger->add('تم إضافة المستخد بنجاح');
                $this->goToLoTU('/teatcher',2000);
            }
            $this->goToLoTU('/teatcher',2);
        
        }
        
        $this->setView();
    }

    public function editMethod(){
        $this->_data['sex_Id']= TeatcherModel::getAllSex();
        $id = $this->filterInt($this->_params[0]);
        $user = TeatcherModel::getByPK($id);
        if($user === false){
            $this->goToLoTU('/users',2);
        }
        $this->_data['teatcher']=$user;
        if(isset($_POST['submit'])){
            $this->goToLo();
            $user->techName           = $this->filterString($_POST['techName']);
            $user->address            = $this->filterString($_POST['address']);
            $user->phone              = $this->filterString($_POST['phone']);
            $user->email              = $this->filterString($_POST['email']);
            $user->abut               = $this->filterString($_POST['abut']);
            $user->sexId              = $this->filterInt($_POST['sexId']);
            if($user->save()){
                $this->goToLoTU('/teatcher',2000);
            }
            $this->goToLoTU('/teatcher',200);
        }
        
        $this->setView();
    }

    public function coursMethod(){
        $id = $this->filterInt($this->_params[0]);
        $this->_data['Material']=MaterialModel::getAll();
        $this->_data['Teatcher']=ClassesModel::getAll();
        $this->_data['courses'] = CoursModel::getCoursByTeatcher($id);
        if(isset($_POST['submit'])){
            $cours = new CoursModel();
            $cours->tachId = $id;
            $cours->corsId = $this->filterInt($_POST['corsId']);
            $cours->classId= $this->filterInt($_POST['tachId']);
            if($cours->save()){
                $this->goToLoTU($_SERVER['HTTP_REFERER'],2);
            }
            $this->goToLoTU($_SERVER['HTTP_REFERER'],2);

        }
        $this->setView();
    }


}