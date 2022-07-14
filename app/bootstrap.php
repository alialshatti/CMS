<?php

//Load config
require_once 'config/config.php';

require_once 'Helpers/url_helper.php';
require_once 'Helpers/session_helper.php';
//Load libraries
/*
require_once 'libraries/Core.php';
require_once 'libraries/Controler.php';
require_once 'libraries/Database.php';
*/
//Autoload core Libraries

spl_autoload_register(function($className){

    require_once 'libraries/' . $className . '.php';


});



