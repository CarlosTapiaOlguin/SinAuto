<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);
//define('CHARSET', 'ISO-8859-1');
define('CHARSET', 'UTF-8');
//ini_set('mssql.charset', CHARSET);
session_name('5in4uTo');
session_cache_limiter('nocache');
date_default_timezone_set('America/Santiago');
//date_default_timezone_set('America/Argentina/Buenos_Aires');
header('Content-Type: text/html; charset=' . CHARSET);

try
{
    require_once ROOT     . 'vendor/autoload.php';
    require_once APP_PATH . 'Config.php';
    require_once APP_PATH . 'Request.php';
    require_once APP_PATH . 'Bootstrap.php';
    require_once APP_PATH . 'Controller.php';
    require_once APP_PATH . 'Model.php';
    require_once APP_PATH . 'View.php';
    require_once APP_PATH . 'Registro.php'; //Trabajar con patron Singleton
    require_once APP_PATH . 'Database.php';
    require_once APP_PATH . 'Session.php';
    require_once APP_PATH . 'Funciones.php';
        
    Session::init();

    Bootstrap::run(new Request);
}
catch (Exception $e)
{
    echo $e->getMessage();
}
?>