<?php
namespace FR_MO\Models;

class UsergrouprivilModel extends AppModel{

    public $Id;
    public $GroupId;
    public $privilegeId;
    
    protected static $tableName = 'app_user_groups_privileges';
    protected static $tableSchema = array(
        
    'GroupId'                   => self::DATA_TYPE_INT,
    'privilegeId'               => self::DATA_TYPE_INT
   
    ); 
    protected static $primarykey = 'Id';

    public static function getAll(){
        $sql = 'SELECT usg.*,
             (SELECT COUNT(prf.GroupId) 
             FROM app_user_groups_privileges prf 
             WHERE prf.GroupId = usg.GroupId) as prcount
        FROM app_users_groups usg';
        return self::get($sql);
    }

    public static function getPrivilegeGroup($groupId){
        $sql = 'SELECT augp.*, aup.Privilege FROM ' . self::$tableName . ' augp';
        $sql .= ' INNER JOIN app_user_privileges aup ON aup.PrivilegeId = augp.PrivilegeId';
        $sql .= ' WHERE augp.GroupId = ' .$groupId;
        $privilege = self::get($sql);
        $extractedUrls = [];
        if(false !== $privilege){
            foreach ($privilege as $privileg) {
            $extractedUrls[] = $privileg->Privilege;
            }
        }

        return $extractedUrls;
    }

}