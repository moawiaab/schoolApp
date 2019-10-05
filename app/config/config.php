<?php

defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);

define("APP_PATH", dirname(__FILE__). DS.'..');

defined("VIEW_PATH") ? null : define('VIEW_PATH',APP_PATH.DS.'views'.DS);
defined("TEMPLATE_PATH") ? null : define("TEMPLATE_PATH",APP_PATH . DS . 'template');


defined('SESSION_NAME')      ? null  : define('SESSION_NAME', '_ESTORE_SESSION');
defined('SESSION_LIFE_TIME')      ? null  : define('SESSION_LIFE_TIME', 0);
defined('SESSION_SAVE_PATH')      ? null  : define('SESSION_SAVE_PATH',  APP_PATH . DS . '..' . DS . 'session');

defined('DATABASE_HOST_NAME')        ? null  : define('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')        ? null  : define('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')         ? null  : define('DATABASE_PASSWORD', 'Moa_09195');
defined('DATABASE_DB_NAME')          ? null  : define('DATABASE_DB_NAME', 'school_db');

defined('APP_SLAT')      ? null  : define('APP_SLAT', '$2a$07$yeNCSNwRpYopOhv0TrrReP$');
defined('CHAGE_FOR_PRIVILEGE')      ? null  : define('CHAGE_FOR_PRIVILEGE', 1);

defined('UPLODE_STORAGE')      ? null  : define('UPLODE_STORAGE',  APP_PATH . DS . '..' . DS . 'uploads');
defined('MYHISTORY')      ? null  : define('MYHISTORY',  APP_PATH . DS . '..' . DS . 'history');
defined('IMAGE_UPLODE_STORAGE')      ? null  : define('IMAGE_UPLODE_STORAGE',  UPLODE_STORAGE . DS . 'images');
defined('DEMC_UPLODE_STORAGE')      ? null  : define('DEMC_UPLODE_STORAGE',  UPLODE_STORAGE . DS . 'demc');
defined('IMAGE_SHOW_STORAGE')      ? null  : define('IMAGE_SHOW_STORAGE',  '/uploads/images/');


