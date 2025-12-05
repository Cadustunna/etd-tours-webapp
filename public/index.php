<?php
define('APP_ROOT', realpath(__DIR__ . '/../app'));
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
ob_start();

// --- Include core app classes first ---
require_once(APP_ROOT . '/config.php');
require_once(APP_ROOT . '/classes/Controller.php');  // Base class must be first
require_once(APP_ROOT . '/classes/Model.php');
require_once(APP_ROOT . '/classes/Boostrap.php');
require_once(APP_ROOT . '/classes/Messages.php');

// --- Include controllers and models ---
require_once(APP_ROOT . '/controllers/home.php');
require_once(APP_ROOT . '/models/home.php');

// --- Initialize MVC ---
$boostrap = new Boostrap($_GET);

// Holds instance of the controller class
$controller = $boostrap->createController();

if ($controller) {
    $controller->executeAction();
} else {
    echo "<br> Unable to load the requested controller or action.";
}
