<?php

namespace FR_MO\Models;

class ClassesModel extends AppModel
{
    public $id;
    public $className;
    public $detales;
    public $createdBy;
    public $updatedBy;
    
    protected static $tableName = 'app_class';
    protected static $tableSchema = array(
        
    
    'id'                => self::DATA_TYPE_INT,
    'className'         => self::DATA_TYPE_STR,
    'detales'           => self::DATA_TYPE_STR,
    'createdBy'         => self::DATA_TYPE_INT,
    'updatedBy'         => self::DATA_TYPE_INT

    ); 
    protected static $primarykey = 'id';

    public static function getAll(){
        $sql = 'SELECT ac.*,(SELECT COUNT(classId) 
        FROM app_class_cors WHERE classId=ac.id) as cours FROM app_class ac';
        return self::get($sql);
     }

     public static function getMainNum(){
         $sql = 'SELECT COUNT(id) as classnum , 
         (SELECT COUNT(id) FROM app_cors) as cournum ,
         (SELECT COUNT(id) FROM app_cashed) as cashednum
         ,(SELECT COUNT(id) FROM app_staudan) as studenum 
         ,(SELECT COUNT(id) FROM app_teatcher) as teachnum 
         ,(SELECT COUNT(userId) FROM app_users) as usernum 
         ,(SELECT COUNT(GroupId) FROM app_users_groups) as groupnum 
         ,(SELECT COUNT(privilegeId) FROM app_user_privileges) as privnum
         FROM app_class';
         return self::get($sql);
     }
}