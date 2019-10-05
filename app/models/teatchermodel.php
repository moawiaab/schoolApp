<?php

namespace FR_MO\Models;

class TeatcherModel extends AppModel
{
    public $id;
    public $techName;
    public $address;
    public $phone;
    public $email;
    public $abut;
    public $sexId;
    public $createdBy;
    public $pdatedBy;
    
    protected static $tableName = 'app_teatcher';
    protected static $tableSchema = array(
        
    
    'id'                 => self::DATA_TYPE_INT,
    'techName'           => self::DATA_TYPE_STR,
    'address'            => self::DATA_TYPE_STR,
    'phone'              => self::DATA_TYPE_STR,
    'email'              => self::DATA_TYPE_STR,
    'abut'               => self::DATA_TYPE_STR,
    'sexId'              => self::DATA_TYPE_INT,
    'createdBy'          => self::DATA_TYPE_INT,
    'pdatedBy'           => self::DATA_TYPE_INT

    ); 
    protected static $primarykey = 'id';

    public static function getAllSex(){
        return self::get("SELECT * FROM `app_sex`");
    }

    public static function getAll(){
        $sql = 'SELECT ac.*,sex.sex as sexes,(SELECT COUNT(classId) 
        FROM app_class_cors WHERE tachId=ac.id) as cours FROM app_teatcher ac 
        INNER JOIN app_sex sex ON sex.id = ac.sexId';
        return self::get($sql);
     }
}