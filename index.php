<?php

use FR_MO\Lib\MainController;
use FR_MO\Lib\Template\Template;
use FR_MO\Lib\Registry;
use FR_MO\Lib\SessionManager;
use FR_MO\Lib\Messenger;
use FR_MO\Lib\Authentination;



defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);

require_once 'app' .DS . 'config' .DS. 'config.php';
require_once APP_PATH .DS. 'lib' .DS.'autoload.php';
$nameTemplate = require_once 'app' .DS . 'config' .DS. 'templateconfig.php';

$session = new SessionManager();
$session->start();

$messenger = Messenger::getInstance($session);

$authentination = Authentination::getInstance($session);
$template = new Template($nameTemplate);

$registry = Registry::getInstance();
$registry->session = $session;
$registry->messenger = $messenger;
//var_dump($registry);

$control = new MainController($template,$registry,$authentination);
$control->getInstance();
