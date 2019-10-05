<?php

namespace FR_MO\Models;

class FatherModel extends AppModel
{
    public $id;
    public $fname;
    public $addres;
    public $phon;
    public $email;
    public $stuId;
    
    protected static $tableName = 'app_fahter';
    protected static $tableSchema = array(
        
    
    'id'              => self::DATA_TYPE_INT,
    'fname'           => self::DATA_TYPE_STR,
    'addres'          => self::DATA_TYPE_STR,
    'phon'            => self::DATA_TYPE_STR,
    'email'           => self::DATA_TYPE_STR,
    'stuId'           => self::DATA_TYPE_INT

    ); 
    protected static $primarykey = 'id';

    public static function getByStudent($id){
        $sql = 'SELECT * FROM app_fahter WHERE stuId='.$id;
        return self::get($sql);
     }
}