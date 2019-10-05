<?php

namespace FR_MO\Models;

class StudentModel extends AppModel
{

    public $id;
    public $staName;
    public $address;
    public $phone;
    public $age;
    public $sex;
    public $classId;
    public $createdDate;
    public $feeding;
    public $amunt;
    public $img;
    public $updatedBy;
    public $createdBy;

    protected static $tableName = 'app_staudan';

    protected static $tableSchema = array 
    (
        'staName'                 => self::DATA_TYPE_STR,
        'address'                 => self::DATA_TYPE_STR,
        'phone'                   => self::DATA_TYPE_STR,
        'age'                     => self::DATA_TYPE_INT,
        'sex'                     => self::DATA_TYPE_INT,
        'classId'                 => self::DATA_TYPE_INT,
        'createdDate'             => self::DATA_TYPE_STR,
        'feeding'                 => self::DATA_TYPE_STR,
        'amunt'                   => self::DATA_TYPE_DECIMAL,
        'img'                     => self::DATA_TYPE_STR,
        'updatedBy'               => self::DATA_TYPE_INT,
        'createdBy'               => self::DATA_TYPE_INT
    );
    protected static $primarykey = 'id';

    public function getAllSex(){
    $sql = 'SELECT * FROM `app_sex`';
    return  self::get($sql);
    }
    public static function getAll(){
        $sql = 'SELECT aps.*, sex.sex as sex ,ac.className as class,
        (SELECT sum(amount) FROM app_cashed WHERE staId=aps.id) as getAmount
         FROM '.self::$tableName.
        ' aps INNER JOIN app_sex sex ON sex.id = aps.sex 
        INNER JOIN app_class ac ON aps.classId = ac.id';
        return  self::get($sql);
    }

    public static function getStudentById($id){
        $sql = "SELECT aps.*,sex.sex as sexName ,ac.className as class,
        (SELECT concat(firstname,' ',lastname)
         FROM app_users_profiles au WHERE
          au.userId = aps.`createdBy`) as usercr,
          (SELECT concat(firstname,' ',lastname) 
          FROM app_users_profiles au WHERE au.userId = aps.`updatedBy`) as userup
          FROM `app_staudan` aps INNER JOIN app_sex sex ON sex.id = aps.sex 
        INNER JOIN app_class ac ON aps.classId = ac.id WHERE aps.id=$id";
          return self::getOne($sql);
    }
}
