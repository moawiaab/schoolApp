<?php
namespace FR_MO\Models;

class PrivilegesModel extends AppModel{
    public $privilegeId;
    public $privilege;
    public $privilegetitle;
    
    protected static $tableName = 'app_user_privileges';
    protected static $tableSchema = array(
        
    'privilegeId'             => self::DATA_TYPE_INT,
    'privilege'               => self::DATA_TYPE_STR,
    'privilegetitle'          => self::DATA_TYPE_STR
   
    ); 
    protected static $primarykey = 'privilegeId';

}