<?php
require_once 'app/controllers/ControllerHome.php';
require_once 'app/controllers/ControllerEditor.php';
require_once 'app/controllers/ControllerGame.php';
require_once 'app/controllers/ControllerAdmin.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

$action = $_REQUEST['action'];

if (!isset($action) || empty($action)) {
    $action = 'home';
}

$params = explode('/', $action);

switch ($params[0]) {

    //public
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
    case 'administrar':
        if (isset($_SESSION['admin'])) {
            header("Location: " . BASE_URL . "adminview");
            exit();
        }
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->showFormLogin();
        break;
    case 'load':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->autenticar();
        break;

    //admin
    case 'adminview':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->showAdminControl();
        break;
    case 'sessionout':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->logout();
        break;
    case 'editGames':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->showEditsGames();
        break;
    case 'editEditores':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->showEditsEditors();
        break;
    case 'deleteEditor':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->deleteEditor($params[1]);
        break;
    case 'formAltasEditores':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->showFormEditores();
        break;
    case 'formAltasGames':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->showFormGames();
        break;
    case 'altaEditor':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->saveEditor();
        break;
    case 'altaGames':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->saveGame();
        break;
    case "modifyEditor":
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->ModifyEditor($params[1]);
        break;
    case 'addModifyEditor':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->addModifyEditor($params[1]);
        break;
    case 'deleteGame':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->deleteGame($params[1]);
        break;
    case 'modifyGame':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->modifyGame($params[1]);
        break;
    case 'addModifyGame':
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->addModifyGame($params[1]);
        break;
    default:
        $controllerHome = new ControllerHome;
        $controllerHome->showError($action);
        break;
}
