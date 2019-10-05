<?php

namespace FR_MO\Models;

class CashedModel extends AppModel
{
    public $id;
    public $staId;
    public $date;
    public $amount;
    public $classId;
    public $detales;
    public $cearedBy;
    public $updatedBy;
    
    protected static $tableName = 'app_cashed';
    protected static $tableSchema = array(
        
    
    'id'                  => self::DATA_TYPE_INT,
    'staId'               => self::DATA_TYPE_INT,
    'date'                => self::DATA_TYPE_STR,
    'amount'              => self::DATA_TYPE_DECIMAL,
    'classId'             => self::DATA_TYPE_INT,
    'detales'             => self::DATA_TYPE_STR,
    'cearedBy'            => self::DATA_TYPE_INT,
    'updatedBy'           => self::DATA_TYPE_INT

    ); 
    protected static $primarykey = 'id';

    public static function getCashedById($id){
        $sql = 'SELECT ac.*,aps.staName as staName,apc.className as className,(SELECT 
                concat(firstname," ",lastname) FROM app_users_profiles WHERE userId=ac.cearedBy) as username
                FROM `app_cashed` ac INNER JOIN app_staudan aps ON aps.id = ac.`staId` 
                INNER JOIN app_class apc ON apc.id = ac.`classId` WHERE ac.staId='.$id;
        return self::get($sql);
    }

    public static function getAll(){
        $sql = 'SELECT ac.*,aps.staName as staName,apc.className as className 
                FROM `app_cashed` ac INNER JOIN app_staudan aps ON aps.id = ac.`staId` 
                INNER JOIN app_class apc ON apc.id = ac.`classId`';
        return self::get($sql);
    }


}