<?php

namespace FR_MO\Models;

class MaterialModel extends AppModel
{
    public $id;
    public $corName;
    public $detales;
    public $grade;
    public $createdBy;
    public $updatedBy;
    
    protected static $tableName = 'app_cors';
    protected static $tableSchema = array(
        
    
    'id'                => self::DATA_TYPE_INT,
    'corName'           => self::DATA_TYPE_STR,
    'detales'           => self::DATA_TYPE_STR,
    'grade'             => self::DATA_TYPE_INT,
    'createdBy'         => self::DATA_TYPE_INT,
    'updatedBy'         => self::DATA_TYPE_INT

    ); 
    protected static $primarykey = 'id';




}