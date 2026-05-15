<?php
require_once 'app/controllers/ControllerHome.php';
require_once 'app/controllers/ControllerEditor.php';
require_once 'app/controllers/ControllerGame.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = $_REQUEST['action'];

if(!isset($action) || empty($action)){
    $action = 'home';
}

$params = explode('/', $action);
//params = [0]->juego,[1]->5643
//00000000,juego/uncharted

switch ($params[0]) {
    case 'home':
        $controllerHome = new ControllerHome();
        $controllerHome->showHome();
        break;
    case 'games':
        $controllerGame = new ControllerGame();
        $controllerGame->showGames();
        break;
    default:
        # code...
        break;
}