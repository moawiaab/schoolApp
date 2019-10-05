<?php

namespace FR_MO\Models;

class CoursModel extends AppModel
{
    public $id;
    public $classId;
    public $corsId;
    public $tachId;
    
    protected static $tableName = 'app_class_cors';
    protected static $tableSchema = array(
        
    
    'id'                => self::DATA_TYPE_INT,
    'classId'           => self::DATA_TYPE_INT,
    'corsId'            => self::DATA_TYPE_INT,
    'tachId'            => self::DATA_TYPE_INT

    ); 
    protected static $primarykey = 'id';

    public static function getCoursByClass($id){
        $sql = 'SELECT apc.*,cou.corName as corName,cou.grade as grade ,te.techName as techName FROM '.self::$tableName.' 
        apc INNER JOIN app_cors cou ON cou.id=apc.corsId
        INNER JOIN app_teatcher te ON te.id=apc.tachId WHERE classId='.$id;
        return self::get($sql);
    }

    public static function getCoursByTeatcher($id){
        $sql = 'SELECT apc.*,cou.corName as corName ,te.className as techName FROM '.self::$tableName.' 
        apc INNER JOIN app_cors cou ON cou.id=apc.corsId
        INNER JOIN app_class te ON te.id=apc.classId WHERE tachId='.$id;
        return self::get($sql);
    }
    

}