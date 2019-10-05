<?php

namespace FR_MO\Models;

class UserModel extends AppModel
{
    public $UserId;
    public $Username;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $lastLogin;
    public $GroupId;
    public $status;
    public $online;
    
    protected static $tableName = 'app_users';
    protected static $tableSchema = array(
        
    
    'UserId'             => self::DATA_TYPE_INT,
    'Username'           => self::DATA_TYPE_STR,
    'Password'           => self::DATA_TYPE_STR,
    'Email'              => self::DATA_TYPE_STR,
    'PhoneNumber'        => self::DATA_TYPE_STR,
    'SubscriptionDate'   => self::DATA_TYPE_STR,
    'lastLogin'          => self::DATA_TYPE_STR,
    'GroupId'            => self::DATA_TYPE_INT,
    'online'             => self::DATA_TYPE_STR,
    'status'             => self::DATA_TYPE_BOOL

    ); 
    protected static $primarykey = 'UserId';
    
       public function getTableName()
    {
        return self::$tableName;
    }
    
    public function cryptPassword($password)
    {
        
        $this->Password = crypt($password, APP_SLAT);
    }

    public static function getAllUser(){
        return self::get('SELECT au.* , 
        (SELECT concat(firstname, " " , lastname) 
        FROM app_users_profiles 
        WHERE app_users_profiles.userId = au.userId) userprofile 
        FROM `app_users` au');
    }
    
    public static function getusers($user)
    {
        return self::get
            ('SELECT au.*, aug.GroupName GroupName 
            FROM ' . self::$tableName . ' 
            au  INNER JOIN app_users_groups aug ON au.GroupId = aug.GroupId WHERE au.UserId != ' . $user
                        );
    }
    
    public static function userExists($userName)
    {
        return self::get('SELECT * FROM ' . self::$tableName . ' WHERE Username = "'. $userName .'"');
    }
    
      public static function passwoedExists($passwoed,$userId)
    {
        $passwoed = crypt($passwoed, APP_SLAT);
        $sql = 'SELECT * FROM ' . self::$tableName . ' WHERE UserId = "'. $userId .'" AND Password = "' . $passwoed .'"';
      //  var_dump($userId . '</br>' . $passwoed);
     //   die();
        return self::get($sql);
    }
    
     public static function emailExists($email)
    {
        return self::get('SELECT * FROM ' . self::$tableName . ' WHERE Email = "'. $email .'"');
    }
    
    public static function authenticate($username, $passwoed, $session){
     
        $passwoed = crypt($passwoed, APP_SLAT);
        $sql = 'SELECT * FROM app_users WHERE Username = "'. $username .'" AND Password = "' . $passwoed .'"';
        $faundUser = self::getOne($sql);
        
        $id = $faundUser['UserId'];
        $F_User = self::getByPK($id);
        
     
        
        if(false !== $F_User){
            if($F_User->status == 2){
                return 2;
            }
            $F_User->lastLogin = date('Y-m-d H:i:s');
            $F_User->save();
            $F_User->GroupName = UserGroupModel::getByPK($F_User->GroupId);
            $F_User->profile = UsreProfileModel::getByPK($F_User->UserId);
            $F_User->privileges = UsergrouprivilModel::getPrivilegeGroup($F_User->GroupId);
            $session->u = $F_User;
            return 1;
        }
        return false;
    }

}