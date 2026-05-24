<?php
require_once 'app/controllers/ControllerHome.php';
require_once 'app/controllers/ControllerEditor.php';
require_once 'app/controllers/ControllerGame.php';
require_once 'app/controllers/ControllerAdmin.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

session_start();

$action = $_REQUEST['action'];

if (!isset($action) || empty($action)) {
    $action = 'home';
}

$params = explode('/', $action);
//params = [0]->juego,[1]->5643
//00000000,juego/uncharted

if (isset($_SESSION['admin'])) {

    switch ($params[0]) {
        case 'adminview':
            $controllerAdmin = new ControllerAdmin();
            $controllerAdmin->showAdminControl();
            break;
        case 'sessionout':
            $controllerAdmin = new ControllerAdmin();
            $controllerAdmin->logout();
            break;

        default:
            # code...
            break;
    }
} else {

    switch ($params[0]) {
        case 'home':
            $controllerHome = new ControllerHome();
            $controllerHome->showHome();
            break;
        case 'games':
            $controllerGame = new ControllerGame();
            $controllerGame->showGames();
            break;
        case 'game':
            $controllerGame = new ControllerGame();
            $controllerGame->showGame($params[1]);
            break;
        case 'editors':
            $controllerEditor = new ControllerEditor();
            $controllerEditor->showEditors();
            break;
        case 'editor':
            $controllerEditor = new ControllerEditor();
            $controllerEditor->showEditor($params[1]);
            break;
        case 'about':
            $controllerHome = new ControllerHome();
            $controllerHome->showAbout();
            break;
        case 'admin12345':
            $controllerAdmin = new ControllerAdmin();
            $controllerAdmin->showFormLogin();
            break;
        case 'load':
            $controllerAdmin = new ControllerAdmin();
            $controllerAdmin->autenticar();
            break;

        default:
            break;
    }
}
