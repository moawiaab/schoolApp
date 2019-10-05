<?php

namespace FR_MO\Models;

class UsreProfileModel extends AppModel
{
    public $UserId;
    public $firstname;
    public $lastname;
    public $Address;
    public $DOB;
    public $image;

    
    protected static $tableName = 'app_users_profiles';
    protected static $tableSchema = array(
        
    
    'UserId'               => self::DATA_TYPE_INT,
    'firstname'            => self::DATA_TYPE_STR,
    'lastname'             => self::DATA_TYPE_STR,
    'Address'              => self::DATA_TYPE_STR,
    'DOB'                  => self::DATA_TYPE_STR,
    'image'                => self::DATA_TYPE_STR

    ); 
    protected static $primarykey = 'UserId';

}