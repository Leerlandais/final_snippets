<?php

session_start();
// CHECK SESSION ACTIVITY OR LOGOUT AUTOMATICALLY
if (isset($_SESSION["activity"]) && time() - $_SESSION["activity"] > 1800) { // currently set for 30 mins (online timer is 3 mins)
    session_unset(); // for good practice, clear the session variables as destroy doesn't remove browser cookies etc
    session_destroy();
    header("location: ./");
    exit();
}
$_SESSION["activity"] = time(); // change time of last activity

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

use model\MyPDO;

require_once "../config.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

require_once PROJECT_DIRECTORY.'/vendor/autoload.php';

$loader = new FilesystemLoader(PROJECT_DIRECTORY.'/view/');

/*
// Dev version
$twig = new Environment($loader, [
    'debug' => true,
]);
 $twig->addExtension(new \Twig\Extension\DebugExtension());
*/

// Prod version
$twig = new Environment($loader, [
    'cache' => '../cache/Twig',
    'debug' => false,
]);
 // no DebugExtension online


try {
    $db = MyPDO::getInstance(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
        DB_LOGIN,
        DB_PWD);
    $db->setAttribute(MyPDO::ATTR_ERRMODE, MyPDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch (Exception $e){
    die($e->getMessage());
}

require_once PROJECT_DIRECTORY.'/controller/routerController.php';

$db = null;