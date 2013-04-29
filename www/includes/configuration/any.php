<?php

include_once "common/cdbdata.php";

//Archivo de configuracion generado automaticamente. No cambiar a mano
$primary_db = new cdbdata("127.0.0.1","root","","db_monitoreo_gcba","utf-8","mysql");

$db_pool = array("primary_db"=>$primary_db);
define("USER_NOAVATAR",true);
define("LOG_PATH","c:/workspace/giv/log/");
define("LOG_DB",false);
define("HOME_PATH","c:/workspace/giv/");
define("APP_PATH","c:/plataforma4/plataforma4/");
define("APP_SHARED","");
define("TITLE","Monitoreo - Backoffice");
define("WEB_PATH","");
define("DEBUG",true);
define("SHA512",true);
define("SALT","Lu.02");

//Modulo de mensajeria
define('DEFAULT_SMTP',1);
define('DEBUG_EMAIL','alejandra.bano@commsys.com.ar');

define("JQUERY_LIB",true);
define("JQUERY_UI_LIB",true);
define("KENDO_LIB",true);
define("KENDO_MENU_LIB",true);
define("TIPSY_LIB",true);


define("PHP_CMD","/usr/bin/php -dinclude_path=.:c:/plataforma4/plataforma4/includes:c:/workspace/giv/www/includes");

?>