<?php

namespace FR_MO\Controllers;

use FR_MO\Models\UsergroupModel;
use FR_MO\Models\UserModel;
use FR_MO\Models\UsreProfileModel;
use FR_MO\LIB\herber;
use FR_MO\LIB\InputFilter;
use FR_MO\Lib\Messenger;

class UsersController extends AppController
{
    use herber;
    use InputFilter;

    public function defaultMethod(){
        $this->_data['users']= UserModel::getusers(2);

        $this->setView();
    }

    public function addMethod(){
        $this->_data['users']= UserModel::getAll();
        $this->_data['group']= UsergroupModel::getAll();

        if(isset($_POST['submit'])){
            $this->goToLo();
            $user = new UserModel();
            $user->Username         = $this->filterString($_POST['Username']);
            $user->cryptPassword($_POST['Password']);
            $user->Email            = $this->filterString($_POST['Email']);
            $user->PhoneNumber      = $this->filterString($_POST['PhoneNumber']);
            $user->SubscriptionDate = date('Y-m-d');
            $user->lastLogin        = date('Y-m-d H:i:s');
            $user->GroupId          = $this->filterString($_POST['GroupId']);
            $user->online           = 'no';
            $user->status           = 1;
            if(UserModel::userExists($user->Username)){
                $this->goToLoTU('/users',2);
            }
            if($user->save()){
                $profile = new UsreProfileModel();
                $profile->UserId = $user->UserId;
                $profile->firstname = $this->filterString($_POST['firstname']);
                $profile->lastname = $this->filterString($_POST['lastname']);
                $profile->save(false);
                //$this->messenger->add('تم إضافة المستخد بنجاح');
                $this->goToLoTU('/users',2000);
            }
            $this->goToLoTU('/users',2);
        
        }
        
        $this->setView();
    }

    public function editMethod(){
        $this->_data['group']= UsergroupModel::getAll();
        $id = $this->filterInt($this->_params[0]);
        $user = UserModel::getByPK($id);
        if($user === false){
            $this->goToLoTU('/users',2);
        }
        $this->_data['users']=$user;
        if(isset($_POST['submit'])){
            $this->goToLo();
            $user->PhoneNumber      = $this->filterString($_POST['PhoneNumber']);
            $user->GroupId          = $this->filterString($_POST['GroupId']);
            $user->status           = $this->filterString($_POST['status']);
            if($user->save()){
                $this->goToLoTU('/users',2000);
            }
            $this->goToLoTU('/users',200);
        }
        
        $this->setView();
    }

}