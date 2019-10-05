<?php
namespace FR_MO\Models;

class UsergroupModel extends AppModel{
    public $GroupId;
    public $GroupName;
    
    protected static $tableName = 'app_users_groups';
    protected static $tableSchema = array(
        
    'GroupId'                 => self::DATA_TYPE_INT,
    'GroupName'               => self::DATA_TYPE_STR
   
    ); 
    protected static $primarykey = 'GroupId';

    public static function getAll(){
        $sql = 'SELECT usg.*,
             (SELECT COUNT(prf.GroupId) 
             FROM app_user_groups_privileges prf 
             WHERE prf.GroupId = usg.GroupId) as prcount
        FROM app_users_groups usg';
        return self::get($sql);
    }

}