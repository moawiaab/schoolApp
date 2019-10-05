<?php

namespace FR_MO\Controllers;

use FR_MO\Models\PrivilegesModel;
use FR_MO\Models\UsergroupModel;
use FR_MO\Models\UsergrouprivilModel;
use FR_MO\LIB\InputFilter;
use FR_MO\LIB\herber;

class UsergroupController extends AppController
{
    use herber;
    use InputFilter;

    public function defaultMethod(){
        $this->_data['usergroup']= UsergroupModel::getAll();
        $this->setView();
    }

    public function addMethod(){
        $this->_data['privileges']= PrivilegesModel::getAll();

        if(isset($_POST['submit'])){
            $this->goToLo();
            $group = new UsergroupModel();
            $group->GroupName = $this->filterString($_POST['GroupName']);
            if($group->save()){
                if(isset($_POST['privileges']) && is_array($_POST['privileges'])){
                    foreach($_POST['privileges'] as $privId){
                        $groupriv = new UsergrouprivilModel();
                        $groupriv->GroupId=$group->GroupId;
                        $groupriv->privilegeId = $privId;
                        $groupriv->save();
                    }
                }
            }
            $this->goToLoTU('/usergroup',2000);
        }

        $this->setView();
    }

    public function editMethod(){
        $id = $this->filterInt($this->_params[0]);
        $group = UsergroupModel::getByPK($id);
        if($group === false){
            $this->goToLoTU('/usergroup',20);
        }
        $this->_data['group'] = $group;
        $this->_data['privileges']= PrivilegesModel::getAll();
        $grouprivileges = UsergrouprivilModel::getBy(['GroupId' => $group->GroupId]);
        $extractedPerivilege = [];
        if(false !== $grouprivileges){
            foreach($grouprivileges as $privilege){
                $extractedPerivilege[] = $privilege->privilegeId;
            }
        }
        $this->_data['grouprivilege'] = $extractedPerivilege;

        if(isset($_POST['submit'])){
            $this->goToLo();
            $group->GroupName = $this->filterString($_POST['GroupName']);
            if($group->save()){
                if(isset($_POST['privileges']) && is_array($_POST['privileges'])){
                    $privilegeIdToBeDeleted = array_diff($extractedPerivilege, $_POST['privileges']);
                    $privilegeIdToBeAdded = array_diff($_POST['privileges'], $extractedPerivilege);
                    //delete privileges
                    //var_dump($privilegeIdToBeDeleted);
                    foreach($privilegeIdToBeDeleted as $privilegeDeleted){
                        $unwPrivilege = UsergrouprivilModel::getBy(['privilegeId' => $privilegeDeleted, 'GroupId' => $group->GroupId]);
                        $unwPrivilege->current()->delete();
                    }
                    
                   //add new privileges
                     foreach($privilegeIdToBeAdded as $privilegeId){
                        $groupprivilege = new UsergrouprivilModel();
                        $groupprivilege->GroupId = $group->GroupId;
                        $groupprivilege->privilegeId = $privilegeId;
                        $groupprivilege->save();
                        
                    }
                }
            }
            $this->goToLoTU('/usergroup',20);
        }
        $this->setView();
    }
}